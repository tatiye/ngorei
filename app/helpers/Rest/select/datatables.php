<?php
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
use app\Graph\Response;
$NEWTOKEN="eyJkaXIiOiJkYXRhdGFibGVzXC9BcGlcLzAuMVwvZGF0YXRhYmxlcy5waHAiLCJ1aWQiOjF9";
// Authorization::init(1);
if($_SERVER["REQUEST_METHOD"] === "POST") {
  $val=json_decode(file_get_contents("php://input"),true);
  if ($val['limit']) {
     $attr ='*';
     $tabel=$val['tabel'];
     $where=$val['where'];
     $setvariabel=$val['variabel'];
     $LMT=$val['limit'];
     if ($val['limit']) {
        $Limit="LIMIT ".$val['limit'];
     } else {
        $Limit="LIMIT 1";
     }
  } else {
     $attr =$_POST['etc'];
     $tabel=$_POST['tabel'];
     $where=$_POST['where'];
     $LMT=$_POST['limit'];
     $setvariabel=$_POST['variabel'];
     if ($_POST['limit']) {
        $Limit="LIMIT ".$_POST['limit'];
     } else {
        $Limit='';
     }
  }

      $QUERY="SELECT * FROM $tabel WHERE $where ORDER BY id DESC $Limit";
 
  $COUNT=tatiye::fetch($tabel," COUNT(*) as count",$where);
  $number=0;                                        
  $products_arr["data"]=array();                    
  $variable=tatiye::QY($QUERY);                     
  while ($row = $variable->fetch()) {               
    $number=$number+1;    
    $sub_array   =array();                           
    $sub_array[] =$number;                          
    foreach ($setvariabel as $key => $value) {
      $sub_array[] =$row[$value];                     
    }                                                         
    array_push($products_arr["data"], $sub_array);  
  }                                                 
  $merge=array(                                     
    "draw"               =>$COUNT["count"],         
    "recordsTotal"       =>$LMT,                       
    "recordsFiltered"    =>0,                       
  );                                                
  $json_arr=array_merge($merge,$products_arr);      
  echo json_encode($json_arr);                      
} else {
  return tatiye::index();
}
