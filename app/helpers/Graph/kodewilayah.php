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
class kodewilayah {
    protected static $instance;  
	private $conn;
	private $table_name = "appwilayah";
	private $init ="75";
	private $expo;
	// object properties
	public $kode;
	public $nama;
	public $kdset;

  
   public function __destruct(){
        
   } 
    
    
   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */
    public static function init() { 
        $dbs = new tatiye();
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
     // $this->driver=$code;
         // self::$instance->conn=$dbs->PDO();;
         self::$instance->expo=tatiye::tn(4);

       return self::$instance;
  }
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes wilayah 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function wilayah(){
      if (!empty($this->expo)) {

       $K=strlen($this->expo);
       if($K == 2) {
         $L=2;
         $C=5;
       } elseif ($K == 5){
         $L=5;
         $C=8;
       } else {
         $L=8;
         $C=13;
       }
           // if ($C==113) {
           //    $query = "SELECT kode,nama FROM ". $this->table_name . " WHERE kode='".$this->expo."'  ORDER BY nama  ";
           // } else {
        	  $query = "SELECT kode,nama FROM ". $this->table_name . " WHERE  LEFT(kode,".$L.")='".$this->expo."' AND CHAR_LENGTH(kode)=".$C." ORDER BY nama  ";
           // }
      } else {
     	$query = "SELECT kode,nama FROM ". $this->table_name . " WHERE  CHAR_LENGTH(kode)=2   ";
      }
     
         $que=tatiye::QY($query);  
         // while ($row = $que->fetch()) { 
         //    echo $row['kode'];
         // }  
		//  // $stmt = $this->conn->prepare($query);
		//  // $stmt->execute();
         // return $Syntax;
        return $que;






   }
   /* and class wilayah */
   /*
   |--------------------------------------------------------------------------
   | Initializes provinsi 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function provinsi($key){
    $query = "SELECT kode,nama FROM ". $this->table_name . " WHERE  kode='".substr($key,0,2)."'   ";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['nama'];
       
   }
   /* and class provinsi */
   /*
   |--------------------------------------------------------------------------
   | Initializes kabupaten 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function kabupaten($key){
    $query = "SELECT kode,nama FROM ". $this->table_name . " WHERE  kode='".substr($key,0,5)."'   ";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['nama'];
    //return substr($key,0,5);
   }
   /* and class kabupaten */
   /*
   |--------------------------------------------------------------------------
   | Initializes kecamatan 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function kecamatan($key){
   	$Text=tatiye::Text();

    $query = "SELECT kode,nama FROM ". $this->table_name . " WHERE  kode='".substr($key,0,8)."'   ";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $Text->strtoupper($row['nama']);
    //return substr($key,0,8);
       
   }
   /* and class kecamatan */
   /*
   |--------------------------------------------------------------------------
   | Initializes kddesa 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function kddesa($key){
    $Text=tatiye::Text();
    $query = "SELECT kode,nama FROM ". $this->table_name . " WHERE  kode='".$key."'   ";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	$product_item=array(
        "kode"     => $key,
		"nama"     => $row['nama'],
		"provinsi" =>  kodewilayah::init()->provinsi($key),
		"kabupaten"=>  kodewilayah::init()->kabupaten($key),
		"kecamatan"=>  kodewilayah::init()->kecamatan($key),
		"desa" => $Text->strtoupper($row['nama']),
	);
	return $product_item;
       
   }
   /* and class kddesa */
   /*
   |--------------------------------------------------------------------------
   | Initializes selectDesa 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function selectdesa(){
     $query = "SELECT kode,nama FROM ". $this->table_name . " WHERE  LEFT(kode,2)='".$this->init."' AND CHAR_LENGTH(kode)=13 ORDER BY kode  ";
     $stmt = $this->conn->prepare($query);
     $stmt->execute();
     return $stmt;




   }
   /* and class selectDesa */

 

 
  
}