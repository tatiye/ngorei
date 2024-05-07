<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
$db=new tatiye();
// Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));
$Text=tatiye::Text();
//$tabel=tatiye::openSSLKey($data->tabel,$_SESSION['user_id']); 
$arry=array();
if (!empty($data->syntax)) {
  $syntax= $Text->strreplace([$data->syntax,'.',',']);
} else {
  $syntax='1,3';
}
if (!empty($data->query)) {
  $addQue=$data->query;
} else {
  $addQue="ORDER BY id DESC";
}

$COUNT=tatiye::fetch("$data->tabel"," COUNT(*) as count",$data->id);
$arry['date']=tatiye::dt('DTIE');
$IDlimit=end(explode('.',$data->syntax));
$IDPage=explode('.',$data->syntax);
$mykeywords ="$data->id $addQue LIMIT $syntax";

$total_pages = ceil($COUNT['count'] / $IDlimit);
$QUERY="SELECT * FROM $data->tabel WHERE  $mykeywords    ";
$arry['limit']=$IDlimit;
$arry['page'] =$IDPage[0];
$arry['query'] =$data->syntax;
$arry['query3'] =$QUERY;
$arry["total"] =$COUNT['count'];
$arry["paging"] =$total_pages;
$arry['data']=array();
        if ($IDPage[0]=='0') {
          $retPage=1;
        } else {
          $retPage=$IDPage[0];
        }
        $setpage =$retPage;
        $records =$IDPage[1];
        $record_num = ($records * $setpage) - $records;



$result=$db->query($QUERY);
 $no=$record_num;
 while($row=$result->fetch_assoc()){
  $no=$no+1;
  $Expuid=tatiye::fetchUserID($row['userid']);
    if ($no==1) {
      $class='active';
    } else {
      $class='';
    }

  $number=array(
    "no"=>$no,
    "bg"=>tatiye::rangeColor($COUNT['count'],$no),
    "base"=>$Text->strreplace([$row['title'],' ','-']), 
    'url'            =>tatiye::LINK($base),
    'title'          =>$row['title'],
    'description'    =>$row['description'],
    'images'         =>$row['thumbnail'],
    'placeholder'          =>tatiye::imgPlaceholder($COUNT['count'],$no),
    "class"          =>$class
   ); 
  array_push($arry["data"],array_merge($number,$row,$Expuid));
  //array_push($arry["data"],array_merge($number,$row,$Expuid));
}
http_response_code(200);
echo json_encode($arry);