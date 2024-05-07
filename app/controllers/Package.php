<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Package extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      //Set Data
       $route=tatiye::routePackage('package/index');
      // // Load homepage/index view
      $this->view($route, [],'package','app');

    }

  }