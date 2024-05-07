<?php 
  use app\tatiye;
  use app\Graph\Response;
  $data = json_decode(file_get_contents("php://input"));
  $tabel=tatiye::tn(4);
  $db   =new tatiye();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
       $row= tatiye::fetch($tabel,'*',"id='".$data->userid."'");
       $fetchKeys=tatiye::fetchKeys($tabel);
       $Exp=array(
              'arsip'    =>json_encode($row),
              'userid'   =>$data->userid,
              'nama'     =>$row[$fetchKeys[0]],
              'keyid'    =>$data->id,
              'nmtabel'  =>$tabel,
              "time"     =>tatiye::tm(),                                               
              "date"     =>tatiye::dt("EN"),                                           
              "bulan"    =>tatiye::dt("M"),                                            
              "tahun"    =>tatiye::dt("Y"), 
              );
           $result=$db->que($Exp)->insert('appsampah');
           $db->delete($tabel,"id='".$data->id."' "); 
           http_response_code(200);
          echo json_encode($data);
   } else {
       return tatiye::index();
   }
   