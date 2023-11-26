<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
$db=new tatiye();
Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));
//$tabel=tatiye::openSSLKey($data->tabel,$_SESSION['user_id']); 
$arry=array();
if (!empty($data->syntax)) {
	$syntax=$data->syntax;
} else {
	$syntax='userid';
}
$COUNT=tatiye::fetch("$data->tabel"," COUNT(*) as count");
$arry['date']=tatiye::dt('DTIE');
$arry["total"] =$COUNT['count'];
$arry['data']=array();
$QUERY="SELECT * FROM $data->tabel WHERE $data->id ORDER BY id DESC LIMIT 0,3";
$result=$db->query($QUERY);
 $no=0;
 while($row=$result->fetch_assoc()){
 	$no=$no+1;
 	$Expuid=tatiye::fetchUserID($row[$syntax]);
 	$number=array("no"=>$no);
    array_push($arry["data"],array_merge($number,$row,$Expuid));
}
http_response_code(200);
echo json_encode($arry);