<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Payment extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
       //Set Data

       if (tatiye::tn(1)) {
         $route=tatiye::route($_GET['url']);
       } else {
         $route='index';
       }
     
       // Load homepage/index view
        $this->payment($route);
    }

    public function logout(){
      self::setSession();
      redirect('client');
    }
    public function setSession(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      unset($_SESSION['sub_domain']);
      tatiye::cookieUnset('sso');
      session_destroy();
    }
     
  
  }