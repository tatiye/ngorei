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
use app\config\database AS setdb;

class tatiyeNetQueryForge 
{
    protected static $instance;  
	
	private $connection;
	private $driver;
	private $mydatabase;
	private $dbName;
	private $data = array();
	
    private function __construct() { /* ... @return DB */ }
    private function __clone() { /* ... @return DB */ }
    private function __wakeup() { /* ... @return DB */ }
	
	public function __destruct(){
		if (isset($this->connection))
		{
			switch ($this->driver) {
				case 'mysql': 
					mysql_close($this->connection);	
				break;	
			
				case 'mysqli': 
					mysqli_close($this->connection);	
				break;
			}
		}
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
        
		if ( !isset($params['driver']) )
			self::$instance->driver = 'mysql';
		else 
			self::$instance->driver = $params['driver'];
		
		if( !isset($params['host']) )
			throw new Exception('Please specify the host');
		
		if( !isset($params['username']) )
			throw new Exception('Please specify the username');
		
		if ( !isset($params['password']) )
			$params['password'] = '';
		
		if( !isset($params['database']) )
			throw new Exception('Please specify the database name');
		
		switch (self::$instance->driver) {
			case 'mysql': 
				self::$instance->connection = mysql_connect($params['host'],$params['username'],$params['password']); 
				if( !self::$instance->connection )
					throw new Exception('Could not connect: '.mysql_error());
				
				if( !mysql_select_db($params['database'], self::$instance->connection) )
					throw new Exception('Can\'t use '.$parms['database'].': '.mysql_error());
			break;	
			
			case 'mysqli': 
				self::$instance->connection = mysqli_connect($params['host'],$params['username'],$params['password']); 
				if( !self::$instance->connection )
					throw new Exception('Could not connect: '.mysqli_error($this->connection));
				
				if( !mysqli_select_db(self::$instance->connection, $params['database']) )
					throw new Exception('Can\'t use '.$parms['database'].': '.mysqli_error($this->connection));
			break;
		}
	 	 self::$instance->dbName = $params['database'];
	
		 return self::$instance;
	}
   /* and class Db */

	/*
	|--------------------------------------------------------------------------
	| Initializes create_db 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function create_db($key){
	// Create database
        $sql = "CREATE DATABASE $key";
        if (mysqli_query($this->connection, $sql)) {
          // echo "Database created successfully";
        } else {
         // echo "Error creating database: " . mysqli_error($this->connection);
        }
        
       mysqli_close($this->connection);
	    
	}

	public  function create_sql_view($key){
	
         $sql =$key;
         if (mysqli_query($this->connection, $sql)) {
           // echo "Database created successfully";
         } else {
           echo "Error creating database: " . mysqli_error($this->connection);
         }
        
         // mysqli_close($this->connection);
	    
	}


	public  function show_database($nat=''){
	
        $result = mysqli_query($this->connection,"SHOW DATABASES"); 
        $no=0;
        while ($row = mysqli_fetch_array($result)) { 
        	if ($row[0] !=='information_schema' 
        		&& $row[0] !=='sys'
        		&& $row[0] !=='performance_schema'
        		&& $row[0] !=='mysql') {
              $no=$no+1;
              $Exp[]=array(
                 'id'       =>$no,
                 'database' =>$row[0],
                 );
                }
         }
         if (!empty($nat)) {
          foreach ($Exp as $key => $value) {
          	if ($value['database']==$nat) {
          	     return $value['database'];
          		// code...
          	}
          }
         } else {
         return $Exp;
         	// code...
         }
         
         // mysqli_close($this->connection);
	    
	}





	/* and class create_db */
	/*
	|--------------------------------------------------------------------------
	| Initializes create_tabel 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function create_tabel($table='',$db=''){
		 $h=array();
	    foreach ($this->data['rows'] as $key => $value ) {
          $h[$value] =$this->data['values'][$key];
         $str = $str . '`' . $value . '`' . $this->data['values'][$key] . ','; 
         }



         $str = substr($str, 0, -1);

          $sql = "CREATE TABLE $table ($str)ENGINE=InnoDB DEFAULT CHARSET=utf8;";
          
          if (mysqli_query($this->connection, $sql)) {
            $Status=1;


          } else {
            echo "table: " . mysqli_error($this->connection);
          }
          
          mysqli_close($this->connection);

	    
	}
	/*
	|--------------------------------------------------------------------------
	| Initializes dropDatabase 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function dropDatabase($key){
        $sql = "Drop DATABASE  $key";
        if (mysqli_query($this->connection, $sql)) {
          echo "Database created successfully";
        } else {
          echo "Error creating database: " . mysqli_error($this->connection);
        }
        
        mysqli_close($this->connection);
	    
	}
	/* and class dropDatabase */
	/*
	|--------------------------------------------------------------------------
	| Initializes drop_tabel 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function drop_tabel($key=''){
        $sql = "DROP TABLE  $key";
        if (mysqli_query($this->connection, $sql)) {
          echo "Database created successfully";
        } else {
          echo "Error creating database: " . mysqli_error($this->connection);
        }
        
        mysqli_close($this->connection);
	    
	}
	/* and class drop_tabel */

