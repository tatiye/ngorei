<?php 
use wolf05\helper\tatiyeNet;
$db=new tatiyeNet();
$Text=tatiyeNet::Text();
$data = json_decode(file_get_contents("php://input"));
$row= tatiyeNet::fetch('app_user','*',"id='".$data->user_id."'");
$tabel=tatiyeNet::tn(3);
$arry=array();
if (!empty($row['id'])) {
	$db->delete($tabel,"id='".$data->id."' AND user_id='".$row['id']."'"); 
	$val['status']='sukses';
} else {
	$val['status']='errors';
}
 echo json_encode($val);