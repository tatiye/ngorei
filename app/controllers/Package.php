<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Package extends Controller{
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
      $route=tatiye::routePackage('package/index');
     
      // Load homepage/index view
      $this->view($route, $data,'package','app');

    }

    public function about(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];
      // Load about view
      $this->view('pages/about', $data);
    }

    public function doc(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];
      // Load about view
      $this->view('pages/doc', $data);
    }


    public function api(){
       $data = [
        'version' => '1.0.0'
      ];
      // Load about view
      $this->view('pages/doc', $data);
    }

  }