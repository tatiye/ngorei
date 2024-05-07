<?php 
use app\tatiye;
$db = new tatiye();
$iniNo=0;
$myNo=0;
$myNo1=0;
$myNo2=0;
$myNo3=0;

$storage=json_decode($_POST['storage'], true);
$setItem=json_decode($_POST['setItem'], true);
 $variable=json_decode($_POST['action'], true);
 $components=json_decode($_POST['components'], true);
 $App=tatiye::dir('public/package/'.$storage['route'].'/controllers/send/'.$storage['segment'].'.php');
 $AppJSON=tatiye::dir('public/package/'.$storage['route'].'/controllers/'.$storage['segment'].'.json');

 $template=tatiye::dir('public/package/'.$storage['route'].'/controllers/'.$storage['segment'].'.html');
 if ($setItem==1) {
      if($storage['format'] == 'images') {
       include(__DIR__.'/images.php');
      } elseif ($storage['format'] == 'drive'){
       include(__DIR__.'/document.php');
      } else {
       include(__DIR__.'/send.php');
      }
   
        $fileName=$storage['segment'];
        $output = ob_get_contents();
        ob_end_clean();
        $newfile =fopen($App, "w");
        fwrite($newfile, '<?php'.strip_tags($output) );
        fclose($newfile);
         $arr["id"]        =$storage['segment'];
         $arr["storage"]   =$storage;
         $arr["action"]    =false;
         $arr["datatables"]=$storage['datatables'];
         $arr["type"]      ="JSON";
         $arr["components"]='package/'.$storage['route'].'/controllers/'.$storage['segment'].'.json';
         $result=$db->netDb($arr)->insertkey('package',"id|".$storage['segment']);
         
         $arr1["id"]        =$storage['segment'];
         $arr1["storage"]   =$storage;
         $arr1["action"]    =$variable;
         $fileNavigasi = fopen($AppJSON, "w");
         fwrite($fileNavigasi, json_encode($arr1));
    
 }


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
    $AppDir=tatiye::dir("app/helpers/Form/Syntax/".$setDir.'/default.php');
    if (file_exists($AppDir)) {
         if ($setItem==1) {
            include($AppDir);
            $output = ob_get_contents();
            $newfile =fopen($template, "w");
            fwrite($newfile, $output );
          } elseif ($setItem == 'inside'){
             include($AppDir);
          } 
    } else {
      echo "<b>Type Form Tidak Terdaftar</b>";
    }
}

 if($setItem == 'inside') {} else {
     include($template);
 }
  
?>