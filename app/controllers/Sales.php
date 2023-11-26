<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Sales extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      //Set Data
      $data = [
        'header' =>'Ngorei ',
        'version' => 'v1.0.2'
      ];

      
 
      if (tatiye::tn(1)) {
        $route=tatiye::route($_GET['url']);
      } else {
        $route='sales/index';
      }
     
      // Load homepage/index view
       $this->sales($route, $data,'object','Docs');
    }

    public function logout(){
      self::setSession();
      redirect('sales');
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