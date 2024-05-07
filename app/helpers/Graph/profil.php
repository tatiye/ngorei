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
use app\tatiyeNetAuthorization AS Authorization;
use app\Graph\Response;
class profil {
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
 public static function init() {
    error_reporting(0); 
    // Authorization::init(1);
    Authorization::HTTP_KEY($_SESSION['user_id']);
    if($_SERVER["REQUEST_METHOD"] === "GET") {
     tatiye::headeUtf8();
      $row= tatiye::fetch('appuserprofil',
         '*',
         "id='".$_SESSION['user_id']."'");
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
              'access_token'       =>$_SERVER['HTTP_AUTHORIZATION'],
              'uthorization'       =>$_SERVER['HTTP_AUTHORIZATION'],
              'userid'             =>$row['userid'],
              'user_id'             =>$row['userid'],
              'nama'               =>$row['nama'],
              'fullname'            =>$row['nama'],
              'email'              =>$row['email'],
              'password'           =>$row['password'],
              'telepon'            =>$row['telepon'],
              'alamat'             =>$row['alamat'],
              'avatar'             =>$avatar,
              'mapId'              =>$row['mapId'],
              'date'               =>$row['date'],
              'time'               =>$row['time'],
              );
      echo json_encode($Exp);
    } else {
      // code...
    return tatiye::index();
    }
    
 }

   /* and class title */

}