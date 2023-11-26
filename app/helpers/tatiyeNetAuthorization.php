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
use app\tatiye;
use app\Graph\Response AS Response;
class tatiyeNetAuthorization {
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
 public static function init($dir='') { 
    if ($dir) {

        if(!isset($_SERVER['HTTP_AUTHORIZATION']) || strlen($_SERVER['HTTP_AUTHORIZATION']) < 1) {
            $response = new Response();
            $response->setHttpStatusCode(401);
            $response->setSuccess(false);
            (!isset($_SERVER['HTTP_AUTHORIZATION']) ? $response->addMessage("Token akses tidak ada di header") : false);
            $response->send();
            exit;
        }
        $accesstoken = $_SERVER['HTTP_AUTHORIZATION'];
        $row= tatiye::fetch('appusertoken','*',"accesstoken='".$accesstoken."'");
        if (!@$row['accesstoken']) {
          $response = new Response();
          $response->setHttpStatusCode(401);
          $response->setSuccess(false);
          $response->addMessage("Token akses tidak valid");
          $response->send();
          exit;
        }
        $rowuid= tatiye::fetch('appuser','*',"id='".$row['userid']."'");
        $returned_userid            =$row['userid']??='';
        $returned_accesstokenexpiry =$row['accesstokenexpiry']??='';;
         $returned_useractive       =$rowuid['useractive']??='';
        $returned_loginattempts     =$rowuid['loginattempts']??='';;

        // check if account is active
        if($returned_useractive != 'Y') {
          $response = new Response();
          $response->setHttpStatusCode(401);
          $response->setSuccess(false);
          $response->addMessage("Akun pengguna tidak aktif");
          $response->send();
          exit;
        }

        // check if account is locked out
        if($returned_loginattempts >= 3) {
          $response = new Response();
          $response->setHttpStatusCode(401);
          $response->setSuccess(false);
          $response->addMessage("Akun pengguna saat ini terkunci");
          $response->send();
          exit;
        }

        // check if access token has expired
        if(strtotime($returned_accesstokenexpiry) < time()) {
          $response = new Response();
          $response->setHttpStatusCode(401);
          $response->setSuccess(false);
          $response->addMessage("Token akses telah kedaluwarsa");
          $response->send();
          exit;
        }
    } else {
      return false;
    }
    

 }
 /*
 |--------------------------------------------------------------------------
 | Initializes body 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function body($rawPostData){
    if(!$jsonData = json_decode($rawPostData)) {
      $response = new Response();
      $response->setHttpStatusCode(400);
      $response->setSuccess(false);
      $response->addMessage("Isi permintaan Body raw JSON tidak  valid ");
      $response->send();
      exit;
    }  
     
 }
 /* and class body */
 /*
 |--------------------------------------------------------------------------
 | Initializes tabel 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function tabel($tabel){
    if (!$tabel) {
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->setSuccess(false);
        $response->addMessage("Silahkan masukan  nama Tabel");
        $response->send();
        exit;
    } 
         
 }
 /* and class tabel */
 /*
 |--------------------------------------------------------------------------
 | Initializes HTTP_KEY 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function HTTP_KEY($key){
    if (!$key) {
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->setSuccess(false);
        $response->addMessage("Header HTTP_KEY Wajib diisi");
        $response->send();
        exit;
    }
     
 }
 /* and class HTTP_KEY */
 /*
 |--------------------------------------------------------------------------
 | Initializes HTTP_USERID 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function HTTP_USERID($key){
      if (!$key) {
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->setSuccess(false);
        $response->addMessage("Header HTTP_USERID Wajib diisi");
        $response->send();
        exit;
       }
 }
 /* and class HTTP_USERID */
   /* and class login */
  
}