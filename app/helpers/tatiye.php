<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2018 wolf05 <info@tatiye.net / https://www.facebook.com/tatiyeNet/>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace app;
use PDO;
use Exception;
use PDOException;
use mysqli;
use app\Graph\Database;
use app\Graph\Response;
use app\Graph\signin;
use app\Graph\signup;
use app\Graph\profil;
use app\Graph\entri;
use app\Graph\setSelect;
use app\Database\tatiyeNetInit as db;
use app\Database\tatiyeNetQueryForge;
use app\tatiyeNetValidation;
use app\tatiyeNetProtokol;
use app\tatiyeAssets;
use app\tatiyeNetText as Text;
use app\Datetime\tatiyeNetDate;
use app\Datetime\tatiyeNetTime;
use app\Datetime\tatiyeNetDateTime;
use app\Images\tatiyeNetImagesResize;
use app\tatiyeNetWjt as Wjt;
use app\Raw\tatiyeNetTabelRaw ;
use app\Raw\tatiyeNetRawset;
use app\Raw\tatiyeNetRawHeader;  
use app\Raw\tatiyeNetAsciiTable as AsciiTable;
use app\models\Package;
use app\tatiyeNetCookie as cookie;
use app\Rest\Firebase\netFirebase AS Firebase;
use app\config\database AS setdb;

class tatiye {
  protected static $instance;  
  private $detection;
  private $driver;
    private $key;
    private $Instance;
    protected $db;
    public $conn;
    private $data = array();


    public function __construct($key='',$Instance='',$options='') {

           $this->key          =$key;
           $this->Instance     =$Instance;
    }
    
    /*
    |--------------------------------------------------------------------------
    | Initializes hello 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function hello($key){
          return $key;
        
    }
    /* and class hello */
    
   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */

    public static function init($tabel='',$params='',$key='') {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
     self::$instance->tabel         =$tabel;
     return self::$instance;
  }
   /* and class Db */
   public  function index(){
      $response = new Response();
      $response->setHttpStatusCode(404);
      $response->setSuccess(false);
      $response->addMessage("Endpoint not found");
      $response->send();
      exit;
   }
   /*
   |--------------------------------------------------------------------------
   | Initializes precode 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function precode($dirFile,$type='html'){
       $setJS=tatiye::dir('public/'.$dirFile);
       $output = file_get_contents($setJS); 
       $new    =htmlspecialchars($output, ENT_QUOTES);
       echo '<pre><code class="language-'.$type.'">'.$new.'<code><pre>';  
   }
   /* and class precode */
   /*
   |--------------------------------------------------------------------------
   | Initializes ssoId 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function ssoId($key=''){
        $token=tatiye::cookie('sso');
        $row=tatiye::getWJT($token);
        if (!empty($key)) {
          return $row[$key];
        } else {
          return $row;
        }
        
       
   }
   /* and class ssoId */
   /*
   |--------------------------------------------------------------------------
   | Initializes visitor 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function userAgent(){
         $db=new tatiye(); 
        if (!isset($_SESSION['visitor'])){
          $_SESSION['visitor']=self::getBrowser('IP');
        }   
         return $_SESSION['visitor'];
   }
   /* and class visitor */
   /*
   |--------------------------------------------------------------------------
   | Initializes skillset 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function skillset($key){
    if (!empty($_SESSION['user_id'])) {
         $login=tatiye::useHandelCount('appusertoken'," userid='".$_SESSION['user_id']."' ");     
         $package=tatiye::useHandelCount('appuserpackage'," userid='".$_SESSION['user_id']."' ");     
         $history=tatiye::useHandelCount('apphistory'," userid='".$_SESSION['user_id']."' ");  
         $Exp[]=array(
               'login'    =>$login['count'],
               'history'  =>$history['count'],
               'package'  =>$package['count'],
               );   
           return $Exp[0][$key];
     }

       
   }
   /* and class skillset */
    /*
    |--------------------------------------------------------------------------
    | Initializes sum 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function sum($QUERY){
        $Exp=array();
       $variable=self::QY($QUERY); 
       while ($row = $variable->fetch()) {  
           $Exp=$row;
        } 
        return $Exp;
    }
    /* and class sum */

    /*
    |--------------------------------------------------------------------------
    | Initializes payment 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function payment($oder_id){
       if (!empty($oder_id)) {
        $row=tatiye::sum("SELECT SUM(harga) AS TOTAL,userid FROM biling WHERE order_id='".$oder_id."'"); 
        $Expuid=tatiye::fetchUserID($row['userid']);
        // Required
        $transaction_details = array(
            'order_id'     =>$oder_id,
            'gross_amount' =>$row['TOTAL'], 
        );
        // Optional
           $item_details=array();
           $variable=tatiye::QY("SELECT *  FROM biling WHERE order_id='".$oder_id."'"); 
           while ($row = $variable->fetch()) {  
                    $item_details[] = array (
                      array(
                          'id'       =>$row['id'],
                          'price'    =>$row['harga'],
                          'quantity' =>$row['jumlah'],
                          'name'     =>$row['categori']
                      ),
                  );
            } 
        // Optional       
        $customer_details = array(
            'first_name'          =>$Expuid['name'],
            'last_name'           =>"",
            'email'               =>$Expuid['email'],
            'phone'               =>$Expuid['telepon'],
            'billing_address'     =>'',
            'shipping_address'    =>''
        );
        // Fill transaction details
        $transaction = array(
            'transaction_details' =>$transaction_details,
            'customer_details'    =>$customer_details,
            'item_details'        =>$item_details,
        );
          return $transaction;
        } else {
          return tatiye::index();
        }
        
    }
    /* and class payment */
   /*
   |--------------------------------------------------------------------------
   | Initializes appLogin 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  LICENSE
   */
   public static function appSSO($key){
        if (!empty($key)) {
            $template=$key;
        } else {
           $template='login';
        }
        $Expuid=self::fetchUserID($_SESSION['user_id']);
        $applogin=array(
            'tm'        =>self::tm(),
            'token'     =>$_SESSION['access_token'],
            'license'   =>LICENSE,
            'serialKey' =>self::serialKey(1),
            "applogin"=>$template
        );

        $array=array_merge($Expuid,$applogin);
    
       //$_SESSION['access_token']; 
       $newToken=self::WJT($array);
       return $newToken;
       
   }
   /* and class appLogin */
   /*
   |--------------------------------------------------------------------------
   | Initializes authorization 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function authorization(){
    error_reporting(0);
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        self::headerContent('POST');
          $row=tatiye::fetch("appusertoken","*","serialkey='".$_SERVER["HTTP_TOKEN"]."'");
          if (!empty($row['id'])) {
            if(strtotime($row['accesstokenexpiry']) < time()) {
                  $status='expair';
              } else {
                 $status='active';
              }   
              $deskripsi='Token sesuai';
            } else {
              $deskripsi='Token tidak sesuai';
            }
           $Exp=array(
              'serial_key'           =>$_SERVER["HTTP_TOKEN"],
              'expair'               =>$row['accesstokenexpiry']??='',
              'access_token'         =>$row['accesstoken']??='',
              'deskripsi'            =>$deskripsi,
              );
           echo json_encode($Exp);
         } else {
             return  tatiye::index();
        }
   }
   /* and class authorization */
   /*
   |--------------------------------------------------------------------------
   | Initializes serialNumber 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function serialKey(){
          if (!empty($_SESSION['access_token'])) {
              $md5 = strtoupper(md5($_SESSION['access_token']));
              $code[] = substr ($md5, 0, 5);
              $code[] = substr ($md5, 5, 5);
              $code[] = substr ($md5, 10, 5);
              $code[] = substr ($md5, 15, 5);
              $membcode = implode ("-", $code);
              return $membcode;
          } else {
              return false;
          }   
   }
   /* and class serialNumber */
   /*
   |--------------------------------------------------------------------------
   | Initializes license 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function Createlicense(){
        $METHOD=$_SERVER['REQUEST_METHOD'];
        self::headerContent('POST');
        if ($METHOD=='POST') {
      $setUId=$_SERVER["HTTP_USERID"]; 
      $db=new tatiye(); 
      $Text=tatiye::Text(); 
      $row=self::fetch("appuserprofil","*","userid='".$setUId."'");
      $rowkey=self::fetch("applicense","COUNT(*) as count");
      $uidkey=self::fetch("applicense","*","userid='".$setUId."'");
      $natKey=$rowkey['count']+1;
     if (!empty($uidkey['userid'])) {
          echo json_encode($uidkey);  
          $result=$db->que(array("password"=>$row['password']))->update("applicense","id='".$uidkey['id']."'");  
       } else {
         $data = array(                                                     
             "serial"    =>self::serialKey().'-'.$Text->sprintf($natKey,"%05s"),                                    
             "time"      =>tatiye::tm(),                                                 
             "date"      =>tatiye::st('+25 days'),                                             
             "bulan"     =>tatiye::dt("M"),                                              
             "password"  =>$row['password'],                                              
             "tahun"     =>tatiye::dt("Y"),                                              
             "userid"    =>$setUId,                                                      
            );  
            if (!empty($setUId)) {
                                                                                      // code...
            $result=$db->que($data)->insert("applicense"); 
            }                                                                      
             echo json_encode($data);    
       }
                   // code...
        } else {
           return self::index();
        }
        
       
   }
   /* and class license */
     /* and class license */
   public static function licenseKey($key=''){
          self::headerContent('GET');
          $row=self::fetch("applicense","*","serial='".$key."'");
          $user=self::fetch('appuserprofil',"*","userid='".$row['userid']."'");
           $userApp=self::fetch('appusertoken',"*","userid='".$row['userid']."' ORDER BY id DESC");
           if (!empty($user['avatar'])) {
               $avatar=$user['avatar'];
           } else {
               $avatar='admin.jpeg';
           }
             if(strtotime($row['date']) < time()) {
                  $statusId='expair';
              } else {
                  $statusId='active';
              } 
     

             $sso=array(
              'userid'     =>$row['userid']??='',
              'name'       =>$user['nama'],
              'avatar'     =>tatiye::LINK('images/'.$avatar),
              'uid'        =>$user['id']??='',
              'email'      =>$user['email']??='',
              'telepon'    =>$user['telepon']??='',
              'tm'         =>$user['time'],
              'pws'        =>$user['password'],
              'statusId'   =>$statusId,
              'token'      =>$userApp['accesstoken'],
              'license'    =>$userApp['serialkey'],
              'serialKey'  =>$key,
              "applogin"  =>'public',
              'expair'     =>$row['date']??='',
              );  

           $ssoUser=array(
              'name'       =>$user['name'],
              'avatar'     =>tatiye::LINK('images/'.$avatar),
              'email'      =>$user['email']??='',
              'telepon'    =>$user['telepon']??='',
              'tm'         =>$user['time'],
              );  
          if (!empty($row['id'])) {
            if(strtotime($row['date']) < time()) {
                  $status='expair';
              } else {
                 $status='active';
              }   
              $deskripsi='Token sesuai';
              $setSSO=self::WJT($sso);
              $setSSOUser=$ssoUser;
            } else {
              $deskripsi='Token tidak sesuai';
              $setSSO='';
              $setSSOUser='';
            }

           $Exp=array(
              'serial'     =>$key,
              'expair'     =>$row['date']??='',
              'deskripsi'  =>$deskripsi,
              'status'     =>$status??='',
              'agent'      =>$setSSOUser,
              'sso'        =>$setSSO,
              );
           echo json_encode($Exp);    
        
    
   }
 

