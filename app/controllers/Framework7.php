<?php
// error_reporting(0);
  use app\tatiye;
  use app\tatiyeNetInit;
  use app\models\Package;
  class Framework7 extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      $this->framework7();
    }

  }