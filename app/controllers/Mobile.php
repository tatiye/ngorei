<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class mobile extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
 
       if (tatiye::tn(1)) {
          $route=tatiye::route($_GET['url']);
       } else {
          $route='mobile/index';
       }
       $this->mobile($route);
    }

  
  }