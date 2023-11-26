<?php 
use app\tatiye;
$iniNo=0;
$myNo=0;
$myNo1=0;
$myNo2=0;
$myNo3=0;
     

 $variable=json_decode($_POST['action'], true);
 $stsLabel='hidden';
 $add= '';
foreach ($variable as $key => $value) {
  // echo $key;
$storage=array(
  'az'=>$key,
);
 $iniNo=$iniNo+1;
   if ($value[0]=='select') {
      $setDir='select';
    } elseif ($value[0] == 'switch'){
      $setDir='switch';
    } else {
      $setDir='input';
    }
    
    if (file_exists(__DIR__.'/Syntax/'.$setDir.'/default.php')) {
       include(__DIR__.'/Syntax/'.$setDir.'/default.php');
    } else {
      echo "<b>Type Form Tidak Terdaftar</b>";
    }
}

?>
