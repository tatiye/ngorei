<?php
use app\tatiye;
$data = json_decode(file_get_contents("php://input"));
$tabel='appuserprofil';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
$db=new tatiye();
$row= tatiye::fetch($tabel,'nama,email,telepon,alamat,avatar,mapId,date,time',"userid='".$data->userid."'");
     $Exp=array(
        'nama'              =>$row['nama'],
        'email'             =>$row['email'],
        'alamat'            =>$row['alamat'],
        'avatar'            =>tatiye::images('80x80/'.$row['avatar']),
        'mapId'             =>$row['mapId'],
        'telepon'             =>$row['telepon'],
        'date'              =>$row['date'],
        'date'              =>$row['date'],
        'time'              =>$row['time'],
        );
      $_SESSION['datauid']      = $Exp; 
   http_response_code(200);
   echo json_encode($Exp);
}