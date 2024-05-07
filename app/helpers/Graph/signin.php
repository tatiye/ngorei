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
namespace app\Graph;
use PDO;
use PDOException;
use app\tatiye;
use app\Graph\Database;
use app\Graph\Response;
class signin {
  protected static $instance;  
  private $detection;
  private $driver;
  private $data = array();
  public function __construct() {
    
  }
   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */
 public static function init($dir='',$params='',$key='') { 

  try {
    $writeDB = Database::connectWriteDB();
  }
  catch(PDOException $ex) {
    // log connection error for troubleshooting and return a json error response
    error_log("Connection Error: ".$ex, 0);
    $response = new Response();
    $response->setHttpStatusCode(500);
    $response->setSuccess(false);
    $response->addMessage("Database connection error");
    $response->send();
    exit;
  }

  if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response = new Response();
    $response->setHttpStatusCode(405);
    $response->setSuccess(false);
    $response->addMessage("Request method not allowed");
    $response->send();
    exit;
  }

  // delay login by 1 second to slow down any potential brute force attacks
  sleep(1);

  // check request's content type header is JSON
  if($_SERVER['CONTENT_TYPE'] !== 'application/json') {
    // set up response for unsuccessful request
    $response = new Response();
    $response->setHttpStatusCode(400);
    $response->setSuccess(false);
    $response->addMessage("Content Type header not set to JSON");
    $response->send();
    exit;
  }

  // get POST request body as the POSTed data will be JSON format
  $rawPostData = file_get_contents('php://input');

  if(!$jsonData = json_decode($rawPostData)) {
    // set up response for unsuccessful request
    $response = new Response();
    $response->setHttpStatusCode(400);
    $response->setSuccess(false);
    $response->addMessage("Request body is not valid JSON");
    $response->send();
    exit;
  }

  // check if post request contains username and password in body as they are mandatory
  if(!isset($jsonData->username) || !isset($jsonData->password)) {
    $response = new Response();
    $response->setHttpStatusCode(400);
    $response->setSuccess(false);
    (!isset($jsonData->username) ? $response->addMessage("Email not supplied") : false);
    (!isset($jsonData->password) ? $response->addMessage("Password not supplied") : false);
    $response->send();
    exit;
  }

  // check to make sure that username and password are not empty and not greater than 255 characters
  if(strlen($jsonData->username) < 1 || strlen($jsonData->username) > 255 || strlen($jsonData->password) < 1 || strlen($jsonData->password) > 255) {
    $response = new Response();
    $response->setHttpStatusCode(400);
    $response->setSuccess(false);
    (strlen($jsonData->username) < 1 ? $response->addMessage("Email tidak boleh kosong") : false);
    (strlen($jsonData->username) > 255 ? $response->addMessage("Email harus kurang dari 255 karakter") : false);
    (strlen($jsonData->password) < 1 ? $response->addMessage("Kata sandi tidak boleh kosong") : false);
    (strlen($jsonData->password) > 8 ? $response->addMessage("Kata sandi harus kurang dari 8 karakter") : false);
    $response->send();
    exit;
  }

