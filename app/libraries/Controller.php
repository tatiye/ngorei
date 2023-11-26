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
    | Initializes framework7 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function framework7(){
        $tatiyeNet = new tatiyeNetInit();
         require_once APPROOT.'/models/mobile.php';
         require_once __DIR__.'/direktory.php';
         if (!empty(tatiye::ssoId('userid'))) {
            $uid=tatiye::ssoId();
         } else {
            $uid=[];
         }
          foreach(array_merge($DIREKTORY,$uid,$app) as $page => $value) {
             $tatiyeNet->val($page, $value);
          }

          $url=explode(tatiye::LINK(),$_POST['url']);
          echo $tatiyeNet->GraphObject(tatiye::expDir("public/mobile".$url[1]));
           echo '<script src="'.$DIREKTORY['ROOTPUBLIC'].'/lib/prism/clipboard.code.js"></script>
           <script src="'.$DIREKTORY['ROOTPUBLIC'].'/lib/prism/clipboard.min.js"></script>
           ';
        
    }
    /* and class framework7 */

    /*
    |--------------------------------------------------------------------------
    | Initializes webview 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function simulator($url){
         $tatiyeNet = new tatiyeNetInit();
          require_once APPROOT.'/models/mobile.php';
          require_once __DIR__.'/direktory.php';
          if (!empty(tatiye::ssoId('userid'))) {
             $uid=tatiye::ssoId();
          } else {
             $uid=[];
          }
    
          foreach(array_merge($DIREKTORY,$uid,$app) as $page => $value) {
             $tatiyeNet->val($page, $value);
          }


      
         echo $tatiyeNet->GraphObject(tatiye::expDir("public/mobile/inc/header.html"));
          
         echo $tatiyeNet->GraphObject(tatiye::expDir("public/mobile/".$url.".html"));
        
         echo $tatiyeNet->GraphObject(tatiye::expDir("public/mobile/inc/footer.html"));
         
            

    }
    /* and class webview */

    /*
    |--------------------------------------------------------------------------
    | Initializes webview 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function webview($key){
         $tatiyeNet = new tatiyeNetInit();
          require_once __DIR__.'/direktory.php';
          if (!empty(tatiye::ssoId('userid'))) {
             $uid=tatiye::ssoId();
          } else {
             $uid=[];
          }
    
          foreach(array_merge($DIREKTORY,$uid) as $page => $value) {
             $tatiyeNet->val($page, $value);
          }


          if ($key !=='settings' && $key !=='welcome') {
              echo $tatiyeNet->GraphObject(tatiye::expDir("public/webview/inc/header.html"));
          } else {
              echo $tatiyeNet->GraphObject(tatiye::expDir("public/webview/inc/page.html"));
          }
         echo $tatiyeNet->GraphObject(tatiye::expDir("public/webview/".$key.".html"));
         if ($key !=='welcome') {
         echo $tatiyeNet->GraphObject(tatiye::expDir("public/webview/inc/footer.html"));
         }     
    }
    /* and class webview */
    /*
    |--------------------------------------------------------------------------
    | Initializes payment 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function payment($key){
          require_once tatiye::expDir("public/package/payment/default.php");
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
        if (tatiye::Protokol()=='mobile') {
            redirect('home');
            exit;  
         }
         $tatiyeNet = new tatiyeNetInit();
         require_once APPROOT.'/models/App.php';
         require_once __DIR__.'/direktory.php';
           if (empty($_SESSION['sub_domain'])) {
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
                     //$route=tatiye::expDir('public/package/'.tatiye::tn(1).'/'.tatiye::tn(2).'.html');
                   } else {
                    // $route=tatiye::expDir('public/package/'.$url.'.html');
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
     | Initializes docs 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2020
     | @Date 11/3/2023 10:14:37 PM
     */
    public function docs($url, $data = [], $int='',$graph=''){
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
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/inc/meta'));
        if (!empty(tatiye::ssoId('userid'))) {
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/docs/inc/client')); 
       } else {
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/docs/inc/header')); 
       }
       
       
      if(file_exists(tatiye::expDir('public/theme/'.$url))){
         foreach(array_merge($DIREKTORY,$app) as $page => $value) {
          $tatiyeNet->val($page, $value);
       }
  
    
         echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/'.$url));
      } else {
            echo '<div style="width:100%;background:red; color:#fff;padding-left: 10px; "> Object does not exist '.$url.'</div>';
      }
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/docs/inc/footer'));
       echo '<script src="'.$DIREKTORY['ROOTPUBLIC'].'/lib/prism/clipboard.code.js"></script>
       <script src="'.$DIREKTORY['ROOTPUBLIC'].'/lib/prism/clipboard.min.js"></script>'; 
    }
     /*
     |--------------------------------------------------------------------------
     | Initializes Sales 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2020
     | @Date 11/3/2023 10:14:37 PM
     */
     public function sales($url, $data = [], $int='',$graph=''){
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
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/inc/meta'));
       if (!empty(tatiye::ssoId('userid'))) {
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/sales/inc/client')); 
           // code...
       } else {
           // code...
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/sales/inc/header')); 
       }
       
      
      if(file_exists(tatiye::expDir('public/theme/'.$url))){
         foreach(array_merge($DIREKTORY,$data) as $page => $value) {
          $tatiyeNet->val($page, $value);
       }
         echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/'.$url));
      } else {
            echo '<div style="width:100%;background:red; color:#fff;padding-left: 10px; "> Object does not exist '.$url.'</div>';
      }
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/sales/inc/footer'));
    }
 
     /*
     |--------------------------------------------------------------------------
     | Initializes client 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2020
     | @Date 11/3/2023 10:14:37 PM
     */
     public function client($url, $data = [], $int='',$graph=''){
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
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/inc/meta'));
       if (!empty(tatiye::ssoId('userid'))) {
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/client/inc/client')); 
       } else {
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/client/inc/header')); 
       }
       
      if(file_exists(tatiye::expDir('public/theme/'.$url))){
         foreach(array_merge($DIREKTORY,$data) as $page => $value) {
          $tatiyeNet->val($page, $value);
       }
         echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/'.$url));
      } else {
            echo '<div style="width:100%;background:red; color:#fff;padding-left: 10px; "> Object does not exist '.$url.'</div>';
      }
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/client/inc/footer'));
    }

    
 
     /*
     |--------------------------------------------------------------------------
     | Initializes theme 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2020
     | @Date 11/3/2023 10:14:37 PM
     */



    public function posts($url){
       $Text=tatiye::Text();
       $db=new tatiye();   
       $tatiyeNet = new tatiyeNetInit();
       require_once __DIR__.'/direktory.php';
       require_once APPROOT.'/models/Graph.php';
       $link= tatiye::fetch('appnews','*',"link='".$url."'");
       $visitor= tatiye::fetch('appkeywords','id',"ipaddress='".$_SESSION['visitor']."'  AND content='posts' AND keywords='".$link['title']."'  AND date='".tatiye::dt("EN")."'");
       $IMGS= tatiye::fetch('appfile','filename',"keyid='".$link['id']."' AND nmtabel='appnews' AND categori='images' ORDER BY ascId ");
       if (empty($link['id'])) {
          redirect('blog');
       }


       $ExpBase=array(
          'key'       =>$link['id'],
          'dilihat'   =>$link['dilihat']??='1',
          'url'       =>tatiye::LINK('posts/'.$url),
          'images'    =>tatiye::resizeImage($Text->strreplace([$IMGS['filename'],'images','600x315'])),
          'filename'  =>tatiye::LINK($IMGS['filename'])
       );
 
       if (empty($visitor['id'])) {
           $count=$link['dilihat']+1;
           $var2=$db->que(array("dilihat"=>$count))->update("appnews","id ='".$link['id']."'"); 
           $send = array(                                                             
            "ipaddress"=>tatiye::getBrowser('IP'),                                                                                           
            "userid"    =>$_SESSION['user_id']??='0',                                                 
            "content"   =>'posts',                                                 
            "keywords"  =>$link['title'],                                                 
            "link"      =>tatiye::LINK('posts/'.$url),                                                 
            "time"      =>tatiye::tm(),                                                 
            "date"      =>tatiye::dt("EN"),                                             
            "bulan"     =>tatiye::dt("M"),                                              
            "tahun"     =>tatiye::dt("Y"),
            ); 
            $db->que($send)->insert("appkeywords");
       }




    $thum =tatiye::sqli("SELECT * FROM appfile WHERE keyid='".$link['id']."'  AND nmtabel='appnews' AND categori='images' ");
     while ($item = $thum->fetch_array()) {  
        $tatiyeNet->assign_block_vars('thumb', array(
          'IMG300'    =>tatiye::resizeImage($Text->strreplace([$item['filename'],'images','300x215'])),
          'IMG591'    =>tatiye::resizeImage($Text->strreplace([$item['filename'],'images','591x395'])),
          'FILE'  =>tatiye::LINK($item['filename'])
        ));
    } 

       foreach(array_merge($DIREKTORY,$app,$link,$ExpBase) as $page => $value) {
          $tatiyeNet->val($page, $value);
       }


       
      $Protokol=tatiye::Protokol();
      if ($Protokol !=='mobile') {
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/inc/meta'));
      }

       if (!empty(tatiye::ssoId('userid'))) {
        echo $tatiyeNet->GraphObject(tatiye::expDir("public/$Protokol/inc/client.html"));
       } else {
        echo $tatiyeNet->GraphObject(tatiye::expDir("public/$Protokol/inc/header.html"));
       }
       echo $tatiyeNet->GraphObject(tatiye::expDir("public/$Protokol/posts/index"));

       if($Protokol =='mobile') {
         echo $tatiyeNet->GraphObject(tatiye::expDir("public/$Protokol/inc/post"));
       } else {
         echo $tatiyeNet->GraphObject(tatiye::expDir("public/$Protokol/inc/footer"));
       }










    }




    public function view($url, $data = [], $int='',$graph=''){
      $tatiyeNet = new tatiyeNetInit();
       $Protokol=tatiye::Protokol();
        if ($Protokol =='mobile') {
           require_once APPROOT.'/models/mobile.php';
       } else {
           require_once APPROOT.'/models/Graph.php';
       }
       
       // tatiye::cookieRead('url',URLROOT);
      
       require_once __DIR__.'/direktory.php';
      
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
 
       
       
       

      if ($Protokol !=='mobile') {
       echo $tatiyeNet->GraphObject(tatiye::expDir('public/theme/inc/meta'));
       }

       if (!empty(tatiye::ssoId('userid'))) {
        echo $tatiyeNet->GraphObject(tatiye::expDir("public/$Protokol/inc/client.html"));
       } else {
        echo $tatiyeNet->GraphObject(tatiye::expDir("public/$Protokol/inc/header.html"));
       }

        
      if(file_exists(tatiye::expDir("public/$Protokol/".$url))){
         echo $tatiyeNet->GraphObject(tatiye::expDir("public/$Protokol/".$url));
      } else {
           echo $tatiyeNet->GraphObject(tatiye::expDir("public/$Protokol/index"));
      }
      echo $tatiyeNet->GraphObject(tatiye::expDir("public/$Protokol/inc/footer.html"));
    }




  }
