<?php
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
use app\Graph\Response;
use app\models\Package;
$val = json_decode(file_get_contents("php://input"));
// Authorization::init(1);
$Text=tatiye::Text();
 $row=tatiye::getWJT($val->token);
     $ID=explode('/',$row['dir']);
     $IDFILE=tatiye::eksfile($ID[3]);
$dir=tatiye::dir('public/package/'.$ID[0].'/'.$ID[1].'/'.$ID[2].'/Doc/'.$Text->strreplace([$ID[3],'.php','.json']));
echo $file_get = file_get_contents($dir);
