<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2018-2021 wolf05 <info@tatiye.net / https://www.facebook.com/tatiyeNet/>.
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
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
  namespace wolf05\helper;
  use PDO;
  use Exception;
  use PDOException;
  use mysqli;
  use Pusher\Pusher;
  use MongoDB\Client;
  // use wolf05\template\theme\models\Controller;
  use wolf05\controller\database;
  use wolf05\controller\helper;
  use wolf05\template\theme\models\Keywords;
  use wolf05\template\dashboard\models\Controller as Dashboard;
  use wolf05\template\webview\models\Controller as Webview;
  use wolf05\system\tatiyeNetInit;
  use wolf05\system\tatiyeNetCore;
  use wolf05\system\tatiyeNetHead;
  use wolf05\system\tatiyeNetRequest;
  use wolf05\helper\Datetime\tatiyeNetDateTime;
  use wolf05\helper\Datetime\tatiyeNetTime;
  use wolf05\helper\Datetime\tatiyeNetDate;
  use wolf05\helper\Cache\tatiyeNetCache;
  use wolf05\helper\Validation\tatiyeNetValidation;
  use wolf05\helper\Database\NetDb\tatiyeNetDb;
  use wolf05\helper\Security\tatiyeNetConsul as Security;
  use wolf05\helper\Security\tatiyeNeCsrf as CSRF;
  use wolf05\helper\Text\tatiyeNetText as Text;
  use wolf05\helper\Images\tatiyeNetImages as igimg;
  use wolf05\helper\Cookie\tatiyeNetCookie as cookie;
  use wolf05\helper\Router\tatiyeNetRouter as Router;
  use wolf05\helper\Session\tatiyeNetSession as Session;
  use wolf05\helper\ToArray\tatiyeNetToArray;
  use wolf05\helper\Debug\tatiyeNetDebug as Debug;
  use wolf05\helper\Assets\tatiyeNetAssets as property;
  use wolf05\helper\Assets\tatiyeNetTheme as theme;
  use wolf05\helper\Assets\tatiyeNetMobile as mobile;

  use wolf05\helper\Images\tatiyeNetImages;
  use wolf05\helper\Log\tatiyeNetLog as log;
  use wolf05\helper\Database\tatiyeNetInit as db;
  use wolf05\helper\Database\tatiyeNetQuery ;
  use wolf05\helper\Database\tatiyeNetQueryForge;
  use wolf05\helper\Raw\tatiyeNetTabelRaw ;
  use wolf05\helper\Raw\tatiyeNetRawset;
  use wolf05\helper\Raw\tatiyeNetRawHeader;
  use wolf05\helper\Encryption\tatiyeNetEdcode as Encryption;
  use wolf05\helper\Json\tatiyeNetWjt as Wjt;
  use wolf05\helper\Curl\tatiyeNetCurl ;
  use wolf05\helper\Tables\tatiyeNetSocket as Tables;
  use wolf05\helper\Database\Mongodb\tatiyeNetMongo as mongo;
  use wolf05\helper\Package\tatiyeNetPackage;
  use wolf05\helper\Package\tatiyeNetRbac;
  use wolf05\helper\Assets\Controller\kodewilayah;


  use wolf05\helper\Validation\tatiyeNetCaptcha as Captcha;
  use wolf05\system\tatiyeNetProtokol;
  // VENDOR
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Reader\Xls;
  use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
  use PhpOffice\PhpSpreadsheet\Reader\Csv;


  use Doctrine\SqlFormatter\SqlFormatter;
  use wolf05\helper\Tocr\TesseractOCR;
  use wolf05\helper\Nik\tatiyeNetNik as nik;
  use wolf05\helper\Facedetector\tatiyeNetFaceDetector as Facedetector;
  use wolf05\helper\Gps\tatiyeNetGps as GPS;
  use wolf05\helper\Database\SQLite\tatiyeNetSQLite3 AS SQLite;
  use wolf05\helper\Database\Postgre\tatiyeNetPostgre AS Postgre;
  use wolf05\helper\Database\tatiyeNetConn;
  use wolf05\helper\Python\tatiyeNetPython as Python;
  use wolf05\helper\Cache\tatiyeNetPhpfastcache;
  use wolf05\helper\Java\tatiyeNetJava;
  
  use wolf05\helper\Download\tatiyeNetDownload as Download;
  use wolf05\helper\Zip\tatiyeNetZip;
  use wolf05\helper\Raw\tatiyeNetAsciiTable as AsciiTable;
  use wolf05\helper\Chart\tatiyeNetChart as Chart;

  use wolf05\helper\Assets\color AS myColor;


  use wolf05\helper\Query\query;
  use wolf05\helper\Query\QueryException;
  use wolf05\helper\Query\builder;
  use wolf05\helper\Query\dataTables;
  use wolf05\helper\Query\intersect;


use wolf05\helper\Services\tatiyeNetServices AS Services;
use wolf05\helper\Images\tatiyeNetImagesTools;
use wolf05\helper\Images\tatiyeNetAssetImg;
use wolf05\helper\Images\tatiyeNetImagesResize;

// Herper Work
use wolf05\helper\Work\tatiyeNetIAMuser;
use wolf05\helper\Rest\Firebase\netFirebase AS Firebase;

/**
 * Generates an HTML block tag that follows the Bootstrap documentation
 * on how to display  component.
 *
 * See {@link https://tatiye.net/} for more information.
 */
class tatiyeNet   {
    protected static $instance; 
    private $key;
    private $Instance;
    private $options;
    protected $db;
    public $conn;
    private $myquery;
    private $data = array();




    public function __construct($key='',$Instance='',$options='') {
           $this->key          =$key;
           $this->Instance     =$Instance;
    }


    public static function init($key='',$file='',$route=''){
         if ( !isset(self::$instance) ) 
         {
             $class = __CLASS__;
             self::$instance = new $class();

         }
      return self::$instance;
  }

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
  | Initializes iconArsip 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function iconArchive($key){
       if($key == 'Tandai') {
         $Icons='<i class="feat feat-tag"></i>';
       } elseif ($key == 'Ingatkan'){
         $Icons='<i class="feat feat-clock"></i>';
       } elseif ($key == 'Penting'){
         $Icons='<i class="feat feat-star"></i>';
       } elseif ($key == 'Spam'){
         $Icons='<i class="feat feat-slash"></i>';
       } else {
         $Icons='<i class="feat feat-archive"></i>';
       } 
       return $Icons;
      
  }
  /* and class iconArsip */

    /*
    |--------------------------------------------------------------------------
    | Initializes kodeExploide tn 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function kodeExplode($set,$key){
          $setKode=explode('|',$key);
          return $setKode[$set];
    }
    /* and class kodeExploide */
    /*
    |--------------------------------------------------------------------------
    | Initializes fileType 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function  setfileType($file){
             $Text=self::Text();
             $ekstensi=$Text->ekstensi($file);
             if ($ekstensi=='docx') {
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
                  $myIcon=$file;
              }
             return $myIcon;
        
    }
    /* and class fileType */
    /*
    |--------------------------------------------------------------------------
    | Initializes key_tabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */

    public static function key_tabel($keytabel){
     $row=tatiyeNet::getWJT($keytabel);
     $ID=explode('-',$row['key']);
     if (!empty($ID[2])) {
        $Status='Bulder';
     } else {
      if ($ID[0]=='Tabel') {
          $Status='Tabel';
      } else {
          $Status='Query';
      }
     }
    if ($ID[0]=='Tabel') {
       $head=tatiyeNet::Qb('query')->mytabel($row['tabel'])->fetch_array(); 
    } else {
       $head=tatiyeNet::Qb('query')->pqdb_id($ID[0])->fetch_array(); 
    }

    $array_keys=array_keys($head);
    foreach ($array_keys as $key => $value) {
      $array_set[$key]=$value;
    }

    $array1=array('status' =>$Status);
    $array2=array('array_keys' =>$array_set);
    $json_arr=array_merge($row,$array1,$array2);
     return json_encode($json_arr);
        
    }
    /* and class key_tabel */

    /*
    |--------------------------------------------------------------------------
    | Initializes setQuery 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function setQuery($keyQuery,$setWhwre=''){
     $row= self::getControllerRoute($keyQuery);
     // $set=tatiyeNet::getWJT($row['myToken']);
      $ID=explode('-',$row['tabelId']);
     if (!empty($row['bqId'])) {
            $query=tatiyeNet::Qb('query')->pqdb_id($row['tabelId'])->SQL($setWhwre);
             $AZ=$row['azId'];
     } else {
          if ($ID[0]=='Tabel') {
             $query=tatiyeNet::Qb('query')->mytabel($row['tabel'])->SQL($setWhwre);
             $AZ='id';
          } else {
              $query=tatiyeNet::Qb('query')->pqdb_id($row['tabelId'])->SQL($setWhwre);
              $AZ=$row['azId'];
          }
     }
     // return [
     //  'az' =>$AZ,
     //  'query' =>$query,
     // ];
     return $query;
    }
    /* and class setQuery */

    /*
    |--------------------------------------------------------------------------
    | Initializes getControllerRoute 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function getControllerRoute($key){
       $data=tatiyeNet::MyTabelFetch('app_route','*',"uid='".$key."'");
       return $data;
        
    }
    /* and class getControllerRoute */
    /*
    |--------------------------------------------------------------------------
    | Initializes RemoveDuplicat 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function redDuplicat($tabel,$nama_file,$file){
                  // REMOVE DUPLICATE 
              $db=new tatiyeNet(); 
              $conn=$db->PDO();
              $stmt = $conn->query("SELECT id,$nama_file, COUNT($nama_file) AS SUM FROM $tabel GROUP BY $nama_file HAVING COUNT($nama_file) > 1");
              while ($row = $stmt->fetch()) {
                  $db->delete($tabel,"id !='".$row['id']."' AND $nama_file ='".$file."' AND user_id='".tatiyeNet::uidkey()."'");
              }  


    }
    /* and class RemoveDuplicat  SELECT id,upload, COUNT(upload) AS SUM FROM demo GROUP BY upload HAVING COUNT(upload) > 1*/


   /*
   |--------------------------------------------------------------------------
   | Initializes for Javascrip
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */


    /*
    |--------------------------------------------------------------------------
    | Initializes mobile 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function mobile(){
        if (!empty(helper::config('mobile'))) {
            return 'mobile';
        } else {
            return 'theme';
        }
    }
    /* and class mobile */
    /*
    |--------------------------------------------------------------------------
    | Initializes Query 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function intersect($key=''){
        return Intersect::init($key);
    }
    /* and class Query */
    /*
    |--------------------------------------------------------------------------
    | Initializes helper 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function helperAssets($key){
   
            echo self::setExplodeAsset($key);
            echo "<br>";
          //return tatiyeNet::etcFile('helper/'.self::setExplodeAsset($key));
          //return tatiyeNet::etcFile('helper/'.$key);
        
    }
    /* and class helper */
    /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  6/17/2023 10:17:39 AM
    */
    public static function setExplodeAsset($key){
       $dir=self::setExplode($key,0,3);
       $file=self::setExplode($key,0,6);
       return $dir.''.self::eksfile($dir).''.self::setExplode($key,0,4).''.self::setExplode($key,0,5).''.$file;
        
    }
    /* and class title */

 /*
 |--------------------------------------------------------------------------
 | Initializes setExplode 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  6/17/2023 10:17:41 AM
 */
  public static function endExplode($explode,$key1,$key2){
          $expanReq = explode("/", $explode);
          $segmen=count($expanReq)-1;
            $str = $expanReq[0]."/View/";
            foreach ($expanReq as $row => $value) {
                if ($row !==0) {
                     $str = $str.$value."/";
                } 

            }


    
     $str = substr($str, 0, -1);
     return $str; 
 }
 /* and class setExplode */
 public static function setExplode($explode,$key1,$key2){
          $expanReq = explode("/", $explode);
          $segmen=count($expanReq)-1;
          $Req=$key2-1;
          if (!empty($Req)) {
             $endif=$expanReq[$Req];
          } else {
             $endif='';
          }
          
    

    $str = "";
    foreach ($expanReq as $key => $value) {
        if ($key < $key1) {
             $str = $str . $value."/";
        } 

    }


    
     $str = substr($str, 0, -1);
     return $str.'/'.$endif; 
 }
 /* and class setExplode */

    /*
    |--------------------------------------------------------------------------
    | Initializes content 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function account($inside){
        // $row=self::kodewilayah(tatiyeNet::OAuthId('kode'));
        $Text=tatiyeNet::Text();
        $row= self::MyTabelFetch('members','*',"id='".tatiyeNet::uidkey()."'");
        $history= self::MyTabelFetch('story','COUNT(*) AS total',"uid='".tatiyeNet::uidkey()."'");
        $login=   self::MyTabelFetch('story','COUNT(*) AS total',"uid='".tatiyeNet::uidkey()."' AND Segment='login'");
        $Setting= self::MyTabelFetch('story','COUNT(*) AS total',"uid='".tatiyeNet::uidkey()."' AND Segment='Setting'");
        $package= self::MyTabelFetch('rbac' ,'COUNT(*) AS total',"user_id='".tatiyeNet::uidkey()."'");
        //$name=$row['FirstName'].' '.$row['last_name']?$row['FirstName'].' '.$row['last_name']:'',
        if (!empty($row['FirstName'])) {
            $myName=$row['FirstName'].' '.$row['last_name'];
            $hp=$row['ContactNo'];
        } else {
            $myName='';
            $hp='';
        }
        
        $keywords = array(
              'uid'      =>tatiyeNet::Encryption(tatiyeNet::uidkey()),
              'avatar'   =>self::cookie('avatar'),
              'name'     =>$myName,
              'email'    =>self::cookie('email'), 
              'domain'   =>self::cookie('account'), 
              'hp'       =>$hp, 
              'history'  =>$history['total']?$history['total']:'',
              'package'  =>$package['total']?$package['total']:'',
              'login'    =>$login['total']  ?$login['total']:'',  
              'setting'  =>$Setting['total']?$Setting['total']:'',  
        );
             return $keywords[$inside];      
    }
    /* and class content */


    public static function OAuth($Token){
            $Text=tatiyeNet::Text();
            $row=tatiyeNet::MyTabelFetch('members','*',"id='".tatiyeNet::WJT($Token,'key')."'");
             $PIC=explode('@',$row['UserName']);
             $userData=array(
             'uid'         =>$row['id'],
             'token'       =>$Token,
             'status'      =>$row['Status_ID'],
             'pws'         =>$row['Password'],
             'md5'         =>$row['md5'],
             'name'        =>$row['FirstName'],
             'name_pic'    =>$Text->strreplace([$row['FirstName'].' '.$row['last_name'],' ','_']),
             'email'       =>$row['UserName'],
             'date'        =>$row['modified'],
             'kd_prov'     =>$row['Provinsi'],
             'kd_kab'      =>$row['Kabupaten'],
             'kd_kec'      =>$row['Kecamatan'],
             'kode'        =>$row['education'],
             'row'         =>1,
             'picture'     =>'drive/user/'.$row['picture'],
             );

        return $userData; 
    }

    
        public static function OAuthId($key,$package='Package'){
            // error_reporting(0);
            // $db=new tatiyeNet();
            // $query="SELECT * FROM members WHERE id='".self::uidkey()."' ";
            // $result=$db->query($query);
            // $row = $result->fetch_array(MYSQLI_ASSOC);
            // $pac=$db->select("rbac WHERE user_id='".$row['id']."'AND rbac_id NOT IN('1')")->sum("SUM(row) as total");
            // $rowkd=tatiyeNet::MyTabelFetch('wilayah','*',"kode='".$row['Desa']."'");
            // $PIC=explode('@',$row['UserName']);
            // $array=array(
            //     'uid'         =>$row['id'],
            //     'kode'        =>$row['education'],
            //     'myname'      =>$row['FirstName'].' '.$row['last_name'],
            //     'name'        =>$row['FirstName'],
            //     'bname'       =>$row['last_name'],
            //     'email'       =>$row['UserName'],
            //     'status'      =>$row['Status_ID'],
            //     'latitude'    =>$row['map'],
            //     'kontak'      =>$row['ContactNo'],
            //     'pic'         =>$PIC[0],
            //     'date'        =>$row['Datebirth'],
            //     'Provinsi'    =>$row['Provinsi'],
            //     'Kabupaten'        =>$row['Kabupaten'],
            //     'Kecamatan'   =>$row['Kecamatan'],
            //     'Desa'     =>$row['Desa'],
            //     'provinsi'    =>$rowkd['nm_prov'], 
            //     'kabupaten'   =>$rowkd['nm_kab'],
            //     'kecamatan'   =>$rowkd['nm_kec'],
            //     'desa'        =>$rowkd['nama'], 
            //     'package'     =>$pac['total']?$pac['total']:'0',
            //     'lokasi'      =>$rowkd['nm_prov'].',Kab '.$rowkd['nm_kab'].' Kec '.$rowkd['nm_kec'].' Desa '.$rowkd['nama'], 
            //     'domain'      =>tatiyeNet::URL($PIC[0]),
            //     'picture'     =>tatiyeNet::img('80x80/user/'.$row['picture']),
            //     'imgsmall'    =>tatiyeNet::img('30x30/user/'.$row['picture']),
            //     'oauthLogin'  =>$row['oauth_login'], 
            //     'encode64'    =>self::encode64($row['id']), 

            // );
           
            return $array[$key];
        
    }
    /* and class uid */
    /*
    |--------------------------------------------------------------------------
    | Initializes e64 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function encode64($encode){
        $encode= base64_encode($encode);
            $ID=explode('=',$encode);
        return $ID[0];
        
    }
    /* and class e64 */
    /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function decode64($encode){ 
         $decode= base64_decode($encode);
          return $decode;
        
    }
    /* and class title */
    /*
    |--------------------------------------------------------------------------
    | Initializes qrLogin 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function qrLogin($key=''){
        if (!empty($key)) {
            $Code=$key.'/'.tatiyeNet::tm();
        } else {
            $Code=tatiyeNet::ipAddr().'/'.tatiyeNet::tm();
        }
        
          $Token=tatiyeNet::WJT([
              'qrcode'   => $Code, 
          ]);

          return $Token;
        
    }
    /* and class qrLogin */
    /*
    |--------------------------------------------------------------------------
    | Initializes IM 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function IAMuser($key){
      $history= self::MyTabelFetch('story','COUNT(*) AS total',"uid='".tatiyeNet::uidkey()."'");
      $login=   self::MyTabelFetch('story','COUNT(*) AS total',"uid='".tatiyeNet::uidkey()."' AND Segment='login'");
      $Setting= self::MyTabelFetch('story','COUNT(*) AS total',"uid='".tatiyeNet::uidkey()."' AND Segment='Setting'");
      $package= self::MyTabelFetch('rbac','COUNT(*) AS total',"user_id='".tatiyeNet::uidkey()."'");
      $product_item=array(                                  
      'avatar'   =>self::OAuthId('picture'),
      'nama'     =>self::OAuthId('myname'),
      'email'    =>self::OAuthId('email'),  
      'history'  =>$history['total']|0,
      'package'  =>$package['total']|0,
      'login'    =>$login['total']|0,  
      'setting'  =>$Setting['total']|0,  
     );
     // array_push($products_arr[], $product_item); IAMuser
      return $product_item[$key];

     // echo json_encode($product_item);

        
    }
    /* and class IM */

