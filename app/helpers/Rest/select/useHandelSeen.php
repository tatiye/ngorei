<?php 
  use app\tatiye;
  use app\Graph\Response;
  $data = json_decode(file_get_contents("php://input"));
  $db   =new tatiye();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
           $send = array(                                            
             "dilihat"   =>$data->indexOn,                                                
            ); 
            $result=$db->que($send)->update($data->tabel,"id ='".$data->id."' ");
          http_response_code(200);
          echo json_encode($data);
   } else {
       return tatiye::index();
   }
   