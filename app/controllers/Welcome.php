<?php
  class Welcome extends Controller{
    public function __construct(){
      if(isset($_SESSION['user_id'])){
        redirect('pages');
      }
    }
    public function index(){
      $this->view('pages', ['title' => 'Welcome']);
    }
  }