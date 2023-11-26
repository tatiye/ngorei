<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Autoload extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      $data = [];
      $this->package('libraries/autoload', $data,'autoload','app');
    }

  }