<?php 
use app\tatiye;
use app\Rest\News\storage;
$db=new tatiye();
$Text=tatiye::Text();
$Exp=array();
$data = json_decode(file_get_contents("php://input"));
// $row= tatiyeNet::fetch('app_user','*',"id='".$data->uid."'");
          $Exp=array(
             'news'              =>$data->news,
             'categori'          =>$data->categori,
             'list'              =>storage::init($data->news,$data->categori)->categori($data->news),
             );
     if ($data->news) {
      //$response =$Exp[$data->news];
       $detail['posts']=storage::init(strtolower($data->news),$data->categori)->news('');
     	 $response =array_merge($Exp,$detail);
      
     } else {
     	$response =$Exp;
     }
     

 http_response_code(200);
 echo json_encode($response);