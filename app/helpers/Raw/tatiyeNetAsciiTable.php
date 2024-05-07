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
namespace app\Raw;
use app\tatiye;
use app\Raw\AsciiTable\Builder;
use app\Raw\AsciiTable\BuilderCrud;
use app\Raw\AsciiTable\BuilderArray;
use app\Raw\AsciiTable\BuilderArrayjs;
use app\Encryption\HunterObfuscator;
class tatiyeNetAsciiTable {
  protected static $instance;  
  private $detection;
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
    public static function init($params='') {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
     // $etc=tatiyeNet::etcFile($params);
     self::$instance->driver    =  $params;
     return self::$instance;
  }
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes addRow 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function addRow($key=''){
    $builder = new Builder();
    $builder->addRow($key);
    echo '<pre>'.$builder->renderTable().'</pre>';
       
   }
   /* and class addRow */
   /*
   |--------------------------------------------------------------------------
   | Initializes tabel 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function tabel($key=''){
    $builder = new Builder();
    $builder->addRows($key);
    echo '<pre>'.$builder->renderTable().'</pre>';
   }
   /* and class tabel */
   /*
   |--------------------------------------------------------------------------
   | Initializes tabel 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function Array($key='',$header='',$footer=''){
    $builder = new BuilderArray();
    $builder->addRows($key,$header);
    echo '<pre style=" font-size: 12px;">'.$builder->renderTable().'</pre>';
   }
   /* and class tabel */
   public  function ArrayJs($key='',$header='',$footer=''){
    $builder = new BuilderArrayjs();
    $builder->addRows($key,$header,$footer);
    echo $builder->renderTable();


   }
   /* and class tabel */
   /*
   |--------------------------------------------------------------------------
   | Initializes tabel 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function crud($key='',$header=''){
    $builder = new BuilderCrud();
    $builder->addRows($key,$header);
     return $builder->renderTable();
    
   }
   /* and class tabel */



   
   /*
   |--------------------------------------------------------------------------
   | Initializes query 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function query($key){
    $builder = new Builder();
      $db=new tatiyeNet();
      $Exp = array();
      $query="SELECT * FROM $key";
      $result=$db->query($query);
      while($row=$result->fetch_assoc()){
       $Exp=$row;
   }




    $builder->addRow($Exp);
    echo '<pre>';
    print_r($builder->renderTable());
    echo '</pre>';
       
   }
   /* and class query */
 
}
?>
