<?php 
error_reporting(0);
use app\tatiye;
$App=tatiye::dir('app/models/navLinkPackage.php');
$storage=json_decode($_POST['action'], true);
if ($storage['status']=='dev' ) {

  $Exp1[]=array('no' =>'error_reporting(0);');
  $Exp1[]=array('no' =>'$routeLink=[');
foreach ($storage['link'] as $router => $value) {
  $Exp1[]=array('no' =>' "'.$router.'"    =>[');
   foreach ($value as $key => $row) {
    // echo $row[0];
  $Exp1[]=array('no' =>'   "'.$row[0].'"  =>["'.$row[1].$row[2].'","#'.$row[2]. '","'.$row[3]. '"],');
   }
  $Exp1[]=array('no' =>' ],');
}
  $Exp1[]=array('no' =>' ];');
echo tatiye::AsciiTable()->crud($Exp1);

   $output = ob_get_contents();
   ob_end_clean();
   $newfile =fopen($App, "w");
   fwrite($newfile, '<?php'.PHP_EOL.strip_tags($output) );
   fclose($newfile);

}