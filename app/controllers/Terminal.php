<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Terminal extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
        if (HOST==URLROOT) {
            redirect('home');
        } else {
            tatiye::setInvoke();
            redirect('home');
        }
        
    }


  }