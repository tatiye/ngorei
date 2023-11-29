<?php 
  use app\tatiye;
  use app\Graph\Response;
  $data = json_decode(file_get_contents("php://input"));
  $db   =new tatiye();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $send = array(                                                             
            "ipaddress"=>tatiye::getBrowser('IP'),                                                
            "browser"   =>tatiye::getBrowser('browser'),                                                
            "devices"   =>$data->indexOn,                                                
            "platform"  =>tatiye::getBrowser('platform'),                                                
            "userid"    =>0,                                                 
            "time"      =>tatiye::tm(),                                                 
            "date"      =>tatiye::dt("EN"),                                             
            "bulan"     =>tatiye::dt("M"),                                              
            "tahun"     =>tatiye::dt("Y"),

           ); 
        if (!isset($_SESSION['visitor'])){
           $_SESSION['visitor']=tatiye::getBrowser('IP'); 
           $db->que($send)->insert("appvisitor");
          } 
          http_response_code(200);
          echo json_encode($send);
   } else {
       return tatiye::index();
   }
   