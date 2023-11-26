<?php 
error_reporting(0);
use app\tatiye;
$App2=tatiye::dir('app/models/navLink.php');
$storage=json_decode($_POST['action'], true);
$filename=$storage['router'];
 $Text=tatiye::Text();
$App=tatiye::dir('app/views/router/'.$filename.'.php');
$AppAssets=tatiye::dir('public/assets/'.$filename.'.json');

if ($storage['status']=='dev' ) {
  $Exp1[]=array('no' =>'error_reporting(0);');
  $Exp1[]=array('no' =>'$routeLink=[');
foreach ($storage['link'] as $router => $value) {
  $Exp1[]=array('no' =>' "'.$router.'"    =>[');
   foreach ($value as $key => $row) {
      if (!empty($row[3])) {
            $rout=$row[3];
        } else {
            $rout='';
        }
        
  $Exp1[]=array('no' =>'   "'.$row[0].'"  =>["'.$row[1].'","'.$row[2]. '","'.$rout. '"],');
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


  if (!empty($storage['navigasi'])) {
       $Appnavigasi=tatiye::dir('public/assets/mobilenavigasi.json');
       require_once tatiye::dir('app/views/router/mobile.php');
          $str='[';
       foreach ($routeLink['navigasi'] as $router => $value) {
            $ID=end(explode('/',$value[0]));
           $str=$str.'{
            "titel": "'.$router.'",
            "id": "'.$ID.'",
            "path": "/'.$Text->strreplace([$router,' ','-']).'/",
            "url": "'.tatiye::LINK('mobile/'.$value[0].'.html').'",
            "dir": "'.tatiye::LINK($value[0]).'"
          },';
       };

         $str = substr($str, 0, -1).']';
         $filecomponents = fopen($Appnavigasi, "w");
         fwrite($filecomponents, $str);
  }


   fclose($newfile);

}