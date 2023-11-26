<?php
 error_reporting(0);
use app\tatiye;
use app\Graph\Response AS Response;
use app\models\storage;
use app\models\Package;
use app\tatiyeNetAuthorization AS Authorization;
$val = json_decode(file_get_contents("php://input"));
$rawPostData = file_get_contents('php://input');
$tabelSet  =@$val->tabel ??=false;
$IDA=explode(' ',$tabelSet);
$tabel  =$IDA[0] ??=false;
$tabelJoin  =@$val->jaoinTabel ??=false;
$IDB=explode(' ',$tabelJoin);
$tabelJoin  =$IDB[0] ??=false;
$myQuery=@$val->query ??=false;
$id   =tatiye::tn(6);
 Authorization::init(1);
 Authorization::body($rawPostData);
 // JENIS TABEL
  $Exp=Package::tabel();



  $TypeData=array(
     'application/json',               
     'application/x-www-form-urlencoded',
     'multipart/form-data',              
   );
 // SEG QUERY
  $segQuery=array(
     'singel'  =>true,
     'join'    =>true,
   );
 // JENIS QUERY
 $ExpQuery=array(
     'insert'         =>'Create Update Delete,Upload',
     'select'         =>'Read Peging Seach',
     'appfile'        =>'Read Peging Seach File Upload',
     'datatables'     =>'Read Raw',
     'upload'         =>'File Images',
     'file'           =>'Upload File  Doc',
     'import'         =>'Import To SQLite',
   );
 $ValQuery=array(
     'insert'         =>true,
     'select'         =>true,
     'appfile'         =>true,
     'datatables'     =>true,
     'upload'         =>true,
     'file'           =>true,
     'import'           =>true,
   );

  $variabelQuery=array(
         "query"     =>'',
         "tabel"     =>'',
         "select"    =>'',
         "where"     =>'',
         "jaoinTabel"=>'',
         "jaoinSelet"=>'',
         "onJoin"    =>'',
         "result"    =>'',
         "segment"   =>'',
         "package"   =>'',
         "filename"  =>'',
         "type"      =>'',
   );
  $valsegQuery      =$segQuery[$val->query]??=false;
  $valTabel         =$Exp[$tabel]??=false;
  $valjaoinTabel    =$Exp[$tabelJoin]??=false;
  $valQuery         =@$ExpQuery[$val->segment]??=false;
  
  if (!$valsegQuery) {
    $response = new Response();
    $response->setHttpStatusCode(400);
    $response->setSuccess(false);
     $response->addMessage("query:sesuikan variabel query");
    $response->addMessage(array_filter($segQuery));
     $response->addMessage("Exsampel:JSON");
    $response->addMessage($variabelQuery);
    $response->send();
    exit;
  }
 if ($valTabel) {
   Authorization::tabel($tabel);
   $fetchKeys=tatiye::fetchKeys2($tabel);
  }

   if ($valjaoinTabel) {
       $fetchKeysJoin=tatiye::fetchKeys2($tabelJoin);
   }
  if ($val->query=='join') {

  
    
      if (!$valjaoinTabel) {
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->setSuccess(false);
        $response->addMessage("jaoinTabel: Nama tabel $valjaoinTabel tidak ditemukan Join");
        $response->addMessage(array_filter($Exp) );
        $response->send();
        exit;
      }
      if(empty($val->jaoinSelet)) {
          $response = new Response();
          $response->setHttpStatusCode(400);
          $response->setSuccess(false);
          $response->addMessage("jaoinSelet:sesuikan variabel select Join");
          (empty($val->jaoinSelet) ? $response->addMessage($fetchKeysJoin) : false);
          $response->send();
          exit;
        }
        // check if post request contains title and completed data in body as these are mandatory
       if(empty($val->onJoin)) {
          $response = new Response();
          $response->setHttpStatusCode(400);
          $response->setSuccess(false);
          $response->addMessage("sesuikan variabel where Join");
          (empty($val->onJoin) ? $response->addMessage($fetchKeysJoin) : false);
          $response->send();
          exit;
         }
  } else {
  if (!$valTabel) {
    $response = new Response();
    $response->setHttpStatusCode(400);
    $response->setSuccess(false);
    $response->addMessage("Nama tabel $tabel tidak ditemukan ");
    $response->addMessage(array_filter($Exp));
    $response->send();
    exit;
  }
      if(empty($val->select)) {
          $response = new Response();
          $response->setHttpStatusCode(400);
          $response->setSuccess(false);
          $response->addMessage("sesuikan variabel select ");
          (empty($val->select) ? $response->addMessage($fetchKeys) : false);
          $response->send();
          exit;
        }
        // check if post request contains title and completed data in body as these are mandatory
       if(empty($val->where)) {
          $response = new Response();
          $response->setHttpStatusCode(400);
          $response->setSuccess(false);
          $response->addMessage("sesuikan variabel where   ");
          (empty($val->where) ? $response->addMessage("row='1'") : false);
          $response->send();
          exit;
         }

  }



  if ($val->result==1) {
    // INFO QUERY
        if ($val->query=='join') {
                echo "SELECT 
                $val->select,$val->jaoinSelet
                FROM $val->tabel
                JOIN $val->jaoinTabel 
                ON $val->onJoin WHERE $val->where";
            } else {
                echo "SELECT 
                $val->select
                FROM $val->tabel
                WHERE $val->where";
            }
} else {

 if (!$val->segment) {
    $response = new Response();
    $response->setHttpStatusCode(200);
    $response->setSuccess(false);
    $response->addMessage("segment:sesuikan segment query   ");
    $response->addMessage(array_filter($ExpQuery));
    $response->send();
    exit;
  }
}





