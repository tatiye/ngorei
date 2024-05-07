<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Home extends Controller{
    public function __construct(){}
    // Load Homepage
    public function index(){
        // $row=tatiye::requirePages($_GET['url']);
        $this->view('app', [],'object','Graph');
    }
 
  }