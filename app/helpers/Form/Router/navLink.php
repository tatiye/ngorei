<?php 
error_reporting(0);
use app\tatiye;
$App2=tatiye::dir('app/models/navLink.php');
$storage=json_decode($_POST['action'], true);
$filename=$storage['router'];
$App=tatiye::dir('app/views/router/'.$filename.'.php');
$AppAssets=tatiye::dir('public/assets/'.$filename.'.json');
if ($storage['status']=='dev' ) {
  $Exp1[]=array('no' =>'error_reporting(0);');
  $Exp1[]=array('no' =>'$routeLink=[');
foreach ($storage['link'] as $router => $value) {
  $Exp1[]=array('no' =>' "'.$router.'"    =>[');
   foreach ($value as $key => $row) {
    // echo $row[0];
  $Exp1[]=array('no' =>'   "'.$row[0].'"  =>["'.$row[1].'","'.$row[2]. '"],');
   }
  $Exp1[]=array('no' =>' ],');
}
  $Exp1[]=array('no' =>'];');
   echo tatiye::AsciiTable()->crud($Exp1);




  $Hashtag[]=array('no' =>'$hashtag=[');
   foreach ($storage['hashtag'] as $router => $value) {
     $Hashtag[]=array('no' =>' "'.$router.'"    =>[');
      foreach ($value as $key => $row) {
       // echo $row[0];
     $Hashtag[]=array('no' =>'   "'.$row[0].'"  =>["'.$row[1].$row[2].'","#'.$row[2]. '","'.$row[3]. '"],');
      }
     $Hashtag[]=array('no' =>' ],');
   }
  $Hashtag[]=array('no' =>'];');
echo tatiye::AsciiTable()->crud($Hashtag);





   $output = ob_get_contents();
   ob_end_clean();
   $newfile =fopen($App, "w");
   fwrite($newfile, '<?php'.PHP_EOL.strip_tags($output) );


    $filecomponents = fopen($AppAssets, "w");
   fwrite($filecomponents, json_encode($storage));


   fclose($newfile);

}