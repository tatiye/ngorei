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
namespace app\Database\NetDb;
use app\tatiye;
use app\Database\NetDb\UniqueValues;
class tatiyeNetDb 
{
    protected static $instance;  
  
  private $connection;
  private $driver;
  private $data = array();

    // private function __destruct() { /* ... @return DB */ }
  
    // private function __destruct() { /* ... @return DB */ }
    private function __clone() { /* ... @return DB */ }
    private function __wakeup() { /* ... @return DB */ }
  

    public function __construct(){
        $dbs        =new tatiye();
        $this->conn =new tatiye();
        // $this->sql  =$dbs->mysqli();
        // $this->db   =$dbs->PDO();
        $this->text =$Text=tatiye::Text();
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
     return self::$instance;
  }
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes etcFolder 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function etcFolder($key,$route=''){
    if ($key=='install') {
        $install='app/package.json';
    } else if ($key=='path') {
          $install='public/package/composer.json'; 
    } else if ($key=='theme') {
        $install='public/theme/manifest.json'; 
    } else if ($key=='fetching') {
         $install='public/package/manifest.json';
    } else if ($key=='package') {
        if (!empty($route)) {
          $install='public/package/'.$route.'/package.json';
        } else {
           $install='public/package/package.json';
        }
    } else {
         $install='public/assets/'.$key.'.json'; 
    }
 
     return tatiye::dir($install);
     
       
   }
   /* and class etcFolder */
   /*
   |--------------------------------------------------------------------------
   | Initializes instances 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function instances(){
       return tatiye::etcFolder('json').'instances.json';
       
   }
   /* and class instances */

   /*
   |--------------------------------------------------------------------------
   | Initializes insert 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 09:41:37  WITA 
   */
  public function insert($table){

// echo $this->data['rows'];
//  echo self::etcFolder($table);
      $data = file_get_contents(self::etcFolder($table));
      $json_arr = json_decode($data, true);
    if ($table=='package') {
      $primarykey=$this->data['rows']['primarykey'];
    } else {
       $primarykey=count($json_arr)+1;
    }
    
      $idValidasi=self::searchForId($this->data['rows']['id'], $json_arr);
      $array1=array(
         'id'     =>$primarykey,
         "time"   =>tatiye::tm(),                                                 
         "date"   =>tatiye::dt("EN"),                                             
         "bulan"  =>tatiye::dt("M"),                                              
         "tahun"  =>tatiye::dt("Y"));
      $array2=$this->data['rows'];
      $json_arr[]=array_merge($array1,$array2);
 if (!empty($idValidasi)) {
     // code...
 } else {
 }
   file_put_contents(self::etcFolder($table), json_encode($json_arr));
 // file_put_contents(self::etcFolder($table), json_encode(array_unique($json_arr)));

  }
   /* and class insert */


public  function searchForId($id, $array) {
   foreach ($array as $key => $val) {
       if ($val['id'] === $id) {
           return $key;
       }
   }
   return null;
}

