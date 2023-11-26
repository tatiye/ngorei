<?php 
use app\tatiye;
$iniNo=0;
$myNo=0;
$myNo1=0;
$myNo2=0;
$myNo3=0;
$storage=json_decode($_POST['storage'], true);
$variable=json_decode($_POST['action'], true);
if ($storage['label'] ==1) {
 $stsLabel='index';
} else {
 $stsLabel='hidden';
}
 if (is_numeric($storage['key'])) {
    $nmTabel=$storage['tabel'];
    $add= tatiye::fetch($nmTabel,'*',"id='".$storage['key']."'");
 }  

foreach ($variable as $key => $value) {
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

