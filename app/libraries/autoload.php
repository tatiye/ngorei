<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  use app\models\Package;
  $tatiyeNet = new tatiyeNetInit();
if (!empty($_POST['key'])) {

   $infoToken = array(
      'key'       =>$_POST['key'],
      'initKey'   =>$_POST['key'],
      'resheader' =>$_POST['resheader']??='',
   );

  if (!empty($_POST['tabel'])) {
     $variable=json_decode($_POST['tabel'], true);
     foreach(array_merge($infoToken,$variable) as $page => $row) {
         $tatiyeNet->val($page, $row);
     } 
  } else {
     foreach($infoToken as $page => $row) {
         $tatiyeNet->val($page, $row);
     }
  }
  



 
}  

$uid=Package::Profil();
require_once __DIR__.'/direktory.php';
require_once APPROOT.'/models/App.php';
foreach(array_merge($DIREKTORY,$uid,$app) as $page => $row) {
   $tatiyeNet->val($page, $row);
}
// TARGET
$route=tatiye::routePanel($Text->strreplace([$_POST['package'],tatiye::ssoId('sub_domain').'/','']));
echo $tatiyeNet->GraphObject($route);

?>

