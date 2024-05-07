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

   public function etc(){
     return  tatiye::etc(tatiye::tn(2));
   }
   public function license(){
     return  tatiye::licenseKey(tatiye::tn(2));
    }
    public function terminal(){
       return  tatiye::terminal();
    }
    public function setroute(){
       return  tatiye::getRoute(tatiye::tn(2));
    }
    public function firedb(){
      return  tatiye::fireDBJs();
    }

    public function rtdb(){
      return  tatiye::rtdb(tatiye::tn(2));
    }

    public function invoke(){
      return  tatiye::invoke();
    }

   public function develover(){
     return  tatiye::licenseDev();
    }

   public function development(){
     return  tatiye::developmentApi(tatiye::tn(2));
  }

   public function licensekey(){
     return  tatiye::licenseKeyPublic();
    }

   public function thumbnail(){
          $url=explode('/',$_GET['url']);
          $str='';
          foreach ($url as $key => $value) {
            if ($key !==0 && $key !==1 ) {
                  $str= $str.$value.'/'; 
            }
          }
         $strType = substr($str, 0, -1);
         return  tatiye::thumbnail($strType);
    }

   public function qrGgrrxm2xu9LjtXCooLeL6gPiNrY5SCKvNtHb66EZKF1OBwmfxq(){
     return  tatiye::Createlicense();
    }




    public function v1(){
      $TABELID=explode('/',$_GET['url']);
       if (@$TABELID[2]) {
           $data = [
             'tabel' =>$TABELID[2].'/'.$TABELID[3]
           ];
       } else {
          $data=[];
       }
      $this->api('rest',$data,'Api');
    }
    public function v3(){
      $TABELID=explode('api/v3/',$_GET['url']);
      return tatiye::restV3($TABELID[1]);
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