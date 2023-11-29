<?php 
use wolf05\helper\tatiyeNet;
$db=new tatiyeNet();
$Text=tatiyeNet::Text();
$data = json_decode(file_get_contents("php://input"));
$tabel=tatiyeNet::tn(3);
$ID=$data->id;
$row= tatiyeNet::fetch($tabel,'id, user_id,'.$data->select,"id='".$ID."'");
    $uid= tatiyeNet::fetch('app_user','*',"id='".$row['user_id']."'");
	$user=array(
		'user'=>$uid['FirstName']?$uid['FirstName']:'',
		'avatar'=>$uid['photo']?$uid['photo']:tatiyeNet::URL('drive/user/L.jpeg'),
	);
 http_response_code(200);
 echo json_encode(array_merge($row,$user));
