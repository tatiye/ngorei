<?php
  /* 
   *  CORE CONTROLLER CLASS
   *  Loads Models & Views
   */
  use app\tatiye;
  use app\models\Package;
  use app\tatiyeNetInit;
  class Controller {
    // Lets us load model from controllers
    public function model($model){
      // Require model file
      require_once APPROOT.'/models/' . $model . '.php';
      // Instantiate model
      return new $model();
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes api 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date 11/3/2023 10:15:21 PM 
    */
    public  function api($url, $data = [], $int='',$graph=''){
        if ($int=='Api') {
          return tatiye::init($data)->$url();
        } else {
          tatiye::index();
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes framework7 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function payment($key){
          require_once tatiye::expDir("vendor/tatiye/payment/default.php");
    }
    /* and class payment */
    /*
    |--------------------------------------------------------------------------
    | Initializes user 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function user($url, $data = [], $int='',$graph=''){
     
       if (!empty(tatiye::appStatus())) {
          echo tatiye::tabelRaw(tatiye::licenced(),0);
          exit;
       }
        if (tatiye::Protokol()=='mobile') {
            redirect('home');
            exit;  
         }
         $tatiyeNet = new tatiyeNetInit();
         require_once APPROOT.'/models/App.php';
         require_once __DIR__.'/direktory.php';
           if (empty(tatiye::ssoId('userid'))) {
               redirect();
           }
          foreach(array_merge($DIREKTORY,$app,$uid) as $page => $value) {
            $tatiyeNet->val($page, $value);
          }

         //HEADER
          echo $tatiyeNet->GraphObject(tatiye::statusHeader());
          if (!empty(tatiye::setForbidden())) {
               $route=tatiye::routePackage($url);
          } else {
              if ($int=='profil') {
                  $route=tatiye::expDir('public/package/profil/default.html');
               } elseif ($int == 'devices'){
                   if (tatiye::tn(2)) {
                         $route=tatiye::expDir('public/package/'.tatiye::tn(1).'/'.tatiye::tn(2).'.html');
                   } else {
                      $route=tatiye::expDir('public/package/'.$url.'.html');
                   }
              } else {
                $route=tatiye::expDir('public/dashboard/404.html');
              } 
          }
       
           echo $tatiyeNet->GraphObject($route);
           //FOOTER
          echo $tatiyeNet->GraphObject(tatiye::expDir('public/dashboard/inc/footer.html'));
    }
    /* and class user */


    public  function terminal($url){
         if (!empty($url)) {
              $tatiyeNet = new tatiyeNetInit();
               require_once __DIR__.'/direktory.php';
               require_once APPROOT.'/models/Graph.php';
               if (!empty(tatiye::ssoId('userid'))) {
                  $uid=tatiye::ssoId();
                  foreach(array_merge($DIREKTORY,$app,$uid) as $page => $value) {
                    $tatiyeNet->val($page, $value);
                 }
              } else {
               foreach(array_merge($DIREKTORY,$app) as $page => $value) {
                  $tatiyeNet->val($page, $value);
               }
              }
              if (!empty(tatiye::tn(2))) {
                  $postleb=$url.'/'.tatiye::tn(2);
              } else {
                  $postleb=$url.'/index';
              }
              echo $tatiyeNet->GraphObject(tatiye::expDir('vendor/tatiye/terminal/'.$postleb)); 
         } else {
         $METHOD=$_SERVER['REQUEST_METHOD'];
         tatiye::headerContent($METHOD);
         require_once tatiye::dir('vendor/tatiye/terminal/src/json.php');
         }
         

    }

    /*
    |--------------------------------------------------------------------------
    | Initializes postleb 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function postleb2($url){
      $tatiyeNet = new tatiyeNetInit();
       require_once __DIR__.'/direktory.php';
       require_once APPROOT.'/models/Graph.php';
       if (!empty(tatiye::ssoId('userid'))) {
          $uid=tatiye::ssoId();
          foreach(array_merge($DIREKTORY,$app,$uid) as $page => $value) {
            $tatiyeNet->val($page, $value);
         }
      } else {
       foreach(array_merge($DIREKTORY,$app) as $page => $value) {
          $tatiyeNet->val($page, $value);
       }
      }
      if (!empty(tatiye::tn(1))) {
          $postleb=tatiye::tn(1);
      } else {
          $postleb='index';
      }
      
     echo $tatiyeNet->GraphObject(tatiye::expDir('vendor/tatiye/terminal/postleb/'.$postleb)); 


       // require_once tatiye::dir('vendor/tatiye/terminal/postleb/index.html');
        
    }
    /* and class postleb */


    /*
    |--------------------------------------------------------------------------
    | Initializes Raute Package 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function package($url, $data = [], $int='',$graph=''){
        require_once __DIR__.'/autoload.php';
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes Raute Package 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function etc($url, $data = [], $int='',$graph=''){
       require_once __DIR__.'/etchelper.php';
    }
     /*
     |--------------------------------------------------------------------------
     | Initializes uid 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2020
     | @Date 11/3/2023 10:14:37 PM
     */
    public  function route($url, $data = [], $int='',$graph=''){
       require_once __DIR__.'/route.php';
    }

     /*
     |--------------------------------------------------------------------------
     | Initializes uid 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2020
     | @Date 11/3/2023 10:14:37 PM
     */
    public  function uid($url, $data = [], $int='',$graph=''){
      $tatiyeNet = new tatiyeNetInit();
      require_once APPROOT.'/models/App.php';
      require_once __DIR__.'/direktory.php';

       foreach(array_merge($DIREKTORY,$app) as $page => $value) {
          $tatiyeNet->val($page, $value);
       } 
       if (!empty(tatiye::cookie('sso'))) {
          $row=tatiye::getWJT(tatiye::cookie('sso'));
          $appLogin=$row['applogin'];

 
       } else {
          $appLogin=$url;
       }
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/dashboard/'.$appLogin));

    }

 


   /*
   |--------------------------------------------------------------------------
   | Initializes install 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function install($ulr){
      if (!empty(tatiye::CekDB('mySQL'))) {
          redirect('home');
       }
       $tatiyeNet = new tatiyeNetInit();
       require_once __DIR__.'/direktory.php';
       require_once APPROOT.'/models/Graph.php';
       $install=tatiye::canononical(true);

// Errors?
$errors = false;

// Check PHP version
$check = (PHP_VERSION >= '5.3.0');
$php = '<span class="'.($check ? 'check' : 'notcheck');
$php .= '">PHP '.PHP_VERSION.'</span>';
if (!$check) $errors = true;

// check if the PDO driver we need is installed
$check = false;
$check = class_exists('PDO',false);
$pdo = '<span class="'.(($check) ? 'check' : 'notcheck');
$pdo .= '">'.(($check) ? 'true' : 'false').'</span>';
if (!$check) $errors = true;

$mcheck = false;
$scheck = false;
$pcheck = false;

if ($check) {
    $drivers = PDO::getAvailableDrivers();

    $mcheck = in_array('mysql', $drivers);
    $mysql = '<span class="'.($mcheck ? 'check' : 'notcheck').'">'.($mcheck ? 'true' : 'false').'</span>';

    $scheck = in_array('sqlite', $drivers);
    $sqlite = '<span class="'.($scheck ? 'check' : 'notcheck').'">'.($scheck ? 'true' : 'false').'</span>';

    $pcheck = in_array('pgsql', $drivers);
    $pgsql = '<span class="'.($pcheck ? 'check' : 'notcheck').'">'.($pcheck ? 'true' : 'false').'</span>';

    // Make sure EITHER MySQL, SQLite or PostgreSQL is supported
    if (!$mcheck && !$scheck && !$pcheck) $errors = true;
}
else {
    $mysql = '-- n/a --';
    $sqlite = '-- n/a --';
    $pgsql = '-- n/a --';
}
// Check public directory is writable
$check = is_writable(ROUTE);
$public_writable = '<span class="'.($check ? 'check' : 'notcheck').'">'.($check ? 'true' : 'false').'</span>';
if (!$check) $errors = true;

$check = false;
if (isset($_GET['rewrite']) && $_GET['rewrite'] == 1) {
    $check = true;
}
$modrewrite = '<span class="'.($check ? 'check' : 'warning').'">'.($check ? 'true' : 'not detected').'</span>';

// Test for HTTPS support, only possible if user goes to this page with https
$check = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == "on" || $_SERVER['HTTPS'] == "1"));
$https = '<span class="'.($check ? 'check' : 'notcheck').'">'.($check ? 'true' : 'false').'</span>';
    
        $component= [
             'instal_ngorei'=>$install['jsx'],
             'php'=>$php,
             'pdo'=>$pdo,
             'mysql'=>$mysql,
             'sqlite'=>$sqlite,
             'pgsql'=>$pgsql,
             'public_writable'=>$public_writable,
             'modrewrite'=>$modrewrite,
        ];



       foreach(array_merge($DIREKTORY,$app,$component) as $page => $value) {
          $tatiyeNet->val($page, $value);
       }
       if (file_exists($file_exists)) {
          echo $tatiyeNet->GraphObject(tatiye::dir('app/views/'.$ulr.'.php'));
       } else {

          echo $tatiyeNet->GraphObject(tatiye::dir('app/views/install/index.php'));
       }

   }
   /* and class install */


    public function view($url, $metaTag=[], $int='',$graph=''){
       $tatiyeNet = new tatiyeNetInit();
       $Protokol=tatiye::Protokol();
      
       // var_dump($username);
       // echo tatiye::DIR('app/ngorei.ps1');
         // if(!file_exists(tatiye::DIR('app/ngorei.ps1'))){
         //     tatiye::setInvoke();
         //     exit;
         // }

       // ngorei__.ps1
        // if ($Protokol=='mobile') {
        //    redirect('mobile/home');
        // }
        // $install=tatiye::canononical(true);

        // if (empty($install['install'])) {
        //      redirect('inspection');
        //     exit;
        // }
       // if (!empty(tatiye::appStatus())) {
       //      redirect('licenced');
       //    exit;
       // }
        require_once APPROOT.'/models/Graph.php';
        require_once __DIR__.'/direktory.php';
        if (!empty($metaTag['fetch']['path'])) {
              $keyword=tatiye::infoMeta($metaTag['fetch']);
              if (!empty($keyword)) {
                $Meta=$keyword;
              } else {
                $Meta=[];
              }
              
          } else {
              $Meta=[];
          }
      if (!empty(tatiye::ssoId('userid'))) {
          $uid=tatiye::ssoId();
           foreach(array_merge($DIREKTORY,$uid,$app,$Meta) as $page => $value) {
              $tatiyeNet->val($page, $value);
            }
      } else {
        foreach(array_merge($DIREKTORY,$app,$Meta) as $page => $value) {
           $tatiyeNet->val($page, $value);
        }
      }
      echo $tatiyeNet->GraphObject(tatiye::expDir("public/theme/inc/meta.html"));
        
       // SET METATAG
       // HEADER
       if (!empty(tatiye::ssoId('userid'))) {
            echo $tatiyeNet->GraphObject(tatiye::expDir("public/theme/inc/client.html"));
       } else {
            echo $tatiyeNet->GraphObject(tatiye::expDir("public/theme/inc/header.html"));
       }
       // CONTENT
      $IDpublic=explode('public',$url);
      if (!empty($IDpublic[1])) {
          $root=$url;
      } else {
          $root="public/theme/".$url;
      }


      if(file_exists(tatiye::expDir($root))){
            echo $tatiyeNet->GraphObject(tatiye::expDir($root));
      } else {
        if ($Protokol=='mobile') {
           // echo $tatiyeNet->GraphObject(tatiye::expDir("public/theme/mobile/home.html"));
        } else {
           echo $tatiyeNet->GraphObject(tatiye::expDir("public/theme/index.html"));
        }
      }

      // FOOTER
      echo $tatiyeNet->GraphObject(tatiye::expDir("public/theme/inc/footer.html"));
    }

     public function mobile($url, $metaTag=[], $int='',$graph=''){
           $tatiyeNet = new tatiyeNetInit();
            require_once APPROOT.'/models/Graph.php';
            require_once __DIR__.'/direktory.php';
            if (!empty(tatiye::ssoId('userid'))) {
                $uid=tatiye::ssoId();
                 foreach(array_merge($DIREKTORY,$app,$uid,$metaTag) as $page => $value) {
                    $tatiyeNet->val($page, $value);
                 }
            } else {
              foreach(array_merge($DIREKTORY,$app) as $page => $value) {
                 $tatiyeNet->val($page, $value);
              }
            }
       // HEADER
       echo $tatiyeNet->GraphObject(tatiye::expDir("public/theme/inc/meta.html"));     
       if (!empty(tatiye::ssoId('userid'))) {
            echo $tatiyeNet->GraphObject(tatiye::expDir("public/mobile/inc/client.html"));
       } else {
            echo $tatiyeNet->GraphObject(tatiye::expDir("public/mobile/inc/header.html"));
       }
       // CONTENER
          $IDpublic=explode('public',$url);
          if (!empty($IDpublic[1])) {
              $root=$url;
          } else {
              $root="public/theme/".$url;
          }
          if(file_exists(tatiye::expDir($root))){
             echo $tatiyeNet->GraphObject(tatiye::expDir($root));
          } else {
              echo $tatiyeNet->GraphObject(tatiye::expDir("public/theme/mobile/home.html"));
          }   

       echo $tatiyeNet->GraphObject(tatiye::expDir("public/mobile/inc/footer.html"));
       // FOOTER
     }
     // End Mobile




  }