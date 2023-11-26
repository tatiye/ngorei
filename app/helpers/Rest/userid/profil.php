<?php
use app\tatiye;
$data = json_decode(file_get_contents("php://input"));
$tabel='appuserprofil';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
$db=new tatiye();
$row= tatiye::fetch($tabel,'nama,email,telepon,alamat,avatar,mapId,date,time',"userid='".$data->userid."'");
   $query="SELECT * FROM appfile WHERE  userid='".$data->userid."' AND categori='Profil'";
   $result=$db->query($query);
   while($row1=$result->fetch_assoc()){
      if ($row1['filename'] !==$row['avatar']) {
         // code...
     
   	      $Exp1[]=array(
   	         'filename'           =>tatiye::images($row1['filename']),
              'date'              =>$row1['date'],
              'time'              =>$row1['time'],
   	         );
         }
   } 


     $Exp=array(
        'nama'              =>$row['nama'],
        'email'             =>$row['email'],
        'alamat'            =>$row['alamat'],
        'avatar'            =>tatiye::images('80x80/images/'.$row['avatar']),
        'mapId'             =>$row['mapId'],
        'date'              =>$row['date'],
        'mapId'             =>$row['mapId'],
        'date'              =>$row['date'],
        'time'              =>$row['time'],
        'data'              =>$Exp1,
        );
     
   http_response_code(200);
   echo json_encode($Exp);
}