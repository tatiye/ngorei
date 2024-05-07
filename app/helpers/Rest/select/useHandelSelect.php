<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
// Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));
$row=tatiye::fetch($data->tabel,"*",$data->where);
$Expuid=tatiye::fetchUserID($row['userid']);
$Exp= array_merge($row,$Expuid);
echo json_encode($Exp);