<?php
/**
 * tatiye - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2018 wolf05 <info@tatiye.net / https://www.facebook.com/tatiye/>.
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
namespace app\Rest\Firebase;
use app\tatiye;
use PDO;
class netFirebase {
    protected static $instance;  
    private $query;
    private $data = array();
    private $url;
    private $tabel;


    public function __construct(){
         $dbs = new tatiye();
         $this->conn = new tatiye();
         $this->sql  =$dbs->mysqli();
        
    }
    
 
   /*
   |--------------------------------------------------------------------------
   | Initializes Db https://ngorey-default-rtdb.firebaseio.com
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */
    public static function init($tabel='') {  
       // $row= tatiye::MyTabelFetch('app_services','*',"id='46'");  
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }

     self::$instance->url          ='https://ngorey-default-rtdb.firebaseio.com';
     self::$instance->tabel        =$tabel;
     return self::$instance;
  }
  
   public function databaseURL(){
      return $this->url;
   }
   //public function setData($queryKey=null, $queryType=null, $queryVal =null){
   public function setData(){
      $path = $this->url."/$this->tabel.json";
      $grab = $this->grab($path, "GET");
       return  json_decode($grab, 1);
   }




  /*
  |--------------------------------------------------------------------------
  | Initializes insert 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function insert($data){
      //$datacount = tatiye::Firebase($this->tabel)->setData();
      // if (!empty(self::perimeriKey())) {
      //     $setId=self::perimeriKey();
      // } else {
          $setId=1;
      // }
          $array1=array(
           'id'     =>$setId
 
           );
 
        $path = $this->url."/$this->tabel/.json";
        $grab = $this->grab($path, "POST", json_encode(array_merge($data,$array1)));
        return $grab;
    
      
  }
  /* and class insert */




   /*
   |--------------------------------------------------------------------------
   | Initializes perimeriKey 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function perimeriKey(){
      $data = tatiye::Firebase($this->tabel)->setData();
      arsort($data);
      foreach(array_slice($data, 0, 1) as $id => $row){
       if(!empty($row['id'])){
        return  $row['id']+1;
      }
      
   }
   }
   /* and class perimeriKey */
   /*
   |--------------------------------------------------------------------------
   | Initializes insertParameter 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function insertParameter($key){
       $data = tatiye::Firebase($this->tabel)->setData();
       $set = array_search('Gibran', array_column($data, 'nama'),true);
       
       // var_dump($set[0]);
       
   }
   /* and class insertParameter */
    /*
    |--------------------------------------------------------------------------
    | Initializes search 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 31 Mar 2022 04:28:11  WITA 
    */
    public function search($keywords){

        $userData=array();
        $result=tatiye::Firebase($this->tabel)->setData();

            foreach ($result as $key1 => $val1) {
                
                if(is_array($val1) and count($val1)) {

                    foreach ($val1 as $key2 => $val2) {
          
                        if($val2 == $keywords) {
                             $userData[]=$val1;
                             
                        }
                    }
                }
                elseif($val1 == $keywords) {
                  
                }
            }
              
             return $userData;

           
    }
    /* and class search */

    /*
    |--------------------------------------------------------------------------
    | Initializes searchPaging 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function searchPaging($keywords,$from_record_num, $records_per_page){
        $page =1;
        // calculate for the query LIMIT clause
        $from_record_num = ($records_per_page * $page) - $records_per_page;

        $userData=array();
        $userData1=array();
        $result=tatiye::Firebase($this->tabel)->setData();
            
            foreach ($result as $key1 => $val1) {
                
                if(is_array($val1) and count($val1)) {

                    foreach ($val1 as $key2 => $val2) {

                        if($val2 == $keywords) {
                             $userData[]=$val1;
                             
                        }
                    }
                }
                
                elseif($val1 == $keywords) {
                  
                }
            }
          foreach (array_slice(array_reverse($userData), $from_record_num, $records_per_page)  as $key ) {
             $userData1[]=$key;
          }
         return $userData1;
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes readPaging 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function paging($from_record_num, $records_per_page){
         $variable=tatiye::Firebase($this->tabel)->setData();
         foreach (array_slice(array_reverse($variable), $from_record_num, $records_per_page)  as $key ) {

             $userData[]=$key;
          }

         return $userData;
    }
    /* and class readPaging */


  /*
  |--------------------------------------------------------------------------
  | Initializes update 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public function update($uniqueID, $data){
      $array1=array(
        'date'   =>tatiye::dt('EN'),
        'time'   =>tatiye::dt('DTIE'),
        'mapid'  =>tatiye::cookie('setdMap'),

     );
      $setID=self::setID($uniqueID);
      $path = $this->url."/$this->tabel/$setID.json";
      $grab = $this->grab($path, "PATCH", json_encode(array_merge($data,$array1)));
  }
  /* and class update */
  /*
  |--------------------------------------------------------------------------
  | Initializes setID 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function setID($uniqueID){
      $data=self::setData();
      foreach ($data as $key => $value) {
        if ($value['id']==$uniqueID) {
             $arr[$value['id']]= $key;
        }
      }
    return $arr[$uniqueID];
      
  }
  /* and class setID */


   public function delete($uniqueID){
      $setID=self::setID($uniqueID);
      $path = $this->url."/$this->tabel/$setID.json";
      $grab = $this->grab($path, "DELETE");

   }

  public function grab($url, $method, $par=null){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      if(isset($par)){
         curl_setopt($ch, CURLOPT_POSTFIELDS, $par);
      }
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 120);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      $html = curl_exec($ch);
      return $html;
      curl_close($ch);
 }


}