	/*
	|--------------------------------------------------------------------------
	| Initializes alter_tabel 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function alter_tabel($table='',$db=''){
	   foreach ($this->data['rows'] as $key => $value ) {
         $str = $str . 'ALTER TABLE '.$table.'  MODIFY ' . $value . ' ' . $this->data['values'][$key] . ';'; 
         }
         if (mysqli_query($this->connection, $str)) {
            // echo "Table MyGuests created successfully";
          } else {
            echo "table: " . mysqli_error($this->connection);
          }
        
          // mysqli_close($this->connection);
   // ALTER TABLE barang  MODIFY nama VARCHAR(200) AFTER deskripsi;

// ALTER TABLE `demo` CHANGE `mytabel` `mytabelasas` VARCHAR(322) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
	}


	public  function alter_change($table='',$db=''){
	   foreach ($this->data['rows'] as $key => $value ) {
         $str = $str . 'ALTER TABLE '.$table.'  CHANGE ' . $value . ' ' . $this->data['values'][$key] . ';'; 
         }
         if (mysqli_query($this->connection, $str)) {
            // echo "Table MyGuests created successfully";
          } else {
            echo "table: " . mysqli_error($this->connection);
          }
        
          // mysqli_close($this->connection);
   // ALTER TABLE barang  MODIFY nama VARCHAR(200) AFTER deskripsi;
	}


	/* and class alter_tabel */

		public  function alter_add($table='',$db=''){
	   foreach ($this->data['rows'] as $key => $value ) {
         $str = $str . 'ALTER TABLE '.$table.'  ADD ' . $value . ' ' . $this->data['values'][$key] . ';'; 
         }
         if (mysqli_query($this->connection, $str)) {
            // echo "Table MyGuests created successfully";
          } else {
            // echo "table: " . mysqli_error($this->connection);
          }
        
          // mysqli_close($this->connection);
   // ALTER TABLE barang  MODIFY nama VARCHAR(200) AFTER deskripsi;


	}
	/* and class alter_tabel */
	public  function truncate_tabel($key=''){
		    $mydb=$this->dbName;
        $sql = "TRUNCATE `$mydb`.`$key` ";
        if (mysqli_query($this->connection, $sql)) {
          //echo "Database created successfully";
        } else {
          //echo "Error creating database: " . mysqli_error($this->connection);
        }
        
        //mysqli_close($this->connection);
	    
	}
	/* and class drop_tabel */
	/* and class alter_tabel */
	public  function alterdrop_tabel($key='',$failid=''){
		    $mydb=$key;
        $sql = "ALTER TABLE `$mydb` DROP `$failid` ";
        if (mysqli_query($this->connection, $sql)) {
          //echo "Database created successfully";
        } else {
          //echo "Error creating database: " . mysqli_error($this->connection);
        }
        
        //mysqli_close($this->connection);
	    
	}
	/* and class drop_tabel */
	/*
	 * @return DB
	 */
	public function from_json($values)
	{
		$values = json_decode($values);
				
		foreach($values as $key => $value)
		{
			$this->data['rows'][] = $key;
			
			switch (self::$instance->driver) {
				case 'mysql': 
					$this->data['values'][] = '"'.mysql_escape_string($value).'"';
				break;	
			
				case 'mysqli': 
					$this->data['values'][] = '"'.mysqli_escape_string($this->connection, $value).'"';
				break;
			}
		}
		
		return self::$instance;
	}  
	
