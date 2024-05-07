<?php 
  use app\tatiye;
  use app\Graph\Response;
  $data = json_decode(file_get_contents("php://input"));
  $tabel=tatiye::tn(4);
   $id   =tatiye::tn(5);
  $db   =new tatiye();



    if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $row= tatiye::fetch($tabel,'*',"id='".$id."'");
      $Exp=array(
             'arsip'    =>json_encode($row),
             'userid'   =>$data->userid,
             'keyid'    =>$id,
             'nmtabel'  =>$tabel,
             "time"     =>tatiye::tm(),                                               
             "date"     =>tatiye::dt("EN"),                                           
             "bulan"    =>tatiye::dt("M"),                                            
             "tahun"    =>tatiye::dt("Y"), 
             );
          $result=$db->que($Exp)->insert('appsampah');
         $db->delete($tabel,"id='".$id."' "); 
          http_response_code(200);
          echo json_encode($Exp);
   } else {
       return tatiye::index();
   }
   