   /*
   |--------------------------------------------------------------------------
   | Initializes profil 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function useProfil($id){
       $row=tatiye::fetch("appuserprofil","*","id='".$id."'");
          if (!empty($row['avatar'])) {
            $avatar=tatiye::images($row['avatar']);
          } else {
            $avatar=tatiye::images('profil/admin.jpeg');
          }
       $Exp=array(
              'id'                 =>$row['id'],
              'uid'                =>$row['id'],
              'loggedIn'           =>true,
              'base_ulr'           =>$_SESSION['base_ulr'].'/',
              'base_api'           =>$_SESSION['base_ulr'].'/api',
              'sub_domain'         =>$_SESSION['base_ulr'].'/'.strtolower(str_replace(' ', '',$row['nama'])),
              'access_token'       =>$_SESSION['access_token'],
              'uthorization'       =>$_SESSION['access_token'],
              'userid'             =>$row['userid'],
              'user_id'            =>$row['userid'],
              'nama'               =>$row['nama'],
              'fullname'           =>$row['nama'],
              'email'              =>$row['email'],
              'password'           =>$row['password'],
              'telepon'            =>$row['telepon'],
              'alamat'             =>$row['alamat'],
              'avatar'             =>$avatar,
              'mapId'              =>$row['mapId'],
              'date'               =>$row['date'],
              'time'               =>$row['time'],
              );
       return $Exp;
       
   }
   /* and class profil */
 public static function setserialKey($key=''){
      $db=new tatiye();  
      $Expuid=tatiye::fetch("appusertoken","id,serialKey","accesstoken='".$key."'");
      $md5 = strtoupper(md5($key));
      $code[] = substr ($md5, 0, 5);
      $code[] = substr ($md5, 5, 5);
      $code[] = substr ($md5, 10, 5);
      $code[] = substr ($md5, 15, 5);
      $membcode = implode ("-", $code);
      $db->que(array("serialKey"=>$membcode))->update("appusertoken","id='".$Expuid['id']."'");
      return $Expuid['serialKey'];
   }
   /*
   |--------------------------------------------------------------------------
   | Initializes getUserIP 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function getUserIP(){
    $userIP =   '';
    if(isset($_SERVER['HTTP_CLIENT_IP'])){
        $userIP =   $_SERVER['HTTP_CLIENT_IP'];
    }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $userIP =   $_SERVER['HTTP_X_FORWARDED_FOR'];
    }elseif(isset($_SERVER['HTTP_X_FORWARDED'])){
        $userIP =   $_SERVER['HTTP_X_FORWARDED'];
    }elseif(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
        $userIP =   $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    }elseif(isset($_SERVER['HTTP_FORWARDED_FOR'])){
        $userIP =   $_SERVER['HTTP_FORWARDED_FOR'];
    }elseif(isset($_SERVER['HTTP_FORWARDED'])){
        $userIP =   $_SERVER['HTTP_FORWARDED'];
    }elseif(isset($_SERVER['REMOTE_ADDR'])){
        $userIP =   $_SERVER['REMOTE_ADDR'];
    }else{
        $userIP =   'UNKNOWN';
    }
    // 
    return $userIP;
       
   }
   /* and class getUserIP */
 public static function getBrowser($keyBrowser){
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent)){
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent)){
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent)){
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent)){
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent)){
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

 
        $return =array(
            'browser'   => $ub,
            'version'   => $version,
            'platform'  => $platform,
            'IP'        =>self::getUserIP(),
           
         );
      return $return[$keyBrowser];
    }
    /* and class getBrowser */
  /*
  |--------------------------------------------------------------------------
  | Initializes raw 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
    public static function tabelRaw($options,$set){
       $renderer = new tatiyeNetTabelRaw($options);
       $renderer->showHeaders(true);
        print '<pre>';
        print "\n";
        $renderer->render(false,$set);
        print "\n";
        print '</pre>';
    }
    /* and class Tabel Raw */
      public static function tabelRawHeader($options,$set){
      $renderer = new tatiyeNetRawHeader($options);
      $renderer->showHeaders(true);
      $renderer->render(false,$set);
      }
    /*
    |--------------------------------------------------------------------------
    | Initializes tabelRaw 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function tabelRawset($options,$header='',$footer='',$xheader=''){
       $renderer = new tatiyeNetRawset($options);
       $renderer->showHeaders(true);
       $renderer->render(false,$header,$footer,$xheader);
    }
    /* and class tabelRaw */

    public static function WJT($options='',$key=''){
        if(is_array($options)) {
             return Wjt::init()->array($options)->Encode();
        } else {
            if (!empty($key)) {
                return Wjt::init()->token($options)->Decode($key);
            } else {
               return Wjt::init()->token($options)->code();
            }   
        }
    }
        /*
    |--------------------------------------------------------------------------
    | Initializes headeUtf 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function headeUtf8(){
         header('Content-type:application/json;charset=utf-8');
    }
    /* and class headeUtf */
    /*
    |--------------------------------------------------------------------------
    | Initializes AsciiTable 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function AsciiTable($key=''){
        $database='demo';
        return AsciiTable::init($database);
        
    }
    /* and class AsciiTable */
    /*
    |--------------------------------------------------------------------------
    | Initializes idOorder 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function idOorder($key,$id,$date){
          return $key.$id.date('Ymd', strtotime($date, strtotime(date("y/m/d")))); 
        
    }
    /* and class idOorder */
    /*
    |--------------------------------------------------------------------------
    | Initializes fetchUserID 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function fetchUserID($key){
        $user=self::fetch('appuserprofil',"nama AS name ,avatar,email,telepon","userid='".$key."'");
        $userApp=self::fetch('appuser',"loginattempts","id='".$key."'");
        if (!empty($user['avatar'])) {
            $avatar=$user['avatar'];
        } else {
            $avatar='admin.jpeg';
        }
        
        $Expuid=array(
           'userid'   =>$key,
           'name'     =>$user['name'],
           'avatar'   =>tatiye::LINK('images/'.$avatar),
           'uidkey'   =>$userApp['loginattempts'],
           'email'    =>$user['email'],
           'telepon'  =>$user['telepon'],
           );
        return $Expuid;
        
    }
    /* and class fetchUserID */
    /*
    |--------------------------------------------------------------------------
    | Initializes htmlClass 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function htmlClass($key){
          // return tatiyeAssets::;
        
    }
    /* and class htmlClass */

    public static function fetchArrayTabel($key){
        $user=self::fetch('appuserprofil',"nama AS name ,avatar,email,telepon","userid='".$key."'");
        if (!empty($user['avatar'])) {
            $avatar=$user['avatar'];
        } else {
            $avatar='admin.jpeg';
        }
        
        $Expuid=array(
           $key,
           $user['name'],
           tatiye::LINK('images/'.$avatar),
           $user['email'],
           $user['telepon'],
           );
        return $Expuid;
        
    }
    /* and class fetchUserID */

      /*
    |--------------------------------------------------------------------------
    | Initializes fetchUserID 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function fetchUserIDTabel($key){
        $user=self::fetch('appuserprofil',"nama AS name ,avatar,email,telepon","userid='".$key."'");
        if (!empty($user['avatar'])) {
            $avatar=$user['avatar'];
        } else {
            $avatar='admin.jpeg';
        }
        
        $Expuid=array(
           $key,
           $user['name'],
           tatiye::LINK('images/'.$avatar),
           $user['email'],
           $user['telepon'],
           );
        return $Expuid;
        
    }
    /* and class fetchUserID */
    /*
    |--------------------------------------------------------------------------
    | Initializes Assets 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Assets($key){

         return tatiyeAssets::init(self::eksfile($key),$key);
        
    }
    /* and class Assets */
    /*
    |--------------------------------------------------------------------------
    | Initializes AssetsBase 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function AssetsBase($link){
          $external=explode('://',$link);
          if ($external[0]=='https') {
              $baseLink=$link;
          } else {
              $baseLink=tatiye::LINK($link);
          }
          return $baseLink;
        
    }
    /* and class AssetsBase */
    /*
    |--------------------------------------------------------------------------
    | Initializes AssetsBase 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function AssetsImport($link){
          $external=explode('://',$link);
          if ($external[0]=='https') {
              $baseLink=$link;
          } else {
              $baseLink=tatiye::LINK('modules/'.$link);
          }
          return $baseLink;
        
    }
    /* and class AssetsBase */
  /*
  |--------------------------------------------------------------------------
  | Initializes useHandelID 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function useHandelID($tabel,$key,$useHandel=''){
        $row=self::fetch($tabel,"*","id='".$key."'");
        if (!empty($useHandel)) {
              $natKey=$useHandel;
        } else {
           if (!empty($row['userid'])) {
              $natKey='userid';
           } else {
              $natKey='user_id';
           }
        }

        $Expuid=self::fetchUserID($row[$natKey]);
        $Exp= array_merge($row,$Expuid);
        return $Exp;
      
  }
  /* and class useHandelID */

 public static function useHandelIDKey($tabel,$key,$nat){
         $row=self::fetch($tabel,"*","$nat='".$key."'");
         if ($nat=='id') {
            $natKey='userid';
         } else {
            $natKey=$nat;
         }
         $Expuid=self::fetchUserID($row[$natKey]);
         $Exp= array_merge($row,$Expuid);
         return $Exp;
  }
  /*
  |--------------------------------------------------------------------------
  | Initializes useHandelCount 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function useHandelCount($tabel,$key){
        $row=self::fetch($tabel,"COUNT(*) as count","$key");
        return $row;
      
  }
  /* and class useHandelCount */
  /*
  |--------------------------------------------------------------------------
  | Initializes useHandelSheet 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function useHandelSheet($tabel,$key,$userid='userid'){
    $query="SELECT * FROM ". $tabel . " WHERE  $key  ";
   
    $stmt=tatiye::QY($query); 

     $products_arr=array();
     while ($row = $stmt->fetch()) { 
        $Expuid=self::fetchUserID($row[$userid]);
        $product_item=array_merge($row,$Expuid);
        array_push($products_arr, $product_item);
     }
     return $products_arr;

      
  }
  /* and class useHandelSheet */


  /*
  |--------------------------------------------------------------------------
  | Initializes openSell 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function uidSSL($password){
             $key_enc =$_SESSION['user_id']; //key for encrypt
             $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
             $iv = '16_characters'; //a random string with 16 characters
             @$pass_enc = openssl_encrypt($password, $met_enc, $key_enc, 0, $iv);
             @$ID=explode('==',$pass_enc);
             return  $ID[0]; 
       
  }
    public static function uidSSLKey($password){
              $key_enc = $_SESSION['user_id']; //key for encrypt
              $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
              $iv = '16_characters'; //a random string with 16 characters
             @$pass = openssl_decrypt($password, $met_enc, $key_enc, 0, $iv);
             return  $pass; 
        
  }
  /* and class openSell */

  /*
  |--------------------------------------------------------------------------
  | Initializes openSell 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function openSSL($password,$setkey=''){
         if (!empty($_SESSION['user_id'])) {
             $key_enc =$_SESSION['user_id']; //key for encrypt
             $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
             $iv = '16_characters'; //a random string with 16 characters
         } else {
              $key_enc = $setkey; //key for encrypt
              $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
              $iv = '16_characters'; //a random string with 16 characters
         }

        if (!empty($setkey)) {
             $pass = openssl_decrypt($password, $met_enc, $key_enc, 0, $iv);
             return  $pass; 
        } else {
             $pass_enc = openssl_encrypt($password, $met_enc, $key_enc, 0, $iv);
             $ID=explode('==',$pass_enc);
             return  $ID[0]; 
        }
  }
    public static function openSSLKey($password,$setkey=''){
         // if (!empty($_SESSION['user_id'])) {
         //     $key_enc =$_SESSION['user_id']; //key for encrypt
         //     $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
         //     $iv = '10_characters'; //a random string with 16 characters
         // } else {
              $key_enc = '1'; //key for encrypt
              $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
              $iv = '16_characters'; //a random string with 16 characters
         // }
        if (!empty($setkey)) {
             $pass = openssl_decrypt($password, $met_enc, $key_enc, 0, $iv);
             return  $pass; 
        } else {
             $pass_enc = openssl_encrypt($password, $met_enc, $key_enc, 0, $iv);
             $ID=explode('==',$pass_enc);
             return  $ID[0]; 
        }
  }
  /* and class openSell */
  /*
  |--------------------------------------------------------------------------
  | Initializes dirFile 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function appfile($payload){
      if ($payload['upload']=='profil') {
            $setDir='images/profil';
        } else {
            $setDir=$payload['upload'];
        }
       $dir           =$setDir;                                          
       $id            =$payload['setId'];                                        
       $setUId        =$payload['setUId'];                                         
       $entri         =$payload['file'];                                              
       $image_parts   =$payload['base64'];
       $tabel         =$payload['tabel'];

      


   if ($payload['upload']=='profil') {
     if (!file_exists(tatiye::dir()."/public/$dir/".$id)) {
         @mkdir(tatiye::dir()."/public/$dir/".$id, 0700);
         exit;
     }
    $filename     =end(explode('/',$entri));
    $target_dir = tatiye::dir()."/public/$dir/".$id."/$filename";
  } else {
     if (!file_exists(tatiye::dir()."/public/$dir/".tatiye::dt("Y")."/".tatiye::dt("M")."/".$id)) {
         @mkdir(tatiye::dir()."/public/$dir/".tatiye::dt("Y"), 0700);
         @mkdir(tatiye::dir()."/public/$dir/".tatiye::dt("Y")."/".tatiye::dt("M"), 0700);
         @mkdir(tatiye::dir()."/public/$dir/".tatiye::dt("Y")."/".tatiye::dt("M")."/".$id, 0700);
         exit;
     }
    $filename     =end(explode('/',$entri));
    $target_dir = tatiye::dir()."/public/$dir/".tatiye::dt("Y")."/".tatiye::dt("M")."/".$id."/$filename";
  }
  




  if (!file_exists($target_dir)) {


 $image_base64 = base64_decode($image_parts);
 file_put_contents($target_dir, $image_base64);
 $type=tatiye::eksfile($entri);
 $db=new tatiye();
  if ($payload['upload']=='profil') {
   $filename='profil/'.$id."/$filename";
     $data = array(                                                                      
       "avatar"     =>$filename,                                                        
     );                                                                                 
      $result=$db->que($data)->update("appuserprofil","id =$id AND userid=$setUId"); 
      
      $val["hasil"]    ="sukses";    
 } else {
   $filename=$dir.'/'.tatiye::dt("Y")."/".tatiye::dt("M")."/".$id."/$filename";
 }
 
 $Exp=array(
         "userid"   =>$setUId,
         "keyid"    =>$id,
         "nmtabel"  =>$tabel,
         "filename" =>$filename,
         "categori" =>$payload['upload'],
         "fileType" =>$type,
         "time"     =>tatiye::tm(),
         "date"     =>tatiye::dt("EN"),
         "bulan"    =>tatiye::dt("M"),
         "tahun"    =>tatiye::dt("Y"),
     );
     $result=$db->que($Exp)->insert("appfile");

  }
  }
  /* and class dirFile */

  /*
  |--------------------------------------------------------------------------
  | Initializes uidkey 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function uidkey(){
        return $_SESSION['user_id'];
  }
  /* and class uidkey */
   /*
   |--------------------------------------------------------------------------
   | Initializes date 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function tm($data=''){
      date_default_timezone_set(TIMEZONE);
      if (!empty($data)) {
         if($data == 'Time') {
           return tatiyeNetTime::init($data);
         } elseif ($data == 'c'){
          return tatiyeNetTime::init($data);
         } elseif ($data == 'zona'){
            return tatiyeNetTime::init($data);
         } else {
            return tatiyeNetTime::TimeSet($data);
         }
      } else {
         return date("h:i:sa");
      }  
   }
   /* and class date */

  /*
  |--------------------------------------------------------------------------
  | Initializes st 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  
  */
  public static function st($key,$Set=''){
        if (is_numeric($key)) {
           return tatiyeNetDateTime::Strtodate($key);
        } else {
            $CEK =self::stristrText(['/','-'],$key);
            if ( !empty( $CEK ) && !empty( $key ) ) { 
            $ID=explode($CEK,$key);
            }
            if (!empty($ID[0])) {
                return tatiyeNetDateTime::Strtotime($key);
            } else {
            
                
                  $CEK1 =self::stristrText(['days','month','year','MNT'],$key);
                  return tatiyeNetDateTime::$CEK1($key,$Set);
                
            }
            
        }
        
      // return ;
  }
  /*
  |--------------------------------------------------------------------------
  | Initializes month 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function month($month){
        switch ($month) { 
        case '01':{$BULAN='Januari'; }break;
        case '02':{$BULAN='Februari';}break;
        case '03':{$BULAN='Maret';  }break;
        case '04':{$BULAN='April'; }break;
        case '05':{$BULAN='Mei'; }break;
        case '06':{$BULAN='Juni'; }break;
        case '07':{$BULAN='Juli'; }break;
        case '08':{$BULAN='Agustus'; }break;
        case '09':{$BULAN='September'; }break;
        case '10':{$BULAN='Oktober'; }break;
        case '11':{$BULAN='November'; }break;
        case '12':{$BULAN='Desember'; }break;
      }
      return $BULAN;
      
  }
    public static function monthEn($month){
        switch ($month) { 
        case '01':{$BULAN='Jan'; }break;
        case '02':{$BULAN='Feb';}break;
        case '03':{$BULAN='Mar';  }break;
        case '04':{$BULAN='Apr'; }break;
        case '05':{$BULAN='Mei'; }break;
        case '06':{$BULAN='Jun'; }break;
        case '07':{$BULAN='Jul'; }break;
        case '08':{$BULAN='Agu'; }break;
        case '09':{$BULAN='Sep'; }break;
        case '10':{$BULAN='Okt'; }break;
        case '11':{$BULAN='Nov'; }break;
        case '12':{$BULAN='Des'; }break;
      }
      return $BULAN;
      
  }
  public static function monthEnTicks($month){
      //   switch ($month) { 
      //   case '0'  :{0 ='';    }break;
      //   case '8'  :{01='Jan'; }break;
      //   case '20' :{02='Feb'; }break;
      //   case '32' :{03='Mar'; }break;
      //   case '44' :{04='Apr'; }break;
      //   case '56' :{05='Mei'; }break;
      //   case '68' :{06='Jun'; }break;
      //   case '80' :{07='Jul'; }break;
      //   case '92' :{08='Agu'; }break;
      //   case '104':{09='Sep'; }break;
      //   case '116':{10='Okt'; }break;
      //   case '128':{11='Nov'; }break;
      //   case '140':{12='Des'; }break;
      // }
      // return $BULAN;
      
  }
             
  /* and class month */
  public static function Ft($key,$Set=''){
        if (is_numeric($key)) {
            return tatiyeNetDateTime::Strtodate($key);
        } else {
            $CEK =self::stristrText(['/','-'],$key);
            if ( !empty( $CEK ) && !empty( $key ) ) { 
            $ID=explode($CEK,$key);
          }
            if (!empty($ID[0])) {
                return tatiyeNetDateTime::Strtotime($key);
            } else {
                $CEK1 =self::stristrText(['D','M','Y'],$key);
                if (!empty($CEK1)) {
                 
                  return tatiyeNetDateTime::$CEK1($Set);
                } else {
                   return tatiyeNetDateTime::$key($Set);
                }
                
                
            }

            
        }
  }
  public static function stristrText($H1,$teks,$H2=''){
   if (!empty($H1)) {
     $stristrText = $H1;
     $hasil =$H2;
     $jml_kata = count($stristrText);
     for ($i=0;$i<$jml_kata;$i++){
      if (stristr($teks,$stristrText[$i]))
        { 
          $hasil=$stristrText[$i]; 
        }
     }
      return $hasil;
     } else {
      return '';
     }
   }

   /*
   |--------------------------------------------------------------------------
   | Initializes dt 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
  public static function dt($Exp='',$Set=''){
     date_default_timezone_set(TIMEZONE);
     if (!empty($Exp)) {
        if ($Exp=='EN') {
            return date('Y/m/d');  
         } elseif ($Exp=='IN'){
           return date('d/m/Y');  
         }  else {
          return tatiyeNetDate::init($Exp);   
         }
     } else {
           return date('Y/m/d');  
     }
  }
   /* and class dt */
   /*
   |--------------------------------------------------------------------------
   | Initializes route 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function route($key){
    if (file_exists(APPROOT.'/views/'.self::tn(0).'/'.self::tn(1).'.html')) {
      return self::tn(0).'/'.self::tn(1);
    } else {
      return $key;
    }
   }
   /* and class route */
   /*
   |--------------------------------------------------------------------------
   | Initializes pecType 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function pecType($key=''){
         return 'html';
       
   }
   /* and class pecType */
   /*
   |--------------------------------------------------------------------------
   | Initializes routePackage 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function routePackage($key=''){
      $Text=tatiye::Text();
      $IDPAGE=explode(self::tn(0),$_GET['url']);
      $IDPAGE1=explode('_',$IDPAGE[1]);
      $type='html';
      // echo $Text->strreplace([$_GET['url'],'@','-']);;
      if (file_exists(self::dir('public/package/'.$IDPAGE1[0].'.'.$type))) {
        return self::dir('public/package/'.$IDPAGE1[0].'.'.$type);
      } else {
        return self::dir('public/package/'.$key.'.'.$type);
      }
   }
   /* and class routePackage */

   /*
   |--------------------------------------------------------------------------
   | Initializes routePanel 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function routePanel($key){
          $type='html';
          if (file_exists(self::dir('public/package/'.$key.'.'.$type))) {
             return self::dir('public/package/'.$key.'.'.$type);
              // code...
          } else {
            if (file_exists(self::dir('public/package/'.$key))) {
                // code...
             return self::dir('public/package/'.$key.'/default.'.$type);
            } else {
                // code...
             return self::dir('public/package/default.'.$type);
            }
          }
   }
   /* and class routePanel */

   /*
   |--------------------------------------------------------------------------
   | Initializes forbidden 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function setForbidden($setKey=''){
       if (!empty($setKey)) {
           $tn=$setKey;
       } else {
          $tn=self::tn(1);
       }
       $packageKey='';
       $rbac=Package::Public();
       foreach ($rbac as $key => $value) {
         if ($tn==$value[1]) {
            $packageKey=$packageKey.$key;
         }
       }
       if (!empty($_SESSION['user_id'])) {
            $uid=$_SESSION['user_id'];
            $row=tatiye::fetch("appuserpackage","packageid","packageid='".$packageKey."'  AND userid='".$uid."'");
           if (!empty($row['packageid'])) {
              return true;
           } else {
                if (self::tn(1)=='') {
                     return true;
                } else {
                   if ($_SESSION['user_id']==1) {
                      return true;
                   } else {
                      return false;
                   }   
                }
           }
       } else {
            return false;
            // code...
        
       }
   }
   /* and class forbidden */
    /*
    |--------------------------------------------------------------------------
    | Initializes Protokol 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Protokol(){
          return tatiyeNetProtokol::httpServer();
        
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes mobile 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function mobile(){
   // $setApp = file_get_contents(tatiye::expDir('public/theme/package.json'));
   //      $arr = json_decode($setApp, true);
   //      if (!empty($arr['mobile'])) {
        if (!empty(MOBILE)) {
           return 'mobile';
        } else {
           return 'theme';
        }
        
        
    }
    /* and class mobile */


   /*
   |--------------------------------------------------------------------------
   | Initializes statusUser 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function statusHeader(){
        if ($_SESSION['status']=='admin') {
            return self::expDir('public/dashboard/inc/header.html');
         } else {
            return self::expDir('public/dashboard/inc/client.html');
         }  
   }
   /* and class statusUser */
   /*
   |--------------------------------------------------------------------------
   | Initializes login 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function login(){
    return signin::init();
   }
   /* and class login */
   /*
   |--------------------------------------------------------------------------
   | Initializes title 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function registrasi(){
       return signup::init();
       
   }
   /* and class title */

      /*
   |--------------------------------------------------------------------------
   | Initializes title 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function profil(){
       return profil::init();
       
   }
   /* and class title */

   /*
   |--------------------------------------------------------------------------
   | Initializes Text 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
    public static function  Text(){
          return new Text();
     }

   /* and class Text */
    /*
    |--------------------------------------------------------------------------
    | Initializes tn 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function tn($key){
            @$ID=explode('/',$_GET['url']);
            if (!empty($ID[$key])) {
               return $ID[$key];
            } else {
               return '';
            }
    }
    /* and class tn */

    /*
    |--------------------------------------------------------------------------
    | Initializes fileType 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function  setfileType($file,$ekstensi='',$call=''){

             if ($file=='docx') {
                  $myIcon='https://img.freepik.com/free-icon/word_318-674258.jpg';
              } elseif ($ekstensi=='doc') {
                  $myIcon='https://img.freepik.com/free-icon/word_318-674258.jpg';
             
              } elseif ($ekstensi=='pdf') {
                   $myIcon='https://cdn-icons-png.flaticon.com/512/179/179483.png';
              } elseif ($ekstensi=='xlsx') {
                  $myIcon='https://img.freepik.com/free-icon/excel_318-566085.jpg';
              } elseif ($ekstensi=='pptx') {
                  $myIcon='https://img.freepik.com/free-icon/powerpoint_318-674249.jpg';
              } elseif ($ekstensi=='csv') {
                   $myIcon='https://img.freepik.com/free-icon/excel_318-566085.jpg';
              } elseif ($ekstensi=='odes') {
                   $myIcon='https://img.freepik.com/free-icon/excel_318-566085.jpg';
              } else {
                  $myIcon='https://cdn-icons-png.flaticon.com/512/179/179483.png';
              }
             return $myIcon;
        
    }
    /* and class fileType */

   /*
   |--------------------------------------------------------------------------
   | Initializes entri 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function entri(){
       if (@$this->tabel['tabel']) {
          if (tatiye::dbtabel()->cek_tabel($this->tabel['tabel'])) {
             return entri::init($this->tabel['tabel']); 
          } else {
             return self::index();
          }
       } else {
        return self::index();
       }
      
   }
   /* and class entri */
   /*
   |--------------------------------------------------------------------------
   | Initializes sqli 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function sqli($SELECT){
     $db = new tatiye();
     $mysqli=$db->mysqli();
     $sql =$SELECT;
     $result = $mysqli -> query($sql);
     return $result;
       
   }
   /* and class sqli */

   public  function select(){
       if (@$this->tabel['tabel']) {
          if (tatiye::dbtabel()->cek_tabel($this->tabel['tabel'])) {
             return setSelect::init($this->tabel['tabel']); 
          } else {
             return self::index();
          }
       } else {
        return self::index();
       }


   }
   /* and class entri */

   public  function rest(){
        $METHOD=$_SERVER['REQUEST_METHOD'];
        self::headerContent($METHOD);
    if ($_SERVER['REQUEST_METHOD'] ==$METHOD) {
            //error_reporting(0);
            $IDPEC=explode('/',$this->tabel['tabel']);
            if ($IDPEC[0]=='package') {
               $IDROUTE=explode('v1',$_GET['url']);
                require_once self::dir().'public'.$IDROUTE[1].'.php';
            } else {
               if (self::tn(1)=='v2') {
                  $row=tatiye::getWJT($this->tabel['tabel']);
                  $validasiToken=$row['dir']??=false;
                  if ($validasiToken) {
                     require_once self::dir('public/package/'.$row['dir']);
                  } else {
                     return self::index();
                  }


                } else {
                  require_once APPROOT.'/helpers/Rest/'.$this->tabel['tabel'].'.php';
                }   
            }
    } else {
         return self::index();
         
                // } elseif (self::tn(1)=='license'){
                //     echo "string";
                  
             

    }

   }

    /*
    |--------------------------------------------------------------------------
    | Initializes getWJT 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function getWJT($token){
             $GetID=tatiye::WJT($token); 
            return $GetID;
    }
    /* and class getWJT */


   /* and class entri */
    public static function URL($seg=''){
           if (!empty($seg)){
              $Exp="/".$seg;
           }else{
              $Exp="";
           }
           if (!empty($_SESSION['sub_domain'])) {
               return URLROOT.'/'.$_SESSION['sub_domain'].$Exp;
           } else {
               return URLROOT.$Exp;
           }
    }

    public static function LINK($seg=''){
           if (!empty($seg)){
              $Exp="/".$seg;
           }else{
              $Exp="";
           }
     
         return URLROOT.$Exp;
          
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes query 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 24 Mar 2022 11:18:48  WITA 
    */
    public  function query($sql,$version=''){
        if ($result = mysqli_query(self::connect(), $sql)) {
           return $result;
          mysqli_free_result($result);
        }
        self::connect()-> close();
    }
    /* and class query */



    /*
    |--------------------------------------------------------------------------
    | Initializes delete 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function delete($table,$where){
          $conn=Database::connectWriteDB();
          $query="DELETE FROM $table WHERE $where";
          $conn->exec($query);
          return false;
    }
    /* and class delete */
    public  function PDO() {
        $this->db=Database::connectWriteDB();
        return $this->db;
    }
    /* and class PDO */
 /*
 |--------------------------------------------------------------------------
 | Initializes validation 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2021
 | @Date  
 */
 public static function val($options,$H1='',$H2='',$H3='',$H4=''){
          $set= new tatiyeNetValidation();
          if (!empty($H2)) {
            return $set->$options($H1,$H2,$H3,$H4);
          } else {
            return $set->$options($H1,$H2,$H3,$H4);
          }
          
 }
 /* and class validation */
 /*
 |--------------------------------------------------------------------------
 | Initializes cekValidation 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2021
 | @Date  
 */
 public static function validation($validasi){
       foreach ($validasi as $key => $value) {
          if ($value=='valid') {
            $val['sukses'][$key] = $value; 
          } else {
            $val['error'][$key] = $value; 
          }
       }
  return $val;
 }
    /* and class cekValidation */
   /*
   |--------------------------------------------------------------------------
   | Initializes Firebase 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function Firebase($tabel){
         return Firebase::init($tabel);
       
   }
   /* and class Firebase */



   /*
    |--------------------------------------------------------------------------
    | Initializes query 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 24 Mar 2022 11:18:48  WITA 
    */
    public  function que($result){
          return db::init()->result($result);
    }
    /* and class query */
    /*
    |--------------------------------------------------------------------------
    | Initializes DBTabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  Sel 02 Mei 2023 01:42:28  WITA
    */
    public static function setPDO($tabel,$bin='*',$where='',$limit='LIMIT 100'){
        $conn=Database::connectWriteDB();;
        if (!empty($where)) {
            $IDWH=explode(' ',$where);
             if($IDWH[0] == 'JOIN') {
                $WH="$where";
             
              } elseif ($IDWH[0] == 'GROUP'){
                 $WH="$where";
             } else {
                $WH="WHERE $where";
             }
        } else {
            $WH='';
        }
        if (!empty($limit)) {
            $LMT='';
        } else {
            $LMT='LIMIT 50';
        }
        $query = "SELECT $bin FROM $tabel  $WH ";
        $stmt =$conn->prepare($query);
        $stmt->execute();
        return $stmt; 
    }
    /* and class DBTabel */
    public static function setPDO1($query){
        $conn=Database::connectWriteDB();;
        $stmt =$conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;

    }
   /*
   |--------------------------------------------------------------------------
   | Initializes BQ 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function QY($query){
        $conn=Database::connectWriteDB();
        $stmt =$conn->prepare($query);
        $stmt->execute();
        return $stmt;
   }
   /* and class BQ */
   public static function BQ($query){
        $conn=Database::connectWriteDB();
        $stmt =$conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         return $row;
   }
   /* and class BQ */
   public static function count($tabel){
         $stmt =self::setPDO1($tabel); 
         $row = $stmt->fetchAll(PDO::FETCH_CLASS);
         return $row;
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes rangeColor 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function rangeColor($bg,$for,$set){
//  color
// bgColor
// bdColor
// txColor
         $Exp=array();
         if($bg == 'bgColor') {
           $data=12;
         } elseif ($bg == 'bdColor'){
           $data=9;
         } elseif ($bg == 'txColor'){       
           $data=9;
         } else {
           $data=9;
         }

           $x =1;
           $i=0;
          while($x <= $for) {
                  $i=$i+1;
                for($j = 0; $j < $data; $j++){
                    $range[]=$j-1;
                }
            if($bg == 'bgColor') {
                $Exp[$x]=self::bgColor(abs($range[$i]));
              } elseif ($bg == 'bdColor'){
                $Exp[$x]=self::bdColor(abs($range[$i]));
              } elseif ($bg == 'txColor'){       
                $Exp[$x]=self::txColor(abs($range[$i]));
              } else {
                $Exp[$x]=self::color(abs($range[$i]));
              }
            $x++;
          }
        return $Exp[$set]; 
    }
    /* and class rangeColor */
    // '#f77eb9', '#7ebcff','#7ee5e5','#fdbd88'
    public static function color($key){
       $array=array( 
          '0'  =>'#f77eb9',
          '1'  =>'#7ebcff',
          '2'  =>'#7ee5e5',
          '3'  =>'#fdbd88',
          '4'  =>'#65e0e0',
          '5'  =>'#69b2f8',
          '6'  =>'#6fd39b',
          '7'  =>'#fdb16d',
          '8'  =>'#c693f9',
       ); 
          return $array[$key]; 
    }

      public static function bgColor($key){
       $array=array( 
              '0'  =>'bg-pink',
              '1'  =>'bg-primary',
              '2'  =>'bg-teal',
              '3'  =>'bg-success',
              '4'  =>'bg-warning',
              '5'  =>'bg-danger',
              '6'  =>'bg-info',
              '7'  =>'bg-dark',
              '8'  =>'bg-indigo',
              '9'  =>'bg-purple',
              '10' =>'bg-gray-900',
              '11' =>'bg-orange',
              '12' =>'bg-litecoin',
              '11' =>'bg-white'
       ); 
        return $array[$key]; 
    }

      public static function bdColor($key){
             $array=array( 
              '0'  =>'bd-pink',
              '1'  =>'bd-primary',
              '2'  =>'bd-teal',
              '3'  =>'bd-success',
              '4'  =>'bd-warning',
              '5'  =>'bd-danger',
              '6'  =>'bd-info',
              '7'  =>'bd-dark',
              '8'  =>'bd-indigo',
              '9'   =>'bd-purple',
              '10'  =>'bd-gray-900',
              '11'  =>'bd-white'
            );
        return $array[$key]; 
    }
      public static function txColor($key){
             $array=array( 
              '0'  =>'tx-pink',
              '1'  =>'tx-primary',
              '2'  =>'tx-teal',
              '3'  =>'tx-success',
              '4'  =>'tx-warning',
              '5'  =>'tx-danger',
              '6'  =>'tx-info',
              '7'  =>'tx-dark',
              '8'  =>'tx-indigo',
              '9' =>'tx-purple',
              '10'  =>'tx-gray-900',
              '11'  =>'tx-white'

            );
        return $array[$key]; 
    }
      public static function ticks($key){
       $array=array( 
          '1'  =>0,
          '2'  =>5,
          '3'  =>10,
          '4'  =>15,
          '5'  =>20,
          '6'  =>25,
          '7'  =>30,
          '8'  =>35,
          '9'  =>40,
          '10' =>45,
          '11' =>50,
          '12' =>55,  
       ); 
        return $array[$key]; 
  
    } 
      public static function df1($data,$row,$count=''){
          $Text=self::Text();
          $x=0;
          while($x <= 4) {
          $totalFd=round($data-$x/4*100,0);
         // $roundFd=round($totalFd/$count*100,0);
          $hasilFd=round($totalFd/$data*100,5);
          if (!empty($data)) {
            if ($hasilFd==100) {
                   $totalFd=round($data-1/4*100,0);
                   $hasilFd=round($totalFd/$data*100,5);
            $BIST=$hasilFd+1;
            } else {
                // code...
            $BIST=$hasilFd;
            }
            
          } else {
            $BIST=0;
          }
          
          $array1[$x]=array(
                  $row+$x.','.abs($BIST)
                 );
           $x++;
          }
         return $array1; 
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes chart 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
public static function chartTabel($tabel,$data,$where=''){
        $db=new tatiye();
        $Text=self::Text();
        $no=0;
        $str='';
        $TAHUN=tatiye::dt('Y');
        $Exp=array();
        if (!empty($where)) {
           $setWH=$where;
        } else {
           $setWH="tahun=$TAHUN";
        }
        
        $QUERY="SELECT $data AS label ,COUNT(*) AS data FROM $tabel WHERE $setWH GROUP BY $data;";
        $COUNT=tatiye::fetch($tabel," COUNT(*) as data");
        $result=$db->query($QUERY);
         while($row=$result->fetch_assoc()){
                 $no=$no+1; 
                 $str=$str.$row['label'].',';
                 $Exp[]=array(
                    'no'                =>$no,
                    'label'             =>$row['label'],
                    'data'              =>$Text->numberFormat([$row['data'],0]),
                    'charts'            =>$row['data'],
                    'progress'          =>round($row['data']/$COUNT['data'] * 100).'%',
                    'progress1'         =>round($row['data']/$COUNT['data'] * 100,1).'%',
                    'progress2'         =>round($row['data']/$COUNT['data'] * 100,2).'%',
                    'progress3'          =>round($row['data']/$COUNT['data'] * 100),
                    'progress4'          =>round($row['data']/$COUNT['data'] *80),
                    'color'             =>self::color($no-1),
                    'tx_color'          =>self::txColor($no-1),
                    'bg_color'          =>self::bgColor($no-1),
                    'bg_wp'             =>self::bgColor($no-1).' wd-'.round($row['data']/$COUNT['data'] * 100).'p',
                    'bd_wp'             =>self::bdColor($no-1).' wd-'.round($row['data']/$COUNT['data'] * 100).'p',
                    'description'       =>$Text->beCalculated([$row['data'],'']),
                    );
          };
          // $Exp[]=array('setLabel'=>$str); 
          return $Exp;    
}
public static function chart($tabel,$data){
        $db=new tatiye();
        $Text=self::Text();
        $no=0;
        $str='';
        $Exp=array();
         $TAHUN=tatiye::dt('Y');
        $QUERY="SELECT $data AS label ,COUNT(*) AS data FROM $tabel WHERE tahun=$TAHUN GROUP BY $data;";
        $COUNT=tatiye::fetch($tabel," COUNT(*) as data");
        $result=$db->query($QUERY);
         while($row=$result->fetch_assoc()){
                 $no=$no+1; 
                 $str=$str.$row['label'].',';
                 $Exp[]=array(
                    'no'                =>$no,
                    'label'             =>$row['label'],
                    'data'              =>$Text->numberFormat([$row['data'],0]),
                    'charts'            =>$row['data'],
                    'progress'          =>round($row['data']/$COUNT['data'] * 100).'%',
                    'progress1'         =>round($row['data']/$COUNT['data'] * 100,1).'%',
                    'progress2'         =>round($row['data']/$COUNT['data'] * 100,2).'%',
                    'progress3'          =>round($row['data']/$COUNT['data'] * 100),
                    'progress4'          =>round($row['data']/$COUNT['data'] *80),
                    'color'             =>self::color($no-1),
                    'tx_color'          =>self::txColor($no-1),
                    'bg_color'          =>self::bgColor($no-1),
                    'bg_wp'             =>self::bgColor($no-1).' wd-'.round($row['data']/$COUNT['data'] * 100).'p',
                    'bd_wp'             =>self::bdColor($no-1).' wd-'.round($row['data']/$COUNT['data'] * 100).'p',
                    'description'       =>$Text->beCalculated([$row['data'],'']),
                    );
          };
          // $Exp[]=array('setLabel'=>$str); 
          return $Exp;
        
    }
    /* and class chart */



    public static function chartMonthTabel($tabel,$data,$label='',$where=''){
        $Text=self::Text();
        $x = 1;
        $x2 = 1;
        $str='';
        $str2='';
        $products_arr=array();
    
        foreach ($label as $key => $row) {
         $str=$str. "'".$row['label']."',";
        }
        $str= substr($str, 0, -1);
        $TAHUN=tatiye::dt('Y');
        $COUNT=tatiye::fetch($tabel," COUNT(*) as data","$data IN($str) AND tahun=$TAHUN");
     
        while($x <= tatiye::dt('M')) {
              $BULAN=$Text->sprintf($x,"%02s");
              $QUERY="SELECT COUNT(*) AS data FROM hublang WHERE tahun ='$TAHUN' AND bulan ='$BULAN' AND $data IN($str) ";
              $row=tatiye::setPDO1($QUERY);
                   $Exp[]=array(
                      'en'               =>tatiye::monthEn($BULAN),
                      'data'             =>$row['data'],
                      'format'             =>$Text->numberFormat([$row['data'],0]),
                      'month'             =>tatiye::ticks($x),
                      'progress'         =>round($row['data']/2));
              $x++;
        }

          return $Exp;

        }
        public static function chartMonth($tabel,$data,$label=''){
        $Text=self::Text();
        $x = 1;
        $x2 = 1;
        $str='';
        $str2='';
        $products_arr=array();
    
        foreach ($label as $key => $row) {
         $str=$str. "'".$row['label']."',";
        }
        $str= substr($str, 0, -1);
        $TAHUN=tatiye::dt('Y');
        $COUNT=tatiye::fetch($tabel," COUNT(*) as data","$data IN($str) AND tahun=$TAHUN");
     
        while($x <= tatiye::dt('M')) {
              $BULAN=$Text->sprintf($x,"%02s");
              $QUERY="SELECT COUNT(*) AS data FROM hublang WHERE tahun ='$TAHUN' AND bulan ='$BULAN' AND $data IN($str) ";
              $row=tatiye::setPDO1($QUERY);
                   $Exp[]=array(
                      'en'               =>tatiye::monthEn($BULAN),
                      'data'             =>$row['data'],
                      'format'             =>$Text->numberFormat([$row['data'],0]),
                      'month'             =>tatiye::ticks($x),
                      'progress'         =>round($row['data']/2));
              $x++;
        }

          return $Exp;
        
    }
    /* and class chart */

   public static function fetch($tabel,$bin='*',$where='',$limit=''){
         $stmt =self::setPDO($tabel,$bin,$where,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         return $row;
    }
    public static function fetchKeys($tabel,$bin='*',$where='',$limit=''){
         $Exp=array();
         $stmt =self::setPDO($tabel,$bin,$where ,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         foreach (array_keys($row) as $key => $value) {
           if ($value !=='userid' 
            && $value !=='id' 
            && $value !=='row' 
            && $value !=='user_id' 
            && $value !=='date' 
            && $value !=='time' 
            && $value !=='bulan' 
            && $value !=='tahun' 
          ) {
             $Exp[]=$value;
           }
         }
         if (is_array($Exp)) {
            return $Exp; 
         } else {
            return ''; 
         }
    }
    public static function fetchKeys2($tabel,$bin='*',$where='',$limit=''){
         $Exp='';
         $stmt =self::setPDO($tabel,$bin,$where ,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         foreach (array_keys($row) as $key => $value) {
           if ($value !=='userid' 
            && $value !=='id' 
            && $value !=='row' 
            && $value !=='user_id' 
            && $value !=='date' 
            && $value !=='time' 
            && $value !=='bulan' 
            && $value !=='tahun' 
          ) {
             $Exp=$Exp.''.$value.',';
           }
         }
            $Exp =substr($Exp, 0, -1);
            return $Exp; 
      
    }
    public static function fetchArray($tabel,$bin='*',$where='',$limit=''){
         $Exp=array();
         $stmt =self::setPDO($tabel,$bin,$where ,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         $Exp=$row;
         return $Exp; 
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes SQLI 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function mysqli(){
         $args =self::myDb();
         $servername  = isset($args['host']) ? $args['host'] : 'localhost';
         $password    = isset($args['password']) ? $args['password'] : '';
         $dbname      = $args['database'];
         $username    = $args['username'];
         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         $this->db =$conn;
         if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
         return $this->db;
    }
    /* and class SQLI */

    /*
    |--------------------------------------------------------------------------
    | Initializes mycone 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 12 Mei 2022 10:15:26  WITA  
    */
    public static function connect(){
          $args =self::myDb();
         $servername  = isset($args['host']) ? $args['host'] : 'localhost';
         $password    = isset($args['password']) ? $args['password'] : '';
         $dbname      = $args['database'];
         $username    = $args['username'];
         // Create connection
         $mysqli = new mysqli($servername, $username, $password, $dbname);

      if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
      }
       return $mysqli;

        
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes dBmysql 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function dBmysql(){
       return  setdb::db();
        
    }
    /* and class dBmysql */

     public static function myDb(){
           return  setdb::db();
     }
    /*
    |--------------------------------------------------------------------------
    | Initializes CekTabel DB 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function dbtabel(){
            return tatiyeNetQueryForge::init(self::dBmysql()); 
     }
        
   
    /* and class CekTabel DB */

   /*
   |--------------------------------------------------------------------------
   | Initializes title 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function CONTENT_TYPE($YPE){
    if($YPE !== 'application/json') {
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->setSuccess(false);
        $response->addMessage("Content Type header not set to JSON");
        $response->send();
        exit;
    }

       
   }
   /* and class title */
   /*
   |--------------------------------------------------------------------------
   | Initializes appRoot 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function AppRoot($key){
         return $key;
       
   }
   /* and class appRoot */
    /*
  |--------------------------------------------------------------------------
  | Initializes eksfile 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  
  */
  public static function eksfile($Exp){
      return pathinfo($Exp, PATHINFO_EXTENSION);;
  }
  /* and class eksfile */
  /*
  |--------------------------------------------------------------------------
  | Initializes exkType 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function expDir($key){
    if (self::eksfile($key)) {
       return tatiye::dir($key);
    } else {
        return tatiye::dir( $key.'.html');
        // code...
    }
    
      
  }
  /* and class exkType */
  /*
  |--------------------------------------------------------------------------
  | Initializes dir 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function dir($key=''){
        $IDIR=explode('app',APPROOT);
        return $IDIR[0].''.$key;
      
  }
  /* and class dir */
  /*
  |--------------------------------------------------------------------------
  | Initializes images 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  
  */
  public static function images($seg,$resize=''){
           if (!empty($seg)){

             if(file_exists(tatiye::expDir("public/images/".$seg))){
                if (!empty($resize)) {
                   $Exp="/images/".$resize.'/'.$seg;
                } else {
                $Exp="/images/".$seg;
                }
              } else {
                $Exp="/images/anomous.png";
              }
           }else{
              $Exp="/images/anomous.png";
           }

           if (!empty($resize)) {
              return self::resizeImage($Exp);
           } else {
              return URLROOT.$Exp;
           }           

  }  


  public static function resizeImage($Exp){
          $expanReq = explode("/", $Exp);
          $file=$Exp;
          $type=tatiye::eksfile($file);
          $ID=explode('x',$Exp);
          $st          ='';
          $size        ='';
          $origenal    ='';
          $dir         ='';
          $saveToDir   ='';
          $set=count($expanReq)-1;
          foreach ($expanReq as $key => $value) {
                $Req=explode('x',$value);

               if ($ID[0] ==$Req[0] ) {
                  $str= $str.$value.'/'; 
                  $size=$size.true; 
               } else {
                  $str= $str.$value.'/'; 
                  $size=$size.false; 
               }
               if ($key !==0 ) {
                     $origenal= $origenal.$value.'/'; 
               }

               if ($key !==$set  ) {
                      $saveToDir= $saveToDir.$value.'/'; 
                }

          }
   
            $strType = substr($str, 0, -1);
            $origenal = substr($origenal, 0, -1);
            //$dir = substr($dir, 0, -1);
            $saveToDir = substr($saveToDir, 0, -1);
            if (!empty($size)) {
                 $IMGorigenal= 'public/images/'.$origenal;
                 $IMGdir      ='public/images/'.$strType;
                 $IMGsaveToDir='public/images/'.$saveToDir;
                 $file_exists=tatiye::dir($IMGsaveToDir);
                 $IDIR=tatiye::dir('public/'. $IMGdir);
                if (!file_exists($file_exists)) {
                    @mkdir($file_exists, 0777, true);
                }
                 return tatiyeNetImagesResize::init(
                 $IMGorigenal,
                 $type,
                 $expanReq[0],
                 $expanReq[$set])->resize($IMGdir,$IMGsaveToDir,$IMGorigenal);
            } else {
               return self::images($strType);
            }

  }
  /* and class images */
/*
|--------------------------------------------------------------------------
| Initializes imageTools 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function cropImage($Exp,$crop){
        return self::imageTools($Exp,'crop',$crop);
}

/*
|--------------------------------------------------------------------------
| Initializes blackWhiteImage 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function blackWhiteImage($Exp){
     return self::imageTools($Exp,'grayscaleImage');
    
}
/* and class blackWhiteImage */
/*
|--------------------------------------------------------------------------
| Initializes resizeHeight 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function resizeHeight($Exp,$Height){
     return self::imageTools($Exp,'resizeHeight',$Height);
    
}
/* and class resizeHeight */


/*
|--------------------------------------------------------------------------
| Initializes resizeWidth 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function resizeWidth($Exp,$width){
    return self::imageTools($Exp,'resizeWidth',$width);
    
}
/* and class resizeWidth */
/*
|--------------------------------------------------------------------------
| Initializes watermarkImage 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function watermarkImage($Exp,$watermar,$posisi=''){
          return self::imageTools($Exp,'watermar',$watermar,$posisi);
         // return tatiyeNetImagesResize::init()->watermar($Exp,$watermar);
    
}
/* and class watermarkImage */
/*
|--------------------------------------------------------------------------
| Initializes imageTools 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date 11/17/2023 11:31:44 PM  
*/
public static function imageTools($Exp,$init,$crop='',$posisi=''){
          $expanReq = explode("/", $Exp);
          $file=$Exp;
          $type=tatiye::eksfile($file);
          $ID=explode('x',$Exp);
          $st          ='';
          $size        ='';
          $origenal    ='';
          $dir         ='';
          $saveToDir   ='';
          $set=count($expanReq)-1;
          foreach ($expanReq as $key => $value) {
                $Req=explode('x',$value);

               if ($ID[0] ==$Req[0] ) {
                  $str= $str.$value.'/'; 
                  $size=$size.true; 
               } else {
                  $str= $str.$value.'/'; 
                  $size=$size.false; 
               }
               if ($key !==0 ) {
                     $origenal= $origenal.$value.'/'; 
               }

               if ($key !==$set  ) {
                      $saveToDir= $saveToDir.$value.'/'; 
                }

          }
   
            $strType = substr($str, 0, -1);
            $origenal = substr($origenal, 0, -1);
            //$dir = substr($dir, 0, -1);
            $saveToDir = substr($saveToDir, 0, -1);
            if (!empty($size)) {
                 $IMGorigenal= 'public/images/'.$origenal;
                 $IMGdir      ='public/images/'.$strType;
                 $IMGsaveToDir='public/images/'.$saveToDir;
                 $file_exists=tatiye::dir($IMGsaveToDir);
                 $IDIR=tatiye::dir('public/'. $IMGdir);
                if (!file_exists($file_exists)) {
                    @mkdir($file_exists, 0777, true);
                }
                 return tatiyeNetImagesResize::init(
                 $IMGorigenal,
                 $type,
                 $expanReq[0],
                 $expanReq[$set])->$init($IMGdir,$IMGsaveToDir,$IMGorigenal,$crop,$posisi);
            } else {
               return self::images($strType);
            } 
}
/* and class imageTools */
/* and class 
tn */
public static function filePathApp($dir,$Resize=''){
    $Text=tatiye::Text();
    $expDir=self::dir('app/'.$dir);
    $arryID = array();
    $path    = $expDir; //lokasi folder sekarang 
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..', 'Thumbs.db'));
    foreach($files as $nama_file){
         $ID=explode('.',$nama_file);
         if (!empty($ID[1])) {
            if ($ID[1] !=='svg' && $ID[1] !=='gif' && $ID[1] !=='png' && $ID[1] !=='PNG' && $ID[1] !=='html') {
               require_once __DIR__.'/direktory.php';
                 $arryID[]=array(
                  "file" =>$nama_file,
                  "dir" =>$expDir.'/'.$nama_file,
                  // "path" =>'public/'.$imagesSet1.$nama_file,
                  // "url" =>self::images($imagesSet.$nama_file),
                 );
          
            } 
         } 
    }
    return $arryID;
}


public static function filePath($dir,$Resize=''){
    $Text=tatiye::Text();
    $expDir=self::dir('public/'.$dir);
    $setDirFile=explode('/',$dir);
    if (!empty($setDirFile[1])) {
          $imagesSet=$Resize.$Text->strreplace([$dir,'images/','']);
          $imagesSet1='images/'.$Resize.$Text->strreplace([$dir,'images/','']);
    } else {
        
          $imagesSet=$Resize;
          $imagesSet1='images/'.$Resize;
        // code...
    }
   
    $arryID = array();
    $arryID2= array();
    $path    = $expDir; //lokasi folder sekarang 
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..', 'Thumbs.db'));
    foreach($files as $nama_file){
         $ID=explode('.',$nama_file);
         if (!empty($ID[1])) {
            if ($ID[1] !=='svg' && $ID[1] !=='gif' && $ID[1] !=='png' && $ID[1] !=='PNG') {
                // Resize
                 $arryID[]=array(
                  "file" =>$nama_file,
                  "dir" =>$dir,
                  "path" =>'public/'.$imagesSet1.$nama_file,
                  "url" =>self::images($imagesSet.$nama_file),
                 );
          
            } else {
                 $arryID2[]=array(
                  "file" =>$nama_file,
                  "dir" =>$dir,
                  "path" =>'public/'.$dir.'/'.$nama_file,
                  "url" =>self::LINK($dir.'/'.$nama_file),
                 );
            }
         } 
    }
    return array_merge($arryID,$arryID2);
}





public static function resizefiledir($dir,$Resize='200x200/'){
    self::headerContent('GET');
    $Text=tatiye::Text();
    $expDir=self::dir('public/'.$dir);
    $setDirFile=explode('/',$dir);
 
  
   
    if (!empty($setDirFile[1])) {
          $imagesSet=$Resize.$Text->strreplace([$dir,'images/','']);
          $imagesSet1='images/'.$Resize.$Text->strreplace([$dir,'images/','']);
    } else {
          $imagesSet=$Resize;
          $imagesSet1='images/'.$Resize;
    }
   
    $arryID = array();
    $arryID2= array();
    $path    = $expDir; //lokasi folder sekarang 
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..', 'Thumbs.db'));
    foreach($files as $nama_file){
         $ID=explode('.',$nama_file);
         if (!empty($ID[1])) {
            if ($ID[1] !=='svg' && $ID[1] !=='gif' && $ID[1] !=='png' && $ID[1] !=='PNG') {
                // Resize
                 $arryID[]=array(
                  "file" =>$nama_file,
                  "dir" =>$dir,
                  "path" =>'public/'.$imagesSet1.$nama_file,
                  "url" =>self::resizeImage($imagesSet.$nama_file),
                 );
          
            } 
         } 


    }
     echo json_encode(array_merge($arryID,$arryID2));

}
public static function filedir($dir,$Resize='200x200/'){
    self::headerContent('GET');
    $Text=tatiye::Text();
    $expDir=self::dir('public/'.$dir);
    $setDirFile=explode('/',$dir);
 
  
   
    if (!empty($setDirFile[1])) {
          $imagesSet=$Resize.$Text->strreplace([$dir,'images/','']);
          $imagesSet1='images/'.$Resize.$Text->strreplace([$dir,'images/','']);
    } else {
          $imagesSet=$Resize;
          $imagesSet1='images/'.$Resize;
    }
   
    $arryID = array();
    $arryID2= array();
    $path    = $expDir; //lokasi folder sekarang 
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..', 'Thumbs.db'));
    foreach($files as $nama_file){
         $ID=explode('.',$nama_file);
         if (!empty($ID[1])) {
            if ($ID[1] !=='svg' && $ID[1] !=='gif' && $ID[1] !=='png' && $ID[1] !=='PNG') {
                // Resize
                 $arryID[]=array(
                  "file" =>$nama_file,
                  "dir" =>$dir,
                  "path" =>'public/'.$imagesSet1.$nama_file,
                  "url" =>self::images($imagesSet.$nama_file),
                 );
          
            } else {
                 $arryID2[]=array(
                  "file" =>$nama_file,
                  "dir" =>$dir,
                  "path" =>'public/'.$dir.'/'.$nama_file,
                  "url" =>self::LINK($dir.'/'.$nama_file),
                 );
            }
         } 


    }
     echo json_encode(array_merge($arryID,$arryID2));  

}

/*
|--------------------------------------------------------------------------
| Initializes headerContent 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function headerContent($key){
        error_reporting(0);
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: ".$key);
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
}
/* and class headerApi */
    /*
  |--------------------------------------------------------------------------
  | Initializes $_COOKIE 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date Jum 18 Mar 2022 12:11:15  WITA  
  */
  public static function cookie($options){
    if (!empty($_COOKIE[$options])) {
        return $_COOKIE[$options];
    } else {
        return '';
    }
    
       
      // return ;
  }
  /* and class $_COOKIE */
    /*
  |--------------------------------------------------------------------------
  | Initializes cookieRead 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date Min 20 Mar 2022 08:13:40  WITA 
  */
  public static function cookieRead($key,$value){
        return cookie::Read($key,$value);
      
  }
  /* and class cookieRead */
  /*
  |--------------------------------------------------------------------------
  | Initializes cookieliats 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function cookieList(){
        return cookie::Select();
      
  }
  /* and class cookieliats */
  /*
  |--------------------------------------------------------------------------
  | Initializes cookieUnset 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function cookieUnset($key){
        return  Cookie::Unset($key);
      
  }
  /* and class cookieUnset */
  /*
  |--------------------------------------------------------------------------
  | Initializes apphistory 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function apphistory($row){
    if (!empty($row['autoload'])) {
      $dbhistory=new tatiye();
      $history = array(                                                                  
       "nama"         =>$row['title'],                                                    
       "deskripsi"    =>$row['description'],                                                    
       "categori"     =>$row['categori'],                                                    
       "keyid"        =>$row['PrimaryKey'],                                                    
       "package"      =>$row['package'],                                                    
       "nmtabel"      =>$row['tabel'],                                                    
       "userid"       =>$_SESSION['user_id'],                                                
       "time"         =>self::tm(),                                                    
       "date"         =>self::dt("EN"), 
       "bulan"        =>self::dt("M"),                                            
       "tahun"        =>self::dt("Y"),                                                   
      ); 
        $dbhistory->que($history)->insert("apphistory");                                                                      
      } 
      // return var_dump($history);                                                                              
  }
  /* and class apphistory */
  /*
  |--------------------------------------------------------------------------
  | Initializes title 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function resizeTabelImage($width,$filename){
        $Text=self::Text();
        if(file_exists(tatiye::expDir("public/".$filename))){
            return tatiye::resizeImage($Text->strreplace([$filename,'images',$width]));
        } else {
            return self::LINK("images/anomous.png");
        }
  }
  /* and class title */
  /*
  |--------------------------------------------------------------------------
  | Initializes img 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function fileimg($key,$doc=''){
        $Text=self::Text();
        $IMGS= tatiye::fetch('appfile','filename',"keyid='".$key[0]."' AND nmtabel='".$key[1]."' AND categori='images' ORDER BY ascId");
       
    if(file_exists(tatiye::expDir("public/".$IMGS['filename']))){
              if (!empty($key[2])) {
                    return self::LINK('images/'.$Text->strreplace([$IMGS['filename'],'images',$key[2]]));
                } else {
                   return self::LINK($IMGS['filename']);
                }
        } else {
            return self::LINK("images/anomous.png");
        }  
      
  }
  /* and class img */

  /*
  |--------------------------------------------------------------------------
  | Initializes thumbnail 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function thumbnail($key,$doc='images'){
        $Text=self::Text();

     $number=0;
     $thum =tatiye::sqli("SELECT filename FROM appfile WHERE keyid='".$key[0]."'  AND nmtabel='".$key[1]."' AND categori='".$doc."' ");
     while ($item = $thum->fetch_array()) {  
             $number=$number+1;
             $Exp["thumbnail$number"]=self::LINK('images/'.$Text->strreplace([$item['filename'],'images',$key[2]]));
    } 
    return $Exp;
      
  }
  /* and class thumbnail */
  /*
  |--------------------------------------------------------------------------
  | Initializes crawler 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function crawler($url, $specificTags=0 ){
    $doc = new DOMDocument();
    @$doc->loadHTML(file_get_contents($url));
    $res['title'] = $doc->getElementsByTagName('title')->item(0)->nodeValue;

    foreach ($doc->getElementsByTagName('meta') as $m){
        $tag = $m->getAttribute('name') ?: $m->getAttribute('property');
        if(in_array($tag,['description','keywords']) || strpos($tag,'og:')===0) $res[str_replace('og:','',$tag)] = $m->getAttribute('content');
    }
    return $specificTags? array_intersect_key( $res, array_flip($specificTags) ) : $res;
      
  }
  /* and class crawler */
   /* and class title */
}