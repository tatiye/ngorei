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
use app\Database\tatiyeNetQuery;
use mysqli;
class tatiyeNetInit 
{
    protected static $instance;  
	
	private $connection;
	private $driver;
	private $query;
	private $data = array();
	

   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */
    public static function init($params='') {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
     self::$instance->driver = $params;
     return self::$instance;
	}
   /* and class Db */
    // private $host = DB_HOST;
    // private $user = DB_USER;
    // private $pass = DB_PASS;
    // private $dbname = DB_NAME;
    /*
    |--------------------------------------------------------------------------
    | Initializes mycone 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  Sab 02 Apr 2022 03:07:09  WITA
    */
    public  function connect(){
        $connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
       if ($connection ->connect_errno) {
         echo "Failed to connect to MySQL: ";
         exit();
       }
        $this->connection=$connection;
        return $connection;
    }
    /* and class mycone */


   /*
   |--------------------------------------------------------------------------
   | Initializes result 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  Sab 02 Apr 2022 03:07:14  WITA
   */
   public  function result($query){
   	    $this->query= $query;
        return self::$instance;
       
   }
   /* and class result */
   /*
   |--------------------------------------------------------------------------
   | Initializes query 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:17:14  WITA 
   */
	public function fetch_assoc(){
     if ($result = mysqli_query(self::connect(), $this->query)) {
          while($row=mysqli_fetch_assoc($result)){
             $userData[]=$row;
          }
          // return $userData;
       mysqli_free_result($result);
       }
      self::connect()-> close();
   }
   /*
   |--------------------------------------------------------------------------
   | Initializes fetch_assoc 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  Sab 02 Apr 2022 03:07:18  WITA
   */
   public  function fetch_object(){
     if ($result = mysqli_query(self::connect(), $this->query)) {
          while($row=mysqli_fetch_object($result)){
            $userData[]=$row;
          }
          return $userData;
       mysqli_free_result($result);
       }
      self::connect()-> close();
   }
   /* and class fetch_assoc */
   /*
   |--------------------------------------------------------------------------
   | Initializes singleArray 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  Sab 02 Apr 2022 03:07:22  WITA
   */
   public  function singleArray(){
       $result=self::connect()->query($this->query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       return $row;
   }
   /* and class singleArray */
   /*
   |--------------------------------------------------------------------------
   | Initializes singleObject 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  Sab 02 Apr 2022 03:07:26  WITA
   */
   public  function singleObject(){
       $result=self::connect()->query($this->query);
       $row = $result->fetch_object();
       return $row;
   }
   /* and class singleObject */
   /*
   |--------------------------------------------------------------------------
   | Initializes array 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function array(){

      foreach ($this->query as $key => $value) {
          $this->data['rows'][] = $key;

          $this->data['values'][] =self::connect()->real_escape_string($value);
      }
       
   }
   /* and class array */
   /*
   |--------------------------------------------------------------------------
   | Initializes insert 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  Sab 02 Apr 2022 05:08:10  WITA
   */
   public  function insert($tabel){
        $str = "(";
        $str2 = "(";    
        foreach ($this->query as $key => $value) {
            $str  = $str . '`' . $key . '`' . ','; 
            $str2 = $str2 ."'".self::connect()->real_escape_string($value)."'". ',';
        }
        $str = substr($str, 0, -1);
        $str = $str . ")";
        $str2 = substr($str2, 0, -1);
        $str2 = $str2 . ")";
        if (!self::connect()->query("INSERT INTO $tabel $str VALUES $str2")) {
          echo("Error code: " . self::connect()->errno);
        }
        self::connect()->close();
   }
   /* and class insert */
   /*
   |--------------------------------------------------------------------------
   | Initializes update 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Sab 02 Apr 2022 06:19:22  WITA 
   */
   public  function update($table,$where){
         $table = trim($table);
         $str = "";
         foreach ($this->query as $key => $value) {
             $str = $str . '`' . $key . '`' . ' = ' . "'" . self::connect()->real_escape_string($value) . "'" . ', '; 

         }
         $str = substr($str, 0, -2); //-2 because it has comma and a space
        if (!self::connect()->query("UPDATE $table SET $str WHERE $where ")) {
          echo("Error code: " . self::connect()->errno);
        }
        self::connect()->close();
       
   }
   /* and class update */
 



}

