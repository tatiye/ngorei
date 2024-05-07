<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Docs extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      //Set Data
      if (tatiye::tn(1)) {
         $route=tatiye::route($_GET['url']);
      } else {
         $route='docs/index';
      }
       $this->view($route);
    }

  
  }