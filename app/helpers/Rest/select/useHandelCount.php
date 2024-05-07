<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
// Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));
$row=tatiye::useHandelCount($data->tabel,$data->syntax); 
$total_pages = ceil($row['count'] / $data->limit)-1;
$Exp=array(
    'count'=>$row['count'],
    'peging'=>$total_pages,
);  
echo json_encode($Exp);