<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Api extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
        
      //Set Data
      $data = [];
      
      // Load homepage/index view
      $this->api('index',$data,'Api');
    }
    public function login(){
      $data = [];
      $this->api('login',$data,'Api');
    }

    public function authorization(){
       return  tatiye::authorization();
    }
    public function profil(){
      $data = [];
      $this->api('profil',$data,'Api');
    }

    public function registrasi(){
      $data = [];
      $this->api('registrasi',$data,'Api');
    }



    public function entri(){
      $TABELID=explode('/',$_GET['url']);
       if (@$TABELID[2]) {
           $data = [
             'tabel' => $TABELID[2]
           ];
       } else {
          $data=[];
       }
      // Load homepage/index view
      $this->api('entri',$data,'Api');
    }


    public function select(){
      $TABELID=explode('/',$_GET['url']);
       if (@$TABELID[2]) {
           $data = [
             'tabel' => $TABELID[2]
           ];
       } else {
          $data=[];
       }
      // Load homepage/index view
      $this->api('select',$data,'Api');
    }

   public function license(){
     return  tatiye::licenseKey();
    }

    public function v1(){
      $TABELID=explode('/',$_GET['url']);
       if (@$TABELID[2]) {
           $data = [
             'tabel' => $TABELID[2].'/'.$TABELID[3]
           ];
       } else {
          $data=[];
       }
      // Load homepage/index view
      $this->api('rest',$data,'Api');
    }


    public function v2(){
      $TABELID=explode('/',$_GET['url']);
       if (@$TABELID[2]) {
           $data = [
             'tabel' =>$TABELID[2]
           ];
       } else {
          $data=[];
       }
      
      // Load homepage/index view
     $this->api('rest',$data,'Api');
    }




  }