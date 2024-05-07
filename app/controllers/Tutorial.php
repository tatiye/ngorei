<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Tutorial extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
           $variable=explode('/',$_GET['url']);
          $str='';
          foreach ($variable as $key => $value) {
            if ($key !==0 ) {
                  $str= $str.$value.'/'; 
            }
          }
          $strType = substr($str, 0, -1);
          $this->view('pages/tutorial');
    }

  
  }
     
  
