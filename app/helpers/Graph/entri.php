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
use Exception;
use PDOException;
use app\tatiye;
use app\Graph\Database;
use app\Graph\entriRespon AS Response;
use app\Graph\model\Task;
class entri {
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
  public static function init($tabel='') { 
  
try {
  $writeDB = Database::connectWriteDB();
  $readDB = Database::connectReadDB();
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

      if(!isset($_SERVER['HTTP_AUTHORIZATION']) || strlen($_SERVER['HTTP_AUTHORIZATION']) < 1) {
        $response = new Response();
        $response->setHttpStatusCode(401);
        $response->setSuccess(false);
        (!isset($_SERVER['HTTP_AUTHORIZATION']) ? $response->addMessage("Access token is missing from the header") : false);
        (strlen($_SERVER['HTTP_AUTHORIZATION']) < 1 ? $response->addMessage("Access token cannot be blank") : false);
        $response->send();
        exit;
      }
 
// get supplied access token from authorisation header - used for delete (log out) and patch (refresh)
      $accesstoken = $_SERVER['HTTP_AUTHORIZATION'];

// attempt to query the database to check token details - use write connection as it needs to be synchronous for token
      try {
        // create db query to check access token is equal to the one provided
        $query = $writeDB->prepare('select userid, accesstokenexpiry, useractive, loginattempts from appusertoken, appuser where appusertoken.userid = appuser.id and accesstoken = :accesstoken');
        $query->bindParam(':accesstoken', $accesstoken, PDO::PARAM_STR);
        $query->execute();

        // get row count
        $rowCount = $query->rowCount();

        if($rowCount === 0) {
          // set up response for unsuccessful log out response
          $response = new Response();
          $response->setHttpStatusCode(401);
          $response->setSuccess(false);
          $response->addMessage("Invalid access token");
          $response->send();
          exit;
        } 

        // get returned row
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // save returned details into variables
        $returned_userid = $row['userid'];
        $returned_accesstokenexpiry = $row['accesstokenexpiry'];
        $returned_useractive = $row['useractive'];
        $returned_loginattempts = $row['loginattempts'];

        // check if account is active
        if($returned_useractive != 'Y') {
          $response = new Response();
          $response->setHttpStatusCode(401);
          $response->setSuccess(false);
          $response->addMessage("User account is not active");
          $response->send();
          exit;
        }

        // check if account is locked out
        if($returned_loginattempts >= 3) {
          $response = new Response();
          $response->setHttpStatusCode(401);
          $response->setSuccess(false);
          $response->addMessage("User account is currently locked out");
          $response->send();
          exit;
        }

        // check if access token has expired
        if(strtotime($returned_accesstokenexpiry) < time()) {
          $response = new Response();
          $response->setHttpStatusCode(401);
          $response->setSuccess(false);
          $response->addMessage("Access token has expired");
          $response->send();
          exit;
        }
      }
      catch(PDOException $ex) {
        $response = new Response();
        $response->setHttpStatusCode(500);
        $response->setSuccess(false);
        $response->addMessage("Terjadi masalah saat mengautentikasi - harap coba lagi");
        $response->send();
        exit;
      }
       $segment=explode('/',$_GET['url']);
       if($_SERVER['REQUEST_METHOD'] === 'POST') {
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

                  $fetchKeys=tatiye::fetchKeys($tabel);
                  $segment01=$fetchKeys[1];
                // check if post request contains title and completed data in body as these are mandatory
                if(!isset($jsonData->$segment01)) {
                  $response = new Response();
                  $response->setHttpStatusCode(400);
                  $response->setSuccess(false);
                  (!isset($jsonData->$segment01) ? $response->addMessage($fetchKeys) : false);
                  $response->send();
                  exit;
                }


                 
           
              // DATATIME
              // TEXT
          
            foreach ($jsonData as $key => $value) {
               $asosiatif[$key] =tatiye::val('text',$value ,'1|Wajib diisi');
               $asosiatif2[$key] =$value;
            }

              foreach ($asosiatif as $key => $value) {
                 if ($value=='valid') {
                     $val['sukses'][$key] = $value; 
                 } else {
                     $val['error'][$key] = $value; 
                 }
              }
               if (empty($val['error'])) {
                      $addSet=array(
                        'userid'=>$returned_userid,
                      );
                      $db=new tatiye();
                      $result=$db->que(array_merge($asosiatif2,$addSet))->insert($tabel); 
                      $fetchResult=tatiye::fetch($tabel,'*',"userid='".$returned_userid."' ORDER BY id DESC");
                      $valStatus['status']  = 'sukses';
                } else {
                      $valStatus['status'] = 'error';
                      $fetchResult =[];
                }
 
                  $response = new Response();
                  $response->setHttpStatusCode(200);
                  $response->setSuccess(false);

                  $response->setStatus($valStatus['status']);
                  $response->addMessage("Task created");
                  $response->setValidasi(@array_merge($val['sukses'],$val['error']));
                  $response->setData($fetchResult);
                  $response->send();




            // $result=$db->que($jsonData)->insert($tabel);    
  
       } elseif($_SERVER['REQUEST_METHOD'] ==='PATCH'){
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

                  $fetchKeys=tatiye::fetchKeys($tabel);
                  $segment01=$fetchKeys[1];
                // check if post request contains title and completed data in body as these are mandatory
                if(!isset($jsonData->$segment01)) {
                  $response = new Response();
                  $response->setHttpStatusCode(400);
                  $response->setSuccess(false);
                  (!isset($jsonData->$segment01) ? $response->addMessage($fetchKeys) : false);
                  $response->send();
                  exit;
                }


                 
           
              // DATATIME
              // TEXT
          
            foreach ($jsonData as $key => $value) {
               $asosiatif[$key] =tatiye::val('text',$value ,'1|Wajib diisi');
               $asosiatif2[$key] =$value;
            }
              foreach ($asosiatif as $key => $value) {
                 if ($value=='valid') {
                     $val['sukses'][$key] = $value; 
                 } else {
                     $val['error'][$key] = $value; 
                 }
              }
               if (empty($val['error'])) {
                      $addSet=array(
                        'userid'=>$returned_userid,
                      );
                      $db=new tatiye();
                      $result=$db->que(array_merge($asosiatif2,$addSet))->update($tabel,"id='".$segment[3]."' AND userid='".$returned_userid."'");
                        
                      $fetchResult=tatiye::fetch($tabel,'*',"id='".$segment[3]."'");
                      $valStatus['status']  = 'sukses';
                } else {
                      $valStatus['status'] = 'error';
                      $fetchResult =[];
                }
 
                  $response = new Response();
                  $response->setHttpStatusCode(200);
                  $response->setSuccess(false);
                  $response->setStatus($valStatus['status']);
                  $response->addMessage("Task Update");
                  $response->setValidasi(@array_merge($val['sukses'],$val['error']));
                  $response->setData($fetchResult);
                  $response->send();
               

       } elseif($_SERVER['REQUEST_METHOD'] ==='DELETE'){
             
                  $row=tatiye::fetch($tabel,'*',"id='".$segment[3]."'");
                  if (!empty($row)) {
                      if ($returned_userid==$row['userid']) {
                        $db=new tatiye();
                        $rules=$db->delete($tabel,"id='".$segment[3]."' "); 


                       $Sataus='Sukses Delete';
                      } else {
                       $Sataus='Bukan data Anda';
                      } 
                  } else {
                    $Sataus='data tidak di Temukan';
                  }
                  $response = new Response();
                  $response->setHttpStatusCode(200);
                  $response->setSuccess(false);
                  $response->setStatus(false);
                  $response->addMessage($Sataus);
                  $response->setValidasi(false);
                  $response->setData($row);
                  $response->send();

       } elseif($_SERVER['REQUEST_METHOD'] ==='GET'){
      
       } else {
      
       }

       
  }
  
   /* and class title */
}