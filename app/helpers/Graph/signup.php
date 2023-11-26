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
use app\tatiye;
use PDOException;
use app\Graph\Database;
use app\Graph\Response;
class signup {
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

  
// handle creating new user
// check to make sure the request is POST only - else exit with error response
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $response = new Response();
  $response->setHttpStatusCode(405);
  $response->setSuccess(false);
  $response->addMessage("Request method not allowed");
  $response->send();
  exit;
}

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

// check if post request contains full name, username and password in body as they are mandatory
if(!isset($jsonData->fullname) || !isset($jsonData->username) || !isset($jsonData->password)) {
  $response = new Response();
  $response->setHttpStatusCode(400);
  $response->setSuccess(false);
  // add message to message array where necessary
  (!isset($jsonData->fullname) ? $response->addMessage("Full name not supplied") : false);
  (!isset($jsonData->username) ? $response->addMessage("Username not supplied") : false);
  (!isset($jsonData->password) ? $response->addMessage("Password not supplied") : false);
  $response->send();
  exit;
}

 // $val=tatiye::validation([                                                     
 //     "fullname"=>tatiye::val("text",$jsonData->fullname   ,"2|Nama lengkap tidak boleh kosong"),                 
 //     "username"=>tatiye::val("email",$jsonData->username  ,12),                 
 //     "password"=>tatiye::val("text",$jsonData->password   ,"2|Wajib diisi"),                 
 //  ]);                                                                           
 //  if (empty($val["error"])) {                                                                
 //      $val["hasil"]    ="sukses";                                               
 //  } else {                                                                      
 //      $val["hasil"]    ="error";                                                
 //   };

 //   $response = new Response();
 //   $response->setHttpStatusCode(400);
 //   $response->addMessage($val);
 //   $response->send();
 //   exit;
// check to make sure that full name username and password are not empty and less than 255 long

if(strlen(
  $jsonData->fullname) < 1 || strlen($jsonData->fullname) > 255 || 
  strlen($jsonData->username) < 1 || strlen($jsonData->username) > 255 || 
  strlen($jsonData->password) < 1 || strlen($jsonData->password) > 100)
  {
  $response = new Response();
  $response->setHttpStatusCode(400);
  $response->setSuccess(false);
  (strlen($jsonData->fullname) < 1 ? $response->addMessage("Nama lengkap tidak boleh kosong") : false);
  (strlen($jsonData->fullname) > 255 ? $response->addMessage("Nama lengkap tidak boleh Lebih dari 255 karakter") : false);


  (strlen($jsonData->username) < 1 ? $response->addMessage("Email pengguna tidak boleh kosong") : false);
  (strlen($jsonData->username) > 255 ? $response->addMessage("Email pengguna tidak boleh lebih dari 255 karakter") : false);
  

  (strlen($jsonData->password) < 1 ? $response->addMessage("Kata sandi tidak boleh kosong") : false);
  (strlen($jsonData->password) > 100 ? $response->addMessage("Kata sandi tidak boleh lebih dari 100 karakter") : false);
  $response->send();
  exit;
}

$setfullname=tatiye::val('nameText1',$jsonData->fullname??=false,20);
if ($setfullname !=='valid') {
  $response = new Response();
  $response->setHttpStatusCode(400);
  $response->setSuccess(false);
   $response->addMessage('Nama lengkap hanya huruf');
   $response->send();
 exit;
}
if ($jsonData->password==$jsonData->confirmasi ) {
  $valset='valid';
} else {
 $valset='';
}

@$email=tatiye::val("email",$jsonData->username  ,35,'not');
if ($email !=='valid') {
  $response = new Response();
  $response->setHttpStatusCode(400);
  $response->setSuccess(false);
   $response->addMessage('Ini bukan email pengguna ');
   $response->send();
 exit;
}


if ($valset !=='valid') {
   $response = new Response();
   $response->setHttpStatusCode(400);
   $response->setSuccess(false);
   $response->addMessage('confirmasi Kata sandi tidak sesuai ');
   $response->send();
 exit;
}








// trim any leading and trailing blank spaces from full name and username only - password may contain a leading or trailing space
$fullname = trim($jsonData->fullname);
$username = trim($jsonData->username);
$password = $jsonData->password;
// trim any leading and trailing blank spaces from full name and username only - password may contain a leading or trailing space
$fullname = trim($jsonData->fullname);
$username = trim($jsonData->username);
$password = $jsonData->password;

// attempt to query the database to check if username already exists
try {
  // create db query
  $query = $writeDB->prepare('SELECT id from appuser where username = :username');
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->execute();

  // get row count
  $rowCount = $query->rowCount();

  if($rowCount !== 0) {
    // set up response for username already exists
    $response = new Response();
    $response->setHttpStatusCode(409);
    $response->setSuccess(false);
    $response->addMessage("Silahkan gunakan email lain");
    $response->send();
    exit;
  };
  
  // hash the password to store in the DB as plain text password stored in DB is bad practice
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
  // create db query to create user
  $query = $writeDB->prepare('INSERT into appuser (fullname, username, password) values (:fullname, :username, :password)');
  $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->bindParam(':password', $hashed_password, PDO::PARAM_STR);
  $query->execute();

  

  // get row count
  $rowCount = $query->rowCount();

  if($rowCount === 0) {
    // set up response for error
    $response = new Response();
    $response->setHttpStatusCode(500);
    $response->setSuccess(false);
    $response->addMessage("There was an error creating the user account - please try again");
    $response->send();
    exit;
  }
  
  // get last user id so we can return the user id in the json
  $lastUserID = $writeDB->lastInsertId();
  if (!file_exists(tatiye::dir()."/public/images/profil/".$lastUserID)) {
     mkdir(tatiye::dir()."/public/images/profil/".$lastUserID, 0700);
   }
      // $cekUID= tatiye::fetch('appuserprofil','*',"userid='".$lastUserID."'");
      // if ($cekUID['id']) {
         $db=new tatiye(); 
         $create = array(                                                                      
         "nama"       =>$fullname,                                                      
         "email"      =>$username,                                                     
         "password"   =>$password,
         "telepon"    =>'Telepon belum lengkap',                                                   
         "alamat"     =>'Alamat belum lengkap',                                                   
         "time"       =>tatiye::tm(),                                                        
         "date"       =>tatiye::dt("EN"),                                                    
         "bulan"      =>tatiye::dt("M"),                                                     
         "tahun"      =>tatiye::dt("Y"),                                                                                                         
         "userid"     =>$lastUserID,                                                     
        );                                                                                 
      $result=$db->que($create)->insert("appuserprofil");
     // }



  // build response data array which contains basic user details
  $returnData = array();
  $returnData['user_id'] = $lastUserID;
  $returnData['fullname'] = $fullname;
  $returnData['username'] = $username;

  $response = new Response();
  $response->setHttpStatusCode(201);
  $response->setSuccess(true);
  $response->addMessage("success");
  $response->setData($returnData);
  $response->send();
  exit;
}
catch(PDOException $ex) {
  $response = new Response();
  $response->setHttpStatusCode(500);
  $response->setSuccess(false);
  $response->addMessage("There was an issue creating a user account - please try again");
  $response->send();
  exit;
}


   }
   /* and class login */
  
}