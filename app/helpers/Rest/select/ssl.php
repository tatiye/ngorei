<?php 
use app\tatiye;
use app\models\Package;
use app\tatiyeNetAuthorization AS Authorization;
// Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));
// echo tatiye::openSSLKey('demo'); 
// $row=tatiye::useHandelID($tabel,$data->expo,$data->id);  


     foreach (Package::Assets() as $key => $value) {
               $newToken=tatiye::WJT([
                    'dir'=>$value, 
                ]);

               $Exp[]=array(
                  $value  =>tatiye::openSSLKey($value),
                  );
        
         }





echo tatiye::openSSLKey($data->tabel);