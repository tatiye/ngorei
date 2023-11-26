<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Etc extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      //Set Data
      $data = [];
      // Load homepage/index view
      $this->etc('libraries/etchelper', $data,'etc','app');

    }

  }