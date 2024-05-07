<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
// Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));
$Expuid=tatiye::fetchUserID($data->userid);
echo json_encode($Expuid);