	/*
	 * @return DB
	 */
	public function from_array($values)
	{
		foreach($values as $key => $value)
		{
			$this->data['rows'][] = $key;
			
			switch (self::$instance->driver) {
				case 'mysql': 
					$this->data['values'][] = '"'.mysql_escape_string($value).'"';
				break;	
			
				case 'mysqli': 
					$this->data['values'][] = '"'.mysqli_escape_string($this->connection, $value).'"';
				break;
			}
		}
		return self::$instance;
	}   
	/*
	|--------------------------------------------------------------------------
	| Initializes Query 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date Jum 25 Mar 2022 12:28:17  WITA 
	*/
	public  function from_sql($values=''){
		foreach($values as $key => $value)
		{
			$this->data['rows'][] = $key;
			
			switch (self::$instance->driver) {
				case 'mysql': 
					$this->data['values'][] = '"'.mysql_escape_string($value).'"';
				break;	
			
				case 'mysqli': 
					$this->data['values'][] = ''.mysqli_escape_string($this->connection, $value).'';
				break;
			}
		}
		// echo $instance;
		return self::$instance;
	    
	}
	/* and class Query */
	
	/*
	 * @return DB
	 */
	public function from_xml($values)
	{
		$xml = simplexml_load_string($values);
		foreach($xml->children() as $key => $value)
		{
			$this->data['rows'][] = $key;
			
			switch (self::$instance->driver) {
				case 'mysql': 
					$this->data['values'][] = '"'.mysql_escape_string($value).'"';
				break;	
			
				case 'mysqli': 
					$this->data['values'][] = '"'.mysqli_escape_string($this->connection, $value).'"';
				break;
			}
		}
		
		return self::$instance;
	}  
	
	/*
	 * @return JSON
	 */
	public function as_json($print = false)
	{
		if( !$print )
			return json_encode($this->data);
		else 
		{
			header('Content-Type: application/json');
			echo json_encode($this->data);
		}
	}
	
	/*
	 * @return array
	 */
	public function as_array()
	{
		return $this->data;
	}
	/*
	|--------------------------------------------------------------------------
	| Initializes 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function cek_tabel($NmTabel){
	      $result = mysqli_query($this->connection,"SHOW COLUMNS FROM $NmTabel");
        while (@$ngi=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        	 if (!empty($ngi['Field'])) {
        	  	return true;
        	  } else {
        	  	return false;
        	  }
        	   
        }
             
	    
	}


	/*
	|--------------------------------------------------------------------------
	| Initializes 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function show_tabel(){
	 $no=0;
	
	 $dbName=$this->dbName;
   $sql = 'SELECT TABLE_NAME AS `Table`, ROUND(((DATA_LENGTH + INDEX_LENGTH) / 1024 / 1024),2) AS `Size` FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.$dbName.'" AND table_type="BASE TABLE" ';
   $result = mysqli_query($this->connection,$sql);
   while ($row = mysqli_fetch_row($result)) { 
   foreach (setdb::tabelApi() as $key => $value) {
     if ($row[0]==$key) {
		   	$COUNT=tatiye::fetch($row[0]," COUNT(*) as count");
		       $no=$no+1;
		       $userData[]=array(
		         'no'      =>$no,
		         'tabel'   =>$row[0],
		         'data'    =>$COUNT['count'],
		         'size_MB' =>$row[1],
		         );
		      }
     }

  } 
    return $userData;  
	}

	public  function show_tabelAll(){
	 $no=0;
	
	 $dbName=$this->dbName;
   $sql = 'SELECT TABLE_NAME AS `Table`, ROUND(((DATA_LENGTH + INDEX_LENGTH) / 1024 / 1024),2) AS `Size` FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.$dbName.'" AND table_type="BASE TABLE" ';
   $result = mysqli_query($this->connection,$sql);
   while ($row = mysqli_fetch_row($result)) { 
  
		   	   $COUNT=tatiye::fetch($row[0]," COUNT(*) as count");
		       $no=$no+1;
		       $userData[]=array(
		         'no'      =>$no,
		         'tabel'   =>$row[0],
		         'data'    =>$COUNT['count'],
		         'size_MB' =>$row[1],
		         );
		      }
  
 
    return $userData;  
	}

	/*
	|--------------------------------------------------------------------------
	| Initializes title 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function show_tabelName($data){
		 $Exp=array();
	        foreach (self::show_tabel() as $key => $value) {
	        	if ($value['tabel']==$data) {
               $Exp[]=$value;
	        	}
	      }
	          return $Exp;
	    
	}
	/* and class title */
	/* and class show_tabel */
	public  function show_tabel_view(){
	 $no=0;
	 $dbName=$this->dbName;
   $sql = 'SELECT TABLE_NAME AS `Table`, ROUND(((DATA_LENGTH + INDEX_LENGTH) / 1024 / 1024),2) AS `Size` FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.$dbName.'" AND table_type="VIEW" ';
   $result = mysqli_query($this->connection,$sql);
   while ($row = mysqli_fetch_row($result)) {  
       $no=$no+1;
       $userData[]=array(
         'no'      =>$no,
         'tabel'   =>$row[0],
         'size_MB' =>$row[1],
         );
    }

        if(isset($userData)){    
          return $userData;
         }
	    
	}
	/* and class show_tabel */

// SELECT *
//   FROM information_schema.tables
//  WHERE table_schema='gsd'
//    AND table_type='BASE TABLE';

