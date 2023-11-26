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
namespace wolf05\helper\Database\Postgre;
use wolf05\helper\tatiyeNet;
use SQLite3;


class tatiyeNetPostgre {

  protected static $instance;  
  private $detection;
  private $connect;
  private $conn;
  private $driver;
  private $servername;  
  private $username;    
  private $password;    
  private $port;        
  private $database;        
  private $credentials; 
  
    private function __construct() { /* ... @return DB */ }
    private function __clone() { /* ... @return DB */ }
    private function __wakeup() { /* ... @return DB */ }
    public function __destruct(){
    
  } 
    
    
   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */
    public static function init($params) {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }

         self::$instance->servername    = "host   =".$params['host'];
         self::$instance->port          = "port   =".$params['port'];
         self::$instance->database      = "dbname =".$params['database'];
         self::$instance->credentials   = "user = '".$params['username']."' password='".$params['password']."'";
         return self::$instance;
  }
   /* and class myDBSQLite */

   /*
   |--------------------------------------------------------------------------
   | Initializes version 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function conn(){
     $db = pg_connect("$this->servername $this->port  $this->database $this->credentials");
     return $db ;
   }
   /* and class version */
   /*
   |--------------------------------------------------------------------------
   | Initializes createTable 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Min 24 Apr 2022 04:51:23  WITA 
   */
   public  function createTable($tabel='',$faild=''){
   $db=self::conn();
   $sql="CREATE TABLE $tabel($faild);";
    $ret = pg_query($db, $sql);
    if(!$ret) {
       echo pg_last_error($db);
    } else {
       echo "Table $tabel created successfully\n";
    }
    pg_close($db);
   }
   /* and class createTable */
   /*
   |--------------------------------------------------------------------------
   | Initializes insert 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function insert($tabel){

        $str = "(";
        $str2 = "(";    
        foreach ($this->data as $key => $value) {
            $str  = $str . '' . $key . '' . ','; 
            $str2 = $str2 ."'".$value."'". ',';
        }
        $str = substr($str, 0, -1);
        $str = $str . ")";
        $str2 = substr($str2, 0, -1);
        $str2 = $str2 . ")";

   $db=self::conn();
   $sql ="INSERT INTO $tabel $str VALUES $str2;";
   $ret = pg_query($db, $sql);
   pg_close($db);

     // $ret = pg_query($db, $sql);

      // $this->db->close();

   }
   /* and class insert */

   /*
   |--------------------------------------------------------------------------
   | Initializes query 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function query($sql){
   $db=self::conn();
   $ret = pg_query($db, $sql);
    while($row = pg_fetch_assoc($ret)) {
           $Exp[]=$row ;
   }
   return $Exp;
   }
   /* and class query */








   /*
   |--------------------------------------------------------------------------
   | Initializes update 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function update($tabel,$wh){
         $table = trim($table);
         $str = "";
         foreach ($this->data as $key => $value) {
             $str = $str . '' . $key . '' . ' = ' . "'" .$value. "'" . ', '; 

         }
         $str = substr($str, 0, -2); 
         $db=self::conn();
         $sql ="UPDATE $tabel set $str where $wh";
         $ret = pg_query($db, $sql);

   }
   /* and class update */
   /*
   |--------------------------------------------------------------------------
   | Initializes delete 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function delete($tabel,$where){
        $db=self::conn();
         $query="DELETE from $tabel where $where ";
         $ret = pg_query($db, $query);
   }
   /* and class delete */
   /*
   |--------------------------------------------------------------------------
   | Initializes crop 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function que($key){
     $this->data=$key;
     return self::$instance;
   }
   /* and class crop */

   /*
   |--------------------------------------------------------------------------
   | Initializes prepare 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function prepare($sql){
          return $this->db->prepare($sql);
       
   }
   /* and class prepare */
   /*
   |--------------------------------------------------------------------------
   | Initializes title 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function escapeString($sql){
         $escaped = $this->db->escapeString($sql);
       
   }
   /* and class title */
   /*
   |--------------------------------------------------------------------------
   | Initializes fetchArray 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function fetchArray($sql){
      // $stm = $this->db->prepare($sql);
      // $res = $stm->execute();
      // $row = $res->fetchArray();
      // return $row;
       
   }
   /* and class fetchArray */


}