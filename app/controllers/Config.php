<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Config extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      echo HOST.'=='.URLROOT;
      //$this->install(false,'install/config');
    }
  }
?>

  