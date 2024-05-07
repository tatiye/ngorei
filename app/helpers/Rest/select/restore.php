<?php 
  use app\tatiye;
  use app\Graph\Response;
  $data = json_decode(file_get_contents("php://input"));
  $tabel=tatiye::tn(4);
   $id   =tatiye::tn(5);
   $db   =new tatiye();



    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $row= tatiye::fetch($tabel,'*',"id='".$id."'");
      $fetchKeys=tatiye::fetchKeys($tabel);
      $variable=json_encode($row['arsip']);
       $json_arr = json_decode($row['arsip'], true);
   
         $result=$db->que($json_arr)->insert($row['nmtabel']);
         $db->delete($tabel,"id='".$id."' "); 
          http_response_code(200);
          echo json_encode($json_arr);
   } else {
       return tatiye::index();
   }
   // 301