    /*
    |--------------------------------------------------------------------------
    | Initializes getBrowser 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
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
            'userAgent' => $u_agent,
            'name'      => $bname,
            'browser'   => $ub,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'   => $pattern
         );
      return $return[$keyBrowser];
    }
    /* and class getBrowser */
   /*
   |--------------------------------------------------------------------------
   | Initializes deflection 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function deflection(){        
     if (self::getBrowser('browser')=='Chrome') {
         $st=0;
     } else {
         $st=1;
     }
     if (!empty($st)) {
        header('Location:'.tatiyeNet::URL('browser'));
     } 
         // return self::getBrowser('browser');
   }
   /* and class deflection */

    /* and class Chart */
       public static function region($expo){
        //$kode=tatiyeNet::kodewilayah($data);
           // $Text=tatiyeNet::Text();
           $K=strlen($expo);
           if($K == 2) {
             $L=2;
             $C=5;
           } elseif ($K == 5){
             $L=5;
             $C=8;
           } else {
             $L=12;
             $C=13;
           }
           if ($C==13) {
               $row=tatiyeNet::MyTabelFetch('wilayah','*',"kode='".$expo."'");
           } else {
               $row=tatiyeNet::MyTabelFetch('wilayah','*',"LEFT(kode,".$L.")='".$expo."' AND CHAR_LENGTH(kode)=".$C." ORDER BY nama","");
           }
           
         //$BitQ = tatiyeNet::Qb('wilayah')->tabel()->SQLI("LEFT(kode,".$L.")='".$expo."' AND CHAR_LENGTH(kode)=".$C." ORDER BY nama",""); 
         //while($row = $BitQ->fetch_assoc()){
         // $kode=self::kodewilayah($row['kode']);
         // $Exp[]=array(
         //    'kode'               =>$row['kode'],
         //    'nama'               =>$Text->strtoupper($row['nama']),
         //    );
         // }
         
         return $row['nama'];

        // return self::$instance;
   }
   /* and class version */

  

    /*
    |--------------------------------------------------------------------------
    | Initializes generate_license_key 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function generate_license_key(){
       $tokens=tatiyeNet::WJT([
           //'id'   => tatiyeNet::st('+1 days',tatiyeNet::dt()), 
           //'id'   => tatiyeNet::st('+1 month',tatiyeNet::dt()), 
           'id'   => tatiyeNet::st('+1 year',tatiyeNet::dt()), 
       ]);
       return  strrev($tokens);
    }
    /* and class generate_license_key */
    /*
    |--------------------------------------------------------------------------
    | Initializes license_key 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */

    public static function license_key(){
    $licenci=strrev(helper::config('license_key')); 
        if (!empty($licenci)) {
            $row=tatiyeNet::getWJT($licenci);
            //if ($row['id'] > '2022/10/30') {
            if ($row['id'] > tatiyeNet::dt()) {
              $status= true;
            } else {
              $status= 0;
            }
              if ($row['uid']== $status) {
                 if (!empty($status)) {
                    return '';
                 } else {
                    header('Location:'.tatiyeNet::URL('config'));
                 }
                 
             } else {
                header('Location:'.tatiyeNet::URL('license/'.helper::config('license_key')));
             }
        } else {
            header('Location:'.tatiyeNet::URL('config'));
        }
    }
    /* and class license_key */
    /*
    |--------------------------------------------------------------------------
    | Initializes visits 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function visits($ip=''){
         $db = new tatiyeNet();
        if (!empty(tatiyeNet::cookie('visits'))) {
           $query="SELECT uid,date FROM visitor WHERE uid='".tatiyeNet::cookie('visits')."' AND date='".tatiyeNet::dt()."'";
           $result=$db->query($query);
           $row = $result->fetch_array(MYSQLI_ASSOC);   
           if (!empty($row['uid'])) {
                $data = array(                                         
                  'ip_address'              =>$ip,           
                );
                $result=$db->que($data)->update("visitor","uid ='".$row['uid']."'");
              return $row['uid'];
            } else {
                $data = array(                                         
                  'uid'              =>tatiyeNet::cookie('visits'),      
                  'date'             =>tatiyeNet::dt(),  
                  'time'             =>tatiyeNet::tm(),     
                );
                $result=$db->que($data)->insert("visitor");
                return $row['uid'];
            }
             
        } else {
        $visitors=tatiyeNet::sum('visitor')+1;
        $data = array(                                         
          'uid'              =>$visitors,      
          'date'             =>tatiyeNet::dt(),  
          'time'             =>tatiyeNet::tm(),     
        );
        $result=$db->que($data)->insert("visitor");
        tatiyeNet::cookieRead('visits',$visitors);
        return $visitors;
        }
        
    }
    /* and class visits */

    /*
    |--------------------------------------------------------------------------
    | Initializes mobileNavigation 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Sen 26 Sep 2022 11:06:07  WITA 
    */
    public static function mobileNavigation(){
         // $manager=tatiyeNet::MyTabelFetch('query_ssid','manager',"id='40'");
         // $row= self::MyTabelFetch('query_uid_comments','tabel',"id='36'");
         //  if (!empty($manager['manager'])) {
             
         //      return self::etcFile('package/'.$row['tabel']);
         //  } else {
           
         //      return self::etcFile('webview/package/home');
         //  } 
    }
    /* and class mobileNavigation */

    /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function wf_vesion(){
          return helper::config('wf_vesion');
        
    }
    /* and class title */
    /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function mobileLink(){

      if (helper::config('wf_vesion')=='Elastic') {
         if (!empty(tatiyeNet::pintasanLink())) {
            if (tatiyeNet::pintasanLink()=='login') {
                $setView=tatiyeNet::URL('webviewlogin');
             } elseif (tatiyeNet::pintasanLink() == 'account'){
                  $setView=tatiyeNet::URL('webview/account');
             } elseif (tatiyeNet::pintasanLink() == 'registrasi'){
                 $setView=tatiyeNet::URL('webviewlogin/up');
             } else {
                 $setView=tatiyeNet::URL('webview/'.tatiyeNet::pintasanLink());
             }
         } else {
            $setView=tatiyeNet::URL('webview');
         }
         return $setView;
        } else {
            return '';
        }
        
    }
    /* and class title */

    public static function pintasanLink(){
        $history= self::MyTabelFetch('members','pintasan,URLSet',"id='".self::OAuthId('uid')."'");
         if (!empty($history['pintasan'])) {
            if (!empty($history['URLSet'])) {
              return $history['pintasan'].$history['URLSet'];
            } else {
             return $history['pintasan'];
            }
         } else {
            return false;
         }
        
    }
    /* and class pintasan */




   public static function import(){
    
        $file_mimes = array(
          'application/vnd.ms-excel', 
          'text/csv', 
          'application/csv', 
          'application/excel', 
          'application/vnd.msexcel', 
          'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );
        if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
        

              if ($_POST['classatribut']=='xls') {
                  $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
              } elseif ($_POST['classatribut']=='csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
              } else {
                 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
              }

              $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
              $sheetData = $spreadsheet->getActiveSheet()->toArray();
              return $sheetData;
        }


    }
    /* and class import */








   public static function rootSet($row,$set,$bts){
    $Exp=explode('/',$row);
    $str = "";
    foreach(array_slice($Exp, $set, $bts) as $key => $value) {
     // foreach ($Exp as $key => $value) {
         // if ($key < $set) {
              $str = $str . $value."/";
         // } 
     }
     $str = substr($str, 0, -1);
     return $str;
   }


    /*
    |--------------------------------------------------------------------------
    | Initializes t3Images 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function converseImg($NmDirFile='',$small='',$style=''){
         $ID=explode('/',$NmDirFile);
         $myX=count($ID)-1;
         $Kresize      =substr($style,0,1);
         if (!empty($small)) {
            $imgsmall= tatiyeNet::etcFolder('upload/'.$small.'/');
         } else {
             $imgsmall= tatiyeNet::etcFolder('upload/'.tatiyeNet::rootSet($NmDirFile,0,$myX).'/');
         }
         
     if (file_exists(tatiyeNet::etcFile('upload/'.$NmDirFile))) {
          $image_info = getimagesize(tatiyeNet::etcFile('upload/'.$NmDirFile)); 
          $img = new tatiyeNetImagesTools();
          $img->ImageTools(tatiyeNet::etcFolder('upload/'.$NmDirFile));
         if (!empty($style)) {
             if($Kresize == 'h') {
                $label='height';
                $height=substr($style,1,10);
                $img->resizeHeight(400); // new height
             } elseif ($Kresize == 'w'){
                $label='width';
                $width=substr($style,1,10);
                $height=$width;
                $img->resizeWidth($width); // new height
             } else {
                $label='crop';
                $ID=explode('x',$validasi);
                $height=$ID[1];
                $width=$ID[0]; 
                $img->resizeOriginal($width,$height);
             }
         } else {
            $label='original';
            $height=$image_info[1];
            $width=$image_info[0];
            $img->resizeOriginal($width,$height);
         }
         

          //$img->addWatermarkImage(tatiyeNet::etcFile('img/watermark.png'), tatiyeNetImagesTools::IMAGE_POSITION_BOTTOM, tatiyeNetImagesTools::IMAGE_POSITION_RIGHT, 5);
           if (file_exists($imgsmall.'/'.$ID[$myX])) {} else {
                if ($image_info[1]>$height) {
                  $img->save($imgsmall, $ID[$myX], 95, true);
               } 
          }
          

          $img->destroy(); 

     }
     
        

    }
    /* and class t3Images */
    /*
    |--------------------------------------------------------------------------
    | Initializes getUserIpAddr 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function ipAddr(){
         if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
        
    }
    /* and class getUserIpAddr */
    /*
    |--------------------------------------------------------------------------
    | Initializes InandOut 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022 default
    | @Date  
    */
    public static function InandOut($key=''){
         $set=self::etcController(17);
         //echo $set['UrlDev'];
         if ($key=='In') {
           require_once(tatiyeNet::etcFile('login/template/'.$set['UrlDev']));
           //require_once(tatiyeNet::etcFile('login/template/default'));
         } else {
           require_once(tatiyeNet::etcFile('login/template/default'));
         }
        

        
    }
    /* and class InandOut */
    /*
    |--------------------------------------------------------------------------
    | Initializes rtcControler 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function etcController($key='',$pac=''){
        // if (helper::config('wf_vesion')=='Elastic') {
        //   $Redirect=tatiyeNet::MyTabelFetch('query_ssid','*',"id='".$key."'");
        //   return $Redirect;
        // } else {
        //     if ($pac=='img') {
        //         return 'anomous.png';
        //     } else {
        //        return false;
        //     }
            
          
        // }
        
         
        
    }
    /* and class rtcControler */
    /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Services($key=''){
           return Services::init($key);
        
    }
    /* and class title */

    public static function mapId(){
         $db = new tatiyeNet();
         $conn=$db->PDO();
         $query = "SELECT map FROM members WHERE  id='".tatiyeNet::uidkey()."' ";
         $stmt = $conn->prepare($query);
         $stmt->execute();
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         return $row['map'];  
    }


     public static function html($text) 
   {
        $patterns = array("/\&/", "/%/", "/</", "/>/", '/"/', "/'/", "/\(/", "/\)/", "/\+/", "/-/");
           $replacements = array("&amp;", "&#37;", "&lt;", "&gt;", "&quot;", "&#39;", "&#40;", "&#41;", "&#43;", "&#45;");
           $string = preg_replace($patterns, $replacements, $text);
        return $string;
   }

    /*
    |--------------------------------------------------------------------------
    | Initializes cekToken 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function cekToken($key){
     $row=tatiyeNet::getWJT($key);
     @$history= self::MyTabelFetch('members','id',"id='".$row['key']."'");
     if (!empty($history['id'])) {
        return true;
     } else {
        return false;
     }

    }
    /* and class cekToken */
    /*
    |--------------------------------------------------------------------------
    | Initializes pintasan 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function pintasan(){
        $history= self::MyTabelFetch('members','pintasan',"id='".self::OAuthId('uid')."'");
         if (!empty($history['pintasan'])) {
            return $history['pintasan'];
         } else {
            return false;
         }
        
    }
    /* and class pintasan */

    /*
    |--------------------------------------------------------------------------
    | Initializes pintasan 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */

    /*
    |--------------------------------------------------------------------------
    | Initializes favicon 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Sen 18 Jul 2022 10:15:58  WITA 
    */
    public static function favicon(){
        $product_item=array();
            $sistem=tatiyeNet::Qb('query')->pqdb_id(15)->SQLI(); 
            while($row=$sistem->fetch_assoc()){
                 extract($row);
                 $ID=explode('.',$Favicon);
                 $product_item[]=array(                                  
                  'id'        =>$id,  
                  'name'      =>$name,  
                  'icon'       =>'itn '.$ID[0],  
                  'class'      =>'.itn.'.$ID[0],  
                  'background' =>tatiyeNet::URL('wolf05/template/upload/icon/'.$Favicon),   
                 );
                
            }
            return $product_item;

        
    }
    /* and class favicon */
    /*
    |--------------------------------------------------------------------------
    | Initializes AssetsInformation 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function AssetsInformation($key='',$property=''){
          // if (helper::config('wf_vesion')=='Elastic') {
          //    $row= self::MyTabelFetch('query_ssid','*',"id=26");
          //    $mrow= tatiyeNet::MyTabelFetch('query_ssid','*',"id='44'");
          //    if (!empty($row[$key])) {
          //        if($key == 'Favicon') {
          //           return tatiyeNet::img('35x35/'.$row[$key]);
          //        } elseif ($key == 'Logo'){
          //           return tatiyeNet::img('65x65/'.$row[$key]);
          //        } elseif ($key == 'Caver'){
          //           return tatiyeNet::img('200x200/'.$row[$key]);
          //        } else {
          //           return $row[$key];
          //        }
          //    } else {
          //        if($key == 'data') {
          //            return $mrow[$key];
          //        } elseif ($key == 'color'){
          //           return $mrow[$key];
          //        } else {
          //          return helper::property($key);
          //        }
          //    }
          // } else {
          //     return helper::property($key);
          // }
          
        
    }
    /* and class AssetsInformation */
    /*
    |--------------------------------------------------------------------------
    | Initializes Router_helper_api 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  Sab 09 Jul 2022 01:26:05  WITA
    */
    public static function Router_helper_api($dir,$file){
        require_once(tatiyeNet::etcFile($dir.'/Model/'.$file)); 
        
    }
    /* and class Router_helper_api */
    /*
    |--------------------------------------------------------------------------
    | Initializes Router_helper_api 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  Sab 09 Jul 2022 01:26:05  WITA
    */
    public static function API_RESTful($file,$dir){
        // echo tatiyeNet::etcFile('helper/Api/data');
         require_once( tatiyeNet::etcFile('helper/Api/'.$file)); 
        
    }
    /* and class Router_helper_api */

    /*
    |--------------------------------------------------------------------------
    | Initializes Tables 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    // public static function dataTables($key){
    //       return dataTables;
        
    // }
   public static function dataTables($GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having){
              echo json_encode(
               dataTables::simple($GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
           );
    }


    /* and class Tables */
 

    /*
    |--------------------------------------------------------------------------
    | Initializes Query 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Qb($key){
        return builder::init($key);
    }
    /* and class Query */

