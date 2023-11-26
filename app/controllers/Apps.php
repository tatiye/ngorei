<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Apps extends Controller{
    public function __construct(){}
    // Load Homepage webview
    public function index(){
      if (tatiye::tn(1)) {
        // $route=tatiye::route($_GET['url']);
        $this->webview(tatiye::tn(1), ['title' => 'Welcome']);
      } else {
        $this->webview('index', ['title' => 'Welcome']);
        //$route='default';
      }
    }
 
  }