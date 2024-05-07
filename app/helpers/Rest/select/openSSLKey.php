<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
$db=new tatiye();
Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));
$tabel=tatiye::openSSLKey($data->tabel,$_SESSION['user_id']); 
http_response_code(200);
echo json_encode($tabel);