   /*
   |--------------------------------------------------------------------------
   | Initializes count 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 31 Mar 2022 04:20:10  WITA 
   */
   public  function rowCount($table,$where=''){
      $data = file_get_contents(self::etcFolder($table));
      $json_arr = json_decode($data, true);
      $total = 0;
      if (!empty($where)) {
         $ID=explode('=',$where);
         foreach ($json_arr as $value) {
             if($value[$ID[0]]==$ID[1]){
                 $total = $total+1;
             }
          }
          return $total;
      } else {
          return count($json_arr);
      } 
   }
   /* and class count */
  /*
   |--------------------------------------------------------------------------
   | Initializes cekID 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function cekID($table,$id){
 
         $data = file_get_contents(self::etcFolder($table));
        $json_arr = json_decode($data, true);
        foreach ($json_arr as $key => $value) {
             if ($value['id'] == $id) {
                 return true;
             }
            // code...
        }
        
       
   }
   /* and class cekID */ 
 /*
  |--------------------------------------------------------------------------
  | Initializes insertkey 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  Kam 17 Mar 2022 12:40:26  WITA
  */
  public  function insertkey($table,$where='',$package=''){
     $newArray = array(); 
     $Fruits = array(); 

      $data = file_get_contents(self::etcFolder($table));
      $json_arr = json_decode($data, true);
       $array3=array(
         "time"   =>tatiye::tm(),                                                 
         "date"   =>tatiye::dt("EN"),                                             
         "bulan"  =>tatiye::dt("M"),                                              
         "tahun"  =>tatiye::dt("Y"));

    if (!empty($this->data['rows']['id'])) {
       $primarykey=$this->data['rows']['id'];
       $array1=array('id' =>$primarykey);
    } else {
       $array1=array('id' =>count($json_arr)+1);
    }

      $array2=$this->data['rows'];
      $json_arr[] =array_merge($array1,$array2,array('update' =>$array3));

          $IDwhere=explode('|',$where);
          $newArrayupdate = "";
          $newArrayupdate1 = "";
          foreach ( $json_arr AS $key => $line ) { 
             foreach ($IDwhere as $keywh ) {
              if ( !in_array($line[$keywh], $Fruits) ) { 
                  $Fruits[] = $line[$keywh]; 
                  $newArray[$key] = $line;  
              } 
          } 
       }


      $originalArray = $newArray; 
      $newArray = NULL;
      $Fruits = NULL;
     
   file_put_contents(self::etcFolder($table,$package), json_encode($originalArray));
    //  //file_put_contents(self::etcFolder('instances'), json_encode($originalArray));
    //  $setUpdate=self::searchForId($array1['id'],$json_arr);
    // var_dump($setUpdate['id']);
 
    if (!empty(self::cekID($table,$array1['id']))) {
             self::update($table,"id=".$array1['id']);
      }   
  }
  /* and class insert */

 /*
  |--------------------------------------------------------------------------
  | Initializes cekC 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function redColumn($table,$where='',$keyId=''){
     $ID=explode('|',$where);
     $Exp=array();
     $etc= self::etcFolder($table);
     $data = file_get_contents($etc);
     $array_column=json_decode($data, true);
     foreach ($array_column as $key => $value) {
              $Exp[$key]=$value;
     }

     $last_names = array_column($Exp, $ID[0],'id');
     $last = array_column($Exp, $ID[1],'id');
     foreach ($last_names as $key1 => $value1) {
          if ($last[$key1]==tatiye::Encryption(tatiye::uidkey())) {
               $userData=self::where($table,"id=$key1");
          }
          
         
     }



 
      if (!empty($userData)) {
        return $userData; 
      } 
  }
  /* and class cekC */
  /*
  |--------------------------------------------------------------------------
  | Initializes redColumnSelect 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function redColumnSelect($tabel=''){
     
     if (!empty($tabel)) {
        $etc= tatiye::etcFolder('json').$tabel.'.json';
        $nMTabel=$tabel;
     } else {
        $etc= self::instances();
        $nMTabel='instances';
     }

      $data = file_get_contents($etc);
      $array_column=json_decode($data, true);
      $row=tatiye::localStorage($nMTabel)->run($array_column);
      return $row;
      // var_dump($row);
  }
  /* and class redColumnSelect */
  /*
  |--------------------------------------------------------------------------
  | Initializes redColumnInsert 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function redColumnInsert($table,$where='',$keyId=''){
          $json_arr = array(); 
          $arry_data=self::redColumn($table,$where,$keyId);
          // var_dump($arry_data['id']);
          if (!empty($arry_data['id'])) {
              self::columnUpdate($table,$where,$keyId);
              // return $arry_data;
          } else {
                self::insert($table);
                return true;
          }
          
          // if ($table=='instances') {
          //     $arry_data=self::redColumn('instances',$where,$keyId);
          // } else {
          //     // code...
          // }
      
      
  }
  /* and class redColumnInsert */
  /*
  |--------------------------------------------------------------------------
  | Initializes columnUpdate 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function columnUpdate($table,$where='',$keyId=''){
          $json_arr = array(); 
          $arry_data=self::redColumn($table,$where,$keyId);
       // foreach (array_keys($arry_data) as $key1 => $value1 ) {
          foreach ($arry_data as $key => $value) {
              $json_arr['mainClick']=$arry_data['mainClick']+1;
              // $json_arr['date']     =tatiye::dt('EN');
              // $json_arr['time']     =tatiye::dt('DTIE');
        }
        if (!empty($arry_data['id'])) {
            $this->conn->netDb($json_arr)->update($table,'id='.$arry_data['id']);
        }
        
      
  }
  /* and class columnUpdate */


