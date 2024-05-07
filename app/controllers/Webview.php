<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class webview extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      //Set Data
 
      if (tatiye::tn(1)) {
         $route=tatiye::route($_GET['url']);
      } else {
         $route='webview/index';
      }
      // Load homepage/index view
       $this->view($route);
    }

  }