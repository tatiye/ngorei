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
namespace app\Database;
use app\tatiye;
use MongoDB\Client;
class tatiyeNetConn {
  protected static $instance;  
  private $detection;
  private $con;
  private $conn;
  private $driver;
  private $servername;  
  private $username;    
  private $password;    
  private $port;        
  private $database;        
  private $credentials;        
  private $data = array();
  private function __construct() { /* ... @return DB */ }
  private function __clone() { /* ... @return DB */ }
  private function __wakeup() { /* ... @return DB */ }
  public function __destruct(){
      $db = new tatiyeNet();
      $this->conn  =$db;
      $this->con=$db->mysqli();
   } 
    
    
   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */
    public static function init($params,$mydb) {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }

     self::$instance->driver      =  $params;
     self::$instance->servername  =  $mydb['host'];
     self::$instance->username    =  $mydb['username'];
     self::$instance->password    =  $mydb['password'];
     self::$instance->database    =  $mydb['database'];
     self::$instance->port        =  $mydb['port'];
     self::$instance->credentials =  "user = '".$mydb['username']."' password='".$mydb['password']."'";


     return self::$instance;
  }
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes mySQL 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  Sen 25 Apr 2022 02:22:08  WITA
   */
   public  function mySQL(){
    $conn = mysqli_connect($this->servername, $this->username, $this->password);
   if (!$conn) {
     $value=1;
   }
   if (!empty($value)) {
         return $this->driver." Connection failed: " . mysqli_connect_error();
    } else {
         return $this->driver." Connected successfully";
    }
   }
   /* and class mySQL */
   /*
   |--------------------------------------------------------------------------
   | Initializes PostgreSQL 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Sen 25 Apr 2022 02:22:10  WITA 
   */
   public  function PostgreSQL(){
   $host        = "host   = $this->servername";
   $port        = "port   = $this->port";
   $dbname      = "dbname = $this->database";
   $credentials = "$this->credentials";
   $db = pg_connect("$host $port $dbname $credentials");
   if(!$db) {

      return $this->driver." Unable to open database";
   } else {
      return $this->driver." Connected successfully";
   }
// $ sudo su - postgres
// $ psql
// postgres=# 
    # CREATE USER gorontalo01 WITH PASSWORD '12345678';
    # CREATE DATABASE "gorontalo01";
    # GRANT ALL ON DATABASE "gorontalo01" TO root;
    # \q    
   }
   /* and class PostgreSQL */
   /*
   |--------------------------------------------------------------------------
   | Initializes SQLite 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function SQLite(){
    if (!empty(tatiyeNet::SQLite()->version())) {
        return $this->driver." Connected successfully";
    } else {
        return $this->driver." Unable to open database";
    }
    
        
       
   }
   /* and class SQLite */
   /*
   |--------------------------------------------------------------------------
   | Initializes MongoDB 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function MongoDB(){
   $m = new Client();
   $BD=$this->database;
       if (!empty($m)) {
           $db = $m->$BD;
           return $this->driver." $db Connected successfully";
       } else {
            return $this->driver." Unable to open database";
       }
   }
   /* and class MongoDB */

}