   /*
   |--------------------------------------------------------------------------
   | Initializes keyTables 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function keyTables($Token,$key=''){
    $QS=tatiyeNet::getWJT($Token);
    $BitQ=tatiyeNet::Qb($QS['tabel'])->id($QS['id'])->format($key);
    return $BitQ;
       
   }
   /* and class keyTables */

    
    /*
    |--------------------------------------------------------------------------
    | Initializes sql 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function BitQ($key=''){
          return query::init($key);
        
    }
    /* and class sql */
    /*
    |--------------------------------------------------------------------------
    | Initializes BitQKey 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function BitQKey($key=''){
           return QueryException::init($key);
        
    }
    /* and class BitQKey */
    /*
    |--------------------------------------------------------------------------
    | Initializes myColor 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function myColor($key){
          $bs= myColor::init($key);
          return $bs;
        
    }
    /* and class myColor */

    /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function query_uid_indikator($key,$stetment){
         $Text=tatiyeNet::Text(); 
         $QSL= tatiyeNet::MyTabelFetch('query_uid_indikator','*',"$stetment");
         if (!empty($QSL[$key])) {
            return $QSL[$key];
         } else {
            $ID=explode('=',$stetment);
            return $Text->strreplace([$ID[1],"'",'']); 
         }
        
    }
    /* and class title */
   /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function query_uid_comments($key,$stetment){
         // $Text=tatiyeNet::Text(); 
         // $QSL= tatiyeNet::MyTabelFetch('query_uid_comments','*',"$stetment");
         // if (!empty($QSL[$key])) {
         //    return $QSL[$key];
         // } else {
         //    $ID=explode('=',$stetment);
         //    return $Text->strreplace([$ID[1],"'",'']); 
         // }
         
         
        
    }
    /* and class title */

    /*
    |--------------------------------------------------------------------------
    | Initializes readOption 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function readOption($kode,$tabel,$value){
        $QSL= self::MyTabelFetch('query_uid_indikator','name',"kode='".$kode."' AND tabel='".$tabel."' AND value='".$value."'");
        return ' <option value="'.$value.'">'.$QSL['name'].'</option>';
        
    }
    /* and class readOption */
  
    /*
    |--------------------------------------------------------------------------
    | Initializes SqlFormatter 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function SqlFormatter($query){
          return (new SqlFormatter())->format($query);
        
    }
    /* and class SqlFormatter */

    /*
    |--------------------------------------------------------------------------
    | Initializes txt 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function xt(){
          return self::Text();
        
    }
    /* and class txt */

