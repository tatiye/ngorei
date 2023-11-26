<?php 
 use app\tatiye;
 $row=tatiye::BQ($APPQUERY);
 echo 'use app\tatiye;'.PHP_EOL;
 echo'use app\tatiyeNetAuthorization AS Authorization;'.PHP_EOL;
 echo'use app\Graph\Response;'.PHP_EOL;
 echo'$NEWTOKEN="'.$NEWTOKEN.'";'.PHP_EOL;
 echo'  Authorization::init(1);'.PHP_EOL;
 echo 'if($_SERVER["REQUEST_METHOD"] === "GET") {'.PHP_EOL;
 echo '$QUERY="'.$APPQUERY.'";'.PHP_EOL;
 echo '$COUNT=tatiye::fetch("'.$tabel.'"," COUNT(*) as count");'.PHP_EOL;
 $Exp1[]=array('no' =>'$number=0;');
 $Exp1[]=array('no' =>'$products_arr["data"]=array();');
 $Exp1[]=array('no' =>'$variable=tatiye::QY($QUERY);');
 $Exp1[]=array('no' =>'while ($row = $variable->fetch()) {');
 $Exp1[]=array('no' =>'  $number=$number+1;');
 $Exp1[]=array('no' =>'  $sub_array = array();');
 $Exp1[]=array('no' =>'  $sub_array[] =$number;');
 foreach (array_keys($row) as $key => $value) {
 $Exp1[]=array('no' =>'  $sub_array[] =$row["'.$value.'"];');
 } 
 $Exp1[]=array('no' =>'  $Expuid=tatiye::fetchUserIDTabel($row["userid"]);');
$Exp1[]=array('no' =>'  array_push($products_arr["data"],array_merge($sub_array,$Expuid));');
$Exp1[]=array('no' =>'}');
$Exp1[]=array('no' =>'$merge=array(  ');
$Exp1[]=array('no' =>'  "draw"               =>$COUNT["count"],');
$Exp1[]=array('no' =>'  "recordsTotal"       =>0,');
$Exp1[]=array('no' =>'  "recordsFiltered"    =>0,');
$Exp1[]=array('no' =>');');
$Exp1[]=array('no' =>'$json_arr=array_merge($merge,$products_arr); ');
$Exp1[]=array('no' =>'echo json_encode($json_arr);');
echo tatiye::AsciiTable()->crud($Exp1);
echo '} else {'.PHP_EOL;
echo '  return tatiye::index();'.PHP_EOL;
echo '}'.PHP_EOL;

