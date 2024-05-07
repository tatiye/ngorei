<?php 
error_reporting(0);
use app\tatiye;
$Text=tatiye::Text();
$App=tatiye::dir('app/models/objectStorage.php');
$storage=json_decode($_POST['action'], true);
if ($storage['status']=='dev' ) {


  $Exp1[]=array('no' =>'error_reporting(0);');
  $Exp1[]=array('no' =>'use app\tatiye;');
  $Exp1[]=array('no' =>'$db=new tatiye();');
foreach ($storage['storage'] as $router => $value) {
 
   foreach ($value as $key => $row) {
     $Exp1[]=array('no' =>'$QUERY'.$key.'="SELECT '.$row[1].' FROM '.$row[0].' WHERE '.$row[2].' LIMIT '.$row[3].'";');
     $Exp1[]=array('no' =>'$result'.$key.'=$db->query($QUERY'.$key.');');
     $Exp1[]=array('no' =>'while($net'.$key.'=$result'.$key.'->fetch_assoc()){');
     $Exp1[]=array('no' =>' $tatiyeNet->assign_block_vars("'.$key.'", array(');
     foreach ($ID=explode(',',$row[1]) as $d => $a) {
         $setKEy= $Text->strtoupper($a) ;
         $Exp1[]=array('no' =>'  "'.$setKEy.'"  =>$net'.$key.'["'.$a.'"],');
      }
     $Exp1[]=array('no' =>' ));');
     $Exp1[]=array('no' =>'}');

    
   }
//echo '<pre>'. tatiye::AsciiTable()->crud($Exp1).'<pre>';
}
echo tatiye::AsciiTable()->crud($Exp1);
 

   $output = ob_get_contents();
   ob_end_clean();
   $newfile =fopen($App, "w");
   fwrite($newfile, '<?php'.PHP_EOL.strip_tags($output) );
   fclose($newfile);

}
?>
