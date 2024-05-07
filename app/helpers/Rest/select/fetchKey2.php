<?php
error_reporting(0);
use app\tatiye;
use app\models\storage;
 $Text=tatiye::Text();
$db=new tatiye();
if($_SERVER["REQUEST_METHOD"] === "POST") {
$val=json_decode(file_get_contents("php://input"));
$tabel=$val->tabel;
$wh=$val->query ?$val->query :"row=1";
$keywords="title,description,date";
$COUNT=tatiye::fetch($tabel," COUNT(*) as count",$wh);
$data=storage::init($tabel)->Cook($val,$keywords,$val->keywords);
$search=storage::init($tabel)->keywords($keywords,$val->keywords);
$total_paging=storage::init($tabel)->total_paging($COUNT["count"],$val->limit,$keywords,$val->keywords);
if (!empty($val->order)) {
   $order=$val->order;
} else {
   $order="ORDER BY id DESC";
}


$QUERY="SELECT  * FROM $tabel WHERE $wh $search $order  ".$data["record"];
$record_num = ($val->limit * $val->page) - $val->limit;
$total_data=$COUNT["count"];
$no=$record_num;
$products_arr["val"]          =$val->order;
$products_arr["limit"]        =$val->limit;
$products_arr["page"]         =$val->page;
$products_arr["total_data"]   =$total_data;
$products_arr["keywords"]     =$val->page;
$products_arr["pagination"] =$total_paging;
$products_arr["storage"]      =array();
$result=$db->query($QUERY);
 while($row=$result->fetch_assoc()){
  $no=$no+1;
  if ($no==1) {
      $class='active';
    } else {
      $class='not';
    }
  $Expuid=tatiye::fetchUserID($row["userid"]);
  $number=array(
    "no"=>$no,
    "bg"=>tatiye::rangeColor($total_data,$no),
    "base"=>$Text->strreplace([$row['title'],' ','-']), 
    'url'            =>tatiye::LINK($base),
    'title'          =>$row['title'],
    'description'    =>$row['description'],
    'images'         =>$row['thumbnail'],
    "class"          =>$class
   ); 
  array_push($products_arr["storage"], array_merge($number,$row,$Expuid));
}
$paging=storage::init($tabel)->getPaging($val->page,$total_data,$val->limit,$number);
http_response_code(200);
echo json_encode(array_merge($products_arr,$paging));
} else {
  return tatiye::index();
}
