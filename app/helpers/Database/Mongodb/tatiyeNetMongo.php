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
namespace wolf05\helper\Database\Mongodb;
use wolf05\helper\tatiyeNet;

class tatiyeNetMongo 
{
    protected static $instance;  
  
  private $connection;
  private $conn;
  private $driver;
  public  $tabel;
  private $data = array();
  
    private function __construct() { /* ... @return DB */ }
    private function __clone() { /* ... @return DB */ }
    private function __wakeup() { /* ... @return DB */ }
  
  public function __destruct(){
    $db = new tatiyeNet();
    $this->conn = $db->Mango();


  } 
    
   
  
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
     return self::$instance;
  }
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes from 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 31 Mar 2022 11:26:03  WITA  
   */
   public  function from($values=''){
     $db = new tatiyeNet();
     $conn=$db->Mango();
     $Code=explode('FROM',$values);
     $Databes=trim($Code[0]); 
     $table=trim($Code[1]); 
     $this->connection= $conn->$Databes->$table;
     $collection= $conn->$Databes->$table;
     $document = $collection->find([]);
         foreach ($document as $key ) {
            $this->data[]= $key;  
          
         }
        return self::$instance;
       
   }
   /* and class from */
  /*
  |--------------------------------------------------------------------------
  | Initializes insert 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function select(){
         return $this->data;
  }
  /* and class insert */
  /*
  |--------------------------------------------------------------------------
  | Initializes insert 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function insert($key){
      $array1=array('id' =>count($this->data)+1);
      $array2=$key;
      $json_arr=array_merge($array1,$array2);
      $collection =$this->connection;
      $insertOneResult = $collection->insertOne($json_arr);
  }
  /* and class insert */
  /*
  |--------------------------------------------------------------------------
  | Initializes update 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function update($query='',$key){
        $array1=array('id' =>$key);
        $array2=$query;
        $json_arr=array_merge($array1,$array2);
        $collection =$this->connection;
        $collection->updateOne(['id'=>$key], array('$set' =>$array2));

  }
  /* and class update */
  /*
  |--------------------------------------------------------------------------
  | Initializes delete 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  Jum 01 Apr 2022 01:27:45  WITA
  */
  public  function delete($key){
     $collection =$this->connection;
     $collection->deleteOne(['id' => $key]);
  }
  /* and class delete */
  /*
  |--------------------------------------------------------------------------
  | Initializes count 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function count(){
      return count($this->data);
      
  }
  /* and class count */
  /*
  |--------------------------------------------------------------------------
  | Initializes where 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function where(){
        $row=$this->data;
    return $row[0];

      
  }
  /* and class where */
  /*
  |--------------------------------------------------------------------------
  | Initializes rowCount 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date Jum 01 Apr 2022 12:03:08  WITA 
  */
  public  function rowCount(){
     return count($this->data);
      
  }
  /* and class rowCount */
  /*
  |--------------------------------------------------------------------------
  | Initializes view 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function view(){
     $variable=self::select();
     tatiyeNet::json_view($variable);
      
  }
  /* and class view */


  
}