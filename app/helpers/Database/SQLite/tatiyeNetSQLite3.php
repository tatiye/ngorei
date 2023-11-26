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
namespace wolf05\helper\Database\SQLite;
use wolf05\helper\tatiyeNet;
use SQLite3;


class tatiyeNetSQLite3 {

  protected static $instance;  
  private $db;
  private $driver;
  private $data = array();
  
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
 
     self::$instance->db    = new SQLite3($params);
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
   public  function version(){
       $version = $this->db->querySingle('SELECT SQLITE_VERSION()');
       return $version . "\n";
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
         $this->db->exec("CREATE TABLE $tabel($faild)");
         return "CREATE TABLE $tabel SUCSES";
       
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
            $str  = $str . '`' . $key . '`' . ','; 
            $str2 = $str2 ."'".$value."'". ',';
        }
        $str = substr($str, 0, -1);
        $str = $str . ")";
        $str2 = substr($str2, 0, -1);
        $str2 = $str2 . ")";


      $this->db->exec("INSERT INTO $tabel $str VALUES $str2");


      $this->db->close();

   }
   /* and class insert */
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
             $str = $str . '`' . $key . '`' . ' = ' . "'" .$value. "'" . ', '; 

         }

          $str = substr($str, 0, -2); 
          $query="UPDATE $tabel SET $str WHERE $wh";
          $this->db->exec($query);

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
         $query="DELETE from $tabel where $where ";
          $this->db->exec($query);
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
   | Initializes query 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function query($sql){
         return $this->db->query($sql);
       
   }
   /* and class query */
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
      $stm = $this->db->prepare($sql);
      $res = $stm->execute();
      $row = $res->fetchArray();
      return $row;
       
   }
   /* and class fetchArray */


}