  // attempt to query the database to check user details - use write connection as it needs to be synchronous for password/token
  try {
    $username = $jsonData->username;
    $password = $jsonData->password;
    // create db query
    $query = $writeDB->prepare('SELECT id, fullname, username, password, useractive, loginattempts from appuser where username = :username');
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();

    // get row count
    $rowCount = $query->rowCount();

    if($rowCount === 0) {
      // set up response for unsuccessful login attempt - obscure what is incorrect by saying username or password is wrong
      $response = new Response();
      $response->setHttpStatusCode(401);
      $response->setSuccess(false);
      $response->addMessage("Email pengguna atau kata sandi salah");
      $response->send();
      exit;
    }

    // get first row returned
    $row = $query->fetch(PDO::FETCH_ASSOC);

    // save returned details into variables
    $returned_id = $row['id'];
    $returned_fullname = $row['fullname'];
    $returned_username = $row['username'];
    $returned_password = $row['password'];
    $returned_useractive = $row['useractive'];
    $returned_loginattempts = $row['loginattempts'];

    // check if account is active
    if($returned_useractive != 'Y') {
      $response = new Response();
      $response->setHttpStatusCode(401);
      $response->setSuccess(false);
      $response->addMessage("Akun pengguna tidak aktif");
      $response->send();
      exit;
    }
    // if($returned_loginattempts  === 1) {
    //   $response = new Response();
    //   $response->setHttpStatusCode(401);
    //   $response->setSuccess(false);
    //   $response->addMessage("Masukan Email pengguna atau kata sandi yang benar ");
    //   $response->send();
    //   exit;
    // }
    // check if account is locked out
    if($returned_loginattempts >= 3) {
      $response = new Response();
      $response->setHttpStatusCode(401);
      $response->setSuccess(false);
      $response->addMessage("Akun pengguna saat ini terkunci");
      $response->send();
      exit;
    }

    // check if password is the same using the hash
    if(!password_verify($password, $returned_password)) {
      // create the query to increment attempts figure
      $query = $writeDB->prepare('update appuser set loginattempts = loginattempts+1 where id = :id');
      // bind the user id
      $query->bindParam(':id', $returned_id, PDO::PARAM_INT);
      // run the query
      $query->execute();
     if ($returned_loginattempts==1) {
        $info='Masukan Email pengguna atau kata sandi yang benar';
      } else {
        $info='Email pengguna atau kata sandi salah';
        // code...
      }
      // send response
      $response = new Response();
      $response->setHttpStatusCode(401);
      $response->setSuccess(false);
      $response->addMessage($info);
      $response->send();
      exit;
    }

    // generate access token
    // use 24 random bytes to generate a token then encode this as base64
    // suffix with unix time stamp to guarantee uniqueness (stale tokens)
    $accesstoken = base64_encode(bin2hex(openssl_random_pseudo_bytes(24)).time());

    // generate refresh token
    // use 24 random bytes to generate a refresh token then encode this as base64
    // suffix with unix time stamp to guarantee uniqueness (stale tokens)
    $refreshtoken = base64_encode(bin2hex(openssl_random_pseudo_bytes(24)).time());

    // set access token and refresh token expiry in seconds (access token 20 minute lifetime and refresh token 14 days lifetime)
    // send seconds rather than date/time as this is not affected by timezones
    $access_token_expiry_seconds =  604800; // 7 Hari
    $refresh_token_expiry_seconds = 1209600;
  }
  catch(PDOException $ex) {
    $response = new Response();
    $response->setHttpStatusCode(500);
    $response->setSuccess(false);
    $response->addMessage("Ada masalah saat masuk - coba lagi");
    $response->send();
    exit;
  }
  // new try catch as this is a transaction so should include roll back if error
  try {
    // start transaction as two queries should run one after the other
    $writeDB->beginTransaction();
    // create the query string to reset attempts figure after successful login
    $query = $writeDB->prepare('update appuser set loginattempts = 0 where id = :id');
    // bind the user id
    $query->bindParam(':id', $returned_id, PDO::PARAM_INT);
    // run the query
    $query->execute();

    // create the query string to insert new session into sessions table and set the token and refresh token as well as their expiry dates and times
    $query = $writeDB->prepare('insert into appusertoken (userid, accesstoken, accesstokenexpiry, refreshtoken, refreshtokenexpiry) values (:userid, :accesstoken, date_add(NOW(), INTERVAL :accesstokenexpiryseconds SECOND), :refreshtoken, date_add(NOW(), INTERVAL :refreshtokenexpiryseconds SECOND))');
    // bind the user id
    $query->bindParam(':userid', $returned_id, PDO::PARAM_INT);
    // bind the access token
    $query->bindParam(':accesstoken', $accesstoken, PDO::PARAM_STR);
    // bind the access token expiry date
    $query->bindParam(':accesstokenexpiryseconds', $access_token_expiry_seconds, PDO::PARAM_INT);
    // bind the refresh token
    $query->bindParam(':refreshtoken', $refreshtoken, PDO::PARAM_STR);
    // bind the refresh token expiry date
    $query->bindParam(':refreshtokenexpiryseconds', $refresh_token_expiry_seconds, PDO::PARAM_INT);
    // run the query
    $query->execute();

    // get last session id so we can return the session id in the json
    $lastSessionID = $writeDB->lastInsertId();

    // commit new row and updates if successful
    $writeDB->commit();
    $profil= tatiye::fetch('appuserprofil','*',"userid='".$row['id']."'");
    // $geolocation=tatiye::cookie('geolocation');
    //  $mapsID = array(                                                             
    //    "mapId"    =>$geolocation,
    //    "time"     =>tatiye::tm(),                                               
    //    "date"     =>tatiye::dt("EN"),                                           
    //    "bulan"    =>tatiye::dt("M"),                                            
    //    "tahun"    =>tatiye::dt("Y"),                                            
    //   );
    //   $db=new tatiye();  
    //   $result=$db->que($mapsID)->update("appuserprofil","userid='".$row['id']."' "); 

      if (!empty($profil['avatar'])) {
          $Avatar=tatiye::LINK($profil['avatar']);
       } else {
          $Avatar=tatiye::images('profil/admin.jpeg');
       }
     $returnData=tatiye::uidProfil($row['id']);
    // build response data array which contains the access token and refresh tokens
    $returnData = array();
    $returnData['user_id'] = intval($row['id']);
    $returnData['register'] ='sukses';
    $returnData['loggedIn'] =true;
    $returnData['uid'] = intval($profil['id']);
    $returnData['session_id'] = intval($lastSessionID);
    $returnData['base_ulr']   = URLROOT.'/';
    $returnData['base_api']   = URLROOT.'/api';
    $returnData['sub_domain'] = URLROOT.'/'.strtolower(str_replace(' ', '',$row['fullname']));
    $returnData['access_token'] = $accesstoken;
    $returnData['authorization'] = $accesstoken;
    $returnData['avatar'] = $Avatar;
    $returnData['email'] =$row['username'];
    $returnData['alamat'] =$profil['alamat'];
    $returnData['password'] =$profil['password'];
    $returnData['telepon'] =$profil['telepon'];
    $returnData['nama'] =$profil['nama'];
    $returnData['access_token_expires_in'] = $access_token_expiry_seconds;
    $returnData['refresh_token'] = $refreshtoken;
    $returnData['refresh_token_expires_in'] = $refresh_token_expiry_seconds;
    $response = new Response();
    $response->setHttpStatusCode(201);
    $response->setSuccess(true);
    $response->setData($returnData);
    $response->send();

   


      $_SESSION['user_id']      = $row['id'];
      $_SESSION['base_ulr']      = URLROOT;
      $_SESSION['status']       = $profil['status'];
      $_SESSION['kode']         = $profil['route'];
      $_SESSION['user_email']   = $row['username']; 
      $_SESSION['user_name']    = $row['fullname'];
      $_SESSION['avatar']       = $Avatar;
      $_SESSION['access_token'] = $accesstoken;
      $_SESSION['sub_domain']   = strtolower(str_replace(' ', '',$row['fullname']));
     tatiye::setserialKey($accesstoken);
     tatiye::cookieRead('sso',tatiye::appSSO($profil['appLogin']));
    exit;
  }
  catch(PDOException $ex) {
    // roll back update/insert if error
    $writeDB->rollBack();
    $response = new Response();
    $response->setHttpStatusCode(500);
    $response->setSuccess(false);
    $response->addMessage("Ada masalah saat masuk silahkan coba lagi");
    $response->send();
    exit;
  }



   }
   /* and class login */
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
   | Initializes title 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function title($key){
         return $key;
       
   }
   /* and class title */
}