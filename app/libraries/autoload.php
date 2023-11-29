<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  use app\models\Package;
  $tatiyeNet = new tatiyeNetInit();
if (!empty($_POST['key'])) {
  if (!empty($_POST['page'])) {
    $page=$_POST['page'];
  } else {
    $page=1;
  }
  
 $infoToken = array(
        'key'       =>$_POST['key'],
        'initKey'   =>$_POST['key'],
        'page'      =>$page,
        'resheader' =>$_POST['resheader']??='',
  );
  foreach($infoToken as $page => $row) {
      $tatiyeNet->val($page, $row);
  }
}  
$uid=Package::Profil();
require_once __DIR__.'/direktory.php';
foreach(array_merge($DIREKTORY,$uid) as $page => $row) {
   $tatiyeNet->val($page, $row);
}
// TARGET
$route=tatiye::routePanel($_POST['package']);
echo $tatiyeNet->GraphObject($route);

?>

