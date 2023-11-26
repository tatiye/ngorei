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
foreach(array_merge($DIREKTORY,$app) as $page => $row) {
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
  $IDgraph=explode('/',$_POST['package']);

    if(file_exists(tatiye::dir('app/views/router/'.$IDgraph[0].'.php'))){
        require_once tatiye::dir('app/views/router/'.$IDgraph[0].'.php');
    } else {
        require_once tatiye::dir('app/views/router/index.php');
    }
   foreach ($routeLink as $router => $value) {
      foreach ($value as $key => $row) { 
        $tatiyeNet->assign_block_vars($router, array(
           'TITEL'  =>$key,
           'LINK'   =>URLROOT.'/'.$row[0],
           'URL'    =>URLROOT.'/'.$Text->strreplace([$row[0],'#','/']),
           'ROUTE'  =>URLROOT.'/'.$Text->strreplace([$row[2],'#','/']),
           'PATH'   =>$Text->strreplace([$row[0],'#','/']),
           'F7'     =>'/'.$Text->strreplace([$key,' ','-']).'/',
           'HESTACK'=>URLROOT.'/'.$row[2],
           'DESC'   =>$row[0],
           'ICON'   =>$row[1],
        ));
        if (!empty($row[2])) {
           $TITEL=$Text->strreplace([$key,' ','']);
           $URL=URLROOT.'/'.$Text->strreplace([$row[2],'#','/']);
           $tatiyeNet->val($router.'.'.$TITEL, $URL);
         } else {
           $TITEL=$Text->strreplace([$key,' ','']);
           $URL=URLROOT.'/'.$row[0];
           $tatiyeNet->val($router.'.'.$TITEL, $URL);
         }
      }
   }



   foreach ($hashtag as $router => $value) {
      foreach ($value as $key => $row) { 
        $STEK1=$Text->strreplace([$row[1],'#','/']);
        $tatiyeNet->assign_block_vars($router, array(
           'TITEL'  =>$key,
           'LINK'   =>URLROOT.$Text->strreplace([$row[0],$STEK1,$row[1]]),
           'URL'    =>URLROOT.'/'.$row[0],
           'ROUTE'  =>URLROOT.'/'.$row[0],
           'DESC'   =>$row[0],
           'ICON'   =>$row[2],
        ));  
        $TITEL=$Text->strreplace([$key,' ','']);
        $URL=URLROOT.$Text->strreplace([$row[0],$STEK1,$row[1]]);
        $tatiyeNet->val($router.'.'.$TITEL, $URL);
        
      }
   }






echo $tatiyeNet->GraphObject(tatiye::expDir($setRoute));
echo '<script src="'.$DIREKTORY['ROOTPUBLIC'].'/lib/prism/clipboard.code.js"></script>
<script src="'.$DIREKTORY['ROOTPUBLIC'].'/lib/prism/clipboard.min.js"></script>';
?>

