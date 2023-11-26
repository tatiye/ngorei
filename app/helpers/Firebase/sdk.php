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


class sdk {
    protected static $instance;  
    private $query;
    private $url;
    private $tabel;


    public function __construct(){
         // $dbs = new tatiye();
         // $this->conn = new tatiye();
         // $this->sql  =$dbs->mysqli();
        
    }
    
 
   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */
    public static function init($instance,$from,$storage) {  
        if ( !isset(self::$instance) ) 
        {
          
            $class = __CLASS__;
            self::$instance = new $class();
        }

  
     self::$instance->url          =tatiye::Firebase($instance)->databaseURL();
     self::$instance->storage      =$storage;
     self::$instance->tabel        =$instance;
     self::$instance->data         =$storage['data'];
      return self::$instance;
  }
  
   public function search(){
     $val=array();
     $val1=array();
     $grab=array();
     $variable=tatiye::Firebase($this->tabel)->setData();
     foreach ($variable as $key => $value) {
        $val[]=$value[$this->data['colom']];
        $val1[$value[$this->data['colom']]]=$value['id'];
     }
      foreach ($val as $set => $row) {
        if (preg_match('~' . $this->data['keywords'] . '$~',$row)) {
              $las=array_search($val[$set], array_column($variable, 'nama'),true);
              return tatiye::Firebase($this->tabel)->search($val[$set]);
        }
      }
     return '';
   }

   /*
   |--------------------------------------------------------------------------
   | Initializes arraySearch 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function arraySearch(array $array, string $search): int{
      foreach ($array as $key => $value) {
        if (preg_match('~' . $search . '$~',$value)) {
            return $key;
        }
      }
    return -1;
       
   }
   /* and class arraySearch */
   /*
   |--------------------------------------------------------------------------
   | Initializes where 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function where(){
    $products_arr=array();
    $setData=tatiye::Firebase($this->tabel)->setData();
    arsort($setData);
    $NO=0;
    foreach (array_slice($setData, 0, $this->data['limit'])  as $key => $value) {
        if ($value[$this->data['colom']]==$this->data['value']) {
            $NO=$NO+1;
            $number=array('no'=>$NO);
            $json_arr=array_merge($number,$value); 
            $products_arr[]=$json_arr;
        }  
    }
    return $products_arr;

   }
   /* and class where */
   /*
   |--------------------------------------------------------------------------
   | Initializes paging 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function paging(){
    $products_arr=array();
    $setData=tatiye::Firebase($this->tabel)->paging($this->data['page'],$this->data['limit']);
    arsort($setData);
    $NO=0;
    foreach ($setData  as $key => $value) {
        if ($value[$this->data['colom']]==$this->data['value']) {
            $NO=$NO+1;
            $number=array('no'=>$NO);
            $json_arr=array_merge($number,$value); 
            $products_arr[]=$json_arr;
        }  
    }
    return $products_arr;
       
   }
   /* and class paging */
}