if (!@$val->package) {
    $response = new Response();
    $response->setHttpStatusCode(200);
    $response->setSuccess(false);
    $response->addMessage("package:silahkan diisi ");
    $response->addMessage(storage::init()->package());
    $response->send();
    exit;
} 




if (!$ValQuery[$val->segment]) {
    $response = new Response();
    $response->setHttpStatusCode(200);
    $response->setSuccess(false);
    $response->addMessage("segment:Type ");
    $response->addMessage(array_filter($ExpQuery));
    $response->send();
    exit;
} 


if (!$val->filename) {
    $response = new Response();
    $response->setHttpStatusCode(200);
    $response->setSuccess(false);
    $response->addMessage("filename:Wajib diisi ");
    $response->send();
    exit;
} 
if (!@$val->type) {
    $response = new Response();
    $response->setHttpStatusCode(200);
    $response->setSuccess(false);
    $response->addMessage("type:Content-Type ");
    $response->addMessage($TypeData);
    $response->send();
    exit;
} 

  $IDFOLDER=explode('/',$val->package);
      $newToken=tatiye::WJT([
        'dir'   =>$IDFOLDER[0].'/Api/'.$IDFOLDER[1].'/'.$val->filename.'.php', 
      ]);


 if (!file_exists(tatiye::dir('public/package/'.$IDFOLDER[0].'/Api/'.$IDFOLDER[1].'/Doc'))) {
          @mkdir(tatiye::dir('public/package/'.$IDFOLDER[0].'/Api'));
          @mkdir(tatiye::dir('public/package/'.$IDFOLDER[0].'/Api/'.$IDFOLDER[1].'/Doc'));
          @mkdir(tatiye::dir('public/package/'.$IDFOLDER[0].'/Api/'.$IDFOLDER[1]));
 }



if ($val->segment && $val->package) {

if ($val->segment=='select' && $val->segment=='datatables'&& $val->segment=='appfile') {
   $etSintax=',userid';
} else {
   $etSintax='';
}

if (!file_exists(tatiye::dir('public/package/'.$IDFOLDER[0].'/Api/'.$IDFOLDER[1].'/'.$val->filename.'.php'))) {
ob_start();
        if ($val->query=='join') {
        $APPQUERY= "SELECT 
        $val->select,$val->jaoinSelet
        FROM $val->tabel
        JOIN $val->jaoinTabel 
        ON $val->onJoin WHERE $val->where";
            } else {
        $APPQUERY= "SELECT 
        $val->select $etSintax
        FROM $val->tabel
        WHERE $val->where";
            }
   $NEWTOKEN=$newToken;
   $Type=$val->type;
   $SAVETO=tatiye::dir('public/package/'.$IDFOLDER[0].'/Api/'.$IDFOLDER[1].'/'.$val->filename.'.php');
   $APP='app/helpers/Form/Query/'.$val->segment.'.php';
   $tabel=$val->tabel;
   $keywords=$val->select;

   require_once tatiye::dir($APP);
   $output = ob_get_contents();
   ob_end_clean();
   $newfile =fopen($SAVETO, "w");
   fwrite($newfile, '<?php'.PHP_EOL .strip_tags($output) );
   fclose($newfile);
    exit;
 } else {
    ob_start();
       $Exp=array(
          'token'       => $newToken,
          'package'     => $IDFOLDER[0].'/Api/'.$IDFOLDER[1],
          'controllers' => $IDFOLDER[0],
          'tabel'       => $val->tabel,
          'version'     => $IDFOLDER[1],
          'segments'    => $val->segment,
          'filename'    => $val->filename,
          "Content-Type"=>$val->type,
          'Query'       => $val,
          );
    $response = new Response();
    $response->setHttpStatusCode(200);
    $response->setSuccess(false);
    $response->addMessage($Exp);
    $response->send();
    $SAVETOQUERY=tatiye::dir('public/package/'.$IDFOLDER[0].'/Api/'.$IDFOLDER[1].'/Doc/'.$val->filename.'.json');
    if (!file_exists($SAVETOQUERY)) {
    $newfileData =fopen($SAVETOQUERY, "w");
    $output = ob_get_contents();
    fwrite($newfileData,$output);
    fclose($newfileData);
    }
  
  
 }


}
     
