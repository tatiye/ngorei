<?php
use app\tatiye;
$db = new tatiye();
$val=json_decode($_POST['key'], true);
if (empty($val["error"])) {                                                                                
      $myDb=array(
        "host"     =>$val['data']['dbserver'],
        "username" =>$val['data']['user'],
        "password" =>$val['data']['password']
      );
       $db->create_db($myDb,$val['data']['dbname']);
       $arr = array(
         'id'       =>'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY', 
         'title'    =>'varchar(100) DEFAULT NULL',
         'deskripsi'=>'varchar(100) DEFAULT NULL',
         'images'   =>'varchar(200) DEFAULT NULL',
         'bulan'    =>'varchar(25) DEFAULT NULL',
         'tahun'    =>'varchar(25) DEFAULT NULL',
         'time'     =>'varchar(25) DEFAULT NULL',
         'date'     =>'varchar(25) DEFAULT NULL'
       ); 
       $db->from_sql($arr)->create_tabel('demo');

                                     
       $val2["hasil"]    ='sukses'; 
 } else {                                                                      
    $val2["hasil"]    ="error";                                                
}; 
 echo json_encode($val2);
