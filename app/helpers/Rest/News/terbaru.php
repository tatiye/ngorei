<?php 
use app\tatiye;
use app\Rest\News\storage;
$db=new tatiye();
$Text=tatiye::Text();
$Exp=array();
$data = json_decode(file_get_contents("php://input"));
// $row= tatiyeNet::fetch('app_user','*',"id='".$data->uid."'");
     // $Exp['data']=array(
     //   'posts'=>storage::init($data->news,$data->categori)->terbaru(''),
     //    );


   $detail=storage::init()->terbaru();

 http_response_code(200);
 echo json_encode($detail);