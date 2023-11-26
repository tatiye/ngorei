<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));
$tabel=tatiye::openSSLKey($data->tabel,$_SESSION['user_id']); 
$row=tatiye::useHandelIDKey($tabel,$data->id,$data->syntax);

// $row=tatiye::useHandelIDKey('demo',54,'userid');

echo json_encode($row);