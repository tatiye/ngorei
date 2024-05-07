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


 $file =tatiye::dir('public/package/'.$row['dir']);
 $newfile =tatiye::dir('public/package/'.$ID[0].'/'.$ID[1].'/'.$ID[2].'/'.$val->filename.'.php');


 $jsonfile =tatiye::dir('public/package/'.$ID[0].'/'.$ID[1].'/'.$ID[2].'/Doc/'.$Text->strreplace([$ID[3],'.php','.json']));
 $jsonnewfile =tatiye::dir('public/package/'.$ID[0].'/'.$ID[1].'/'.$ID[2].'/Doc/'.$val->filename.'.json');











       $newToken=tatiye::WJT([
        'dir'   =>$ID[0].'/'.$ID[1].'/'.$ID[2].'/'.$val->filename.'.php', 
      ]);

// shell_exec("cp -r $file $newfile");
if(!@copy($jsonfile,$jsonnewfile)){
}
if(!@copy($file,$newfile)){
    $status= "failed to Duplicate ";
}
else{
    $status= "Error Duplicate";
}
$Exp[]=array(
   'newToken'        =>$newToken,
   'dir'             =>$ID[0].'/'.$ID[1].'/'.$ID[2].'/'.$val->filename.'.php'
   );

echo json_encode($Exp);