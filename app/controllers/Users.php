<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Users extends Controller{
    public function __construct(){}


    public function index(){
     if (tatiye::tn(1)) {
        $route=tatiye::route($_GET['url']);
      } else {
        $route='default';
      }
       $this->user($route, [],'object','App');
    }

    // Load Homepage
    public function login(){
        self::setSession();
       $this->uid('login', [],'object','Graph');
    }

    public function register(){
       self::setSession();
       $this->uid('register', [],'object','Graph');
    }
    // Logout & Destroy Session

    public function logout(){
      self::setSession();
      redirect('users/login');
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