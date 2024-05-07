<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Sales extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      //Set Data
      if (tatiye::tn(1)) {
         $route=tatiye::route($_GET['url']);
      } else {
         $route='sales/index';
      }
       $this->view($route);
    }

  
  }