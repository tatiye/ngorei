<?php
 error_reporting(0);
  use app\tatiye;
  use app\tatiyeNetInit;
  $tatiyeNet = new tatiyeNetInit(); 
  require_once APPROOT.'/models/Graph.php';
  require_once __DIR__.'/direktory.php';
if ($_POST['package']=='home') {
  $setRoute='public/theme/pages/index';
} else {
  $setRoute='public/theme/'.$_POST['package'];
}
foreach(array_merge($DIREKTORY,$routePath) as $page => $row) {
   $tatiyeNet->val($page, $row);
}

if (!empty($_POST['key'])) {
 $infoToken = array(
        'key'       =>$_POST['key'],
        'resheader' =>$_POST['resheader'],
  );
  foreach($infoToken as $page => $row) {
      $tatiyeNet->val($page, $row);
  }
} 

if (!empty($_POST['base'])) {
    if (!empty($arr['graph'][$_POST['base']])) {
        require_once tatiye::dir('app/views/router/'.$_POST['base'].'.php');
    } else {
        require_once tatiye::dir('app/views/router/index.php');
    }
   foreach ($routeLink as $router => $value) {
      foreach ($value as $key => $row) {
        $tatiyeNet->assign_block_vars($router, array(
           'TITEL'  =>$key,
           'LINK'   =>URLROOT.'/'.$row[0],
           'ICON'   =>$row[1],
           'ROUTE'  =>'',
        ));
      }
   }


}



echo $tatiyeNet->GraphObject(tatiye::expDir($setRoute));
echo '<script src="'.$DIREKTORY['ROOTPUBLIC'].'/lib/prism/clipboard.code.js"></script>
<script src="'.$DIREKTORY['ROOTPUBLIC'].'/lib/prism/clipboard.min.js"></script>
';
?>