    /*
    |--------------------------------------------------------------------------
    | Initializes DBTabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  Sel 02 Mei 2023 01:42:28  WITA
    */
    public static function MyTabelPDO($tabel,$bin='*',$where='',$limit='LIMIT 100'){
        $db = new tatiyeNet();
        $conn=$db->PDO();
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
    /*
    |--------------------------------------------------------------------------
    | Initializes MyTabelPDO 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function MyTabelObject($tabel,$bin='*',$where='',$limit='100'){
        $db = new tatiyeNet();
        $conn=$db->PDO();
        if (!empty($where)) {
            $IDWH=explode(' ',$where);
             if($IDWH[0] == 'JOIN') {
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
       $query = "SELECT $bin FROM $tabel  $WH";
        // $stmt =$conn->prepare($query);
        // $stmt->execute();
        return $query; 
        
    }
    /* and class MyTabelPDO */
    /*
    |--------------------------------------------------------------------------
    | Initializes Query 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function myQuery($tabel,$bin='*',$where='',$limit='100'){
        return self::MyTabelObject($tabel,$bin,$where,$limit); 
        
    }
    /* and class Query */
    /*
    |--------------------------------------------------------------------------
    | Initializes MyTabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function MyTabelOption($tabel){
           $key = trim($tabel);
           $stmt= tatiyeNet::MyTabelObject('query','datatablessearch,datatablesoption,optiongroup',"WHERE indikator='".$key."'");   
           $set = $stmt->fetch(PDO::FETCH_ASSOC);
             if (!empty($set['datatablessearch'])) {
                 echo formHTML::init($set['datatablessearch'])->search();
             } else {
               return '';
             }
           
             if (!empty($set['datatablesoption'])) {
                   echo formHTML::init($set['datatablesoption'])->option();
             } else {
               return '';
             }

            if (!empty($set['optiongroup'])) {
                   echo formHTML::init($set['optiongroup'])->optiongroup();
             } else {
               return '';
             }
    }
    /* and class MyTabel */
    /*
    |--------------------------------------------------------------------------
    | Initializes elasticQueryoption 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function selectOption($datatablesoption,$Set='init',$token=''){
            echo formHTML::init($datatablesoption,$token)->option2();

    }
    /* and class elasticQueryoption */
    /*
    |--------------------------------------------------------------------------
    | Initializes myheadTabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function myheadTabel($tabel){



    }
    /* and class myheadTabel */
    /*
    |--------------------------------------------------------------------------
    | Initializes formHTML 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function formHTML($key){
         return formHTML::init($key);
        
    }
    /* and class formHTML */

    /*
    |--------------------------------------------------------------------------
    | Initializes MyTabelOption 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function MyTabelOptionSearch($tabel,$faild){
           // $stmt= tatiyeNet::MyTabelObject('query','datatablessearch,datatablesoption',"WHERE indikator='".$tabel."'");   
           // $set = $stmt->fetch(PDO::FETCH_ASSOC);
           // $option=explode(' ',$set['datatablessearch']);
           // if (!empty($set['datatablessearch'])) {
           //    return $option[$faild];
           // } else {
           //   return '';
           // }
    }
    /* and class MyTabelOption */

    /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function MyTabelFetch($tabel,$bin='*',$where='',$limit=''){
         $stmt =self::MyTabelPDO($tabel,$bin,$where,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         return $row;
    }
    public static function fetch($tabel,$bin='*',$where='',$limit=''){
         $stmt =self::MyTabelPDO($tabel,$bin,$where,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         return $row;
    }
    public static function MyTabelArray($tabel,$bin='*',$where='',$limit=''){
         $Exp=array();
         $stmt =self::MyTabelPDO($tabel,$bin,$where ,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         $Exp=$row;
         return $Exp;

          
    }

    /* and class title */
    /*
    |--------------------------------------------------------------------------
    | Initializes nameMyTabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function nameMyTabel($var=''){
            $no=0;
            $Text=tatiyeNet::Text();
           $variable=tatiyeNet::dbtabel()->show_tabel();
           foreach ($variable as $key => $value) {
            if ($value['tabel'] !=='chat' 
                && $value['tabel'] !=='categories'
                //&& $value['tabel'] !=='demo'
                //&& $value['tabel'] !=='postingan'
                && $value['tabel'] !=='gps_track'
                // && $value['tabel'] !=='story'
                && $value['tabel'] !=='query'
                //&& $value['tabel'] !=='query_uid'
                && $value['tabel'] !=='query_ssid'
                //&& $value['tabel'] !=='query_ssid_modal'
                && $value['tabel'] !=='query_ssid_failid'
                //&& $value['tabel'] !=='query_ssid_uid'
                //&& $value['tabel'] !=='members'
                // && $value['tabel'] !=='package'
                && $value['tabel'] !=='rbac'
                && $value['tabel'] !=='visitor'
                && $value['tabel'] !=='wilayah'
                && $value['tabel'] !=='wilayah_level'
                //&& $value['tabel'] !=='services'
                && $value['tabel'] !=='products'
                //&& $value['tabel'] !=='query_uid_indikator'
                && $value['tabel'] !=='gps_track'
                // && $value['tabel'] !=='query_uid_comments'
                && $value['tabel'] !=='query_uid_key'
                && $value['tabel'] !=='query_uid_key_name' 
                && $value['tabel'] !=='query_uid_key_tabel' 
                && $value['tabel'] !=='query_uid_key_selectize'
                && $value['tabel'] !=='query_ssid_user'
                && $value['tabel'] !=='query_uid_key_07'
                && $value['tabel'] !=='query_uid_key_08'
                && $value['tabel'] !=='query_uid_key_09'
                && $value['tabel'] !=='query_uid_key_10'
            ) {
                $no=$no+1;
                 $Exp[]=array(
                    'no'                 =>$no,
                    'az'                 =>$Text->AZ($no),
                    'nama'               =>$value['tabel'],
                    'tabel'              =>$value['tabel'].'.'.$Text->AZ($no),
                    'tabelQ'              =>$value['tabel'].' '.$Text->AZ($no),
                    'data'               =>$value['data'],
                    );

           }
       }
       if (!empty($var)) {

           return $Exp[0];
       } else {
           return $Exp;
       }
       

          
        
    }
    /* and class nameMyTabel */
    /*
    |--------------------------------------------------------------------------
    | Initializes nameMyTabelView 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function nameMyTabelView($var=''){
            $no=0;
            $Text=tatiyeNet::Text();
           $variable=tatiyeNet::dbtabel()->show_tabel_view();
           foreach ($variable as $key => $value) {
                $no=$no+1;
                 $Exp[]=array(
                    'no'                 =>$no,
                    'az'                 =>'t'.$Text->AZ($no),
                    'nama'               =>$value['tabel'],
                    'tabel'              =>$value['tabel'].'.t'.$Text->AZ($no),
                    'data'               =>$value['data'],
                    );

           
       }
       if (!empty($var)) {

           return $Exp[0];
       } else {
           return $Exp;
       }
   
    }
    /* and class nameMyTabelView */




    /*
    |--------------------------------------------------------------------------
    | Initializes indikator 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2020
    | @Date 
    */
    public static function indikator($field='',$otp='',$tabel=''){
        $Exp=array();
         foreach ($otp as $key => $value) {
            if ($value==self::tabelIndikator($tabel,$value)) {
                $setrow=explode('-',self::tabelIndikatorvalue($tabel,$value));
                $nmField   =$setrow[0];
                $nmTabel   =$setrow[1];
                $fieldTabel=$setrow[2];
                $nmValue   =$setrow[3];
                $nmName    =$setrow[4];
                if (!empty($nmValue)) {
                    $row= self::MyTabelFetch($nmTabel,$nmName,"$fieldTabel='".$nmField."' AND $nmValue='".$field[$key]."' ");
                    $Name=$nmName;
                } else {
                    $row=$row= tatiyeNet::MyTabelFetch($nmTabel,'*',"$nmField='".$field[$key]."'");
                    $Name=$fieldTabel;
                }
                if (!empty($row[$Name])) {
                    $str= $row[$Name];
                } else {
                    $str='';
                }
            } else {
                $str= $field[$key];
            }
            
            $Ext[]=$str;

         }
         return $Ext;
            
     }
    
    /*
    |--------------------------------------------------------------------------
    | AND indikator 
    |--------------------------------------------------------------------------
    */
    /*
    |--------------------------------------------------------------------------
    | Initializes indikator 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2020
    | @Date 
    */
    public static function indikator_v02($row=''){
          $Exp=array();
         
          foreach ($row as $key => $value) {
                 $QSL= self::MyTabelFetch('query_uid_indikator','name',"tabel='".$Token[$key]."' AND value='".$value."'");
                 if (!empty($QSL['name'])) {
                     $returnEND=$QSL['name'];
                 } else {
                     $returnEND=$value;
                 }
                 $Exp[]= $returnEND;
          }
  
        return $Exp;
     }
    
    /*
    |--------------------------------------------------------------------------
    | AND indikator 
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Initializes indikator 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2020
    | @Date 
    */
    public static function indikatorGroup($field='',$otp='',$myTabel=''){
 

            
     }
    
    /*
    |--------------------------------------------------------------------------
    | AND indikator 
    |--------------------------------------------------------------------------
    */
     /*
     |--------------------------------------------------------------------------
     | Initializes tabelIndikator 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date Min 05 Jun 2022 01:51:22  WITA 
     */
     public static function tabelIndikator($tabel,$field){
         $myTabel = trim($tabel);
         $Exp=array();
         $row= self::MyTabelFetch('query','optionField',"indikator='".$myTabel."'");
             $variable=explode(' ',$row['optionField']);
             foreach ($variable as $key => $value) {
                if (!empty($value)) {
                   $var=explode('-',$value);
                   $fi=$var[0];
                   $Exp[$fi]=$fi;
             }
                // code...
             }
             return $Exp[$field];
         // echo $ID[0];
         // echo "<br>";
         
     }
     /* and class tabelIndikator */
     /*
     |--------------------------------------------------------------------------
     | Initializes value 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date  
     */
     public static function tabelIndikatorvalue($tabel,$field){
         $myTabel = trim($tabel);
         $Exp=array();
         $row= self::MyTabelFetch('query','optionField',"indikator='".$myTabel."'");
             $variable=explode(' ',$row['optionField']);
             $no=0;
             foreach ($variable as $key => $value) {
                if (!empty($value)) {
                    $no=$no+1;
                   $var=explode('-',$value);
                   $fi=$var[0];
                   $Exp[$fi]=$value;
                 
             }
             }
             return $Exp[$field];
         
     }
     /* and class value */
  
 
     /*
     |--------------------------------------------------------------------------
     | Initializes tabel_comments 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date  
     */
     public static function tabel_comments_elastic($tabel,$setatributBit){
            $myTabel = trim($tabel);
            $Exp=array();
            $no=0;
            $Text=tatiyeNet::Text();
            $row= self::MyTabelFetch('query','atribut',"indikator='".$myTabel."'");
            if (!empty($setatributBit)) {
                $IDV3=explode(' ',$setatributBit);
            } else {
               $IDV3=explode(' ',$row['atribut']);
            }
            
           
            foreach ($IDV3 as $key => $value) {
             if (!empty($value)) {
                     $ID=explode('_',$value);
                     foreach (self::nameMyTabel() as $key1 => $value1) {
                         if ($value1['az']==$ID[0]) {
                                 $FieldUID=$Text->strreplace([$ID[1],'-','_']);
                                  if (!empty(tatiyeNet::dbtabel()->tabel_comments($value1['nama'],$FieldUID))) {
                                      $dbtabelName=tatiyeNet::dbtabel()->tabel_comments($value1['nama'],$FieldUID);
                                  } else {
                                      $dbtabelName=$FieldUID;
                                  }
                                  $no=$no+1;
                                 $Exp[]=array(
                                    'no'              =>$no,
                                    'az'              =>$value,
                                    'faild'           =>$FieldUID,
                                    'tabel'           =>$value1['nama'],
                                    'comments'        =>$dbtabelName,
     
                                    );
                         }
                         // code...
                     }
                   
                 // echo tatiyeNet::nameMyTabel($ID[0])['az'].'<br>';
             }
            }


                    return $Exp;
     }
     /* and class tabel_comments */
     /*
     |--------------------------------------------------------------------------
     | Initializes tabel_comments 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date  
     */

     /* and class tabel_comments */
     public static function tabel_comments($tabel){
            $myTabel = trim($tabel);
            $Exp=array();
            $no=0;
            $Text=tatiyeNet::Text();
            $row= tatiyeNet::MyTabelFetch('query','atribut,tabel',"indikator='".$myTabel."'");
            $IDV3=explode(' ',$row['atribut']);
            foreach ($IDV3 as $key => $value) {
             if (!empty($value)) {
                    $ID=explode('_',$value);
                    $FieldUID=$Text->strreplace([substr($value,2,25),'-','_']) ;;
                    $kode=$Text->strreplace([substr($value,0,1).'_'.substr($value,2,25),'-','_']) ;
                  $QSL= tatiyeNet::MyTabelFetch('query_uid_indikator','deskripsi',"kode='".$row['tabel']."' AND tabel='".$FieldUID."' ");
                  if (!empty($QSL['deskripsi'])) {
                     $dbtabelName=$QSL['deskripsi'];
                   } else {
                     $dbtabelName=$FieldUID;
                   }
                
                  $no=$no+1;
                  $Exp[]=array(
                    'no'              =>$no,
                    'az'              =>$kode,
                    'faild'           =>$FieldUID,
                    'tabel'           =>$row['tabel'],
                    'comments'        =>$dbtabelName,

                    );
          
             }
            }
            
                    return $Exp;
     }
     /* and class tabel_comments */

     /*
     |--------------------------------------------------------------------------
     | Initializes tabel_comments 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date  
     */
     public static function tabel_comments_uid($tabel){
            $myTabel = trim($tabel);
            $Exp=array();
            $no=0;
            $row= tatiyeNet::MyTabelFetch('query_uid','atribut',"namecustomQ='".$myTabel."'");
            $IDV3=explode(' ',$row['atribut']);
            foreach ($IDV3 as $key => $value) {
             if (!empty($value)) {
                     $ID=explode('_',$value);
                     foreach (self::nameMyTabel() as $key1 => $value1) {
                         if ($value1['az']==$ID[0]) {
                                  if (!empty(tatiyeNet::dbtabel()->tabel_comments($value1['nama'],$ID[1]))) {
                                      $dbtabelName=tatiyeNet::dbtabel()->tabel_comments($value1['nama'],$ID[1]);
                                  } else {
                                      $dbtabelName=$ID[1];
                                  }
                                  $no=$no+1;
                                 $Exp[]=array(
                                    'no'              =>$no,
                                    'az'              =>$value,
                                    'faild'           =>$ID[1],
                                    'tabel'           =>$value1['nama'],
                                    'comments'        =>$dbtabelName,
     
                                    );
                         }
                         // code...
                     }
                   
                 // echo tatiyeNet::nameMyTabel($ID[0])['az'].'<br>';
             }
            }
                    return $Exp;
     }
     /* and class tabel_comments */

     /*
     |--------------------------------------------------------------------------
     | Initializes headtabel_comments 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date  
     */
     public static function headtabel_comments($tabel){
            $myTabel = trim($tabel);
            $Exp=array();
            $row= tatiyeNet::MyTabelFetch('query','atribut',"indikator='".$myTabel."'");
            $IDV3=explode(' ',$row['atribut']);
            foreach ($IDV3 as $key => $value) {
             if (!empty($value)) {
                     $ID=explode('_',$value);
                     foreach (self::nameMyTabel() as $key1 => $value1) {
                         if ($value1['az']==$ID[0]) {
                                  if (!empty(tatiyeNet::dbtabel()->tabel_comments($value1['nama'],$ID[1]))) {
                                      $dbtabelName=tatiyeNet::dbtabel()->tabel_comments($value1['nama'],$ID[1]);
                                  } else {
                                      $dbtabelName=$ID[1];
                                  }
                                 $Exp[]=$dbtabelName;
                         }
                         // code...
                     }
                   
                 // echo tatiyeNet::nameMyTabel($ID[0])['az'].'<br>';
             }
            }
                 return $Exp;   
         
     }
     /* and class headtabel_comments */
    /*
    |--------------------------------------------------------------------------
    | Initializes a 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function assetQuery($keytabel='',$and=''){
         $key = trim($keytabel);
         $db = new tatiyeNet();
         $conn=$db->PDO();

        $tabel=explode('-',$key);
        if (!empty($tabel[1])) {
               $KEY = trim($tabel[1]);
               $row= tatiyeNet::MyTabelFetch('query_uid','customQ',"id='".$KEY."'");
               $query=$row['customQ'];
        } else {
         $row= tatiyeNet::MyTabelFetch('query','*',"indikator='".$key."'");
         if (!empty($row['atributBit'])) {
              $ARTB=$row['atributBit'];
           } else {
               $ARTB='*';
           }
           if (!empty($row['classwherequery'])) {
              $WH='WHERE '.$row['classwherequery'];
           } else {
               $WH='';
           }
           if (!empty($row['join'])) {
               $join=$row['join'];
           } else {
               $join='';
           }
           if (!empty($row['groupbyBit'])) {
               $group=$row['groupbyBit'];
           } else {
               $group='';
           }

           if (!empty($row['orderby'])) {
               $orderby=$row['orderby'];
           } else {
               $orderby='';
           }

           $tabeleBitQ=$row['tabeleBitQ'];
           $query="SELECT $ARTB FROM $tabeleBitQ  $join $WH $and $group $orderby ";
       }

           // $stmt =$conn->prepare($query);
           // $stmt->execute();
           return $query; 
    }
    /* and class a */

    /*
    |--------------------------------------------------------------------------
    | Initializes assetQueryCount 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function assetQueryCount($keytabel='',$field='',$fieldval='',$AZ='',$Oprator=''){
        $key = trim($keytabel);
         $db = new tatiyeNet();
         $Text=tatiyeNet::Text();
         $conn=$db->PDO();
         if (!empty($AZ)) {
             
              $AZKODE='AND '.tatiyeNet::WJT($AZ,'AZ');
 
         } else {
              $AZKODE='';
         }
         


            $tabel=explode('-',$key);
            $AZ=explode('.',$field);
            $nmAZ=$AZ[0].'.*';

            $IDfield=$Text->strreplace([$field,'_',"."]);
            if (!empty($Oprator)) {
                $myOprator=$Oprator;
            } else {
               $myOprator="$IDfield='".$fieldval."'";
            }
            

        if (!empty($tabel[1])) {
               $KEY = trim($tabel[1]);
               $row= tatiyeNet::MyTabelFetch('query_uid','customQ',"id='".$KEY."'");
               $query=$row['customQ'];
        } else {
         $row= tatiyeNet::MyTabelFetch('query','*',"indikator='".$key."'");
         if (!empty($row['atributBit'])) {
              $ARTB=$row['atributBit'];
           } else {
               $ARTB='*';
           }
           if (!empty($row['classwherequery'])) {
              $WH='WHERE '.$row['classwherequery'];
           } else {
               $WH='';
           }
           if (!empty($row['join'])) {
               $join=$row['join'];
           } else {
               $join='';
           }
 

           $tabeleBitQ=$row['tabeleBitQ'];
           $query="SELECT COUNT(*) AS TOTAL FROM $tabeleBitQ  WHERE $myOprator $AZKODE   ";
           //$query="SELECT COUNT(*) AS TOTAL FROM $tabeleBitQ  WHERE $myOprator $AZKODE GROUP BY $IDfield  ";
       }

          $stmt = $conn->prepare( $query );
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          if (!empty($row['TOTAL'])) {
              return $row['TOTAL'];
          } else {
              return 0;
          }
       // return $query;
         
       

        // return $query; 

        
    }
    /* and class assetQueryCount */

    public static function assetQueryCountJoin($keytabel='',$field=''){
        $key = trim($keytabel);
         $db = new tatiyeNet();
         $Text=tatiyeNet::Text();
         $conn=$db->PDO();
         if (!empty($AZ)) {
             
              $AZKODE='AND '.tatiyeNet::WJT($AZ,'AZ');
 
         } else {
              $AZKODE='';
         }
         


            $tabel=explode('-',$key);
            $AZ=explode('.',$field);
            $nmAZ=$AZ[0].'.*';
            $IDfield=$Text->strreplace([$field,'_',"."]);
            if (!empty($Oprator)) {
                $myOprator=$Oprator;
            } else {
               @$myOprator="$IDfield='".$fieldval."'";
            }
            

        if (!empty($tabel[1])) {
               $KEY = trim($tabel[1]);
               $row= tatiyeNet::MyTabelFetch('query_uid','customQ',"id='".$KEY."'");
               $query=$row['customQ'];
        } else {
         $row= tatiyeNet::MyTabelFetch('query','*',"indikator='".$key."'");
         if (!empty($row['atributBit'])) {
              $ARTB=$row['atributBit'];
           } else {
               $ARTB='*';
           }
           if (!empty($row['classwherequery'])) {
              $WH='WHERE '.$row['classwherequery'];
           } else {
               $WH='';
           }
           if (!empty($row['join'])) {
               $join=$row['join'];
           } else {
               $join='';
           }
 

           $tabeleBitQ=$row['tabeleBitQ'];
           $query="SELECT COUNT(*) AS TOTAL FROM $tabeleBitQ  WHERE $field   ";
           //$query="SELECT COUNT(*) AS TOTAL FROM $tabeleBitQ  WHERE $myOprator $AZKODE GROUP BY $IDfield  ";
       }

           $stmt = $conn->prepare( $query );
           $stmt->execute();
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
           if (!empty($row['TOTAL'])) {
               return $row['TOTAL'];
           } else {
               return 0;
           }
       // return $query;
         
       

        // return $query; 

        
    }
    /* and class assetQueryCount */


    /*
    |--------------------------------------------------------------------------
    | Initializes assetQueryGroup 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function assetQueryGroup($keytabel='',$field=''){
         $key = trim($keytabel);
         $db = new tatiyeNet();
         $conn=$db->PDO();

        $tabel=explode('-',$key);
        if (!empty($tabel[1])) {
               $KEY = trim($tabel[1]);
               $row= tatiyeNet::MyTabelFetch('query_uid','customQ',"id='".$KEY."'");
               $query=$row['customQ'];
        } else {
         $row= tatiyeNet::MyTabelFetch('query','*',"indikator='".$key."'");
         if (!empty($row['atributBit'])) {
              $ARTB=$row['atributBit'];
           } else {
               $ARTB='*';
           }
           if (!empty($row['classwherequery'])) {
              $WH='WHERE '.$row['classwherequery'];
           } else {
               $WH='';
           }
           if (!empty($row['join'])) {
               $join=$row['join'];
           } else {
               $join='';
           }
 

           $tabeleBitQ=$row['tabeleBitQ'];
           $query="SELECT $field FROM $tabeleBitQ  $join $WH GROUP BY $field ";
       }

            $stmt =$conn->prepare($query);
            $stmt->execute();
            return $stmt; 
           // return $query; 
        
    }
    /* and class assetQueryGroup */
    /*
    |--------------------------------------------------------------------------
    | Initializes elastisTables 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function elastisTables($Token){
        $db = new tatiyeNet();
       $conn=$db->PDO();
       $id=tatiyeNet::WJT($Token,'tabel');
       $TABEL=tatiyeNet::WJT($Token,'query');
       $Text=tatiyeNet::Text();
       $row= tatiyeNet::MyTabelFetch($TABEL,'*',"id='".$id."'");
       $WH=$Text->strreplace([$row['tabeleBit'],'_','.']);
 
            $Query= tatiyeNet::elasticQuery($row['tabel'],$row['setatributBit']);
            $IDQuery=explode('WHERE',$Query);
            if (!empty($IDQuery[1])) {
                $WHERID="AND";

            } else {
                $WHERID='WHERE';
            }

       if (!empty($row['addoprator'])) {
            $IDWHRONE="$WHERID ".$row['addoprator'];
       } else {
            $IDWHRONE="";
       }

       if (!empty($IDWHRONE)) {
             if (!empty($row['classwherequery'])) {
                $IDWHR='';
             } else {
               $IDWHR=$IDWHRONE;
             }
             
             
        } else {
            if (!empty($row['atributBit'])) {
                $IDWHR="$WHERID $WH='".$row['atributBit']."'";
            } else {
               $IDWHR="";
            }
            
           
             
        }

       if (!empty($row['classwherequery'])) {
         if (!empty($row['atributBit'])) {
            $AND="AND ".$row['classwherequery'];
         } else {
            $AND="$WHERID ".$row['classwherequery'];
         }
       } else {
         $AND="";
       }
     
            $ID=end(explode('AND',$AND));

       $RE1 = array(
         "$ID", 
 
       ); 
         $RE2 = array(' '.$row['addoprator']);

        $returnEND= str_replace($RE1, $RE2, $AND);  
        if (!empty($row['addoprator'])) {
            $MyreturnEND=$returnEND;
        } else {
            $MyreturnEND=$AND;
        }
        

       $GETQUERY="$Query $IDWHR $MyreturnEND";
       $stmt =$conn->prepare($GETQUERY);
       $stmt->execute();
       return $stmt;
    }

    /* and class elastisTables */
     public static function elastisTablesSql($Token){
   
    }
    /* and class elastisTables */
    /*
    |--------------------------------------------------------------------------
    | Initializes elasticQueryEditTables 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function elasticQueryEditTables($Token,$option){
   
        
    }
    /* and class elasticQueryEditTables */
    /*
    |--------------------------------------------------------------------------
    | Initializes identifier 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function identifier($QTabel,$ARTB){

             $db = new tatiyeNet();
             $str="'{";
             $Query="SELECT * FROM query_uid_indikator WHERE  tabel='".$ARTB."' " ;
             $result=$db->query($Query);
             while($row=$result->fetch_assoc()){                              
               $str= $str.'"'. $row['value'].'":"'.$row['name'].'",';
             }
             $str = substr($str, 0, -1);

             return $str."}'";
    }
    /* and class identifier */
 
    /*
    |--------------------------------------------------------------------------
    | Initializes elasticQuery 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function elasticQuery($keytabel,$setatribut='',$and=''){
        $key = trim($keytabel);
        $tabel=explode('-',$key);
        if (!empty($tabel[1])) {
               $KEY = trim($tabel[1]);
               $row= tatiyeNet::MyTabelFetch('query_uid','customQ',"id='".$KEY."'");
               return $row['customQ'];
        } else {
           $row= tatiyeNet::MyTabelFetch('query','*',"indikator='".$key."'");
           if (!empty($row['atributBit'])) {
                $ARTB=$row['atributBit'];
             } else {
                 $ARTB='*';
             }
             if (!empty($row['classwherequery'])) {
                $WH='WHERE '.$row['classwherequery'];
             } else {
                 $WH='';
             }
             if (!empty($row['join'])) {
                 $join=$row['join'];
             } else {
                 $join='';
             }
             if (!empty($row['groupbyBit'])) {
                 $group=$row['groupbyBit'];
             } else {
                 $group='';
             }

              if (!empty($row['orderby'])) {
                 $orderby=$row['orderby'];
             } else {
                 $orderby='';
             }
             if (!empty($setatribut)) {
                 $mySetatribut=$setatribut;// code...
             } else {
                 $mySetatribut=$ARTB;// code...
             }
             
             $tabeleBitQ=$row['tabeleBitQ'];
             $query="SELECT $mySetatribut
             FROM $tabeleBitQ  
              $join 
              $WH $and 
              $group 
              $orderby";
             return $query;
        }
        
    }
    /* and class elasticQuery */

    /*
    |--------------------------------------------------------------------------
    | Initializes keywordsproperty 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 26 Mei 2022 11:41:54  WITA 
    */
    public static function keywordsproperty(){
        // if (!empty($_GET['tn'])) {
        //      $ID=explode('/',$_GET['tn']);
        //  } else {
        //      $ID='';
        //  }
        // if (!empty($ID[0])) {
        //     if (!empty($ID[1])) {
  
        //         if ($ID[0]=='dashboard') {
        //             if ($ID[1]) {
        //                  $db = new tatiyeNet();
        //                  $query="SELECT elements FROM package WHERE pacname='".$ID[1]."' ";
        //                  $result=$db->query($query);
        //                  $row = $result->fetch_array(MYSQLI_ASSOC);
        //                  if (!empty($row['elements'])) {
        //                       $elements=$row['elements']; 
        //                   } else {
        //                        $elements='Dashboard';
        //                   }
                           
        //             } else {
        //                 $elements='Dashboard';
        //             }
        //             // if ($ID[1]=='dokumen') {
                        
        //             //      if ($ID[2]=='tabel') {
        //             //          $QS=tatiyeNet::getWJT($ID[3]);
        //             //          $myelements=$QS['title'];
        //             //      } else {
        //             //         $myelements=$elements;
        //             //      }
                         
                         
        //             //  } else {
        //                 $myelements=$elements;
        //              // }
             
        //          $Exp=array(
        //             'title'              =>$myelements,
        //             'description'        =>self::AssetsInformation('Description'),
        //             'keywords'           =>self::AssetsInformation('Keywords'),
        //             'image'              =>self::AssetsInformation('Caver'),
        //             'url'                =>tatiyeNet::URL(),
        //             );
        //             return $Exp;
        //         } else {
        //           $property= new Keywords($_GET['tn']);
        //           $Exp=array(
        //             'title'              =>$property->property('Title'),
        //             'description'        =>$property->property('Description'),
        //             'keywords'           =>$property->property('Keywords'),
        //             'image'              =>$property->property('Caver'),
        //             'url'                =>$property->property('Url'),
        //             );
        //             return $Exp;

        //         }
        //     } else {
        //          $Exp=array(
        //             'title'              =>self::AssetsInformation('Title'),
        //             'description'        =>self::AssetsInformation('Description'),
        //             'keywords'           =>self::AssetsInformation('Keywords'),
        //             'image'              =>self::AssetsInformation('Caver'),
        //             'url'                =>tatiyeNet::URL(),
        //             );
        //             return $Exp;
        //     }
        //  } else {
        //          $Exp=array(
        //             'title'              =>self::AssetsInformation('Title'),
        //             'description'        =>self::AssetsInformation('Description'),
        //             'keywords'           =>self::AssetsInformation('Keywords'),
        //             'image'              =>self::AssetsInformation('Caver'),
        //             'url'                =>tatiyeNet::URL(),
        //             );
        //             return $Exp;
        //  }
        
    }
    /* and class keywordsproperty */
    /*
    |--------------------------------------------------------------------------
    | Initializes time 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function time($key,$time){
          return date($key,$time);
        
    }
    /* and class time */
    /*
    |--------------------------------------------------------------------------
    | Initializes ChatGroupId 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function ChatGroupId(){
        $db=new tatiyeNet();
        $query="SELECT SUM(row) AS TOTAL FROM chat WHERE user_id='".tatiyeNet::uidkey()."' ";
        $result=$db->query($query);
        return $row['SUM'];
        
    }
    /* and class ChatGroupId */
    /*
    |--------------------------------------------------------------------------
    | Initializes help 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function help(){
        $db=new tatiyeNet();
        $query="SELECT SUM(row) AS TOTAL FROM chat WHERE uid='2' AND date='".tatiyeNet::dt()."'";
        $result=$db->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);                            
        $UID  =tatiyeNet::WJT(['key'=>2]);
        $TOKEN=tatiyeNet::WJT([
            'uid'   =>tatiyeNet::cookie('key'), 
            'key'   =>$UID,
            'name' =>'Bantuan & Dukungan',
            'data'=>$row['TOTAL']?$row['TOTAL']:'',
        ]);
         return $TOKEN;
    }
    /* and class help */
    /*
    |--------------------------------------------------------------------------
    | Initializes services 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    // public static function services(){
    //      $services=array(
    //        'Google'   =>'icon-brand-google',
    //        // 'Facebook' =>'icon-brand-facebook',
    //        'Amazon'   =>'icon-brand-aws',
    //        'Dropbox'  =>'icon-brand-dropbox',
    //        'Github'   =>'icon-brand-github',
    //        'Pusher'   =>'icon-brand-codepen',
    //        'Giphy'    =>'icon-brand-codepen',
    //      );
    //      return $services;
      
    // }
    /* and class services */
    /*
    |--------------------------------------------------------------------------
    | Initializes title <i class="icon-brand-codepen"></i>
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function servicesKey($key){
         $db=new tatiyeNet();
         $query="SELECT * FROM services WHERE id='".tatiyeNet::Encryption($key)."'";
         $result=$db->query($query);
         $row = $result->fetch_array(MYSQLI_ASSOC); 
         $Exp=array($row);
         return $Exp[0];
    }
    /* and class title */
    /*
    |--------------------------------------------------------------------------
    | Initializes Pusher 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Pusher($channel,$event,$data){
      require_once(tatiyeNet::etcFile('helper/Services/Pusher/trigger'));
      $pusher->trigger($channel, $event, $data); 
    }
    /* and class Pusher */
    /*
    |--------------------------------------------------------------------------
    | Initializes AsciiTable 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function AsciiTable($key=''){
        $database=database::db();
        return AsciiTable::init($database);
        
    }
    /* and class AsciiTable */

    /*
    |--------------------------------------------------------------------------
    | Initializes zip 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function zip($dir){
         return tatiyeNetZip::init($dir)->file_exists();
        
    }
    /* and class zip */
    /*
    |--------------------------------------------------------------------------
    | Initializes download 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function download($dir,$key,$token=''){
         return Download::init($dir,$key,$token='')->file_exists();
        
    }
    /* and class download */
    /*
    |--------------------------------------------------------------------------
    | Initializes uid 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    // public static function uid($key){
    //       return $key;
        
    // }
    /* and class uid */
    /*
    |--------------------------------------------------------------------------
    | Initializes story 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date   Sel 23 Mei 2023 04:18:30  WITA
    */
    public static function story($uid='',$package='',$segment='',$acses=''){
        if ($uid['segment']=='Login') {
            $row=tatiyeNet::OAuth($package);
            $myUid=$row['uid'];
            $nName=$row['name'];
            $picture=$row['picture'];
        } else {
            $myUid=self::uidkey();
            $nName=tatiyeNet::OAuthId('myname');
            $picture=tatiyeNet::OAuthId('picture');

        }

        
        $db=new tatiyeNet();
        $row= tatiyeNet::MyTabelFetch('story','date',"
            uid='".$myUid."' 
            AND date='".self::dt()."' 
            AND Status='".$uid['title']."'  
            AND Dictionary='".$uid['deskripsi']."'  
            ");
        if (!empty($row['date'])) {
            $arry = array( 
                'time'      =>self::tm(), 
            ); 
            $result=$db->que($arry)->update('story',"id='".$row['id']."'");
        } else {
        $arry = array(
            'uid'       =>$myUid ? $myUid :self::uidkey(), 
            'Nama'      =>$nName ? $nName : tatiyeNet::OAuthId('picture'), 
            'Photo'     =>$picture, 
            'Status'    =>$uid['title'], 
            'Segment'   =>$uid['segment'], 
            'icon'      =>$uid['icon'], 
            'color'     =>$uid['color'], 
            'Dictionary'=>$uid['deskripsi']?$uid['deskripsi']:'', 
            'date'      =>self::dt(), 
            'time'      =>self::tm(), 
        );
            $result=$db->que($arry)->insert("story");
        }
    }
    /* and class story */
    /*
    |--------------------------------------------------------------------------
    | Initializes story_package 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function story_package($package='',$segment='',$acses=''){
        if (!empty($acses)) {
            if ($acses=='Package') {
               $driver='theme';
            } else {
               $driver=$acses;
            }
            
        } else {
           $driver=tatiyeNet::cookie('driver');
        }
        
        //return sidebar::story(tatiyeNet::cookie('key'),$package,$segment,$driver);
        
    }
    /* and class story_package */
    /*
    |--------------------------------------------------------------------------
    | Initializes CacheManager 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function CacheManager($key=''){
       return tatiyeNetPhpfastcache::init($key);
        
    }
    /* and class CacheManager */
    /*
    |--------------------------------------------------------------------------
    | Initializes localStorage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function localStorage($key){
         return tatiyeNetPhpfastcache::init($key);
        
    }
    /* and class localStorage */

    /*
    |--------------------------------------------------------------------------
    | Initializes Java 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function Java($key=''){
        $args=database::db();
         return tatiyeNetJava::init($this->key,$args,$key);
    }
    /* and class Java */
    /*
    |--------------------------------------------------------------------------
    | Initializes Python 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function Python($key=''){
           $args=database::db();
           return Python::init($this->key,$args,$key);
        
    }
    /* and class Python */
    /*
    |--------------------------------------------------------------------------
    | Initializes Postgre 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Rab 27 Apr 2022 02:33:59  WITA 
    */
    public static function Postgre($key=''){
          $args=database::db();
          return Postgre::init($args);

        
    }
    /* and class Postgre */
    /*
    |--------------------------------------------------------------------------
    | Initializes txt 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function txt($key){
         $Text=tatiyeNet::Text();
          return $key;
        
    }
    /* and class txt */
    /*
    |--------------------------------------------------------------------------
    | Initializes CekDB 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function CekDB($key){
          return tatiyeNetConn::init($key,database::db())->$key();
    }
    /* and class CekDB */

    /*
    |--------------------------------------------------------------------------
    | Initializes SQLite 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function SQLite($key=''){
          $args=database::db();
          return SQLite::init(tatiyeNet::etcFile('helper/Database/SQLite/'.$args['database'].'.db'));
        
    }
    /* and class SQLite */
    /*
    |--------------------------------------------------------------------------
    | Initializes imggender 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Sel 19 Apr 2022 01:28:30  WITA 
    */
    public static function imggender($key){
       if ($key==1) {
           $images='imgdsh/80x80/L.jpeg';
       } else {
           $images='imgdsh/80x80/P.jpeg';
       }
       return $images;
        
    }
    /* and class imggender */
    /*
    |--------------------------------------------------------------------------
    | Initializes gps 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Sen 18 Apr 2022 08:23:57  WITA 
    */
    public static function GPS($key=''){
          return GPS::init($key);
        
    }
    /* and class gps */

    /*
    |--------------------------------------------------------------------------
    | Initializes Facedetector 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Sen 18 Apr 2022 05:04:03  WITA 
    */
    public static function Facedetector($key){
         return Facedetector::init($key);
        
    }
    /* and class Facedetector */
    /*
    |--------------------------------------------------------------------------
    | Initializes Chart 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 09 Jun 2022 04:31:43  WITA 
    */
    public static function Chart($key,$arry='',$segment=''){
          return Chart::init($key,$arry,$segment);
        
    }
    /* and class Chart */

    /*
    |--------------------------------------------------------------------------
    | Initializes Chart 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 09 Jun 2022 04:31:43  WITA 
    */
    public static function ChartV02($key='',$arry='',$segment=''){
          return Chart::initV02($key,$arry,$segment);
        
    }
    /* and class Chart */

    /*
    |--------------------------------------------------------------------------
    | Initializes nik 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function nik(){
         $row=tatiyeNet::kodewilayah(tatiyeNet::OAuthId('kode'));
         return nik::init($row['provinsi'],$row['kabupaten']);
        
    }
    /* and class nik */
    /*
    |--------------------------------------------------------------------------
    | Initializes TesseractOCR 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Tocr($images){
         $IMAGES=tatiyeNet::etcFile($images);
         $tesseractInstance = new TesseractOCR($IMAGES);
         return $tesseractInstance->run();
        
    }
    /* and class TesseractOCR */
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
    /* and class Protokol */
    /*
    |--------------------------------------------------------------------------
    | Initializes tn 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function tn($key){
            @$ID=explode('/',$_GET['tn']);
            if (!empty($ID[$key])) {
               return $ID[$key];
            } else {
               return '';
            }
            
          
        
    }
    /* and class tn */
    /*
    |--------------------------------------------------------------------------
    | Initializes WJTID 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function WJTEXP($key){
          $TOKEN =tatiyeNet::WJT(tatiyeNet::exp($key),'ID');
          return tatiyeNet::Encryption($TOKEN);
    }
    /* and class WJTID */
    /*
    |--------------------------------------------------------------------------
    | Initializes WJTEXPENCR 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function WJTEXPENCR($key){
           $TOKEN= tatiyeNet::tn($key);
           // $TOKEN =tatiyeNet::WJT(tatiyeNet::exp($key),'ID');
          return tatiyeNet::Encryption($TOKEN);
        
    }
    /* and class WJTEXPENCR */



    /*
    |--------------------------------------------------------------------------
    | Initializes kodewilayah 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function kodewilayah($key,$id=''){
        if (!empty($id)) {
            $row=array(
                'provinsi'=>substr($key,0,2),
                'kabupaten'=>substr($key,0,5),
                'kecamatan'=>substr($key,0,8),
                'desa'=>$key,
            );
        } else {
           $row=kodewilayah::init()->kddesa($key);
           
        }
         return $row; 
    }
    // /* and class kodewilayah */ enumerator
    /*
    |--------------------------------------------------------------------------
    | Initializes nameKWH 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Sab 16 Apr 2022 05:51:37  WITA 
    */
    public static function nameKWH(){
          $row=self::kodewilayah(tatiyeNet::OAuthId('kode'));
          return $row;
        
    }
    /* and class nameKWH */
    /*
    |--------------------------------------------------------------------------
    | Initializes kodeKWH 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function kodeKWH(){
          $row=tatiyeNet::kodewilayah(tatiyeNet::OAuthId('kode','1'));
          return $row;
        
    }
    /* and class kodeKWH */


    /*
    |--------------------------------------------------------------------------
    | Initializes select_kodewilayah 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function selectKodewilayah($key,$entri=''){
        if (!empty($entri)) {
            $entri=$entri;
        } else {
            $entri=tatiyeNet::OAuthId('kode');
        }
        
      $kdh=substr($entri,0,$key);
      $array1=array('kd'=>$kdh);
      $row=self::kodewilayah($entri);
      $json_arr=array_merge($array1,$row);
      return $json_arr;
    }
    /* and class select_kodewilayah */


 
    /*
    |--------------------------------------------------------------------------
    | Initializes compressImages 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Rab 29 Sep 2021 09:14:40  WITA 
    */
    public static function compressImages($source, $destination, $quality){
         $info = getimagesize($source);
         $Text=tatiyeNet::Text();
          // if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
          // elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source);
          // elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source);
          if($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
          } elseif ($info['mime'] == 'image/gif'){
            $image = imagecreatefromgif($source);
          } elseif ($info['mime'] == 'image/png'){


           $image = imagecreatefrompng($source);
           $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
           imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
           imagealphablending($bg, TRUE);
           imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
           imagedestroy($image);
           $quality = $quality; // 0 = low / smaller file, 100 = better / bigger file 
           imagejpeg($bg, $Text->strreplace([$source,'.png','.jpg']), $quality);
            unlink($source);
           imagedestroy($bg);
            // $image = imagecreatefrompng($source);
          } elseif ($info['mime'] == 'image/jpeg'){
            $image = imagecreatefromjpeg($source);
          } 
          return imagejpeg($image, $destination, $quality);
    }
    /* and class compressImages */
    /*
    |--------------------------------------------------------------------------
    | Initializes PhpOffice 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function PhpOffice($key=''){
       $arr_file = explode('.', $key);
       $extension = end($arr_file);
       if('csv' == $extension) {
           $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
       } else {
           $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
       }
       $spreadsheet = $reader->load($key);
       $sheetData = $spreadsheet->getActiveSheet()->toArray();
       return $sheetData;
     
        
    }
    /* and class PhpOffice */

    /*
    |--------------------------------------------------------------------------
    | Initializes captcha 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Captcha(){
           $num1 = rand(3,7);
           $num2 = rand(2,6);
           $num3 = rand(0,4);
           $_SET = ($num1+$num2)-$num3;
           $pic_code = '('.$num1.'+'.$num2.')-'.$num3.'=';
           return Captcha::init($_SET,$pic_code);   
        
    }
    /* and class captcha */
    /*
    |--------------------------------------------------------------------------
    | Initializes assetsProperty 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function assetsProperty($asset){
         $Text=tatiyeNet::Text();
         $db = new tatiyeNet();


        foreach ($asset as $key => $value) {

                 $ID=explode('/',$value);
                 $LINK=tatiyeNet::URL($value);
                 if ($ID[0] == 'https:') {
                   if ($Text->ekstensi($value)=='css') {
                       echo '<link rel="stylesheet" href="'.$value.'">'. PHP_EOL;
                   } else {
                      echo '<script src="'.$value.'"></script>'. PHP_EOL;
                   }
                 } else {
                  
                if ($Text->ekstensi($value)=='css') {
                     echo '<link rel="stylesheet" href="'.$LINK.'">'. PHP_EOL;
                } else {
                     echo '<script src="'.$LINK.'"></script>'. PHP_EOL;
                }
            }
                
        }
        
    }
    /* and class assetsProperty */
    /*
    |--------------------------------------------------------------------------
    | Initializes appAssetsProperty 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function appAssetsProperty($asset,$dir=''){
         print PHP_EOL;
         $Text=tatiyeNet::Text();
         $ID=explode('/',$value);
         if ($ID[0] == 'https:') {
               if ($Text->ekstensi($value)=='css') {
                   echo '<link rel="stylesheet" href="'.$value.'">'. PHP_EOL;
               } else {
                  echo '<script src="'.$value.'"></script>'. PHP_EOL;
               }
         } else {
              foreach ($asset as $key => $value) {
                   $LINK=tatiyeNet::URL('assets/app/theme/'.$value);
                   if ($Text->ekstensi($value)=='css') {
                         echo '<link rel="stylesheet" href="'.$LINK.'">'. PHP_EOL;
                    } else {
                         echo '<script src="'.$LINK.'"></script>'. PHP_EOL;
                    }    
               }
        }        
    }
    /* and class appAssetsProperty */
    /*
    |--------------------------------------------------------------------------
    | Initializes navMenu 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function dsh($key=''){
           return dshlper::init($key);
        
    }
    /* and class navMenu */
    /*
    |--------------------------------------------------------------------------
    | Initializes helper 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function helper(){
        return Dashboard::config('helper');
        
    }
    /* and class helper */
    /*
    |--------------------------------------------------------------------------
    | Initializes selectuser 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function selectuser(){
           return Dashboard::selectuser();
        
    }
    /* and class selectuser */
    /*
    |--------------------------------------------------------------------------
    | Initializes addPackage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function addPackage($public){
           tatiyeNet::custom_package($public)->insert('app'); 
           tatiyeNet::custom_rbac($public)->insert('1','package');
        
    }
    /* and class addPackage */
    /*
    |--------------------------------------------------------------------------
    | Initializes custom_package 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Sen 04 Apr 2022 01:58:47  WITA 
    */
    public static function custom_package($key=''){
        return tatiyeNetPackage::init(tatiyeNet::etcFolder('package/'.$key),$key);
        
    }
    /* and class custom_package */
    /*
    |--------------------------------------------------------------------------
    | Initializes custom_rbac 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function custom_rbac($key){
          return tatiyeNetRbac::init(tatiyeNet::etcFolder('package/'.$key),$key);
        
    }
    /* and class custom_rbac */
    /*
    |--------------------------------------------------------------------------
    | Initializes package 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function package($key=''){
        if (!empty($key)) {
           $page='/'.$key;
        } else {
           $page='';
        }
        return tatiyeNet::URL('dashboard/'.tatiyeNet::pageKeywords(1).$page);
    }
    /* and class package */
    /*
    |--------------------------------------------------------------------------
    | Initializes api 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function api($key=''){
        if (!empty($key)) {
           $page='/'.$key;
        } else {
           $page='';
        }
        return tatiyeNet::URL('api/'.tatiyeNet::pageKeywords(1).$page);
    }
    /* and class api */
    /*
    |--------------------------------------------------------------------------
    | Initializes trmToken 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function trmToken(){
     $Token=tatiyeNet::WJT([
          'secret'   => self::Consul()[0]['secret'], 
          'dir'      =>tatiyeNet::etcFolder('var'),
          'url'      =>tatiyeNet::URL(),
      ]);
     return $Token;
        
    }
    /* and class trmToken */

    /*
    |--------------------------------------------------------------------------
    | Initializes terminal 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Min 01 Mei 2022 12:12:16  WITA 
    */
    public static function terminal(){
      $Token=tatiyeNet::WJT([
          'secret'   => self::Consul()[0]['secret'], 
          'dir'      =>tatiyeNet::etcFolder('var'),
          'url'      =>tatiyeNet::URL(),
      ]);
        if (!empty(self::Consul()[0]['consul'])) {


            if (helper::config('wf_vesion')=='Elastic') {
                $set=tatiyeNet::etcController(23);
                if (!empty($set['Keywords'])) {
                     return self::SDK(tatiyeNetInit::vendor('terminal/'.$Token.'/terminal'));
                } 
            } else {
               return self::SDK(tatiyeNetInit::vendor('terminal/'.$Token.'/terminal'));
            }


    
        } else {
            return false;
        }
    }
    /* and class terminal */
    /*
    |--------------------------------------------------------------------------
    | Initializes log 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function errorLogs(){
        require_once(self::Consul()[0]['logs']);
     
        
    }
    /* and class log */
    /*
    |--------------------------------------------------------------------------
    | Initializes Mango 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Mango(){
      return new Client();
        
    }
    /* and class Mango */
    /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function MongoDB($query=''){

        return mongo::init()->from($query);        
   // $collection = $conn->assets->category;
        
    }
    /* and class title */
    /*
    |--------------------------------------------------------------------------
    | Initializes color 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function color($key){
       $array=array( 
          '0'  =>'#66a4fb',
          '1'  =>'#4cebb5',
          '2'  =>'#fec85e',
          '3'  =>'#ff7c8f',
          '4'  =>'#a4e063',
          '5'  =>'#a5d7fd',
          '6'  =>'#b2bece',
          '7'  =>'#CE93D8',
          '8'  =>'#B39DDB',
          '9'  =>'#9FA8DA',
          '10' =>'#90CAF9',
          '11' =>'#80DEEA',
          '12' =>'#80CBC4',
          '13' =>'#81C784',
          '14' =>'#AED581',
          '15' =>'#DCE775',
          '16' =>'#FFF59D',
          '17' =>'#FFE082',
          '18' =>'#b2bece',
          '19' =>'#007285',
          '20' =>'#580085',
          '21' =>'#850037',
          '22' =>'#856e00',
          '23' =>'#F49E0A',
       ); 
          return $array[$key]; 
    }
    /* and class color */
    /*
    |--------------------------------------------------------------------------
    | Initializes LoopNum 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function LoopNum($key){
     for($j = 0; $j < 6; $j++){
        $bonus[]=$j+1;
     }

          return $bonus[$key];
        
    }
    /* and class LoopNum */
    /*
    |--------------------------------------------------------------------------
    | Initializes Keywords 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Keywords($key=''){
        @$expanReq = explode("/", $_GET['tn']);
     if (!empty($key)) {
          
          return @$expanReq[$key];
      } else {
        $word= count($expanReq)-1;
        return $expanReq[$word];
      }
      
        
    }
    /* and class Keywords */
    /*
    |--------------------------------------------------------------------------
    | Initializes pageKeywords 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function pageKeywords($key,$Exp=''){
         if (!empty(self::Keywords($key))) {
             return self::Keywords($key);
         } else {
             if (!empty($Exp)) {
                 return $Exp;
             } else {
                 return 1;
             }
             
         }
        
    }
    /* and class pageKeywords */
        public static function secKeywords($key){
         if (!empty(self::Keywords($key))) {
             return self::Keywords($key);
         } else {
             return " ";
             
         }
        
    }
    /* and class pageKeywords */
    /*
    |--------------------------------------------------------------------------
    | Initializes explode 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function exp($key,$Exp=''){
         if (!empty(self::Keywords($key))) {
             return self::Keywords($key);
         } else {
             if (!empty($Exp)) {
                 return $Exp;
             } else {
                 return false;
             }
             
         }
        
    }
    /* and class explode */

    /*
    |--------------------------------------------------------------------------
    | Initializes andKeywords 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function andKeywords(){
     if (!empty($_GET['tn'])) {
        $expanReq = explode("/", $_GET['tn']);
        $word= count($expanReq)-1;
        return $expanReq[$word];
      }

        
    }
    /* and class andKeywords */
    /*
    |--------------------------------------------------------------------------
    | Initializes Account 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Token($email,$password){
         if (is_numeric($email)) {
            $variabel='ContactNo';
        } else {
            $variabel='UserName';
        }

          $db=new tatiyeNet();
          $row=$db->select("members WHERE $variabel='".$email."'AND Password='".$password."' ")->singleArray();
          if (!empty($row['id'])) {
            $key=tatiyeNet::WJT1(['key'   =>$row['id']]);
            return $key;
          } else {
            return '';
          }

        
    }
    /* and class Account */
    /*
    |--------------------------------------------------------------------------
    | Initializes TokenID 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function uidkey($Token=''){
        
        if (!empty(tatiyeNet::cookie('key'))) {
            $db=new tatiyeNet();
            if ($Token) {
                $get=$Token;
            } else {
                $get=tatiyeNet::cookie('key');
            }
            
          $query="SELECT id,statusdir FROM members WHERE id='".tatiyeNet::WJT($get,'key')."' ";
          $result=$db->query($query);
          $row = $result->fetch_object();

          if (!empty($row->id)) {
            return $row->id;
          } else {
            return false;
          }
            // code...
        } else {
             return false;
        }
        
    }
    /* and class TokenID */
    /*
    |--------------------------------------------------------------------------
    | Initializes uid  
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */

    /*
    |--------------------------------------------------------------------------
    | Initializes ClusterKdwh 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function ClusterKdwh(){
          $array=array(
                'Provinsi'    =>tatiyeNet::OAuthId('Provinsi'),
                'Kabupaten'        =>tatiyeNet::OAuthId('Kabupaten'),
                'Kecamatan'   =>tatiyeNet::OAuthId('Kecamatan'),
                'Desa'     =>tatiyeNet::OAuthId('Desa'),
            );
            return $array;
        
    }
    /* and class ClusterKdwh */

  
    /*
    |--------------------------------------------------------------------------
    | Initializes uikeyId 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function uikeyId(){
            $db=new tatiyeNet();
            $query="SELECT statusdir FROM members WHERE id='".self::uidkey()."' ";
            $result=$db->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            return  $row['statusdir'];
        
    }
    /* and class uikeyId */
    /*
    |--------------------------------------------------------------------------
    | Initializes CreateOAut 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */

    /*
    |--------------------------------------------------------------------------
    | Initializes OAuthChat 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function OAuthChat($Token,$uid){
          $db=new tatiyeNet();
          $query="SELECT FirstName,UserName,picture,nama_file,token,id FROM members WHERE id='".$Token."' ";
          $result=$db->query($query);
          $row = $result->fetch_object();
          //$PIC=explode('@',$row->UserName);
          $message=tatiyeNet::MyTabelFetch('chat','*',"id='".$uid."'");
          $userData=array(
           // 'uid'         =>$row->id,
           // 'token'       =>self::newToken($row->id), blob/chat/images/64/1673941731.jpeg
           
           // 'name_pic'    =>$PIC[0],
           // 'email'       =>$row->UserName,
           // 'created'     =>$row->created,
           // ,
           'id'          =>@$row->id,
           'name'        =>@$row->FirstName,
           'upload'      =>@$message['nama_file'],
           'avatar'      =>@tatiyeNet::img('80x80/user/'.$row->picture),
           'message'     =>$message['message'],
           'time'        =>tatiyeNet::st($message['time']),
           'token'       =>@$row->token,
           );
        return $userData; 
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes OAuthChatGroup 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function OAuthChatGroup($Token){
      $Text=tatiyeNet::Text();
      $UID= tatiyeNet::WJT($Token,'uid');
      $KEY= tatiyeNet::WJT($Token,'key');
          $db=new tatiyeNet();
          $query="SELECT id,FirstName,UserName,picture,created FROM members WHERE id='".tatiyeNet::WJT($KEY,'key')."' ";
          $result=$db->query($query);
          $row = $result->fetch_object();

          $Qr="SELECT * FROM chat  ORDER BY id DESC";
          $Rqr=$db->query($Qr);
          $uid=$Rqr->fetch_array(MYSQLI_ASSOC);  


        if (!empty($uid)) {
            $set=tatiyeNet::OAuthChatId($uid['user_id']);

            if (tatiyeNet::uidkey()==$uid['user_id']) {
                $Pesan='Anda '.$uid['message'];
            } else {
                $Pesan=$set['pic'].' '.$uid['message'];
            }  
            $time=tatiyeNet::st($uid['time']);  
        } else {     
            $Pesan=tatiyeNet::dt('DDIN');       
            $time='';   
        }

         $PIC=explode('@',$row->UserName);

              if ($row->id==3) {
                   $img=self::AssetsInformation('Favicon');
                   $myName='Group '.self::AssetsInformation('Title');
               } else {
                   $img=tatiyeNet::img('80x80/user/'.$row->picture);
                   $myName=$row->FirstName;
               }

         $userData=array(
          'uid'         =>$row->id,
          'token'       =>self::newToken($row->id),
          'name'        =>$myName,
          'name_pic'    =>$PIC[0],
          'message'     =>$Text->shorten([$Pesan,'29']),
          'email'       =>$row->UserName,
          'created'     =>$row->created,
          'time'        =>$time,
          'picture'     =>$img,
          );
       return $userData; 
        
    }
    /* and class OAuthChatGroup */

    /*
    |--------------------------------------------------------------------------
    | Initializes OAuthChat 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function OAuthChatId($id){
          $db=new tatiyeNet();
          $query="SELECT id,FirstName,UserName,picture,created FROM members WHERE id='".$id."' ";
          $result=$db->query($query);
          $row = $result->fetch_object();
          $PIC=explode(' ',$row->FirstName);
          $token=tatiyeNet::WJT([
                'key'    =>$row->id
           ]);
          $userData=array(
           'uid'         =>$row->id,
           'name'        =>$row->FirstName,
           'token'       =>self::newToken($row->id),
           'pic'         =>$PIC[0],
           'email'       =>$row->UserName,
           'created'     =>$row->created,
           'picture'     =>tatiyeNet::img('80x80/user/'.$row->picture),
           );

        return $userData; 
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function created(){
        $db=new tatiyeNet();
        $datauid = array(
            'modified'        => tatiyeNet::dt(),
            'created'         => tatiyeNet::tm()
        );  
         $members=$db->que($datauid)->update("members","id ='".tatiyeNet::uidkey()."'");
        
    }
    /* and class title */


    /* and class CreateOAut */
    public static function OAuthTrmSdk($Token){
          $db=new tatiyeNet();
          $query="SELECT * FROM members WHERE id='".tatiyeNet::WJT($Token,'key')."' ";
          $result=$db->query($query);
          $row = $result->fetch_object();
          $PIC=explode('@',$row->UserName);
          $userData=array(
           'uid      '=>$row->id,
           'token    '=>$Token,
           'status   '=>$row->Status_ID,
           'pws      '=>$row->Password,
           'md5      '=>$row->md5,
           'name     '=>$row->FirstName,
           'name_pic '=>$PIC[0],
           'email    '=>$row->UserName,
           'date     '=>$row->modified,
           'kd_prov  '=>$row->Province,
           'kd_kab   '=>$row->City,
           'kd_kec   '=>$row->Districts,
           'kode     '=>$row->education,
           'row      '=>1,
           'picture  '=>tatiyeNet::img('80x80/user/'.$row->picture),
           );

        return $userData; 
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes CreateOAut 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function SDKOAuth($Token){

          $db=new tatiyeNet();
          $query="SELECT * FROM members WHERE id='".tatiyeNet::WJT($Token,'key')."' ";
          $result=$db->query($query);
          $row = $result->fetch_object();

          $loginToken=tatiyeNet::WJT([
            'email'     => $row->UserName, 
            'pws'       => $row->Password,
            'hostName'  =>helper::config('base_url'),
            'autoload'  =>self::URL('wolf05/template/package/terminal/autoload.php'),
          ]);
          $userData=array(
           'uid'         =>$row->id,
           'token'       =>$Token,
           'login'       =>$loginToken,
           'date'        =>$row->modified,
           'row'         =>$row->row,
           );

        return $userData; 
    }
    /* and class CreateOAut */

    /*
    |--------------------------------------------------------------------------
    | Initializes uid 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function WJTname($key,$set){
              $db=new tatiyeNet();
              $query="SELECT * FROM members WHERE id='".$key."' ";
              $result=$db->query($query);
              $row = $result->fetch_array(MYSQLI_ASSOC);
    
              $pac=$db->select("rbac WHERE row=1")->sum("SUM(row) as total");
              $PIC=explode('@',$row['UserName']);
     
            $array=array(
                'uid'         =>$row['id'],
                'kode'        =>$row['education'],
                'myname'      =>$row['FirstName'].' '.$row['last_name'],
                'name'        =>$row['FirstName'],
                'bname'       =>$row['last_name'],
                'email'       =>$row['UserName'],
                'status'      =>$row['Status_ID'],
                'pic'         =>$PIC[0],
                'date'        =>$row['Datebirth'],
                'Provinsi'    =>$row['Provinsi'],
                'Kabupaten'        =>$row['Kabupaten'],
                'Kecamatan'   =>$row['Kecamatan'],
                'Desa'     =>$row['Desa'],
                'package'     =>$pac['total'],
                'domain'      =>tatiyeNet::URL($PIC[0]),
                'picture'     =>tatiyeNet::img('80x80/user/'.$row['picture']),

            );
           
            return $array[$set];
        
    }
    /* and class uid */


    /*
    |--------------------------------------------------------------------------
    | Initializes cekPackage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function cnmPackage($paket=''){
        if (!empty($paket)) {
            $cn=ucfirst($paket);
        } else {
           $cn='Elastic';
        }
        
           $db=new tatiyeNet();
           $query="SELECT user_id FROM rbac WHERE user_id='".self::uidkey()."' AND paket='".$cn."'";
           $result=$db->query($query);
           $row = $result->fetch_object();
           if (!empty($row->user_id)) {
               return true;
           } else {
               return false;
           }
    }
    /* and class cekPackage */


    /*
    |--------------------------------------------------------------------------
    | Initializes cekPackage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function cekPackage($Token){
          $db=new tatiyeNet();
          $query="SELECT user_id FROM rbac WHERE user_id='".tatiyeNet::WJT($Token,'key')."' ";
          $result=$db->query($query);
          $row = $result->fetch_object();
          if (!empty($row->user_id)) {
              return true;
          } else {
              return false;
          }
    }
    /* and class cekPackage */
    /*
    |--------------------------------------------------------------------------
    | Initializes OAuthSdk 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function OAuthSdk($Token){
          $db=new tatiyeNet();
          $query="SELECT * FROM members WHERE id='".tatiyeNet::WJT($Token,'key')."' ";
          $result=$db->query($query);
          $row = $result->fetch_object();
          if (!empty($row->id)) {
             return 1;
          } else {
             return 0;
          }
    }
    /* and class OAuthSdk */
    /*
    |--------------------------------------------------------------------------
    | Initializes uid 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function uid($key){
          return tatiyeNet::WJT(tatiyeNet::cookie($key),$key);
        
    }
    /* and class uid */

  /*
  |--------------------------------------------------------------------------
  | Initializes forOAuth 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date Sab 13 Nov 2021 12:11:06  WITA  
  */
  public static function OAuthToken($Token){
    return tatiyeNet::WJT($Token,'key');

  }
  /* and class forOAuth */
  /*
  |--------------------------------------------------------------------------
  | Initializes newToken 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date Sab 13 Nov 2021 12:11:06  WITA  
  */
  public static function newToken($Token){
     return tatiyeNet::WJT(['key'=>$Token]);

  }
  /* and class newToken */
    /*
  |--------------------------------------------------------------------------
  | Initializes setToken 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date Sab 13 Nov 2021 12:11:06  WITA  
  */
  public static function setToken(){
    $db=new tatiyeNet();
    $query="SELECT id FROM members WHERE id='".self::uidkey()."' ";
    $result=$db->query($query);
    $row = $result->fetch_object();
    if (!empty($row->id)) {
        return tatiyeNet::WJT(['key'=>$row->id]);
     } else {
        return false;
     }
   

  }
  /* and class newToken */
  /*
  |--------------------------------------------------------------------------
  | Initializes key 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function key(){
        return tatiyeNet::cookie('key');
      
  }
  /* and class key */

    /*
    |--------------------------------------------------------------------------
    | Initializes Assets 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Assets_template($key,$Exp){
        // $Expcdn=array();



        //  if($key == 'dashboard') {
        //      foreach (property::dashboard()[$Exp] as $key1 => $value1) { $Expcdn[$key1]='cdn/dashboard/'.$value1;}
        //      $External= Dashboard::theme()[$Exp];
        //      $Assets  =array_merge($External,$Expcdn);
        //     return $Assets;
        //  } elseif ($key == 'login'){
        //      foreach (property::dashboard()[$Exp] as $key1 => $value1) { $Expcdn[$key1]='cdn/dashboard/'.$value1;}
        //      $External= Dashboard::theme()[$Exp];
        //      $Assets  =array_merge($External,$Expcdn);
        //     return $Assets;
        //  } elseif ($key == 'webview'){
        //     foreach (property::webview()[$Exp] as $key1 => $value1) { $Expcdn[$key1]='cdn/webview/'.$value1;}
        //     $External= Webview::theme()[$Exp];
        //     $Assets  =array_merge($Expcdn,$External);
        //     return $Assets;
        //  } elseif ($key == 'webviewlogin'){
        //     foreach (property::webview()[$Exp] as $key1 => $value1) { $Expcdn[$key1]='cdn/webview/'.$value1;}
        //     $External= Webview::theme()[$Exp];
        //     $Assets  =array_merge($External,$Expcdn);
        //     return $Assets;

        //  } elseif ($key == 'mobile'){
        //     foreach (property::theme()[$Exp] as $key1 => $value1) {$Expcdn[$key1]='cdn/theme/'.$value1;}
        //     $External= helper::theme()[$Exp];
        //     $Assets  =array_merge($External,$Expcdn);
        //     return $Assets;

        //  } elseif ($key == 'theme'){
        //     foreach (property::theme()[$Exp] as $key1 => $value1) {$Expcdn[$key1]='cdn/theme/'.$value1;}
        //     $External= helper::theme()[$Exp];
        //     $Assets  =array_merge($External,$Expcdn);
        //     return $Assets;
        //  } else {
        
        //  }     
    }
    /* and class Assets */
    /*
    |--------------------------------------------------------------------------
    | Initializes Asset_url 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Asset_url($key,$Exptype){
         // if($key == 'dashboard') {

         //    return tatiyeNet::URL('asset'.$Exptype);

         // } elseif ($key == 'webview'){
         //    return tatiyeNet::URL('webasset'.$Exptype);
         // } elseif ($key == 'webviewlogin'){
         //    return tatiyeNet::URL('webasset'.$Exptype);
         // } elseif ($key == 'login'){
         //    return tatiyeNet::URL('asset'.$Exptype);
         // } elseif ($key == 'theme'){
         //      return tatiyeNet::URL('assets'.$Exptype);
         // } elseif ($key == 'webassetcdn'){
         //     return tatiyeNet::URL('cdn'.$Exptype);
         // } elseif ($key == 'assetcdn'){
         //     return tatiyeNet::URL('cdn'.$Exptype);
         // } else {
          
         // }   
        
    }
    /* and class Asset_url */
    /*
    |--------------------------------------------------------------------------
    | Initializes slide 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function slide(){
         if (!empty(tatiyeNet::cookie('slide'))) {
             return tatiyeNet::cookie('slide');
         } else {
             return 'is-active';
         }
         
        
    }
    /* and class slide */
    /*
    |--------------------------------------------------------------------------
    | Initializes mode 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function mode(){
         if (!empty(tatiyeNet::cookie('mode'))) {
             return tatiyeNet::cookie('mode');
         } else {
             return 'night-mode';
         }
         
        
    }
    /* and class mode */

    /*
    |--------------------------------------------------------------------------
    | Initializes Tables 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Min 27 Mar 2022 10:13:01  WITA 
    */
    public static function Tables($GET, $table, $primaryKey, $columns, $searchFilter,$view=''){
        if (!empty($view)) {
            return tatiyeNet::json_view(Tables::simple($GET,$table, $primaryKey, $columns, $searchFilter ));
        } else {
          return json_encode(
             Tables::simple($GET,$table, $primaryKey, $columns, $searchFilter)
          );
        }
        
    }
    /* and class Tables */
    public  function PDO() {
         $args=database::db();
          if (!isset($args['database'])) {
              throw new Exception('&args[\'database\'] is required');
          }

          if (!isset($args['username'])) {
              throw new Exception('&args[\'username\']  is required');
          }

         $type     = isset($args['type']) ? $args['type'] : 'mysql';
         $host     = isset($args['host']) ? $args['host'] : 'localhost';
         $charset  = isset($args['charset']) ? $args['charset'] : 'utf8';
         $port     = '';
         $password = isset($args['password']) ? $args['password'] : '';
         $database = $args['database'];
         $username = $args['username'];
         $this->db = new PDO("$type:host=$host;$port" . "dbname=$database;charset=$charset", $username, $password);
         $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->db;
    }
    /* and class PDO */
    /*
    |--------------------------------------------------------------------------
    | Initializes SQLI 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function mysqli(){
         $args=database::db();
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
    | Initializes Curl 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Curl($key){
        return tatiyeNetCurl::init()->url($key);
        
    }
    /* and class Curl */
    /*
    |--------------------------------------------------------------------------
    | Initializes SDK 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2020
    | @Date Min 27 Mar 2022 12:03:12  WITA
    */
      public static function SDK($url, $method = 'GET', $data = false, $headers = false, $returnInfo = false) {
        $ch = curl_init();
        
        if (strtoupper($method) == 'POST'):
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            if ($data !== false):
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            endif;
        else:
            if ($data !== false):
                if (is_array($data)):
                    $dataTokens = array();
                    foreach ($data as $key => $value):
                        array_push($dataTokens, urlencode($key) . '=' . urlencode($value));
                    endforeach;
                    $data = implode('&', $dataTokens);
                endif;
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $data);
            else:
                curl_setopt($ch, CURLOPT_URL, $url);
            endif;
        endif;
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        if ($headers !== false):
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        endif;
        $contents = curl_exec($ch);
        if ($returnInfo):
            $info = curl_getinfo($ch);
        endif;
        curl_close($ch);
        if ($returnInfo):
            return array('contents' => $contents, 'info' => $info);
        else:
            return $contents;
        endif;
    }  
    
    /*
    |--------------------------------------------------------------------------
    | AND SDK 
    |--------------------------------------------------------------------------
    */
    /*
    |--------------------------------------------------------------------------
    | Initializes WJT 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
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
     public static function WJT1($options='',$key=''){
        if(is_array($options)) {
             return Wjt::init()->array($options)->Encode1();
        } else {
            if (!empty($key)) {
                return Wjt::init()->token($options)->Decode($key);
            } else {
               return Wjt::init()->token($options)->code();
            }   
        }
            
    }

    /* and class WJT */
    /*
    |--------------------------------------------------------------------------
    | Initializes WJT 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
     public static function WJTX($options=''){
        return Wjt::init()->array($options)->Encodex($options);
            
    }

    /* and class WJT */

    /*
    |--------------------------------------------------------------------------
    | Initializes Jsonviewer 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2020
    | @Date  Jum 17 Apr 2020 02:50:16  WITA
    */
    /**
     * @param array  options the display options .
     * @param mixed  Block to generate a customized inside  content.
     */
    public static function json_view($response,$block='1'){
       $add=json_encode($response);
              echo '
                 <pre id="json-renderer'.$block.'">'.$add.'</pre>
              ';
    }
    /* and class Jsonviewer */
    /*
    |--------------------------------------------------------------------------
    | Initializes getWJT 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function getWJT($token){
             $GetID=tatiyeNet::WJT($token); 
            return $GetID;
    }
    /* and class getWJT */


    /*
    |--------------------------------------------------------------------------
    | Initializes autoload 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function autoload($key,$file){
            $variable=explode('/',$file);
            if (ucwords($variable[0])==$variable[0]) {
                
                if (ucwords($variable[1])==$variable[1]) {

                    if (ucwords($variable[2])==$variable[2]) {

                       $Folder=$variable[0].'/'.$variable[1].'/'.$variable[2].'/';

                    } else {
                        
                       $Folder=$variable[0].'/'.$variable[1].'/';
                    }
                } else {
                    $Folder=$variable[0].'/';
                }
            } else {
                    $Folder='';
            }
            
       
           foreach (tatiyeNetInit::Incognito() as $nito => $valuenito) {
            if ($nito==$key) {
                $etcFolder=$nito;
            }
               // code...
           }
           if (!empty($etcFolder)) {
                $dir=$etcFolder.'/';
           } else {

                if (!empty($variable[1])) {
                    $dir="theme/view/";
                } else {
                    $dir="theme/";
                }
                
                
           }

            foreach ($variable as $key => $value) {
                if (file_exists(tatiyeNet::etcFile($dir.$Folder.$value))) {
                      $Sataus   =1;
                      $File     =tatiyeNet::etcFile($dir.$Folder.$value);
                      $Content  =tatiyeNet::etcFile($dir.$Folder.'content');
                    
                } 
            }
             if (!empty($Sataus)) {
             } else {
                 $File     =tatiyeNet::etcFile($dir."default.php");
                 $Content  =tatiyeNet::etcFile($dir."content.php");
             }



               return [
                'key' =>$Content,
                'file'=>$File,
            ];


        
    }
    /* and class autoload */
    /*
    |--------------------------------------------------------------------------
    | Initializes title 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Encryption($options){
         if (is_numeric($options)) {
             //return base64_encode($options);
             return Encryption::Encrypt($options);
         } else {
             // return base64_decode($options); //123
           return Encryption::Decrypt($options);
         }
      
    }
    /* and class title */
    /*
    |--------------------------------------------------------------------------
    | Initializes Ecytn 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Sel 05 Apr 2022 12:10:28  WITA 
    */
    public static function Ecytn($options){
         if (is_numeric($options)) {
             //return base64_encode($options);
             return Encryption::Encrypt($options);
         } else {
             // return base64_decode($options); //123
           return Encryption::Decrypt($options);
         }
        
    }
    /* and class Ecytn */
    /*
    |--------------------------------------------------------------------------
    | Initializes Tabel Raw 
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
    /*
    |--------------------------------------------------------------------------
    | Initializes Encode 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Encode($key=''){
          return Encryption::Encode($key);
        
    }
    /* and class Encode */
    /*
    |--------------------------------------------------------------------------
    | Initializes Decode 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Decode($key=''){
          return Encryption::Decode($key);
        
    }
    /* and class Decode */

    /*
    |--------------------------------------------------------------------------
    | Initializes mycone 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 12 Mei 2022 10:15:26  WITA  
    */
    public static function connect(){
         $args=database::db();
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
    /* and class mycone */
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
    | Initializes query 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 24 Mar 2022 11:18:48  WITA 
    */
    public  function que($result){
          return db::init(database::db())->result($result);
    }
    /* and class query */
    /*
    |--------------------------------------------------------------------------
    | Initializes from 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function from_array($query){
       return tatiyeNetQueryForge::init(database::db())->from_array($query);        
    }
    /* and class from */
    /*
    |--------------------------------------------------------------------------
    | Initializes from_sql 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function from_sql($query){
         return tatiyeNetQueryForge::init(database::db())->from_sql($query); 
        
    }
    /* and class from_sql */
    /*
    |--------------------------------------------------------------------------
    | Initializes delete 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function delete($table,$where){
         $db=new tatiyeNet();
         $query="DELETE FROM $table WHERE $where";
         $result=$db->query($query);
         return false;
    }
    /* and class delete */

 
    /*
     |--------------------------------------------------------------------------
     | Initializes Nosql 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date  
     */
     public static function netDb($array=''){
         return tatiyeNetDb::init($array)->from_array($array);   
     }
     /* and class Nosql */ 



    /*
    |--------------------------------------------------------------------------
    | Initializes select 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function select($from){
              return tatiyeNetQuery::init(database::db())->select($from);
    }
    /* and class select */
 

    /*
    |--------------------------------------------------------------------------
    | Initializes sum 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function sum($tabel){
        if ($tabel=='user') {
           $myTabel='members';
        } else {
           $myTabel=$tabel;
        }
        
        $db = new tatiyeNet();
        $conn=$db->PDO();
        $query = "SELECT COUNT(*) as total_rows FROM " . $myTabel . "";
        $stmt = $conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_rows'];
    }
    /* and class sum */
    /*
    |--------------------------------------------------------------------------
    | Initializes rowCount 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function rowCount($key){
          return self::sum($key);
        
    }
    /* and class rowCount */
    /*
    |--------------------------------------------------------------------------
    | Initializes create_database 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function create_database($key){
          return tatiyeNetQueryForge::init(database::db())->create_db($key);   
        
    }
    /* and class create_database */
    /*
    |--------------------------------------------------------------------------
    | Initializes show_tabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Rab 04 Mei 2022 04:28:20  WITA 
    */
    public static function dbtabel(){
          return tatiyeNetQueryForge::init(database::db()); 
        
    }
    /* and class show_tabel */
    /*
    |--------------------------------------------------------------------------
    | Initializes drop_tabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function drop_tabel($key){
          return tatiyeNetQueryForge::init(database::db())->drop_tabel($key);   
        
    }
    /* and class drop_tabel */
    /*
    |--------------------------------------------------------------------------
    | Initializes dropDatabase 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Jum 25 Mar 2022 11:15:09  WITA 
    */
    public static function drop_database($key){
         return tatiyeNetQueryForge::init(database::db())->dropDatabase($key);   
        
    }
    /* and class dropDatabase */
    /*
    |--------------------------------------------------------------------------
    | Initializes backtrace 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function backtrace(){
      $backtrace= debug_backtrace();
    return $backtrace[1]['args'][0];
        
    }
    /* and class backtrace */
    /*
    |--------------------------------------------------------------------------
    | Initializes log 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function log($key=''){
       $LogBase = new log();
       // Types to log
       $LogBase->enable_error(true, E_NOTICE);
       $LogBase->enable_fatal();
       $LogBase->enable_exception();
       $LogBase->enable_method_print();

        
    }
    /* and class log */
    /*
    |--------------------------------------------------------------------------
    | Initializes Assets 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Assets($variable){
          $response=array();
          $h=array();
          $arr = array();
          $Text=self::Text();
          // $Assets=self::Nosql("select/Assets");
          $backtrace= debug_backtrace();
          $dir=$backtrace[1]['args'][0];
          $ID=explode('/',$dir);
          $WID=explode('wolf05',$dir);
          $VAR='wolf05'.$WID[1];
          $count= count($ID)-1;
          $countAssets= count($ID)-2;
              $hkey       ='property/helper/wolf08.js';
              $h['key']   ='property/helper/wolf08.js';
              $h['dir']   ='wolf08';
              $h['file']  ='js';
       foreach ($variable as $key => $value) {

  
              $hkey='property/'.$ID[$countAssets].'/'.$value;
              $h['key']='property/'.$ID[$countAssets].'/'.$value;
              $h['dir']=$Text->strreplace([$VAR,$ID[$count],'']).$value;
              $h['file']=$Text->ekstensi($value);
                array_push($response, $h);
                $set=self::netDb()->where('Assets',"key=$hkey");
                if (!empty($set['key'])) {} else {
                  self::netDb($h)->insert('Assets');
                }
  }

 return  property::Assets($response);








        
    }
    /* and class Assets */
    /*
    |--------------------------------------------------------------------------
    | Initializes property 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function property(){ 
         return new property();
    }
    /* and class property */


    /*
    |--------------------------------------------------------------------------
    | Initializes debug 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2020
    | @Date Sel 22 Mar 2022 03:22:18  WITA
    */
   public static function debug($variable) {
         $backtrace= debug_backtrace();
         $File=$backtrace[1]['args'][0];

         return Debug::Debug($variable,$File);
    }
    /*
    |--------------------------------------------------------------------------
    | AND debug 
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Initializes objectToArray 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function objectToArray($object) {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map(array('self', 'objectToArray'), $object);
    }
    
    /*
    |--------------------------------------------------------------------------
    | Initializes arrayToObject 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function arrayToObject($array) {
        if (!is_array($array)) {
            return $array;
        }
        
        // $object = new stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name => $value) {
                $object->$name = self::arrayToObject($value);
            }
            return $object;
        } else {
            return FALSE;
        }
    }
    /* and class toArray */

    /*
    |--------------------------------------------------------------------------
    | Initializes CSRF 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function CSRF($key='',$value=''){
        $new_token = new CSRF($key);
        if (!empty($value)) {
          $token=(isset($_POST["token_$key"]))  ? strip_tags(trim($_POST["token_$key"])) : false;
          if (!$new_token->check_token($token)) {
           return '1';
          }
        } else {
           return $new_token->get_token();
        }
    }
    /* and class CSRF */
    /*
    |--------------------------------------------------------------------------
    | Initializes XSS 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function XSS($key){
          return CSRF::XSS($key);
        
    }
    /* and class XSS */
    /*
    |--------------------------------------------------------------------------
    | Initializes Session 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Session($key,$name='',$value=''){
           $Session= new Session($key,$name,$value);
          return $Session->$key($name,$value);

    }
    /* and class Session */
    /*
    |--------------------------------------------------------------------------
    | Initializes Rout 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Router($key,$Exp){

          return  new Router($key,$Exp);
        
    }
    /* and class Rout */
    /*
    |--------------------------------------------------------------------------
    | Initializes ProtokolAkses 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function accessDriverProtokol(){
          if (tatiyeNet::Protokol()=='theme') {
              return 'Package';
          } else {
              return 'Mobile';
          }
          
        
    }
    /* and class ProtokolAkses */

    /*
    |--------------------------------------------------------------------------
    | Initializes cekPackage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function routerPanelPackage($paket){
           $db=new tatiyeNet();
           $query="SELECT user_id FROM rbac WHERE user_id='".tatiyeNet::uidkey()."' AND paket='".$paket."' AND driver='".self::accessDriverProtokol()."'";
           $result=$db->query($query);
           $row = $result->fetch_array(MYSQLI_ASSOC);                          
          if (!empty($row['user_id'])) {
              return true;
          } else {
              if ($paket=='Account') {
                 return true;
               } elseif ($paket == 'Assets'){

                 if (tatiyeNet::uidkey()==1) {

                    return true;

                 } else {

                    return false;
                 }
               } elseif ($paket == 'Dokumen'){
                   return true;
               // } elseif ($paket == 'Query'){
               //     return true;
              } else {
                 return false;
              }
              
              
          }
          
        
    }
    /* and class cekPackage */
    /*
    |--------------------------------------------------------------------------
    | Initializes Router_pane 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function routerPanel($key){


         $ID=explode('/',$_GET['tn']);
         if (!empty($ID[1])) {
             if ($ID[2]) {
                    if (file_exists(tatiyeNet::etcFolder('package/'.$ID[1].'/View'))) {
                         if (!empty($ID[3])) {

                             if (file_exists(tatiyeNet::etcFile('package/'.$ID[1].'/View/'.$ID[2].'/'.$ID[3]))) {
                                 $default='package/'.$ID[1].'/View/'.$ID[2];
                                 $set=3;
                             } else {

                                 if (file_exists(tatiyeNet::etcFile('package/'.$ID[1].'/View/'.$ID[2]))) {
                                      $default='package/'.$ID[1].'/View';
                                      $set=2;
                                    } else {
                                      $default='package/'.$ID[1];
                                      $set=2;
                                    }
                             }
                         } else {

                             if (file_exists(tatiyeNet::etcFile('package/'.$ID[1].'/View/'.$ID[2]))) {
                               $default='package/'.$ID[1].'/View';
                               $set=2;
                             } else {
                               $default='package/'.$ID[1];
                               $set=2;
                             }
                         }  
                    } else {
                         $default='package';
                         $set=2;
                    }
             } else {
                 $default='package/'.$ID[1];
                 $set=2;
             }
         } else {
             $default='package';
             $set=2;
         }
             $row= tatiyeNet::MyTabelFetch('package','id',"pacname='".$ID[1]."' AND code4='instances'");  
             if (!empty($row)) {
                  $rootDev='package/instances';
             } else {
                 $rootDev=$default;
             }

         if (!empty(self::routerPanelPackage(ucfirst($ID[1])))) {
             $Router = tatiyeNet::Router($rootDev, "default");
             return $Router->autoload($set);
         } else {
             $Router = tatiyeNet::Router('package', "default");
             // echo "string";
             return $Router->autoload(2);
         }







          
    }
    /* and class Router_pane */
    /*
    |--------------------------------------------------------------------------
    | Initializes userActiv 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function userActiv($lastactivity){
              if(time() > $lastactivity+36000){
                $onlineStats = "Offline";
              }else if(time() < $lastactivity+36000){
                 $onlineStats = "Online";
              }
              return $onlineStats;

        
    }
    /* and class userActiv */
    /*
    |--------------------------------------------------------------------------
    | Initializes routerWebview 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function routerWebview($key){
         $ID=explode('/',$_GET['tn']);
         if (!empty($ID[1])) {
             if ($ID[2]) {
                    if (file_exists(tatiyeNet::etcFolder('package/'.$ID[1].'/View'))) {
                         if (!empty($ID[3])) {

                             if (file_exists(tatiyeNet::etcFile('package/'.$ID[1].'/View/'.$ID[2].'/'.$ID[3]))) {
                                 $default='package/'.$ID[1].'/View/'.$ID[2];
                                 $set=3;
                             } else {

                                 if (file_exists(tatiyeNet::etcFile('package/'.$ID[1].'/View/'.$ID[2]))) {
                                      $default='package/'.$ID[1].'/View';
                                      $set=2;
                                    } else {
                                      $default='package/'.$ID[1];
                                      $set=2;
                                    }
                             }
                         } else {

                             if (file_exists(tatiyeNet::etcFile('package/'.$ID[1].'/View/'.$ID[2]))) {
                               $default='package/'.$ID[1].'/View';
                               $set=2;
                             } else {
                               $default='package/'.$ID[1];
                               $set=2;
                             }
                         }  
                    } else {
                         $default='package';
                         $set=2;
                    }
             } else {
                 $default='package/'.$ID[1];
                 $set=2;
             }
         } else {
             $default='package';
             $set=2;
         }


            $Router = tatiyeNet::Router($default, "default");
          return $Router->autoload($set);
        
    }
    /* and class routerWebview */

    /*
    |--------------------------------------------------------------------------
    | Initializes Router_api 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Router_api_v2($newKey,$keyid=''){
    
          if (!empty($newKey)) {
              return tatiyeNet::dirFile($newKey);
          } else {
             echo "string";
          }
          
         
        
    }
    /* and class Router_api */

    /*
    |--------------------------------------------------------------------------
    | Initializes Router_api 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Router_api($key){
         $ID=explode('/',$_GET['tn']);
         if (!empty($ID[1])) {
             if (!empty($ID[2])) {

                    if (file_exists(tatiyeNet::etcFolder('package/'.$ID[1].'/Model'))) {
                         if (!empty($ID[3])) {

                             if (file_exists(tatiyeNet::etcFile('package/'.$ID[1].'/Model/'.$ID[2].'/'.$ID[3]))) {
                                 $default='package/'.$ID[1].'/Model/'.$ID[2];
                                 $set=3;
                                 $set1='index';
                             } else {

                                 if (file_exists(tatiyeNet::etcFile('package/'.$ID[1].'/Model/'.$ID[2]))) {
                                      $default='package/'.$ID[1].'/Model';
                                      $set=2;
                                      $set1='index';
                                    } else {
                                      $default='package/'.$ID[1].'/Model';
                                      $set=2;
                                      $set1='index';
                                    }
                             }
                         } else {

                             if (file_exists(tatiyeNet::etcFile('package/'.$ID[1].'/Model/'.$ID[2]))) {
                               $default='package/'.$ID[1].'/Model';
                               $set=2;
                               $set1=5;
                             } else {
                               $default='package/account/Model';
                               $set=2;
                               $set1='index';
                             }
                         }  
                    } else {
                         $default='package/account/Model';
                         $set=2;
                         $set1='index';
                    }
             } else {
                 $default='package/account/Model';
                 $set=2;
                 $set1='index';
             }
         } else {
             $default='package/account/Model';
             $set=2;
             $set1='index';
         }
       
          $Router = tatiyeNet::Router($default, $set1);
          return $Router->autoload($set);
        
    }
    /* and class Router_api */

     /*
     |--------------------------------------------------------------------------
     | Initializes img 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date  
     */
     public static function avatar($key='',$Instance=''){
           return igimg::avatar($key,$Instance);
         
     }
     /* and class img */
          public static function avatarCode($key='',$Instance=''){
           return igimg::avatarCode($key,$Instance);
         
     }
     /* and class img */
     /*
     |--------------------------------------------------------------------------
     | Initializes Text 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2020
     | @Date 00:09:39 
     */
     /**
      * @param array  options the display options .
      * @param mixed  Block to generate a customized inside  content.
      */
    public static function  Text(){
          // $tatiyeNetText= new Text();
          return new Text();
     }



 /*
 |--------------------------------------------------------------------------
 | Initializes validation 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2021
 | @Date  
 */
 public static function val($options,$H1,$H2='',$H3='',$H4=''){
          $tatiyeNetText= new tatiyeNetValidation();
          if (!empty($H2)) {
            return $tatiyeNetText->$options($H1,$H2,$H3,$H4);
          } else {
            return $tatiyeNetText->$options($H1,$H2,$H3,$H4);
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
    | Initializes DriversConsule 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function DriversConsule(){
         $Security=new Security();
         return $Security->DriversConsule();
        
    }
    /* and class DriversConsule */
    /*
    |--------------------------------------------------------------------------
    | Initializes logTerminal 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 17 Mar 2022 06:05:13  WITA 
    */
    public static function Consul(){
         return helper::terminal();
        
    }
    /* and class logTerminal */  
    /*
    |--------------------------------------------------------------------------
    | Initializes LogConsul 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function LogConsul(){
         $Security=new Security();
         return $Security->login();
        
    }
    /* and class LogConsul */
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
  | Initializes consulGavatar 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function CGavatar(){
        return igimg::consulGavatar();
      
  }
  /* and class consulGavatar */

 
/*
|--------------------------------------------------------------------------
| Initializes Cache 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function PageCache($key,$Exp=''){
     $Security=new Security();
     $run =new tatiyeNetCache($key,$Exp);
     return $run->$key($Security->consul());
}
/* and class Cache */
/*
|--------------------------------------------------------------------------
| Initializes Cache 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function Cache($key,$Exp=''){
      $Security=new Security();
      $run =new tatiyeNetCache($key,$Exp);
     return $run->File($key,$Security->consul(),$Exp);
    
}
/* and class Cache */
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



  /* and class st */

  /*
  |--------------------------------------------------------------------------
  | Initializes dt 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date Sel 15 Mar 2022 01:52:49  WITA 
  */
  public static function dt($Exp='',$Set=''){
     if (!empty($Exp)) {

               $view= new tatiyeNetDate($Exp);
              // return $view->$Exp();
               if ($Exp == 'd-M-Y') {
                  return date($Exp);
               } else {
                   return $view->$Exp();
               }
     } else {

           return date('Y/m/d');
     
        
        
     }
  }
  /* and class dt */

  /*
  |--------------------------------------------------------------------------
  | Initializes tm 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  
  */
  public static function tm($Exp=''){
         $view= new tatiyeNetTime();
         if ($Exp=='zona') {
              return $view->zona();
         } else {
              if (!empty($Exp)) {
                  return $view->TimeSet($Exp);
              } else {
                 return $view->Time();
              }
              
         }
       
       
  }
  /* and class tm */
    


  /*
  |--------------------------------------------------------------------------
  | Initializes stristrText 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2020
  | @Date  
  */
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
  | Initializes images 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  
  */
  public static function images($Exp){
         $expanReq = explode("/", $Exp);
          $file=$Exp;
          $type=tatiyeNet::eksfile($file);
          $segmen=count($expanReq);
          $segmenGet=count($expanReq)-1;
          $resizeSet=$segmenGet-1;
          $resize=@$expanReq[$resizeSet];
          $ID=explode('x',$resize);
          $filex= $expanReq[$segmenGet];
           if (!empty($ID[0])) {
                $origenal='assets/images/'.$filex;
                $dir1='assets/images/'.$resize;
                return tatiyeNetImagesResize::init(
                $origenal,
                $type,
                $resize,
                $filex)->resize($dir1);
           } else {
               return 'assets/images/'.$file;
           }
  }
  /* and class images */
  /*
  |--------------------------------------------------------------------------
  | Initializes img 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date Min 13 Mar 2022 03:50:39  WITA 
  */
  public static function drive($Exp){
        $expanReq = explode("/", $Exp);
          $file=$Exp;
          $type=tatiyeNet::eksfile($file);
          $segmen=count($expanReq);
          $segmenGet=count($expanReq)-1;
          $resizeSet=$segmenGet-1;
          $resize=@$expanReq[$resizeSet];
          $ID=explode('x',$resize);
          $filex= $expanReq[$segmenGet];
           if (!empty($ID[0])) {
                $origenal='drive/'.$filex;
                $dir1='drive/'.$resize;
                return tatiyeNetImagesResize::init(
                $origenal,
                $type,
                $resize,
                $filex)->resize($dir1);
           } else {
               return 'drive/'.$file;
           }
  } 
  /* and class img */


  public static function RequSet($Exp,$dir){
        return tatiyeNetRequest::RequSet($Exp,$dir);
  }
  /* and class RequSet */

  /*
  |--------------------------------------------------------------------------
  | Initializes imgface 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function imgface($key){
        return self::URL('facedetector/'.$key);
      
  }
  /* and class imgface */
  /*
  |--------------------------------------------------------------------------
  | Initializes imgconsul 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date Jum 18 Mar 2022 11:07:17  WITA 
  */
  public static function imgconsul($key){
        return self::URL('imgconsul/'.$key);
      
  }
  /* and class imgconsul */

  /*
  |--------------------------------------------------------------------------
  | Initializes imgdsh 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function imgdsh($Exp){
         return self::URL('imgdsh/'.$Exp);
      
  }
  /* and class imgdsh */
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
  | Initializes dirFile 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  Sab 12 Mar 2022 11:52:45  WITA
  */
  public static function dirFile($Exp){
       return tatiyeNetCore::file($Exp,'dir');
  }
  /* and class dirFile */
  /*
  |--------------------------------------------------------------------------
  | Initializes etcFile  
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date 23:52:47 
  */
  public static function etcFile($Exp){
       return tatiyeNetCore::file($Exp,'etc');
  }
  /* and class etcFile */
  public static function etcPackage($Exp){
       return tatiyeNetCore::file('package/'.$Exp,'etc');
  }

  /*
  |--------------------------------------------------------------------------
  | Initializes setPackage 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date 7/14/2023 9:05:39 PM  
  */
  public static function setPackage($myetc){
      $Text=self::Text();
      $IDPackage=explode('/',$myetc);
      if (!empty($IDPackage[1])) {

        $publicPath=$IDPackage[0].'/'.$Text->strreplace([$myetc,$IDPackage[0].'/','View/']);

      } else {
        $publicPath=$IDPackage[0].'/default';
      }
      return self::etcPackage($publicPath);
      
  }
  /* and class setPackage */

  public static function setFolder($myetc){
      $Text=self::Text();
      $IDPackage=explode('/',$myetc);
      if (!empty($IDPackage[1])) {

        $publicPath='package/'.$IDPackage[0].'/'.$Text->strreplace([$myetc,$IDPackage[0].'/','View/']);

      } else {
        $publicPath='package/'.$IDPackage[0].'/default';
      }
      return self::etcFolder($publicPath);
      
  }
  /* and class setPackage */

  /*
  |--------------------------------------------------------------------------
  | Initializes ulrFile 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date 23:52:47 
  */
  public static function ulrFile($Exp){
       return tatiyeNetCore::file($Exp,'URL');
  }
  /* and class ulrFile */
  public static function urlFile($Exp){
       return tatiyeNetCore::file($Exp,'URL');
  }
  /* and class ulrFile */

  /*
  |--------------------------------------------------------------------------
  | Initializes dirFolder 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  Sab 12 Mar 2022 11:52:45  WITA
  */
  public static function dirFolder($Exp){
       return tatiyeNetCore::folder($Exp,'dir');
  }
  /* and class dirFolder */
  /*
  |--------------------------------------------------------------------------
  | Initializes etcFolder 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date 23:52:47 
  */
  public static function etcFolder($Exp){
       return tatiyeNetCore::folder($Exp,'etc');
  }
  /* and class etcFolder */
  /*
  |--------------------------------------------------------------------------
  | Initializes ulrFolder 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date 23:52:47 
  */
  public static function ulrFolder($Exp){
       return tatiyeNetCore::folder($Exp,'URL');
  }

  public static function urlFolder($Exp){
       return tatiyeNetCore::folder($Exp,'URL');
  }


  /* and class ulrFolder */
  /*
  |--------------------------------------------------------------------------
  | Initializes opendir 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  
  */
  public static function opendir($Exp){
    $etcFolder=tatiyeNet::etcFolder($Exp);
    $variable=tatiyeNetCore::opendir($etcFolder);
      foreach ($variable[0] as $key => $value) {
         echo $value.'<br>';
      }
      // return ;
  }
  /* and class opendir */
  /*
  |--------------------------------------------------------------------------
  | Initializes opendirFolder 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date Min 20 Mar 2022 12:05:00  WITA 
  */
  public static function opendirFolder($Exp){
      $etcFolder=tatiyeNet::etcFolder($Exp);
      $variable=tatiyeNetCore::opendirFolder($etcFolder);
      foreach ($variable[0] as $key => $value) {
        $arry[]=$value;
      }
      return $arry;
  }
  /* and class opendirFolder */


  /*
  |--------------------------------------------------------------------------
  | Initializes chdir 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date Min 07 Nov 2021 11:46:50  WITA 
  */
   public static function dir($seg=''){
          $dirname=explode('wolf05',dirname(__FILE__));
          if (!empty($seg))
          {
             $Exp=$seg;
          }
          else
          {
             $Exp="";
          }
        return $dirname[0].$Exp;
   }
  /* and class chdir */
 
   /*
   |--------------------------------------------------------------------------
   | Initializes system_path 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2021
   | @Date  
   */
    public static function URL($seg=''){
           if (!empty($seg)){
              $Exp="/".$seg;
           }else{
              $Exp="";
           }
           if (!empty(helper::config('base_url'))) {
               return helper::config('base_url').$Exp;
           } else {
               return self::configHostname().$Exp;
           }
    }

      public static function URLr($seg=''){
           return $seg;
   
    }
/*
|--------------------------------------------------------------------------
| Initializes protocol 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function protocol(){
      $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
      $HTTP_HOST = $protocol."://". $_SERVER['HTTP_HOST'].str_replace("index.php", "", $_SERVER['PHP_SELF']);
      return substr($HTTP_HOST, 0, -1);
    
}
/* and class protocol */
   /*
   |--------------------------------------------------------------------------
   | Initializes configHosname 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function configHostname(){
           $filename=self::etcFile('theme/models/hostname.php');
           include($filename);
          if (self::cookie('configHostname')==$hostname) {
              return $hostname;
          } else {
             self::config_SERVER();
             return self::protocol();
          }
   }


   public static function config_SERVER(){
          $idfile = '<?php '.PHP_EOL.'$hostname="'.self::protocol().'";';
          $filename=self::etcFile('theme/models/hostname.php');
             if ($idfile != '') {
                self::cookieRead('configHostname',self::protocol());
                $fw = fopen($filename, 'w') or die('Could not open file!');
                $fb = fwrite($fw,$idfile) or die('Could not write to file');
                fclose($fw);
             }

   }
   /* and class configHosname */
    /*
    |--------------------------------------------------------------------------
    | Initializes Scrip 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date  
    */
    public static function  netscrip(){
        $tatiyeNet = new tatiyeNetInit();    
        return $tatiyeNet;
    }
    /* and class srip */
/**
 * and class tatiyeNet
 */

}

?>