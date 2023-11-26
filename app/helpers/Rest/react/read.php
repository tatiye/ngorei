<?php 
use app\tatiye;
$db=new tatiye();
$Text=tatiye::Text();
$data = json_decode(file_get_contents("php://input"));
$tabel=tatiye::tn(3);
$ID=$data->id;
$row= tatiye::fetch($tabel,'id, user_id,'.$data->select,"id='".$ID."'");
    $uid= tatiye::fetch('app_user','*',"id='".$row['user_id']."'");
	$user=array(
		'user'=>$uid['FirstName']?$uid['FirstName']:'',
		'avatar'=>$uid['photo']?$uid['photo']:tatiye::URL('drive/user/L.jpeg'),
	);
 http_response_code(200);
 echo json_encode(array_merge($row,$user));
