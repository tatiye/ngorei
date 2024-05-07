<?php 
error_reporting(0);
use app\tatiye;
$App2=tatiye::dir('app/models/navLink.php');
$storage=json_decode($_POST['action'], true);
$storageNavigasi=json_decode($_POST['navigator'], true);
$storageaddfetch=json_decode($_POST['addfetch'], true);

$filename=$storage['path'];
 $Text=tatiye::Text();
$App=tatiye::dir('app/views/router/'.$filename.'.php');
$AppAssets=tatiye::dir('public/assets/'.$filename.'.json');
$AppNavigasi=tatiye::dir('public/assets/navigasi_index.json');
$AppFetch=tatiye::dir('public/assets/index_fetch.json');

if ($storage['status']=='dev' ) {
  $Exp1[]=array('no' =>'error_reporting(0);');
  $Exp1[]=array('no' =>'$routeLink=[');

foreach ($storage['link'] as $router => $value) {
  $Exp1[]=array('no' =>' "'.$router.'"    =>[');
   foreach ($value as $key => $row) {
      if (!empty($row[3])) {
             $rout=$row[3];
             $deskripsi=$row[1];
        } else {
             $rout=$row[1];
             $deskripsi=$row[0];
        }
        $TITELFILE1='#'.preg_replace("/[^a-zA-Z0-9]/", "-", $row[0]);
        $TITELFILE2='/'.preg_replace("/[^a-zA-Z0-9]/", "-", $row[0]).'/';
        $TITELFILE='#!/'.preg_replace("/[^a-zA-Z0-9]/", "-", $row[0]);
        $dirName=preg_replace("/[^a-zA-Z0-9]/", "-", $row[0]);
        $dirFile=$Text->strreplace([$rout,'#','/']);
        $dirNameFile=preg_replace("/[^a-zA-Z0-9]/", "/", $dirFile);
        $TITELFILE3=tatiye::endexplode($dirNameFile);


        
  $Exp1[]=array('no' =>'   "'.$row[0].'"  =>[
    "'.$deskripsi. '",
    "'.$rout.'",
    "'.$row[2]. '",
    "'.$TITELFILE.'",
    "#'.$TITELFILE3.'",
    "'.$dirFile.'",
    "'.$dirName.'",
    "'.$TITELFILE3.'",
    "'.$TITELFILE2.'"
    ],');
   }
  $Exp1[]=array('no' =>' ],');
}
  $Exp1[]=array('no' =>'];');
  echo tatiye::AsciiTable()->crud($Exp1);


   $output = ob_get_contents();
   ob_end_clean();
   $newfile =fopen($App, "w");
   fwrite($newfile, '<?php'.PHP_EOL.strip_tags($output) );


   $filecomponents = fopen($AppAssets, "w");
   fwrite($filecomponents, json_encode($storage));

   $fileNavigasi = fopen($AppNavigasi, "w");
   fwrite($fileNavigasi, json_encode($storageNavigasi));

   // $componentFetch = fopen($AppFetch, "w");
   // fwrite($componentFetch, json_encode(array_merge($storage['fetch'],$storageaddfetch)));


   fclose($newfile);

}