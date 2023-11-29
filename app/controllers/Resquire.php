<?php
// error_reporting(0);
  use app\tatiye;
  use app\tatiyeNetInit;
  use app\models\Package;
  class Resquire extends Controller{
    public function __construct(){}
    // Load Homepage
    public function index(){
      $Text=tatiye::Text();
      $tatiyeNet = new tatiyeNetInit();
       require_once APPROOT.'/models/App.php';
       require_once APPROOT.'/libraries/direktory.php';
       foreach($DIREKTORY as $page => $row) {
        $tatiyeNet->val($page, $row);
     }

          $variable=explode('/',$_GET['url']);
          $str='';
          foreach ($variable as $key => $value) {
            if ($key !==0 ) {
                  $str= $str.$value.'/'; 
            }
          }
   
            $strType = substr($str, 0, -1);
            $title=tatiye::tn(count($variable)-1);
            $IDFile=explode('.',$title);
            if (!empty($IDFile[1])) {
             $str = substr($str, 0, -1);
            } else {
             $str = substr($str, 0, -1).'.html';
            }
           
           $dirFile= $Text->strreplace([$str,'pec','package']);
           if(!file_exists(tatiye::dir('public/'.$dirFile))){
             echo '<div style="width:100%;background:red; color:#fff;padding-left: 10px; "> Object does not exist '.$title.'</div>';
             exit;
          }

if (!empty($_POST['key'])) {
 $infoToken = array(
        'key'       =>$_POST['key'],
        'resheader'     =>$_POST['resheader']??='',
        'tabel'     =>$_POST['tabel']??='',
  );
  foreach($infoToken as $page => $row) {
      $tatiyeNet->val($page, $row);
  }
} 





         
             echo $tatiyeNet->GraphObject(tatiye::dir('public/'.$dirFile));

   
    }
 
  }