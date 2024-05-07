<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Client extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      //Set Data
      $data = [
        'header' =>'Helo Net',
        'title' =>'MVC-ES6',
        'description' => 'TatiyeNet MVC PHP framework',
        'version' => '1.0.0'
      ];
      if (tatiye::tn(1)) {
        $route=tatiye::route($_GET['url']);
      } else {
        $route='client/index';
      }
     
      // Load homepage/index view
       $this->client($route, $data,'object','Docs');
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