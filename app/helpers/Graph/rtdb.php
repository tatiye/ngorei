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
namespace app\Graph;
use app\tatiye;
use PDO;
class rtdb {
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
     $dbfire=tatiye::fireDb();
     self::$instance->url          =$dbfire['database']['databaseURL'];
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
      // $setID=self::setID($uniqueID);
      $path = $this->url."/$this->tabel/$uniqueID.json";
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
  /*
  |--------------------------------------------------------------------------
  | Initializes Select 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function select($val=''){
        $variable=tatiye::Firebase($val->tabel)->setData();
         $primarykey=count($variable);

        if (!empty($val->page)) {
            $page=$val->page;
        } else {
            $page=0;
        }
        $numberPage=abs($val->page-1);
        $total_pages = ceil($primarykey / $val->limit)-1;
        if ($primarykey > ($page+1)) {
           $retPage=$page;

           $record_num = ($val->limit * ($page+1)) - $val->limit;
        } else {
           $retPage=0;
           $record_num=0;
        }

        
           
        
    
        $no=abs($record_num);
        $products_arr["limit"]     =$val->limit;
        $products_arr["page"]      =$val->page;
        $products_arr["data"]      =$primarykey;
        $products_arr["records"]   =$total_pages;
        $products_arr["storage"]      =array();
       foreach (array_slice(array_reverse($variable), $retPage, $val->limit)  as $key => $value ) {
              if (!empty($value['user'])) {
                 $Expuid=tatiye::uidProfil($value["user"]);
                 $sub_array["nama"] =$Expuid["nama"];   
                 $sub_array["avatar"] =$Expuid["avatar"];   
              } else {
                 $sub_array["nama"] =false;   
                 $sub_array["avatar"] =false;   
                  // code...
              }
              
              $no2=abs($no+1);
              $number=array("no"=>$no2); 
              $keyID=array("key"=>$key);                      
              array_push($products_arr["storage"], array_merge($number,$keyID,$value,$sub_array));
        }
        return $products_arr;
      
  }
  /* and class Select */

   public function delete($uniqueID){
      $path = $this->url."/$this->tabel/$uniqueID.json";
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