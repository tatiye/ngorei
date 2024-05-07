<?php
// error_reporting(0);
  use app\tatiye;
  use app\tatiyeNetInit;
  use app\models\Package;
  use app\tatiyeNetAuthorization AS Authorization;
  class Storage extends Controller{
    public function __construct(){}
    // Load Homepage
    public function index(){
      $Text=tatiye::Text();
      $tatiyeNet = new tatiyeNetInit();
       require_once APPROOT.'/models/Graph.php';
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
           $str = substr($str, 0, -1).'.php';
           $dirFile= $Text->strreplace([$str,'pec','package']); 
           $title=tatiye::tn(count($variable)-1);
           if(!file_exists(tatiye::dir('app/models/'.$dirFile))){
             echo tatiye::index();
             exit;
          }
           Authorization::init(1);
          echo $tatiyeNet->GraphObject(tatiye::dir('app/models/'.$dirFile));

   
    }
 
  }
