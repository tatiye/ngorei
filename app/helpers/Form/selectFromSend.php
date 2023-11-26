<?php 
use app\tatiye;
$variable=json_decode($_POST['action'], true);
$AZ=$storage['az']; 
$Exvariable=json_decode($_POST['action'], true);
$Exp1[]=array('no' =>'');
$Exp1[]=array('no' =>'use app\tatiye;');
$Exp1[]=array('no' =>'$Text=tatiye::Text();');
$Exp1[]=array('no' =>'$db=new tatiye();');
$Exp1[]=array('no' =>'$setId=$_SERVER["HTTP_KEY"];');
$Exp1[]=array('no' =>'$setUId=$_SERVER["HTTP_USERID"];');
$Exp1[]=array('no' =>'if (is_numeric($setId)) {');
$Exp1[]=array('no' =>' $segmen="update";');
$Exp1[]=array('no' =>'} else {');
$Exp1[]=array('no' =>' $segmen="insert";');
$Exp1[]=array('no' =>'}');
$Exp1[]=array('no' =>'#|-------------------------------------');
$Exp1[]=array('no' =>'#| Initializes SEGMENT INSERT');
$Exp1[]=array('no' =>'#|-------------------------------------');
$Exp1[]=array('no' =>'#| Develover Tatiye.Net '.tatiye::dt("Y").'');
$Exp1[]=array('no' =>'#| @Date  '.tatiye::dt('DTIE').'');
$Exp1[]=array('no' =>'if($segmen == "insert") {');
$Exp1[]=array('no' =>'$val=tatiye::validation([');
foreach ($Exvariable as $key => $value) {
  $myNo=$myNo+1;
     $Exp1[]=array('no'=>'   "'.$AZ.$myNo.'"=>tatiye::val("text",$_POST["'.$AZ.$myNo.'"]   ,"2|Wajib diisi"),');
  }
  $Exp1[]=array('no' =>']);');
  $Exp1[]=array('no' =>'if (empty($val["error"])) {');
  $Exp1[]=array('no' =>'   $data = array( ');
  foreach ($Exvariable as $key => $value) {
  $myNo1=$myNo1+1;
     $Exp1[]=array('no'=>'     "'.$key.'"    =>$_POST["'.$AZ.$myNo1.'"],');
  }
  $Exp1[]=array('no'=>'     "time"   =>tatiye::tm(),');
  $Exp1[]=array('no'=>'     "date"   =>tatiye::dt("EN"),');
  $Exp1[]=array('no'=>'     "bulan"  =>tatiye::dt("M"),');
  $Exp1[]=array('no'=>'     "tahun"  =>tatiye::dt("Y"),');
  $Exp1[]=array('no'=>'     "userid" =>$setUId,');
  $Exp1[]=array('no' =>'    );');
  $Exp1[]=array('no' =>'    $result=$db->que($data)->insert("'.$storage['tabel'].'");');
  $Exp1[]=array('no' =>'    $val["hasil"]    ="sukses";');

  $Exp1[]=array('no' =>'    tatiye::apphistory([');
  $Exp1[]=array('no' =>'      "autoload"     =>false,');
  $Exp1[]=array('no' =>'      "categori"     =>"insert",');
 $Exp1[]=array('no' =>'       "title"        =>$_POST["'.$AZ.'1"],');
  $Exp1[]=array('no' =>'      "description"  =>"description",');
  $Exp1[]=array('no' =>'      "PrimaryKey"   =>0,');
  $Exp1[]=array('no' =>'      "package"      =>"'.$storage['route'].'",');
  $Exp1[]=array('no' =>'      "tabel"        =>"'.$storage['tabel'].'",');
  $Exp1[]=array('no' =>'    ]);');
     


  $Exp1[]=array('no' =>'} else {');
  $Exp1[]=array('no' =>'    $val["hasil"]    ="error";');
  $Exp1[]=array('no' =>' };  ');
  $Exp1[]=array('no' =>'#|-----------------------------------------------');
  $Exp1[]=array('no' =>'#| Initializes  SEGMENT UPDATE');
  $Exp1[]=array('no' =>'#|-----------------------------------------------');
  $Exp1[]=array('no' =>'#| Develover Tatiye.Net '.tatiye::dt("Y").'');
  $Exp1[]=array('no' =>'#| @Date  '.tatiye::dt('DTIE').'');
  $Exp1[]=array('no' =>'} elseif ($segmen == "update") {');
  $Exp1[]=array('no' =>'  $val=tatiye::validation([');
    foreach ($Exvariable as $key => $value) {
     $myNo2=$myNo2+1;
       $Exp1[]=array('no'=>'   "'.$AZ.$myNo2.'"=>tatiye::val("text",$_POST["'.$AZ.$myNo2.'"]   ,"2|Wajib diisi"),');
    }
  $Exp1[]=array('no' =>' ]);');
  $Exp1[]=array('no' =>'if (empty($val["error"])) {');
  $Exp1[]=array('no' =>'   $data = array( ');
  $myNo3=0;
  foreach ($Exvariable as $key => $value) {
  $myNo3=$myNo3+1;
     $Exp1[]=array(
       'no'=>'     "'.$key.'"    =>$_POST["'.$AZ.$myNo3.'"],',             
     );
  }
   $Exp1[]=array('no'=>'     "time"     =>tatiye::tm(),');
   $Exp1[]=array('no'=>'     "date"     =>tatiye::dt("EN"),');
   $Exp1[]=array('no'=>'     "bulan"    =>tatiye::dt("M"),');
   $Exp1[]=array('no'=>'     "tahun"    =>tatiye::dt("Y"),');
   $Exp1[]=array('no' =>'    );');
   $Exp1[]=array('no' =>'    $result=$db->que($data)->update("'.$storage['tabel'].'","id =$setId AND userid=$setUId");');
   $Exp1[]=array('no' =>'    $val["hasil"]    ="sukses";');
   $Exp1[]=array('no' =>'    tatiye::apphistory([');
   $Exp1[]=array('no' =>'      "autoload"     =>false,');
   $Exp1[]=array('no' =>'      "categori"     =>"update",');
   $Exp1[]=array('no' =>'      "title"        =>$_POST["'.$AZ.'1"],');
   $Exp1[]=array('no' =>'      "description"  =>"description",');
   $Exp1[]=array('no' =>'      "package"      =>"'.$storage['route'].'",');
   $Exp1[]=array('no' =>'      "PrimaryKey"   =>$setId,');
   $Exp1[]=array('no' =>'      "tabel"        =>"'.$storage['tabel'].'",');
   $Exp1[]=array('no' =>'    ]);');
   $Exp1[]=array('no' =>'} else {');
   $Exp1[]=array('no' =>'    $val["hasil"]    ="error";');
   $Exp1[]=array('no' =>' };  ');
   $Exp1[]=array('no' =>'}');
   $Exp1[]=array('no' =>' echo json_encode($val);');
   echo "<pre style='display:none1'><code>". tatiye::AsciiTable()->crud($Exp1)."</code></pre>";
