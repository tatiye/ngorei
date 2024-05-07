<?php
error_reporting(0);
use app\tatiye;
use app\models\storage;
 $Text=tatiye::Text();
$db=new tatiye();
if($_SERVER["REQUEST_METHOD"] === "POST") {
$val     =json_decode(file_get_contents("php://input"));
$tabel   =$val->tabel;
$mygroup =$val->group;
$mycount =$val->count;
$wh      =$val->query ? $val->query :"row=1";
$date=tatiye::fetch($tabel,"date",$wh." ORDER BY date DESC");
$COUNT=tatiye::fetch($tabel," COUNT(DISTINCT $mygroup) as label",$wh);

$QUERY="SELECT COUNT(*) AS data, SUM($mycount) AS jumlah FROM $tabel WHERE $wh ";
$row=tatiye::setPDO1($QUERY);
$chart=tatiye::chart($tabel,$mygroup,$wh,$row['jumlah'],$COUNT['label'],$mycount);
$month=tatiye::chartMonth($tabel,$chart,$mygroup,$mycount,$row['jumlah']);
  $data=array(
    "total"=>$Text->numberFormat([$row['jumlah'],0]), 
    "data"=>$Text->numberFormat([$row['data'],0]), 
    "calculat"=>$Text->beCalculated([$row['data']]), 
    "label"=>$COUNT['label'], 
    "date"=>tatiye::Ft('HTGL',$date['date']), 
    "storage"=>$chart, 
    "datasets"=>$month
   ); 


http_response_code(200);
echo json_encode($data);
} else {
  return tatiye::index();
}
