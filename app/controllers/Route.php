<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Route extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      $data = [];
      $this->route('pages/index', $data,'autoload','app');
    }

  }