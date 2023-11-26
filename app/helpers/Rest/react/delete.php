<?php 
use app\tatiye;
$db=new tatiye();
$Text=tatiye::Text();
$data = json_decode(file_get_contents("php://input"));
$row= tatiye::fetch('app_user','*',"id='".$data->user_id."'");
$tabel=tatiye::tn(3);
$arry=array();
if (!empty($row['id'])) {
	$db->delete($tabel,"id='".$data->id."' AND user_id='".$row['id']."'"); 
	$val['status']='sukses';
} else {
	$val['status']='errors';
}
 echo json_encode($val);