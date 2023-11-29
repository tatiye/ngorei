<?php 
use wolf05\helper\tatiyeNet;
use wolf05\helper\Rest\React\storage;
$db=new tatiyeNet();
$Text=tatiyeNet::Text();
$data = json_decode(file_get_contents("php://input"));
$uid= tatiyeNet::fetch('app_user','*',"id='".$data->user_id."'");
$tabel=tatiyeNet::tn(3);
$select=$data->select;
$arry=array();
$total_data      =storage::init($tabel,"WHERE row='1'")->total_data();
$arry['update']=tatiyeNet::dt('DTIE');
$arry["total"]   =$total_data;
$arry['data']=array();
if (!empty($uid)) {
$query="SELECT id AS uid,$select FROM $tabel  ORDER BY id DESC  ";
$result=$db->query($query);
while($row=$result->fetch_assoc()){
	  array_push($arry["data"],$row);
	}
} else {
	$arry['data']='errors';
}

 http_response_code(200);
 echo json_encode($arry);