  /*
  |--------------------------------------------------------------------------
  | Initializes update 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function update($table,$where){
        $ID=explode('=',$where);
    $data = file_get_contents(self::etcFolder($table));
    $json_arr = json_decode($data, true);
    foreach ($this->data['rows'] as $key1 => $value1 ) {
       foreach ($json_arr as $key => $value) {
           if ($value[$ID[0]] == $ID[1]) {
              $json_arr[$key][$key1]=$value1;
           }
       }
   }

  file_put_contents(self::etcFolder($table), json_encode($json_arr));
      
  }
  /* and class update */

 /*
  |--------------------------------------------------------------------------
  | Initializes where 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function where($table,$where){
     $data = file_get_contents(self::etcFolder($table));
       $json_arr =self::select($table);
      $ID=explode('=',$where);
       foreach ($json_arr as $key => $value) {
           if ($value[$ID[0]] == $ID[1]) {
           $userData[]=$value;
           }
       }
       if (!empty($userData)) {
           return $userData;
       } 

  }
  /* and class where */
  /*
  |--------------------------------------------------------------------------
  | Initializes cekC 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function cekColumnDeV($table,$where='',$keyId=''){
        $ID=explode('|',$where);
     $etc= self::etcFolder($table);
     $data = file_get_contents($etc);
     $array_column=json_decode($data, true);
     $last_names = array_column($array_column, $ID[0],'id');
     $last_names1 = array_column($array_column, 'id',$ID[1]);
      
      foreach ($last_names1 as $key => $value) {
          if ($key==$keyId) {
               foreach ($last_names as $key1 => $value1) {
                  if ($value==$key1) {
                      $userData[]=$value;
                  }
               }
          }
     //    echo $keyId;
        // echo $array_column[$where];
     //     // code...
     }
     // return $last_names;
     tatiye::json_view($userData,1);
     tatiye::json_view($last_names1,3);

      
  }
  /* and class cekC */
      /*
  |--------------------------------------------------------------------------
  | Initializes insertkey 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  Kam 17 Mar 2022 12:40:26  WITA
  */
  public  function search($table,$where=''){

  }
  /* and class insert */








  /*
  |--------------------------------------------------------------------------
  | Initializes delete 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function delete($table,$where){
     $data     = file_get_contents(self::etcFolder($table));
     $json_arr = json_decode($data, true);
      $ID=explode('=',$where);
      foreach ($json_arr as $key => $value) {
          if ($value[$ID[0]] == $ID[1]) {
              $arr_index[] = $key;
          }
      }
      foreach ($arr_index as $i)
      {
          unset($json_arr[$i]);
      }
     
     $json_arr = array_values($json_arr);
     file_put_contents(self::etcFolder($table), json_encode($json_arr));
      
  }
  /* and class delete */
  /*
  |--------------------------------------------------------------------------
  | Initializes select 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date Jum 25 Mar 2022 03:12:22  WITA 
  */
  public  function select($table){
     $etc= self::etcFolder($table);
     $data = file_get_contents($etc);
     return json_decode($data, true);  
  }
  /* and class select */
  /*
  |--------------------------------------------------------------------------
  | Initializes select 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date Jum 25 Mar 2022 03:12:22  WITA 
  */
  public  function distribute($table){
      $etc= tatiye::DIR('public/'.$table.'.json');
      $data = file_get_contents($etc);
     return json_decode($data, true);  
  }
  /* and class select */

  public function from_array($values=''){
       $this->data['rows']= $values;  
    return self::$instance;
  }   

  /*
  |--------------------------------------------------------------------------
  | Initializes where 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
 
 




}