	/*
	|--------------------------------------------------------------------------
	| Initializes colom_tabel 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function colom_tabel($NmTabel){
		$no=0;
	
	
        $result = mysqli_query($this->connection,"SHOW COLUMNS FROM $NmTabel");
        while ($ngi=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        	// $FieldUID=$Text->strreplace([$ngi['Field'],'-','_']);
        	$no=$no+1;
            $userData[]=array(
               'No'        =>$no,
               'Field'     =>$ngi['Field'],
               'Type'      =>$ngi['Type'],
               'Null'      =>$ngi['Null'],
               'Extra'     =>$ngi['Extra']?$ngi['Extra'] :'',
            
               
              );
             }
             return $userData;
	}
	/* and class colom_tabel */
	/*
	|--------------------------------------------------------------------------
	| Initializes title 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function tabel_comments($tabel,$Field=''){
		$key = trim($tabel);
        $result = mysqli_query($this->connection,"SELECT a.COLUMN_NAME, a.COLUMN_COMMENT FROM  information_schema.COLUMNS a  WHERE a.TABLE_NAME='".$key."' AND a.table_schema= '".$this->dbName."'");
           while ($ngi=mysqli_fetch_array($result,MYSQLI_ASSOC)){
           	if ($ngi['COLUMN_NAME']==$Field) {
        	    return $ngi['COLUMN_COMMENT'];
             }
             
             
         }
	}
	/* and class title */


// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
// $product_item=array(


	public  function auto_increment($tabel=''){
		$key = trim($tabel);
		echo "string";
       $result = mysqli_query($this->connection,"SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = '".$tabel."' and table_schema = 'development'");
         $data = mysqli_fetch_array($result);
        return $data['AUTO_INCREMENT'];     
    
	}
//    echo $key->ip_address;
// }
// SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'demo' and table_schema = 'development';

	/* and class select_crud */
	/*
	 * @return XML
	 */
	public function as_xml($print = false, $root_element = 'items')
	{
		$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
		$xml .= "<$root_element>";
		
		foreach($this->data as $row)
		{
		    $xml .= "<item>";
 
      		foreach($row as $key => $value)
      		{
         		$xml .= "<$key>";
         		$xml .= "<![CDATA[$value]]>";
         		$xml .= "</$key>";
      		}
 
      		$xml .= "</item>";
   		}
		
		$xml .= "</$root_element>";
		
		if ( !$print )
			return $xml;
		else
		{
			header('Content-Type: text/xml');
			echo $xml;
		}
	}



}