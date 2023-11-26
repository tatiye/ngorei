<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Home extends Controller{
    public function __construct(){}
    // Load Homepage
    public function index(){
      
         $this->view('pages/index', [],'object','Graph');
    }
 
  }