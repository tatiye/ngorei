<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  use Dompdf\Dompdf;
  class Raw extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
          $variable=explode('/',$_GET['url']);
          $str='';
          foreach ($variable as $key => $value) {
            if ($key !==0 && $key ) {
            $str= $str.$value.'/';
            }
          }
          echo $Paper=tatiye::tn(1);
        
          $str = substr($str, 0, -1);
          echo $str;
          //  $title=tatiye::tn(count($variable)-1);
          //  $Paper=tatiye::tn(2);
          //  if (!tatiye::tn(2)) {
          //     echo '<div style="width:100%;background:red; color:#fff;padding-left: 10px; "> Object does not exist '.$title.'</div>';
          //    exit;
          //  }
          // if(!file_exists(tatiye::dir('public/package/'.$str.'.php'))){
          //    echo '<div style="width:100%;background:red; color:#fff;padding-left: 10px; "> Object does not exist '.$title.'</div>';
          //    exit;
          // }
          // require_once(tatiye::dir('public/package/'.$str.'.php'));
       }
  }