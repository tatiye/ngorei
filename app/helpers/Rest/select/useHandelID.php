<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));
$tabel=tatiye::openSSLKey($data->tabel,$_SESSION['user_id']); 
$row=tatiye::useHandelID($tabel,$data->id);   
echo json_encode($row);