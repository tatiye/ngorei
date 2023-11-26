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
          echo "Database created successfully";
        } else {
          echo "Error creating database: " . mysqli_error($this->connection);
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
       $no=$no+1;
       $userData[]=array(
         'no'      =>$no,
         'tabel'   =>$row[0],
         'data'    =>$row[0],
         'size_MB' =>$row[1],
         );
    }

        if(isset($userData)){    
          return $userData;
         }
	    
	}
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
        	$FieldUID=$Text->strreplace([$ngi['Field'],'-','_']);
        	$no=$no+1;
            $userData[]=array(
               'No'        =>$no,
               'Field'     =>$ngi['Field'],
               'Type'      =>$ngi['Type'],
               'Null'      =>$ngi['Null'],
               'Extra'     =>$ngi['Extra']?$ngi['Extra'] :'',
               'Tabel'     =>$NmTabel,
            
               
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



	/*
	|--------------------------------------------------------------------------
	| Initializes crudInsert 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function crudStatus($key){
	    if($key == "insert") {?>
    
	    <?php }
	    
	    
	}
	/* and class crudInsert */
	/*
	|--------------------------------------------------------------------------
	| Initializes colom_tabel 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function colom_crud($NmTabel,$string=''){
		   $no=0;
        $result = mysqli_query($this->connection,"SHOW COLUMNS FROM $NmTabel");
        while ($ngi=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        	 if ($ngi['Field'] !=='id' && $ngi['Field'] !=='row') {
        	 	$no=$no+1;
        	 	switch ($ngi['Field']) {
        	 	    case "id":
        	 	        $crud='=>tatiyeNet::uidkey()';
        	 	        break;
        	 	    case "user_id":
        	 	        $crud='=>tatiyeNet::uidkey(),';
        	 	        break;
        	 	    case "bulan":
        	 	        $crud="=>tatiyeNet::dt('D'),";
        	 	        break;
        	 	    case "tahun":
        	 	        $crud="=>tatiyeNet::dt('Y'),";
        	 	        break;
        	 	    case "date":
        	 	        $crud='=>tatiyeNet::dt(),';
        	 	        break;
        	 	    case "time":
        	 	        $crud='=>tatiyeNet::tm(),';
        	 	        break;

        	 	    default:
        	 	         $crud='=>$_POST['."'a".$no."'],";
        	 	}
        	 	
            $userData[]=array(
               'field'     =>"'".$ngi['Field']."'",               
               'post'      =>$crud,               
               'object'    =>'$row->'.$ngi['Field'].'',                           
               'array'     =>'$row'."['".$ngi['Field']."']",               
               'extract'   =>'$'.$ngi['Field'],               
              );
             }
           }
             return $userData;
	}
	/* and class colom_tabel */

		/*
	|--------------------------------------------------------------------------
	| Initializes colom_tabel 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function insert_crud($NmTabel,$string=''){
		   $no=0;
        $result = mysqli_query($this->connection,"SHOW COLUMNS FROM $NmTabel");
        while ($ngi=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        	 if ($ngi['Field'] !=='id' && $ngi['Field'] !=='row') {
        	 	$no=$no+1;
        	 	switch ($ngi['Field']) {
        	 	    case "id":
        	 	        $crud='=>tatiyeNet::uidkey()';
        	 	        break;
        	 	    case "user_id":
        	 	        $crud='=>tatiyeNet::uidkey(),';
        	 	        break;
        	 	    case "bulan":
        	 	        $crud="=>tatiyeNet::dt('D'),";
        	 	        break;
        	 	    case "tahun":
        	 	        $crud="=>tatiyeNet::dt('Y'),";
        	 	        break;
        	 	    case "date":
        	 	        $crud='=>tatiyeNet::dt(),';
        	 	        break;
        	 	    case "time":
        	 	        $crud='=>tatiyeNet::tm(),';
        	 	        break;

        	 	    default:
        	 	        $crud='=>$_POST['."'a".$no."'],";
        	 	}
        	 	
            $userData[]=array(
               'no'     =>"'".$ngi['Field']."'",               
               'no1'    =>$crud,                            
              );
             }
           }
           echo '<pre><code class="language-js">'.tatiyeNet::AsciiTable()->crud($userData,'$data = array(').');
$result=$db->que($data)->insert("'.$NmTabel.'");
           </code>  </pre>';
   
         

           
	}
	/* and class colom_tabel */
	/*
	|--------------------------------------------------------------------------
	| Initializes pac_crud 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function pac_crud($NmTabel,$string='',$headerId=''){
		   $no=0;
 

if (!empty(tatiyeNet::cookie('primarykey'))) {
	$primarykey=explode('@',tatiyeNet::cookie('primarykey'));
	$myId=$primarykey[0];
} else {
	$myId='id';
}

           foreach ($string as $key => $value) {
	        if (!empty($value)) {
	        	$no=$no+1;
	        	$ID=explode('-',$value);
	        	$Faild=$ID[0];
	        	$name='a'.$no;
	        	$Form =$ID[2];
	        	 if($Form == 'select') {
	        	   $idval='tatiyeNet::val(&apos;select&apos;,$_POST[&apos;'.$name.'&apos;]),';
	        	 } elseif ($Form == 'diteruskan'){
	        	    $idval='';
	        	 } else {
	        	    $idval='tatiyeNet::val(&apos;characters&apos;,$_POST[&apos;'.$name.'&apos;],2),';
	        	 }

	            $validasiData[]=array(
                     'Faild'     =>"'".$name."'",                                        
                     'Faild1'    =>'=>'.$idval,                                        
                ); 

                 $userData[]=array(
                     'Faild'     =>"'".$Faild."'",                                        
                     'Faild1'    =>'=>$_POST[&apos;'.$name.'&apos;],',                                        
                  );
                 $updateData[]=array(
                     'Faild'     =>"'".$Faild."'",                                        
                     'Faild1'    =>'=>$_POST[&apos;'.$name.'&apos;],',                                        
                  );


	        }
    
          }

           $userData[]=array(
              'Faild'     =>"'user_id'",                                        
              'Faild1'    =>'=>tatiyeNet::uidkey(),',                                        
           );
           $validasiData[]=array(
              'Faild'     =>"'token'",                                        
              'Faild1'    =>'=>tatiyeNet::val(&apos;text&apos;,tatiyeNet::cookie(&apos;key&apos;) ,&apos;30|Expair Token&apos;),',                                        
           );

    $Text        =tatiyeNet::Text();
    $header=explode('@',$headerId);
    $ID=explode('=',$header[2]);
    $package= $Text->strreplace([$ID[0],' ','/']).'/'.$ID[1];
    $segmen=$ID[1];


           echo "<strong>Insert Data</strong> ";
           echo '<pre><code class="language-js">} elseif ($_POST[&apos;segment&apos;] == &apos;'.$segmen.'&apos;){
/*
|--------------------------------------------------------------------------
| Initializes Validasi '.$segmen.'
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date 
*/
'.tatiyeNet::AsciiTable()->crud($validasiData,'$val=tatiyeNet::validation([').']);
if (empty($val[&apos;error&apos;])) {
/*
|--------------------------------------------------------------------------
| Initializes Insert '.$segmen.'
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date '.tatiyeNet::dt('DTIE').'
*/
'.tatiyeNet::AsciiTable()->crud($userData,'$myArray = array(').');
$result=$db->que($myArray)->insert("'.$NmTabel.'");

$val[&apos;hasil&apos;]    =&apos;sukses&apos;;
} else {
$val[&apos;hasil&apos;] = &apos;error&apos;;
}</code></pre>';
	    
           echo "<strong>Update Data</strong>";

           echo '<pre><code class="language-js">} elseif ($_POST[&apos;segment&apos;] == &apos;'.$segmen.'_update&apos;){
/*
|--------------------------------------------------------------------------
| Initializes Validasi  '.$segmen.'_update 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date 
*/
'.tatiyeNet::AsciiTable()->crud($validasiData,'$val=tatiyeNet::validation([').']);
if (empty($val[&apos;error&apos;])) {
/*
|--------------------------------------------------------------------------
| Initializes  '.$segmen.'_update 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date '.tatiyeNet::dt('DTIE').'
*/
'.tatiyeNet::AsciiTable()->crud($userData,'$myArray = array(').');
$result=$db->que($myArray)->update("'.$NmTabel.'",&quot;'.$myId.'=&apos;&quot;.$ID.&quot;&apos;&quot;);

$val[&apos;hasil&apos;]    =&apos;sukses&apos;;
} else {
$val[&apos;hasil&apos;] = &apos;error&apos;;
}</code></pre>';

           echo "<strong>Delete Data</strong>";

echo '<pre><code class="language-js">} elseif ($_POST[&apos;segment&apos;] == &apos;'.$segmen.'_delete&apos;){
/*
|--------------------------------------------------------------------------
| Initializes '.$segmen.'_delete
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date '.tatiyeNet::dt('DTIE').'
*/

$val=tatiyeNet::validation([
  &apos;token&apos;  =&gt;tatiyeNet::val(&apos;text&apos;,tatiyeNet::cookie(&apos;key&apos;) ,&apos;30|Expair Token&apos;),

]);
if (empty($val[&apos;error&apos;])) {
   $val[&apos;token&apos;]    =tatiyeNet::Encryption(tatiyeNet::uikeyId());
   $val[&apos;hasil&apos;]    =&apos;sukses&apos;;
   $result=$db->delete("'.$NmTabel.'",&quot;'.$myId.'=&apos;&quot;.$ID.&quot;&apos;&quot;);
} else {
 $val[&apos;hasil&apos;] = &apos;error&apos;;
};</code></pre>';


	}
	/* and class pac_crud */
	/*
	|--------------------------------------------------------------------------
	| Initializes update_crud 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function update_crud($NmTabel){
		   $no=0;
        $result = mysqli_query($this->connection,"SHOW COLUMNS FROM $NmTabel");
        while ($ngi=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        	 if ($ngi['Field'] !=='id' && $ngi['Field'] !=='row'&& $ngi['Field'] !=='user_id') {
        	 	$no=$no+1;
        	 	switch ($ngi['Field']) {
        	 	    case "id":
        	 	        $crud='=>tatiyeNet::uidkey()';
        	 	        break;
        	 	    case "user_id":
        	 	        $crud='=>tatiyeNet::uidkey(),';
        	 	        break;
        	 	    case "bulan":
        	 	        $crud="=>tatiyeNet::dt('D'),";
        	 	        break;
        	 	    case "tahun":
        	 	        $crud="=>tatiyeNet::dt('Y'),";
        	 	        break;
        	 	    case "date":
        	 	        $crud='=>tatiyeNet::dt(),';
        	 	        break;
        	 	    case "time":
        	 	        $crud='=>tatiyeNet::tm(),';
        	 	        break;

        	 	    default:
        	 	        $crud='=>$_POST['."'a".$no."'],";
        	 	}
        	 	
            $userData[]=array(
               'no'     =>"'".$ngi['Field']."'",               
               'no1'    =>$crud,                            
              );
             }
           }
           echo '<pre><code class="language-js">'.tatiyeNet::AsciiTable()->crud($userData,'$data = array(').');
$result=$db->que($data)->update("'.$NmTabel.'","id =`1` AND row =`1`");</code></pre>';
   

              
	    
	}
	/* and class update_crud */
	/*
	|--------------------------------------------------------------------------
	| Initializes delete_crud 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function delete_crud($key){
   echo '<pre><code class="language-js">$db->delete("'.$key.'","id =`1` AND row =`1`");</code>  </pre>';
	    
	}
	/* and class delete_crud */
	/*
	|--------------------------------------------------------------------------
	| Initializes select_crud 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function select_crud($tabel,$string='array',$wh=''){
		   if ($string =='ooparray') {
		      $getid='array';
		    } elseif ($string =='oopobject'){
		       $getid='object';
		    } else {
		       $getid=$string;
		    }
		   
		   $variable=self::colom_crud($tabel);
		   foreach ($variable as $key => $row) {
            $userData[]=array(
               'no'     =>'echo '.$row[$getid].';',                                      
              );
             
		   }
 if ($wh=='foreach') {
 	  if ($string=='array') {
 	  	$str='$result=$db->que($query)->fetch_assoc();';
 	  } else {
 	  	$str='$result=$db->que($query)->fetch_object()';
 	  }
   	$while=$str.';
foreach ($result as $row) {';
   } elseif ($wh == 'single'){
   	 if($string == 'array') {
   	    $while='$result=$db->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);';
   	 } elseif ($string == 'object'){
   	    $while='$result=$db->query($query);
$row = $result->fetch_object();';

   	 } elseif ($string == 'ooparray'){
   	    $while='$row=$db->que($query)->singleArray();';

   	 } elseif ($string == 'oopobject'){
   	    $while='$row=$db->que($query)->singleObject();';

   	 } elseif ($string == 'extract'){
   	    $while='$stmt =$db->->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);';
   	 } 
 
    } elseif ($wh == 'query'){
   	 if($string == 'array') {
   	    $while='$result=$db->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
return $row;';
   	 } elseif ($string == 'object'){
   	    $while='$result=$db->query($query);
$row = $result->fetch_object();
return $row;';
   	 } elseif ($string == 'ooparray'){
   	    $while='$row=$db->que($query)->singleArray();
return $row;';
   	 } elseif ($string == 'oopobject'){
   	    $while='$row=$db->que($query)->singleObject();
return $row;';
   	 } elseif ($string == 'extract'){
   	    $while='$stmt =$db->->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
return extract($row);';
   	 } 



 } else {
  if($string == 'array') {
   $while='$result=$db->query($query);
while($row=$result->fetch_assoc()){';
  } elseif ($string == 'object'){
   $while='$result=$db->query($query);
while($row=$result->fetch_object()){';
  } elseif ($string == 'extract'){
   $while='$stmt =$conn->prepare($query);
$stmt->execute();
while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
  extract($row);';
  } else {
   $while='';
  }
 
 }  

 if ($wh == 'single') {
echo '<pre><code class="language-js">'.tatiyeNet::AsciiTable()->crud($userData,'$query="SELECT * FROM '.$tabel.'";
'.$while.' ').'</code></pre>';

 } elseif ($wh == 'query'){
echo '<pre><code class="language-js">'.'$query="SELECT * FROM '.$tabel.'
'.$while. '</code></pre>';
} else {
echo '<pre><code class="language-js">'.tatiyeNet::AsciiTable()->crud($userData,'$query="SELECT * FROM '.$tabel.'";
'.$while.' ').'}</code></pre>';
   }
     
}
 /*
 |--------------------------------------------------------------------------
 | Initializes sum_crud 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public  function sum_crud($key){
  if("add" == "add") {?>
<p><b>
Query Builder</b></p>
<pre><code class="language-css">$row=$db->select('<?=$key;?>')->sum('SUM(row) as total');
echo $row['SUM'];</code></pre>
<p><b>Class Portion</b></p>
<pre><code class="language-css">$row=$db->select("<?=$key;?> WHERE id=1")->sum("SUM(raw) as total");
echo $row['total'];</code>
</pre>
<p><b>Class Tabel</b></p>
<pre><code class="language-css">echo tatiyeNet::sum('<?=$key;?>');</code></pre>
  <?php }
  
     
 }
 /* and class sum_crud */


	/*
	|--------------------------------------------------------------------------
	| Initializes json_crud 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public  function json_crud($tabel='',$string='array',$wh=''){
		   $variable=self::colom_crud($tabel);
		   foreach ($variable as $key => $row) {
            $userData[]=array(
               'no1'     =>$row['field'],                                      
               'no'     =>'=>'.$row[$string].',',                                      
              ); 
		   }

		   foreach ($variable as $key => $row) {
            $tabelData[]=array(                
               'no'     =>$row[$string].',',                                      
              ); 
		   }

 if ($wh=='foreach') {
  $while='foreach ($stmt as $row) {
 $product_item=array(';

 } else {
  if($string == 'array') {
   $while='while($row=$stmt->fetch_assoc()){
 $product_item=array(';
  } elseif ($string == 'object'){
   $while='while($row=stmt->fetch_object()){
 $product_item=array(';
  } elseif ($string == 'extract'){
   $while='while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
extract($row);
 $product_item=array(';
  } else {
   $while='';
  }

 } 
 
 if ($wh=='tables') {
echo '<pre><code class="language-js">'.tatiyeNet::AsciiTable()->crud($tabelData,$while).' );
}</code></pre>';
 } else {
echo '<pre><code class="language-js">'.tatiyeNet::AsciiTable()->crud($userData,$while).' );
}</code></pre>';
 }
 


	    
	}
	/* and class json_crud */

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
// $product_item=array(



//    echo $key->ip_address;
// }
 



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