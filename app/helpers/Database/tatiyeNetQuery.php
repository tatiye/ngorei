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

use mysqli;
class tatiyeNetQuery 
{
    protected static $instance;  
	
	private $connection;
	private $driver;
	private $conn;
	private $query;
	private $portion;
	private $data = array();
	

    private function __clone() { /* ... @return DB */ }
    private function __wakeup() { /* ... @return DB */ }
	public function __construct(){
        
        $db = new tatiyeNet();
        $this->conn =$db;
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
     self::$instance->driver = $params;
     return self::$instance;
	}
   /* and class Db */

 
   /*
   |--------------------------------------------------------------------------
   | Initializes select 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function select($query){
   	 $IDquery=explode('FROM',$query);
   	if (!empty($IDquery[1])) {
       $this->query= $IDquery[1];
   	   $this->portion=$IDquery[0];
   	} else {
   		 $this->portion=false;
   		 $this->query= $query;
   	}
   	
   	    
        return self::$instance;  
   }
   /* and class select */

   /* and class select_join */
   /*
   |--------------------------------------------------------------------------
   | Initializes query 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function thi(){
   	  $thi=explode(' ',$this->query);
   	   if (!empty($thi[1])) {
            $str = "";
             foreach ($thi as $key => $value) {
                 if ($key > 0) {
                      $str = $str . $value." ";
                 } 
             }
              $str =substr($str, 0, -1);
          return 'WHERE '. $str;
       } else {
   	     return $thi[0];
   	   }
   	  
        
       
   }
   /* and class query */
   /*
   |--------------------------------------------------------------------------
   | Initializes fetch_assoc 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function fetch_assoc($Portion='*'){
   	   if (!empty($this->portion)) {

	         $query="SELECT $this->portion FROM $this->query";
					 $result=$this->conn->query($query);
					 while($row=$result->fetch_assoc()){
					 	  $userData[]=$row;
					 }
					 return $userData;
   	   } else {

         $query="SELECT $Portion FROM $this->query";
				 $result=$this->conn->query($query);
				 while($row=$result->fetch_assoc()){
				 	  $userData[]=$row;
				 }
				 return $userData;

   	   }
   	   

      
				 
   }
   /* and class fetch_assoc */

   /*
   |--------------------------------------------------------------------------
   | Initializes fetch_object 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function fetch_object($Portion='*'){

   	   if (!empty($this->portion)) {

	         $query="SELECT $this->portion FROM $this->query";
					 $result=$this->conn->query($query);
					 while($row=$result->fetch_object()){
					 	  $userData[]=$row;
					 }
					 return $userData;

   	   } else {

         $query="SELECT $Portion FROM $this->query";
				 $result=$this->conn->query($query);
				 while($row=$result->fetch_object()){
				 	  $userData[]=$row;
				 }
         return $userData;
   	   }

        
       
   }
   /* and class fetch_object */
   /*
   |--------------------------------------------------------------------------
   | Initializes sum 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function sum($key){
      $query="SELECT $key FROM $this->query ";
      $result=$this->conn->query($query);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      return $row;
  
   }
   /* and class sum */
   /*
   |--------------------------------------------------------------------------
   | Initializes singleArray 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function singleArray($Portion='*'){

   	   if (!empty($this->portion)) {
	       $query="SELECT $this->portion FROM $this->query";
         $result=$this->conn->query($query);
         $row = $result->fetch_array(MYSQLI_ASSOC);
         return $row;
   	   } else {

         $query="SELECT $Portion FROM $this->query";
         $result=$this->conn->query($query);
         $row = $result->fetch_array(MYSQLI_ASSOC);
         return $row;
   
   	   } 
   }
   /* and class singleArray */
   /*
   |--------------------------------------------------------------------------
   | Initializes singleObject 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function singleObject($Portion='*'){
   	   if (!empty($this->portion)) {

	       $query="SELECT $this->portion FROM $this->query";
         $result=$this->conn->query($query);
         $row = $result->fetch_object();
         return $row;

   	   } else {

				$query="SELECT * FROM visitor ";
				$result=$this->conn->query($query);
				$row = $result->fetch_object();
				return $row;
				 
   	   } 
       
   }
   /* and class singleObject */




}

