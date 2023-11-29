<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  $Text=tatiye::Text();
  $tatiyeNet = new tatiyeNetInit();
if (!empty($_POST['key'])) {
 $infoToken = array(
        'key'       =>$_POST['key'],
        'initKey'   =>$_POST['key'],
        'resheader' =>$_POST['resheader'],
  );
  foreach($infoToken as $page => $row) {
      $tatiyeNet->val($page, $row);
  }
} 
    $IDRAW=explode('/',$_POST['etc']);
    if ($IDRAW[1]=='raw') {
      echo $tatiyeNet->GraphObject(tatiye::dir('public/package'.$Text->strreplace([$_POST['etc'],'/raw',''])).'.php');
    } else {
     echo $tatiyeNet->GraphObject(APPROOT.$_POST['etc'].'.php');

    }
    

?>
