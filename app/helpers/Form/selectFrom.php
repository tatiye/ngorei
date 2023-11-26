<?php 
use app\tatiye;
$iniNo=0;
$myNo=0;
$myNo1=0;
$myNo2=0;
$myNo3=0;
$storage=json_decode($_POST['storage'], true);

$App=tatiye::dir('public/package/'.$storage['route'].'/controllers/send/'.$storage['segment'].'.php');

if ($storage['content'] =='from' || $storage['content'] =='pridRaw' ) {
  if (file_exists($App)) {} else {
   $fileName=$storage['segment'];
   include(__DIR__.'/selectFromSend.php');
   $output = ob_get_contents();
   ob_end_clean();
   $newfile =fopen($App, "w");
   fwrite($newfile, '<?php'.strip_tags($output) );
   fclose($newfile);
  }
 } elseif ($storage['content'] =='office'){
    if (file_exists($App)) {} else {
     $fileName=$storage['segment'];
     include(__DIR__.'/selectImportSend.php');
     $output = ob_get_contents();
     ob_end_clean();
     $newfile =fopen($App, "w");
     fwrite($newfile, '<?php'.strip_tags($output) );
     fclose($newfile);
    }
 }

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

$headerKey=array();
foreach ($variable as $key => $value) {
 $iniNo=$iniNo+1;
  $headerKey[$iniNo]=$key;
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

