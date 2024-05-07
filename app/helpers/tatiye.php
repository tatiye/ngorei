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
namespace app;
use PDO;
use ZipArchive;
use Exception;
use PDOException;
use mysqli;
use app\Graph\Database;
use app\Graph\Response;
use app\Graph\signin;
use app\Graph\signup;
use app\Graph\profil;
use app\Graph\entri;
use app\Graph\setSelect;
use app\Graph\rtdb AS Firebase;
use app\Database\tatiyeNetInit as db;
use app\Database\tatiyeNetFile;

use app\Database\tatiyeNetQueryForge;
use app\Database\tatiyeNetConn;
use app\tatiyeNetValidation;
use app\tatiyeNetProtokol;
use app\tatiyeAssets;
use app\tatiyeNetText as Text;
use app\Datetime\tatiyeNetDate;
use app\Datetime\tatiyeNetTime;
use app\Datetime\tatiyeNetDateTime;
use app\Images\tatiyeNetImagesResize;
use app\tatiyeNetWjt as Wjt;
use app\Raw\tatiyeNetTabelRaw ;
use app\Raw\tatiyeNetRawset;
use app\Raw\tatiyeNetRawHeader;  
use app\Raw\tatiyeNetAsciiTable as AsciiTable;
use app\models\Package;
use app\tatiyeNetCookie as cookie;
use app\tatiyeInvoke as newInvoke;

use app\config\database AS setdb;
use app\config\license;
use app\config\controllers AS control;
use app\tatiyeJson;
use app\Database\NetDb\tatiyeNetDb;
use app\tatiyeNetCore;
class tatiye {
  protected static $instance;  
  private $detection;
  private $driver;
    private $key;
    private $Instance;
    protected $db;
    public $conn;
    private $query;
    private $data = array();


    public function __construct($key='',$Instance='',$options='') {

           $this->key          =$key;
           $this->Instance     =$Instance;

    }

   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */

    public static function init($tabel='',$params='',$key='') {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
      self::$instance->tabel         =$tabel;
        return self::$instance;
    }
    /* and class Db */
 /*
 |--------------------------------------------------------------------------
 | Initializes setInvoke 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function setInvoke(){
    tatiyeNetProtokol::createInvoke();
    tatiyeNetProtokol::fwrite();
     
 }
 /* and class setInvoke */
 /*
 |--------------------------------------------------------------------------
 | Initializes In 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function invoke(){

        $db = new tatiye();
        $Text=tatiye::Text();
        $item=self::dBmysql();
        $driver  =$item['driver'];
        $port    =$item['port'];
        $host    =$item['host'];
        $user    =$item['username'];
        $pass    =$item['password'];
        $nmdb    =$item['database'];
        $conn = new mysqli($host, $user, $pass, $nmdb);
        $HTTP ="https://tatiye.net";
        $row=tatiye::userDev();
     

    if ($_POST['segment']=='update') {
       if ($_POST['stream']=='root') {
         $_POST['urlroot']=self::urlroot();
         $patroutes=count(explode('/',self::urlroot()));
         $patroutesId=count(explode('/',self::urlroot()))+1;
         $patroutHttp=explode($_SERVER['HTTP_HOST'].'/',self::urlroot());
            $Exp[]=array(
               'domain'                =>self::urlroot(),
               'Path'                =>$_SERVER['DOCUMENT_ROOT'],
               'Status'              =>'true',
               );
               echo  tatiye::tabelRawSell($Exp);
               tatiyeNetProtokol::fwrite();
           }

     } elseif ($_POST['segment'] == 'publish'){
         $_POST['urlroot']=$_POST['stream'];
         $patroutes=count(explode('/',$_POST['stream']));
         $patroutesId=count(explode('/',$_POST['stream']))+1;
         $patroutHttp=explode($_SERVER['HTTP_HOST'].'/',$_POST['stream']);
            $Exp[]=array(
               'Domain'              =>$_POST['stream'],
               'Path'                =>$_SERVER['DOCUMENT_ROOT'],
               'Status'              =>'true',
               );
               echo  tatiye::tabelRawSell($Exp);
               tatiyeNetProtokol::fwrite();
         



     } elseif ($_POST['segment'] == 'terminal'){
         $ID=explode(' ',$row['name']);
         tatiyeNetProtokol::createInvoke(strtolower($ID[0]));
         echo $name=strtolower($ID[0]);
         echo "Status \033[36m terminal root ./$name \033[0m";
         echo "\033[32m active \033[0m";

      
     } elseif ($_POST['segment'] == 'status'){

         // if ($_POST['stream']=='root') {
           if ($_POST['base']==URLROOT) {
                    $patroutes=count(explode('/',self::urlroot()));
                    $patroutesId=count(explode('/',self::urlroot()))+1;
                    $patroutHttp=explode($_SERVER['HTTP_HOST'].'/',self::urlroot());
                       $Exp[]=array(
                          'host'                =>self::urlroot(),
                          'path'                =>$_SERVER['DOCUMENT_ROOT'],
                          );
                          echo  tatiye::tabelRawSell($Exp); 
                  } else {
                    $patroutes=count(explode('/',URLROOT));
                    $patroutesId=count(explode('/',URLROOT))+1;
                    $patroutHttp=explode($_SERVER['HTTP_HOST'].'/',URLROOT);
                           $Exp2[]=array(
                          'host'                =>URLROOT,
                          'path'                =>$_SERVER['DOCUMENT_ROOT'],
                         );
                            echo  tatiye::tabelRawSell($Exp2);   
                  }
     } elseif ($_POST['segment'] == 'npm'){
              $file_contents = file_get_contents(self::urlroot('\public\node_modules\tatiye\init.js'));
              echo  $file_contents;
    
     } elseif ($_POST['segment'] == 'v'){
         echo tatiye::tabelRawSell(tatiye::platfrom(),0);
     } elseif ($_POST['segment'] == 'versi'){
         echo tatiye::tabelRawSell(tatiye::platfrom(),0);
     } elseif ($_POST['segment'] == 'db'){
          
          $db = [
            ['Variable'=>'driver'   ,'Value' =>$item['driver']],
            ['Variable'=>'port'     ,'Value' =>$item['port']],
            ['Variable'=>'host'     ,'Value' =>$item['host']],
            ['Variable'=>'username' ,'Value' =>$item['username']],
            ['Variable'=>'password' ,'Value' =>$item['password']],
            ['Variable'=>'database' ,'Value' =>$item['database']],
        ];
            $IDstream=explode(' ',$_POST['stream']);
         if (!empty($IDstream[0])) {
           $servername =$IDstream[0];
           $username = $IDstream[1];
           $password = $IDstream[2];
           $myDB = $IDstream[3];

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE $myDB";
if ($conn->query($sql) === TRUE) {
   $info= "Basis data $myDB berhasil dibuat";
} else {
        $ID=explode(';',$conn->error);
        $ID1=explode(' ',$ID[1]);
        if ($ID1[2]=='exists') {
           $info= "Basis data ".$myDB." sudah ada";
        } else {
           $info= "Kesalahan saat membuat basis data: ";
        }
   }
    $dbInfo= [
         ['Create Database'=>$myDB   ,'Informasi' =>$info],
     ];
         echo  tatiye::tabelRawSell($dbInfo);
         $conn->close();



        } else {
         echo  tatiye::tabelRawSell($db);
        }
     } elseif ($_POST['segment'] == 'dbcon'){
        $nmdbNM    =$_POST['stream'];
        try {
          $conn = new PDO("mysql:host=$host;dbname=$nmdbNM", $user, $pass);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $info="Koneksi ke basis data ".$nmdbNM." sesuai";
          $Status= "true";
        } catch(PDOException $e) {
          $info= "Basis data  " . $nmdbNM." tidak di temukan";
          $Status= "false";
        }

         $dbInfo= [
             ['Connection'=>$nmdbNM   ,'Informasi Db '.$nmdbNM =>$info,' Status '=>$Status],
         ];
         echo  tatiye::tabelRawSell($dbInfo);


     } elseif ($_POST['segment'] == 'cha'){
             $_POST['host']     =$host;
             $_POST['username'] =$user;
             $_POST['password'] =$pass;
             $_POST['database'] =$_POST['stream'];
            
 

        $nmdbNM=$_POST['stream'];
        try {
          $conn = new PDO("mysql:host=$host;dbname=$nmdbNM", $user, $pass);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $info="Koneksi ke basis data ".$nmdbNM." sesuai";
          $Status=true;
        } catch(PDOException $e) {
          $info= "Basis data  " . $nmdbNM." tidak di temukan";
          $Status=false;
        }
        if (!empty($Status)) {
            tatiyeNetProtokol::itemDB();
          $db = [
            ['Variable'=>'driver'   ,'Value' =>$item['driver']],
            ['Variable'=>'port'     ,'Value' =>$item['port']],
            ['Variable'=>'host'     ,'Value' =>$host],
            ['Variable'=>'username' ,'Value' =>$user],
            ['Variable'=>'password' ,'Value' =>$pass],
            ['Variable'=>'database' ,'Value' =>$nmdbNM],
          ];
           echo  tatiye::tabelRawSell($db);
        } else {
             $dbInfo= [
                 ['Connection'=>$nmdbNM   ,'Informasi Db '=>$info],
             ];
             echo  tatiye::tabelRawSell($dbInfo);
             echo "Sukses Configurasi Db ".$nmdbNM;
        }
        

     } elseif ($_POST['segment'] == 'con'){
             $IDstream=explode(' ',$_POST['stream']);
             $_POST['host']     = $IDstream[0];
             $_POST['username'] = $IDstream[1];
             $_POST['password'] = $IDstream[2];
             $_POST['database'] = $IDstream[3];
    
         $nmdbNM    =$IDstream[3];
        try {
          $conn = new PDO("mysql:host=$IDstream[0];dbname=$IDstream[3]", $IDstream[1], $IDstream[2]);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $info="Koneksi ke basis data ".$nmdbNM." sesuai";
          $Status=true;
        } catch(PDOException $e) {
          $info= "Basis data  " . $nmdbNM." tidak di temukan";
          $Status=false;
        }
        
         if (!empty($Status)) {
             tatiyeNetProtokol::itemDB();
             echo "Status \033[32mSukses Configurasi db ".$IDstream[3] ." app \033[0m";
          
           $db = [
             ['Variable'=>'driver'   ,'Value' =>$item['driver']],
             ['Variable'=>'port'     ,'Value' =>$item['port']],
             ['Variable'=>'host'     ,'Value' =>$IDstream[0]],
             ['Variable'=>'username' ,'Value' =>$IDstream[1]],
             ['Variable'=>'password' ,'Value' =>$IDstream[2]],
             ['Variable'=>'database' ,'Value' =>$IDstream[3]],
           ];
            echo  tatiye::tabelRawSell($db);
         } else {
              $dbInfo= [
                  ['Connection'=>$nmdbNM   ,'Informasi Db '=>$info],
              ];
              echo  tatiye::tabelRawSell($dbInfo);
              
         }
     } elseif ($_POST['segment'] == 'tabel'){
         self::ExpairToken($row);
        $tbNM=explode('/',$_POST['param']);
        $tbName=$tbNM[1];
        $createTb=$tbNM[2];
        $alter=$tbNM[2];
        $valFile=$tbNM[4];
        $val=$tbNM[4];
       if ($tbNM[1] =='list') {
           echo tatiye::tabelRawSell(tatiye::dbtabel()->show_tabelAll());
          exit;
        }
        if ($tbNM[1] =='create') {
              $sql = "CREATE TABLE $createTb (
                `id` int(11) NOT NULL,
                `userid` varchar(11) DEFAULT NULL,
                `title` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
                `description` varchar(100) DEFAULT NULL,
                `thumbnail` varchar(200) DEFAULT NULL,
                `bulan` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
                `tahun` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
                `date` varchar(11) DEFAULT NULL,
                `time` varchar(11) DEFAULT NULL,
                `pubDate` varchar(11) DEFAULT NULL,
                `row` enum('1') NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
              ";
              if ($conn->query($sql) === TRUE) {
                $info="Table $createTb created successfully";
              } else {
                $info="Error creating table: " . $conn->error;
              }
               $dbInfo= [
                   ['Create Tabel '=>$createTb   ,'Informasi Tabel '=>$info],
               ];
               echo  tatiye::tabelRawSell($dbInfo);
               echo tatiye::tabelRawSell(tatiye::dbtabel()->show_tabelAll());
                exit;

        }
        if ($tbNM[2]=='colom') {
            echo $tbName;
            echo tatiye::tabelRawSell(tatiye::dbtabel()->colom_tabel($tbName));
            exit;
        }


     

         if ($tbNM[2] =='row') {
            if (!empty($tbNM[4])) {
                $WH=$tbNM[3];
                $id=$tbNM[4];
                $rowTabel=tatiye::fetch($tbName,"*","$WH='".$id."' ORDER BY id DESC");
            } else {
               $rowTabel=tatiye::fetch($tbName,"*","row='1' ORDER BY id DESC");
            }
         
        
            $products_arr=array();
             $no=0;
            foreach ($rowTabel as $key => $value) {
             $no=$no+1;
                  $sub_array=array(
                    "No"=>$no,
                    "Field"=>$key,
                    "value"=>$value,
                  ); 
               array_push($products_arr, $sub_array);
            }
            if (!empty($rowTabel['id'])) {
                echo  tatiye::tabelRawSell($products_arr);
            } else {
               echo  'Null';
            }
            exit; 
         }
          if ($tbNM[2] =='key') {
             $sql =  "ALTER TABLE `$tbName` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);";
            if ($conn->query($sql) === TRUE) {
              $info="Tabel $tbName success Alter id";
            } else {
              $info="Error Drop table: " . $conn->error;
            }
             $dbInfo= [
                 ['DROP Db tabel'=>$nmdb   ,'Status'=>$info],
             ];
             echo  tatiye::tabelRawSell($dbInfo);
             exit;     
          }
          if ($tbNM[2] =='colom') {
            echo tatiye::tabelRawSell(tatiye::dbtabel()->colom_tabel($tbName));
            exit;    
          }
          if ($tbNM[2] =='delete') {
            $sql =  "DROP TABLE `$nmdb`.`$tbName`";
            if ($conn->query($sql) === TRUE) {
              $info="Tabel $tbName success delete";
            } else {
              $info="Error Drop table: " . $conn->error;
            }
             $dbInfo= [
                 ['DROP Db tabel'=>$nmdb   ,'Status'=>$info],
             ];
             echo  tatiye::tabelRawSell($dbInfo);
             exit;     
          }
          if ($tbNM[2] =='truncate') {
               $sql =  "TRUNCATE TABLE `$nmdb`.`$tbName`";
            if ($conn->query($sql) === TRUE) {
              $info="Tabel $tbName  successfully";
            } else {
              $info="Error Truncate table: " . $conn->error;
            }
             $dbInfo= [
                 ['Truncate Db tabel'=>$nmdb   ,'Status'=>$info],
             ];
             echo  tatiye::tabelRawSell($dbInfo);
             exit;
          }
          if (!empty($tbNM[3])) {
             if ($tbNM[3]=='VAR') {
                   $sql = "ALTER TABLE $tbName ADD $alter VARCHAR($val) NULL DEFAULT NULL AFTER `row`";
             } else if ($tbNM[3]=='INT') {
                 $sql = "ALTER TABLE $tbName ADD $alter INT($val) NULL DEFAULT NULL AFTER `row`";
             } else {
                 $sql = "ALTER TABLE $tbName ADD $alter $valFile NULL DEFAULT NULL AFTER AFTER `row`";
             }
       
            if ($conn->query($sql) === TRUE) {
              $info="ALTER $tbName created successfully";
            } else {
              $info="Error creating table: " . $conn->error;
            }
             $dbInfo= [
                 ['ALTER TABLE'=>$tbName   ,'ADD Colom'=>$alter],
                 ['ALTER TABLE'=>'Status'         ,'ADD Colom'=>$info],
                 ['ALTER TABLE'=>'Add'    ,'ADD Colom'=>$sql],
             ];
             echo  tatiye::tabelRawSell($dbInfo);
             exit;
          }
        if ($tbNM[2] =='insert') {
           $data = array(
             "title"       =>$row['name'],
             "description" =>'Develover Ngorei v'.self::version(),
             "thumbnail"   =>"images/icon.png",
             "time"   =>tatiye::tm(),                                                 
             "date"   =>tatiye::dt("EN"),                                             
             "bulan"  =>tatiye::dt("M"),                                              
             "tahun"  =>tatiye::dt("Y"),                                              
             "pubDate"  =>time(),                                              
             "userid" =>$row['userid'],                                                      
            );                                                                        
            $result=$db->que($data)->insert($tbNM[1]);  
            echo tatiye::tabelRawSell(tatiye::dbtabel()->show_tabelAll());
            exit;
      }


    

     } elseif ($_POST['segment'] == 'user'){
        $CODE=$Text->strreplace([$_POST['user'],'=','']);
        $LOGIN=$HTTP."/api/license/".$CODE;
        $GETTOKEN=self::grapApi($LOGIN, "GET");
        $seUid=self::getWJT($GETTOKEN['sso']);
        if ($GETTOKEN['status']=='active') {
               $_POST['vendor'] =$HTTP;
               $_POST['key']    =$CODE;
               $_POST['secret'] =$seUid['token'];
               $_POST['token']  =$GETTOKEN['sso'];
               tatiyeNetProtokol::cradensialUID();
              $dbInfo= [
                ['Item'=>'NAMA'    ,'Status'=>$seUid['name']],
                ['Item'=>'CREDENSIAL'      ,'Status'=>$CODE],
                ['Item'=>'EXPAIR'   ,'Status'=>$seUid['expair']]
            ];
            echo  tatiye::tabelRawSell($dbInfo);
        } else {
             echo 'Credensial not found';
        }

     } elseif ($_POST['segment'] == 'token'){   
             $dbInfo= [
                    ['Item'=>'NAMA'        ,'Status'=>$row['name']],
                    ['Item'=>'CREDENSIAL'  ,'Status'=>$row['license']],
                    ['Item'=>'EXPAIR'      ,'Status'=>$row['expair']]
            ];
        
            echo tatiye::tabelRawSell($dbInfo);

     } elseif ($_POST['segment'] == 'fetc'){
         self::ExpairToken($row);
        $PRAMID=explode('/',$_POST['param']);
         if ($PRAMID[1]=='list') {
            $variable=$db->netDb()->distribute('package/manifest');
             foreach ($variable as $key => $value) {

              $Exp[]=array(
                     "id"=>$key,
                     "package"=>$value['package'],
                     "key"=> $value['key'],
                     "tabel"=> $value['storage'],
                     "token"=> $value['token'],

              );
             }
              echo  tatiye::tabelRawSell($Exp);
            exit;
        }

       if ($PRAMID[1]=='select' || $PRAMID[1]=='datatables' ) {
           self::ExpairToken($row);
           $cek=tatiye::dbtabel()->show_tabelName($PRAMID[4]);
             if (!file_exists(tatiye::dir('public/package/'.$PRAMID[2]))) {
                echo "Status \033[36m package $PRAMID[2] tidak dikenali dalam basis  \033[0m";
               exit;
             }
          
           if (!empty($cek[0]["tabel"])) {
                  $curl = curl_init();
                  curl_setopt_array($curl, array(
                  CURLOPT_URL => self::LINK('api/v1/select/query'),
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS =>'        {
                            "query": "singel",
                            "tabel": "'.$PRAMID[4].'",
                            "select": "*",
                            "where": "row=\'1\'",
                            "jaoinTabel": "",
                            "jaoinSelet": "",
                            "onJoin": "",
                            "result": "",
                            "segment": "'.$PRAMID[1].'",
                            "package": "'.$PRAMID[2].'/'.$PRAMID[3].'",
                            "filename": "'.$PRAMID[5].'",
                            "type": "application/json"
                        }',
                  CURLOPT_HTTPHEADER => array(
                    'Authorization: '.$row['token'],
                    'Content-Type: application/json',
                  ),
                ));
           $response = curl_exec($curl);
           curl_close($curl);
              $setDir=$PRAMID[2].'/Api/'.$PRAMID[3].'/'.$PRAMID[5]; 
              $setJSON=$PRAMID[2].'/Api/'.$PRAMID[3].'/Doc/'.$PRAMID[5]; 
              $set=$db->netDb()->distribute('package/'.$setJSON);
             
            $newToken=tatiye::WJT([
             'dir'   =>$setDir.'.php', 
            ]);
            
             $dbInfo= [
                ['Package'=>'Credensial'    ,'Status'=>'Fetching'],
                ['Package'=>'Key'           ,'Status'=>$PRAMID[5]],
                ['Package'=>'Tabel'         ,'Status'=>$PRAMID[4]],
                ['Package'=>'Package'       ,'Status'=>$PRAMID[2]],
                ['Package'=>'Directory'     ,'Status'=>$setDir],
                ['Package'=>'Token'         ,'Status'=>$newToken],
            ];
            $env=array(
              "id" =>$PRAMID[2].'-'.$PRAMID[5],
              "develover" =>$row['name'],
              "key" =>$PRAMID[5],
              "package" =>$PRAMID[2],
              "storage" =>$PRAMID[4],
              "token" =>$newToken,
              "directory" =>$setDir,
            );
            echo tatiye::tabelRawSell($dbInfo);
            $db->netDb($env)->insertkey('fetching',"id|".$PRAMID[2].'-'.$PRAMID[5]);
           } else {
              echo "Status \033[36mTabel $PRAMID[4]  tidak ada dalam basis data \033[0m";
           }
           exit;
        }
       if ($PRAMID[1]=='token' ) {
                  $row1=tatiye::getWJT($PRAMID[2]);
                  $ID1=explode('.php',$row1['dir']);
                  $ID2=explode('/',$ID1[0]);
                  $ID3=explode($ID2[3],$ID1[0]);
 
                  $set=$db->netDb()->distribute('package/'.$ID3[0].'Doc/'.$ID2[3]);
                  if (!empty($set['messages'][0]['tabel'])) {
                         $dbInfo= [
                            ['Package'=>'Credensial'    ,'Status'=>'Fetching'],
                            ['Package'=>'Key'           ,'Status'=>$ID2[3]],
                            ['Package'=>'Tabel'         ,'Status'=>$set['messages'][0]['tabel']],
                            ['Package'=>'Package'       ,'Status'=>$ID2[0]],
                            ['Package'=>'Document'     ,'Status'=>$ID3[0].'Doc/'.$ID2[3].'.json'],
                            ['Package'=>'Directory'     ,'Status'=>$ID1[0].'.php'],
                            ['Package'=>'Token'         ,'Status'=>$PRAMID[2]],
                        ];
                        echo tatiye::tabelRawSell($dbInfo);
                  } else {
                     echo "Status \033[36m Token tidak ada dalam basis data \033[0m";
                  }
           exit;
        }  

     } elseif ($_POST['segment'] == 'package'){
             self::ExpairToken($row);
            $PRAMID=explode('/',$_POST['param']);
            $composerId=array(
                     "id"=>$PRAMID[2],
                     "title"=> $Text->ucwords($PRAMID[2]),
                     "package"=> $Text->ucwords($PRAMID[2]),
                     "icon"=>  "package",
                     "status"=> 1,
                     "android"=> 0,
                     "version"=> "0.0.1",
                     "api_version"=> "0.1",
                     "date"=>tatiye::dt('DTEN'),
                     "deskripsi"=>"Package ".$Text->ucwords($PRAMID[2]).' dibuat oleh '.$row['name'],
                );
            if ($PRAMID[1]=='create') {
                if (!empty($PRAMID[2])) {
                    $key=array(
                    "primarykey"=>"create",
                    "code"=>1,
                    "Development"=>$row['name'],
                    "date"=>tatiye::dt('DTIE'),
                    "storage"=>[
                        "create",
                        "package-1.0.1",
                         $PRAMID[2]
                    ],
                    );
                 $AppJSON='package/'.$PRAMID[2].'/composer';
                
                 $set=$db->netDb()->distribute($AppJSON);
                 if (!empty($set['date'])) {
                     echo "Status \033[31mAlready available \033[0m";
                     $setDate=$set['date'];
                 } else {
                    echo "Status \033[36mSuccess Create \033[0m";
                    $setDate=tatiye::dt('DTIE');
                 }
                 
                 $dbInfo= [
                    ['Package'=>'Development'     ,'Info'=>$row['name']],
                    ['Package'=>'Package'         ,'Info'=>$PRAMID[2]],
                    ['Package'=>'Version'         ,'Info'=>'1.0.1'],
                    ['Package'=>'Directory'       ,'Info'=>'public/package/'.$PRAMID[2]],
                    ['Package'=>'Request Time'    ,'Info'=>$setDate],
                ];
                tatiye::createProject($key,'sell');
                echo tatiye::tabelRawSell($dbInfo);
                self::fwriteJSON($AppJSON,$composerId);
                $db->netDb($composerId)->insertkey('path',"id|".$PRAMID[2]);
                } else {
                 echo "Status \033[36mTentukan nama package project\033[0m";
                }
              exit;
             } 
             if ($PRAMID[1]=='delete'){
                 $AppJSON='public/package/'.$PRAMID[2];
                 echo "Status \033[32mSuccess delete package $PRAMID[2] \033[0m";
                 self::delTree($AppJSON);
                $db->netDb($composerId)->delete('path',"id=".$PRAMID[2]);
              exit;
             }
             if ($PRAMID[1]=='list'){
             $variable=$db->netDb()->distribute('package/composer');
             foreach ($variable as $key => $value) {
              $Exp[]=array(
                     "id"=>$key,
                     "title"=> $value['title'],
                     "package"=> $value['id'],
                     "icon"=>  $value['icon'],
                     "status"=> $value['status'],
                     "android"=> $value['android'],
                     "api"=> $value['package'],
                     "date"=>$value['date'],

              );
             }
              echo  tatiye::tabelRawSell($Exp);
                 exit;
             }
           return newInvoke::init($row)->package();


     } else {
        $tbNM=explode('/',$_POST['param']);
        if ($tbNM[2] =='field') {
             self::ExpairToken($row);
              echo $sql ="ALTER TABLE `$tbNM[0]` DROP `$tbNM[1]`;";
               if ($conn->query($sql) === TRUE) {
                 $info="Tabel $tbNM[0] success DROP ".$tbNM[1];
               } else {
                 $info="Error Drop table: " . $conn->error;
               }
                $dbInfo= [
                    ['DROP Db tabel'=>$tbNM[0]   ,'Status'=>$info],
                ];
                echo  tatiye::tabelRawSell($dbInfo);
                echo tatiye::tabelRawSell(tatiye::dbtabel()->colom_tabel($tbNM[0]));
            exit; 
         }
        // echo 'Endpoint not found';
     }

     $segment=$_POST['segment']?$_POST['segment']:'help';
     $newstream=explode('/',$_POST['param']);
     return newInvoke::init($row)->$segment($newstream);
  
 }
 /* and class In */
 /*
 |--------------------------------------------------------------------------
 | Initializes ExpairToken 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function ExpairToken($row){
    $protected=$row['expair']?$row['expair']:'2024-04-5 17:29:42';
   //if(strtotime('2024-04-5 17:29:42') < time()) {
   if(strtotime($protected) < time()) {
       if (!empty($row['expair'])) {
         $dbInfo= [
            ['Item'=>'NAMA'        ,'Status'=>$row['name']],
            ['Item'=>'CREDENSIAL'  ,'Status'=>$row['license']],
            ['Item'=>'EXPAIR'      ,'Status'=>$row['expair']],
            ['Item'=>'STATUS'      ,'Status'=>'EXPAIR']
        ];
        echo  tatiye::tabelRawSell($dbInfo);
        exit;
      } 
   }
     
 }
 /* and class ExpairToken */
 /*
 |--------------------------------------------------------------------------
 | Initializes writeJson 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function fwriteJSON($dir,$key){
     $AppJSON=self::DIR("public/".$dir.'.json');
    $fileNavigasi = fopen($AppJSON, "w");
     fwrite($fileNavigasi, json_encode($key));
     
 }
 /* and class writeJson */


   /*
   |--------------------------------------------------------------------------
   | Initializes result 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  Sab 02 Apr 2022 03:07:14  WITA
   */
   public  function resultquery($query){
        $this->query= $query;
        return self::$instance;
   }
   /*
    |--------------------------------------------------------------------------
    | Initializes query 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 24 Mar 2022 11:18:48  WITA 
    */
    public  function file($result){
        $db=new tatiye();
        return $db->init()->resultquery($result);
    }
    /* and class query */
    /*
    |--------------------------------------------------------------------------
    | Initializes file insert
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */

    public  function drive($tabel,$failid){
          $db=new tatiye();
          $Text=tatiye::Text();
          $Exp=array();
  
          $id=self::auto_increment($tabel);
          $file          =basename($_FILES[$failid]["name"]); 
          $Type          =pathinfo($file, PATHINFO_EXTENSION);
          $fileName      =$Text->strreplace([$file,' ','_']); 
          $target_dir    =tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id.'/';
          $dir_file      =tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id.'/'.$fileName;
          $target_file   =$target_dir . $fileName;
           
          $Exp2=array(
              'id'=>self::auto_increment($tabel),
           );


        if (!file_exists($target_dir)) {
           @mkdir(tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y"), 0777);
           @mkdir(tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y").'/'.tatiye::dt("M"), 0777);
           @mkdir(tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id, 0777);
        }

        foreach ($this->query as $key => $value) {
            if ($key==$failid) {
               $Exp[$key]=$value.'/'.$dir_file;
             } else {
               $Exp[$key]=$value;
             }
         }

        @$result33=$db->que(array_merge($Exp2,$Exp))->insert($tabel);


        if (move_uploaded_file($_FILES[$failid]["tmp_name"], $target_file)) {
              if ($tabel=='appuserprofil') {
                  $useCategori='profil';
              } else {
                  $useCategori=$this->query[$failid];
              }
              

              $fetchKeys=tatiye::fetchKeys($tabel);   
              $name=$fetchKeys[0];
              $appFile=array(
                 'userid'   =>tatiye::ssoId('userid'),
                 'keyid'    =>$id,
                 'nama'     =>$fetchKeys[0],
                 'nmtabel'  =>$tabel,
                 'filename' =>$this->query[$failid].'/'.$dir_file,
                 'nmfile'   =>$fileName,
                 "time"     =>tatiye::tm(),                                               
                 "categori" =>$useCategori,                                               
                 "size"     =>$Text->sizeUnits($_FILES[$failid]["size"]),
                 "fileType" =>$Type,                                               
                 "date"     =>tatiye::dt("EN"),                                           
                 "bulan"    =>tatiye::dt("M"),                                            
                 "tahun"    =>tatiye::dt("Y"), 
             );
            $result=$db->que($appFile)->insert2('appfile');
             
        }
     return $str; 
    }
    /* and class title */






    public  function insert($tabel,$failid){
          $db=new tatiye();
          $Text=tatiye::Text();
          $Exp=array();
  
          $id=self::auto_increment($tabel);
          $file          =basename($_FILES[$failid]["name"]); 
          $Type          =pathinfo($file, PATHINFO_EXTENSION);
          $fileName      =$Text->strreplace([$file,' ','_']); 
          $target_dir    =tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id.'/';
          $dir_file      =tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id.'/'.$fileName;
          $target_file   =$target_dir . $fileName;
           
          $Exp2=array(
              'id'=>self::auto_increment($tabel),
           );


        if (!file_exists($target_dir)) {
           @mkdir(tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y"), 0777);
           @mkdir(tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y").'/'.tatiye::dt("M"), 0777);
           @mkdir(tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id, 0777);
        }

       foreach ($this->query as $key => $value) {
           if ($key==$failid) {
              $Exp[$key]=$value.'/'.$dir_file;
            } else {
              $Exp[$key]=$value;
            }
        }
 
        if (move_uploaded_file($_FILES[$failid]["tmp_name"], $target_file)) {
            @$result33=$db->que(array_merge($Exp2,$Exp))->insert($tabel); 
           //$titleNM=array_keys($Exp);
              $fetchKeys=tatiye::fetchKeys($tabel);   
              $name=$fetchKeys[0];
            if ($tabel=='appuserprofil') {
                  $useCategori='profil';
              } else {
                  $useCategori=$this->query[$failid];
              }

              $appFile=array(
                 'userid'   =>tatiye::ssoId('userid'),
                 'keyid'    =>$id,
                 'nama'     =>$fetchKeys[0],
                 'nmtabel'  =>$tabel,
                 'filename' =>$this->query[$failid].'/'.$dir_file,
                 'nmfile'   =>$fileName,
                 "time"     =>tatiye::tm(),                                               
                 "categori" =>$useCategori,                                               
                 "size"     =>$Text->sizeUnits($_FILES[$failid]["size"]),
                 "fileType" =>$Type,                                               
                 "date"     =>tatiye::dt("EN"),                                           
                 "bulan"    =>tatiye::dt("M"),                                            
                 "tahun"    =>tatiye::dt("Y"), 
             );
             $result=$db->que($appFile)->insert('appfile');
             // @$result33=$db->que($Exp)->insert($tabel); 
        }
     
    }
    /* and class title */

    /*
    |--------------------------------------------------------------------------
    | Initializes update 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function update($tabel,$wh,$failid,$id){
          $db=new tatiye();
          $Text=tatiye::Text();
          $file=basename($_FILES[$failid]["name"]); 
           $setUpdate=array();
           $Exp=array();
          if (!empty($file)) {
          $Type          =pathinfo($file, PATHINFO_EXTENSION);
          $fileName      =$Text->strreplace([$file,' ','_']); 
          $target_dir    =tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id.'/';
          $target_dir1    =tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id;


         if (!file_exists($target_dir1)) {
           @mkdir(tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y"), 0777);
           @mkdir(tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y").'/'.tatiye::dt("M"), 0777);
           @mkdir(tatiye::dir()."/public/".$this->query[$failid]."/".tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id, 0777);
        }
          $dir_file      =tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id.'/'.$fileName;
          $target_file   =$target_dir . $fileName;
               foreach ($this->query as $key => $value) {
                   if ($key==$failid) {
                      $Exp[$key]=$value.'/'.$dir_file;
                    } else {
                      $Exp[$key]=$value;
                    }
                }
 
        if (move_uploaded_file($_FILES[$failid]["tmp_name"], $target_file)) {
                   $restu1=$db->que($Exp)->update($tabel,$wh);
                   $fetchKeys=tatiye::fetchKeys($tabel);   
             if ($tabel=='appuserprofil') {
                  $useCategori='profil';
              } else {
                  $useCategori=$this->query[$failid];
              }


                   $appFile=array(
                         'userid'   =>tatiye::ssoId('userid'),
                         'keyid'    =>$id,
                         'nama'     =>$fetchKeys[0],
                         'nmtabel'  =>$tabel,
                         'filename' =>$this->query[$failid].'/'.$dir_file,
                         'nmfile'   =>$fileName,
                         "time"     =>tatiye::tm(),                                               
                         "categori" =>$useCategori,                                               
                         "size"     =>$Text->sizeUnits($_FILES[$failid]["size"]),
                         "fileType" =>$Type,                                               
                         "date"     =>tatiye::dt("EN"),                                           
                         "bulan"    =>tatiye::dt("M"),                                            
                         "tahun"    =>tatiye::dt("Y"), 
                     );
                     $result=$db->que($appFile)->insert('appfile');
                }
          } else {
            // NO Update FILE IMAGES
           
           foreach ($this->query as $key1 => $value) {

                   if ($key1==$failid) {
                    // $Exp[$key]=$value.'/'.$dir_file;
                    } else {
                      $setUpdate[$key1]=$value;
                    }

                
           }

           $restu2=$db->que($setUpdate)->update($tabel,$wh);  
         
          }
          
        
    }
    /* and class update */
    /*
    |--------------------------------------------------------------------------
    | Initializes resacelBin 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function recyclingBins($tabel,$setId,$package,$userid){
      $db=new tatiye();
      $row= tatiye::fetch($tabel,'*',"id='".$setId."'");
      $fetchKeys=tatiye::fetchKeys($tabel);
      $Exp=array(
             'arsip'    =>json_encode($row),
             'userid'   =>$userid,
             'nama'     =>$row[$fetchKeys[0]],
             'keyid'    =>$setId,
             'package'  =>$package,
             'nmtabel'  =>$tabel,
             "time"     =>tatiye::tm(),                                               
             "date"     =>tatiye::dt("EN"),                                           
             "bulan"    =>tatiye::dt("M"),                                            
             "tahun"    =>tatiye::dt("Y"), 
             );
     $result=$db->que($Exp)->insert('appsampah');
     $db->delete($tabel,"id='".$setId."' AND userid='".$userid."'");
    }
   /*
    |--------------------------------------------------------------------------
    | Initializes Trial Status 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function appStatus(){
        $block=tatiye::trial('status');
        if ($block=='expair') {
          return false; // JIKA BERKISENSI true
        } else {
          return false;
        }
        
        
    }
    /* and class trialStatus */

    /*
    |--------------------------------------------------------------------------
    | Initializes version 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function version(){
          return "1.0.4";
        
    }
    /* and class version */
   public  function index(){
      $response = new Response();
      $response->setHttpStatusCode(404);
      $response->setSuccess(false);
      $response->addMessage("Endpoint not found");
      $response->send();
      exit;
   }

public static function urlroot($in=''){
      $Text=tatiye::Text();
      $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
      $HTTP_HOST = $protocol."://". $_SERVER['HTTP_HOST'].str_replace("index.php", "", $_SERVER['PHP_SELF']);
      $substr=substr($HTTP_HOST, 0, -1);
      self::cookieRead('urlroot',$Text->strreplace([$substr,'/public','']));
      return $Text->strreplace([$substr,'/public','']).$in;
     
}
/*
|--------------------------------------------------------------------------
| Initializes canononical ------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function httpOrigin(){

             $data[]=array(
               'Platform' => 'Tatiye',
               'Framework'=> 'Ngorei',
               'Protokol' => self::Protokol(),
               'Version' =>self::version(),
         );

    
} 
 /*
 |--------------------------------------------------------------------------
 | Initializes pageControler 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function setControllers($page,$segment=1){
    if (self::tn($segment)) {
        $route=$page.'/'.self::tn($segment);
      } else {
         $route=$page.'/index';
      }
       return $route;
 }
 /* and class pageControler */
 /*
 |--------------------------------------------------------------------------
 | Initializes canononical 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function canononical($key=''){

      if (!empty(self::CekDB('mySQL'))) {
          $Dev="ready";
          $install=0;
      } else {
          $Dev="install";
           $install=true;
      }
      $patroutes=count(explode('/',URLROOT));
      $patroutesId=count(explode('/',URLROOT))+1;
      $patroutHttp=explode($_SERVER['HTTP_HOST'].'/',URLROOT);
      if (!empty($patroutHttp[1])) {
          $RewriteBase='/'.$patroutHttp[1].'/public/';
          $path=$patroutHttp[1];
          $config='install';
         
      } else {
          $RewriteBase='/public/';
          $path='/';
          $config=false;
          
      }
           $Exp[]=array(
              'http'                =>self::urlroot(),
              'patroutes'           =>$patroutes,
              'patroutesId'         =>$patroutesId,
              'rewriteBase'         =>$RewriteBase,
              'path'                =>$path,
              'status'              =>$Dev,
              'install'             =>$install,
              'jsx'                 =>self::LINK('node_modules/tatiye/Assets/install.js'),
              );
           if (!empty($key)) {
                return $Exp[0];
           } else {
                 return $Exp;
               // code...
           }

 }
 /* and class canononical */
 /*
 |--------------------------------------------------------------------------
 | Initializes pubRoot 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function publicRoot(){
      if (self::urlroot()==URLROOT) {
        return 0;
      } else {
        return 1;
      }
     
     
 }
 /* and class pubRoot */


 /*
 |--------------------------------------------------------------------------
 | Initializes setConfig 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function setConfig($key='',$data=''){
          if (self::urlroot()==URLROOT) {
              redirect('home');
              exit;
          }
       // if ($data=='update') {
       //      tatiyeNetProtokol::fwrite();

       //  } elseif ($data == 'status'){
       //      echo "string";
       //  } else {
       
       //  }
      if (!empty(self::CekDB('mySQL'))) {
          $Dev="ready";
          $install=0;
      } else {
          $Dev="install";
           $install=true;
      }

      if (!empty($key)) {
        $patroutes=count(explode('/',URLROOT));
        $patroutesId=count(explode('/',URLROOT))+1;
        $patroutHttp=explode($_SERVER['HTTP_HOST'].'/',URLROOT);
      } else {
        $patroutes=count(explode('/',self::urlroot()));
        $patroutesId=count(explode('/',self::urlroot()))+1;
        $patroutHttp=explode($_SERVER['HTTP_HOST'].'/',self::urlroot());
      }
      
      if (!empty($patroutHttp[1])) {
          $RewriteBase='/'.$patroutHttp[1].'/public/';
          $path=$patroutHttp[1];
          $config='install';
      } else {
          $RewriteBase='/public/';
          $path='/';
          $config=false; 
      }
           $Exp[]=array(
              'Root'                =>self::urlroot(),
              'patroutes'           =>$patroutes,
              'patroutesId'         =>$patroutesId,
              'path'                =>$path,
              'status'              =>'false',
              );
           if (!empty($key)) {
               $Exp2[]=array(
              'Root'                =>URLROOT,
              'patroutes'           =>$patroutes,
              'patroutesId'         =>$patroutesId,
              'path'                =>$path,
              'status'              =>'true',
             );
                return $Exp2;
           } else {
                 return $Exp;
               // code...
           }

     
 }
 /* and class setConfig */
 /*
 |--------------------------------------------------------------------------
 | Initializes etc 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function etc(){
        if($_SERVER["REQUEST_METHOD"] === "GET") {
            self::headerContent('GET');
            http_response_code(200);
            echo json_encode(self::canononical());
         } else {
             return  tatiye::index();
        }

   // echo self::canononical(true);
    
     
 }
 /* and class etc */
/* and class canononical     


    /*
    |--------------------------------------------------------------------------
    | Initializes versi 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function versi(){
          return 'v'.self::version();
        
    }
    /* and class versi */
    /*
    |--------------------------------------------------------------------------
    | Initializes platfrom 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function platfrom(){
          $data[]=array(
                'Platform' => 'Tatiye',
                'Framework'=> 'Ngorei',
                'Version' =>self::version(),
          );
         return $data;
        
    }
    /* and class platfrom */
    /*
    |--------------------------------------------------------------------------
    | Initializes rowFalse 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function rowFalse($name,$key,$rowkey=''){
        $nets=tatiye::development($key);
        if (!empty($nets[0][$name])) {
           $status='true';
           $row=1;
        } else {
           $status='false';
           $row='0';
        }
        
          $data[]=array(
                'Package' =>  $key,
                'Status' =>$status,
                'Row'    =>$row,
                'Access' =>tatiye::dt('DTIE'),
          );
          if (!empty($rowkey)) {
             return $data[0];
          } else {
             return $data;
              // code...
          }
          
        
    }
    /* and class rowFalse */
    /*
    |--------------------------------------------------------------------------
    | Initializes licenced 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function licenced(){
        $info=tatiye::info();
        $Lisensi = [
            [
                'Lisensi'         =>'App Name',
                'description'  =>$info['app']['sitename'],
            ],
            [
                'Lisensi'         =>'Platform',
                'description'  =>'Tatiye',
            ],
            [
                'Lisensi'         =>'Framework',
                'description'  =>'Ngorei',
            ],
            [
                'Lisensi'         =>'version',
                'description'  =>self::version(),
            ],
            [
                'Lisensi'         =>'Licenced',
                'description'  =>tatiye::trial('name'),
            ],
            [
                'Lisensi'         =>'Code Lisensi',
                'description'  =>tatiye::trial('license'),
            ],
            [
                'Lisensi'         =>'Status',
                'description'  =>tatiye::trial('status'),
            ],
            [
                'Lisensi'         =>'Date expair ',
                'description'  =>tatiye::trial('expair'),
            ]
        ];
        return $Lisensi;
        
    }
    /* and class licenced */
    /*
    |--------------------------------------------------------------------------
    | Initializes phpv 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function phpv(){
          return phpversion();
        
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes copyPro 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function createPage($key,$sell=''){ 
     $db = new tatiye();
     $Text=tatiye::Text();
     $storage=$key['storage'];
     $id=$key;
     $newPage=$id['root'];
     $toFile='public/theme/'.$id['root'];
     $toFileexists='public/theme/'.$id['root'].'/index.html';
     $toJSON='theme/'.$id['root'].'/package';

     $src =self::dir('vendor/tatiye/terminal/page');  // source folder or file
     $dest =self::dir($toFile);  // source folder or file
     $destcontrollers =self::dir("app/controllers/$newPage.php");  // source folder or file
     if ($sell=='create') {
         if (file_exists(tatiye::dir($toFileexists))) {
           $deskripsi='Page '.$id['root'].' sudah ada';
          } else {
           $deskripsi='Sukses membuat page '.$id['root'];
           tatiye::copy_file('vendor/tatiye/terminal/page',$toFile);
           @copy($src."/assets.jsx",$dest."/assets.jsx");
           @copy($src."/default.html",$dest."/default.html");
           @copy($src."/index.html",$dest."/index.html");
           $_POST['name'] =$Text->ucwords($id[2]);
           $_POST['router']  =$id['root'].'/index';
           tatiyeNetProtokol::itemPage($Text->ucwords($id['root']));
            $db->netDb($storage)->insertkey('theme',"id|".$id['root']);

          }
     } else {
        if ($id['root'] !=='pages' && 
            $id['root'] !=='blog' && 
            $id['root'] !=='docs' && 
            $id['root'] !=='mobile' && 
            $id['root'] !=='elements' && 
            $id['root'] !=='inc' ) {
               $deskripsi='Controllers page '.$id['root'].' telah di hapus';
                self::delTree($toFile);
                unlink($destcontrollers);
                $db->netDb($storage)->delete('theme',"id=".$id['root']);
        } else {
           $deskripsi='Controllers page '.$id['root'].' tidak dapat di hapus';
        }       
     }

       $info[]=array(
             "Controllers Page" =>   $id['root'],
             'Informasi' =>$deskripsi,
       );
        echo tatiye::tabelRawSell($info); 
       
    }
    public static function createProject($key,$sell=''){ 
     $db = new tatiye();
     $Text=tatiye::Text();
     $id=$key['storage'];
     $toFile='public/package/'.$id[2];
     $toJSON='package/'.$id[2].'/composer';
     $pec=explode('-',$id[1]);
     $package=$pec[0];
     $nets=tatiye::rowFalse('package',$id[2],true);

            $composerId=array(
                     "id"=>$id[2],
                     "title"=> $Text->ucwords($id[2]),
                     "package"=> $Text->ucwords($id[2]),
                     "icon"=>  "package",
                     "status"=> 1,
                     "android"=> 0,
                     "version"=> "0.0.1",
                     "api_version"=> "0.1",
                     "date"=>tatiye::dt('DTEN'),
                     "deskripsi"=>"Package ".$Text->ucwords($id[2]).' dibuat  '.tatiye::dt('DTEN'),
                );



     if (file_exists(tatiye::dir($toFile))) {
        $set=$db->netDb()->distribute($toJSON);
        $deskripsi="Project $id[2] sudah ada";
         if (!empty($set['date'])) {
         } else {
               self::fwriteJSON($toJSON,$key);
         }
     
     } else {
       $deskripsi='Sukses membuat project '.$id[2];
       return tatiye::copy_file('vendor/tatiye/terminal/project',$toFile);

     }

          $info[]=array(
                "Create Project" =>   $id[2],
                'Informasi' =>$deskripsi,
          );
          if (!empty($sell)) {
           echo tatiye::tabelRawSell($info); 
          } else {
           $AppJSON='package/'.$id[2].'/composer';
           $db->netDb($composerId)->insertkey('path',"id|".$id[2]);
           echo tatiye::tabelRaw($info,0); 


          }
          
    }
    /* and class copyPro */
    /*
    |--------------------------------------------------------------------------
    | Initializes appInstalasi 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */ 
    public static function installation($key){
        $Text=tatiye::Text();
        $id=$key['storage'];
        $pec=explode('-',$id[1]);
        // https://github.com/tatiye/package/archive/refs/tags/1.0.1.zip
        $package=$pec[0];
        $version=$pec[1];
        $primarykey=$key['primarykey'];
        $title=$key['primarykey'].' '.$package;
        $nets=tatiye::rowFalse('package',$id[2],true);
        echo tatiye::tabelRaw(tatiye::rowFalse('package',$id[2]),0);
   


        if ($package=='package') {
             $newFile='src/'.$id[1].'/'.$id[2];
             $toFile='public/package/'.$id[2];
             $status=$nets['Row'];
             // UPDATE INSERT DELETE
             if ($primarykey=='instal') {
                $status=$nets['Row'];
             } elseif ($primarykey=='delete') {
                  tatiye::delTree($toFile);
                $status=0;
             } elseif ($primarykey=='update') {
                $status=$nets['Row'];
             }
             
         } elseif ($package == 'app'){
             $status=1;
             $newFile='src/'.$id[1].'/'.$id[2];
             $toFile='app/'.$id[2];

         } elseif ($package == 'theme'){
         } elseif ($package == 'dashboard'){
         } elseif ($package == 'mobile'){
         } elseif ($package == 'app'){
             $status=false;
         }

          if (!empty($status)) {
             $iNext='Sukses';
              $rewtTitle=$title;
          } else {
            if ($primarykey=='delete') {
               $iNext='Sukses';
               $rewtTitle=$title;
            } else {
               $iNext='Tidak terdefinisi';
               $rewtTitle=$title;
            }
            
          } 
          $info[]=array(
                "$primarykey" =>   $id[2],
                'Informasi' =>$iNext.' '.$title.' '.$id[2],
                "Date $primarykey"     =>tatiye::dt('DTIE'),
          );
          echo tatiye::tabelRaw($info,0);

         if (!empty($status)) {   
            $pathpackage      =tatiye::dir("src/".$id[1]); 
            $zip_url          = "https://github.com/tatiye/$package/archive/refs/tags/$version.zip";
            $destination_path =$pathpackage.".zip";
            file_put_contents($destination_path, fopen($zip_url, 'r'));
            $zip = new ZipArchive;
            $res = $zip->open($destination_path);
            if ($res === TRUE) {
                $zip->extractTo(tatiye::dir('src'));
                $zip->close();
                    unlink($destination_path);
                   tatiye::copy_file($newFile,$toFile);
                   tatiye::delTree('src/'.$id[1].'/');
                  $zip ->close();
             } else {
                 echo "Tidak dapat mengistal Package";
             }
              
         } else {

         }
         
    }
    /* and class appInstalasi */
    /* and class phpv */
    public static function copy_file($folder,$dir,$package2='package-main'){
      $Todir=@end(explode('src/',$folder));
      $package=@end(explode('src/',$folder));
      $Topath=tatiye::dir($dir);
      $path=tatiye::dir($folder);
      if (file_exists($path)) {
      $files = glob($path.'/*'); // get all file names present in folder
      foreach($files as $file){ // iterate files
        $newfiles = glob($file.'/*');
             foreach($newfiles as $nfile){ 
                  $variablefiles = glob($nfile.'/*');
                  foreach ($variablefiles as $key) {
                    $variablekey = glob($key.'/*');
                    foreach ($variablekey as $value) {
                        $extvalue = filetype($value);
                        if ($extvalue=='file') {
                            @copy($value, $Topath.end(explode($package,$value)));
                          
                        } else {
                            if (!file_exists($Topath.end(explode($package,$value)))) {
                               @mkdir($Topath.end(explode($package,$value)), 0777, true);
                             }
                        }
                    }


                     $extkey = filetype($key);
                     if ($extkey=='file') {

                       @copy($key, $Topath.end(explode($package,$key)));
                         // echo $key.'<br>';
                
                     } else {
                            if (!file_exists($Topath.end(explode($package,$key)))) {
                               @mkdir($Topath.end(explode($package,$key)), 0777, true);
                             }
                     }
                   // ==========================================//
                  }
                 
                  $ext = filetype($nfile);
                  if ($ext =='file') {

                    @copy($nfile, $Topath.end(explode($Todir,$nfile)));
                  } else {
                     if (!file_exists($Topath.end(explode($Todir,$nfile)))) {
                       @mkdir($Topath.end(explode($Todir,$nfile)), 0777, true);
                      }
                  }
               }

                  $newFile = filetype($file);
                 if ($newFile =='file') {
                     $orFile=end(explode('/',$file));
                     $addFile=$Topath.'/'.$orFile;
                     @copy($file, $addFile);
                 } else {
                     $orFolder=end(explode('/',$file));
                     $addFile=$Topath.'/'.$orFolder; 
                      if (!file_exists($addFile)) {
                        @mkdir($addFile, 0777, true);
                      }

                 }
        }

        if (!file_exists($Topath)) {
          @mkdir($Topath, 0777, true);
        }
    }
}
    /* and class copy_file */

   public static function delTree($folder) {
      $path=tatiye::dir($folder);
      chmod($path, 0777);
      $files = glob($path.'/*'); // get all file names present in folder
      foreach($files as $file){ // iterate files
        $newfiles = glob($file.'/*');
             foreach($newfiles as $nfile){ 
                  $variablefiles = glob($nfile.'/*');
                  foreach ($variablefiles as $key) {
                    $variablekey = glob($key.'/*');
                    foreach ($variablekey as $value) {
                        $variablevalue = glob($value.'/*');
                         foreach ($variablevalue as $value2) {
                            unlink($value2);
                            rmdir($value2);
                         }
                        unlink($value);
                        rmdir($value);
                        // code...
                    }
                    unlink($key);
                    rmdir($key);
                      // code...
                  }
                  unlink($nfile); // delete the file
                  rmdir($nfile);
               }
               unlink($file);
               rmdir($file);
        }
      rmdir($path);

     } 



    /*
    |--------------------------------------------------------------------------
    | Initializes component 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function component($key=''){
               $Exp[]=array(
                  'theme'    =>'ON',
                  'dashboard'=>'ON',
                  'mobile'   =>'OFF',
                  'Android'  =>'OFF',
                  'IOS'      =>'OFF'
                  );
               if (!empty($key)) {
                  return $Exp[0];
               } else {
                   return $Exp;
               }
               
        
    }
    /* and class component */
    /*
    |--------------------------------------------------------------------------
    | Initializes shell 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function shell($key){
        $id=$key['storage'];
        $system=$id[1].' '.$id[2]??=''.' '.$id[3]??='';
        $code =shell_exec($system);

      $Header = [
      [
          'title' =>'====================================================================================================',
      ],
      [
          'title'  =>$system,
      ],
      [
          'title' =>'====================================================================================================',
      ]
  ];
          $body[]=array(
               "return >  "=>$code
          );
    $footer = [
      [
         'title' =>'====================================================================================================',
      ]
  ];
echo "<pre>".tatiye::tabelRawset($body,$Header,$footer)."</pre";   
        
    }
    /* and class shell */
    /*
    |--------------------------------------------------------------------------
    | Initializes jsonCode 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function jsonCode($development){
        $rowJson = json_encode($development);
        $delimiter = "\n";
        $indent = 1;
        $indentTab = "\t";
        $viewer = new tatiyeJson($rowJson, $delimiter, $indent, $indentTab);
        echo $viewer->visualize();
        
    }
    /* and class jsonCode */
    /*
    |--------------------------------------------------------------------------
    | Initializes developmentApi 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function developmentApi(){
        self::headerContent("GET");
        return self::jsonCode(tatiye::publicPackage());
  
        
    }
    /* and class developmentApi */

  
    /*
    |--------------------------------------------------------------------------
    | Initializes terminal 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function terminal(){
         self::headerContent('GET');
          $setApp = file_get_contents(self::expDir("vendor/tatiye/terminal/composer.json"));
          $arr=json_decode($setApp, true);
          $sisip=array(
            'pws'=>self::license('password'),
            'router'=>self::LINK('resquire/general/vendor/tatiye/terminal/')
           );
          echo json_encode(array_merge($arr['authors'][0],$sisip) );
        
    }
    /* and class terminal */

   /*
   |--------------------------------------------------------------------------
   | Initializes stsusApp 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function stsusApp(){
        $setApp = file_get_contents(tatiye::expDir("public/theme/package.json"));
        $arr=json_decode($setApp, true);
        return $arr;
  
   }
   /* and class stsusApp */
   /*
   |--------------------------------------------------------------------------
   | Initializes terminal 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function devterminal(){
    $sts=self::stsusApp();
    if (!empty($sts['app']['development'])) {
          $setApp = file_get_contents(self::expDir("vendor/tatiye/terminal/composer.json"));
          $arr=json_decode($setApp, true);
          if (!empty($arr['assets'])) {
            return $arr['assets'];
          } else {
              return '';
          }
         } else {
             return '';
         }
          
   }
   /* and class terminal */

   /*
   |--------------------------------------------------------------------------
   | Initializes grapJsx 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function grapJsx(){
      $setApp = file_get_contents(self::expDir("public/theme/package.json"));
      $arr=json_decode($setApp, true);
      return $arr['graph'];  
   }
   /* and class grapJsx */
  



    /* and class info */
    /*
    |--------------------------------------------------------------------------
    | Initializes fetchIndex 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function fetchIndex($myTabel='',$title='',$url=''){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL =>self::LINK("api/v1/select/fetchKey"),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>' {
 "limit":"1",
 "page":"1",
 "tabel":"'.$myTabel.'",
 "keywords":"'.$title.'"
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: YmE5YTE4OGQzNDdhN2Q5YzIzOTEwMGVjMjVhNGNjMDk0YTFmN2NiYTIwY2M0OWE3MTY5NzYwOTkyNQ==',
    'Content-Type: application/json',
    'Cookie: PHPSESSID=d9llmj3i2rqop5qatigmc6dtm3'
  ),
));

$response = curl_exec($curl);
$DATA=json_decode($response, true);
return $DATA['storage'][0];
  
    }
    /* and class fetchIndex */
/*
|--------------------------------------------------------------------------
| Initializes indexPage 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function indexPage($url=''){
      // $Text=tatiye::Text();
      // $variable=explode('/',$url);
      // $str='';
      // $strKey='';
      // foreach ($variable as $key => $value) {
      //   if ($key !==2 ) {
      //         $str= $str.$value.'/'; 
      //    }
      // }
       foreach ($variable as $key => $value) {
         if ($key !==0 && $key !==1) {
               $strKey= $strKey.$value.' '; 
          }
       }
       $strKey = substr($strKey, 0, -1);
       $str = substr($str, 0, -1);
      // $setApp = file_get_contents(self::expDir("public/assets/index.json"));
      // $arr=json_decode($setApp, true);
      // $tabel=$arr['specific_router'][$str];
      //  if (!empty($tabel)) {
      //     if ($tabel[0]=='fetch') {
      
      //        $title=$Text->strreplace([$strKey,'-',' ']);
      //        $metaTag=self::fetchIndex($tabel[1],$title,$url);
      //     } else {
      //        $metaTag=[];
      //     }
          // $Exp=array(
          //   'path'    =>'public/theme/'.$str,
          //   'metaTag' =>[],
          // );
       // } else {
          $row=tatiye::requirePackage($url);
          // $Exp=array(
          //   'path'    =>$row['path'],
          //   'metaTag' =>$row['metaTag'],
          // );
       // } 
       return $row; 
}
/* and class indexPage */

    /*
    |--------------------------------------------------------------------------
    | Initializes requirePackage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function requirePages($fetch=''){
              $row=self::indexPage($fetch);
        //       $Exp=array(
        //          'id'             =>$row['metaTag']['id'],
        //          'url'            =>$row['metaTag']['url'],
        //          'title'          =>$row['metaTag']['title'],
        //          'description'    =>$row['metaTag']['description'],
        //          'images'         =>$row['metaTag']['images'],
        //          );
        // return array_merge($row,$Exp);
        return $row;
    }


    public static function requirePackage($base='',$fetch=''){
        // echo $base;
         $data=self::info();
         $Text=tatiye::Text();
         $variable=$data['require'];
         if (!empty($base)) {

           $url=explode('/',$base);
           $str='';
           foreach ($url as $key => $value) {
             if ($key !==0 ) {
                   $str= $str.$value.'/'; 
             }
           }
           $strType = substr($str, 0, -1);
           $sgt=$url[0];
           $counId=count($url)-1;

              if (!empty($variable[$sgt])) {
                  $data=$variable[$sgt];
                  if ($data['segment']< $counId) {
                    if (!empty($strType)) {
                        $path=$data['path'];
                    } else {
                         $path=$base.'/index';
                    }

                  } else {
                    if (!empty($strType)) {
                     $path=$base;
                    } else {
                     $path=$base.'/index';
                    }
                  }
       
   
                 $Exp=array(
                    'name'      =>$url[0],
                    'path'      =>'public/theme/'.$Text->strreplace([$path,'//','/']),
                    'base'      =>$base,
                    'segment'   =>$counId,
                    'fetch'     =>$variable[$sgt],
                    'metaTag'   =>[],
                    );
                 }

                 $home=array(
                    'name'       =>'home',
                    'path'      =>'index',
                    'base'      =>'index',
                    'fetch'      =>false,
                    'segment'   =>0,
                    'metaTag'   =>[],
                    );
      
               if (!empty($Exp)) {
                     return $Exp;
                 } else {
                     return $home;
                 }  
         } else {
           foreach ($variable as $key => $value) {
              $Exp[]=$value;
           }
           return $Exp;
         }
        
       
        
    }
    /* and class requirePackage */
    public static function infoMeta($page,$urlx=''){
         $Text=tatiye::Text();
         $setApp = file_get_contents(self::expDir("public/assets/index.json"));
         $arr=json_decode($setApp, true);
         $row=tatiye::getWJT($arr['fetch'][$page['tabel']][0]);
         $IDA=explode('/',$row['dir']);
         $IDAFile=explode('.',$IDA[3]);
         $APIs = file_get_contents(self::expDir("public/package/".$IDA[0].'/'.$IDA[1].'/'.$IDA[2].'/Doc/'.$IDAFile[0].'.json'));
         $arrfetc=json_decode($APIs, true);
         $myTabel=$arrfetc['messages'][0]['tabel'];
         if (!empty($urlx)) {
            $baseLink=$urlx;
         } else {
            $baseLink=$_GET['url'];
             // code...
         }
         

        $url=$Text->strreplace([end(explode('/',$baseLink)),'-',' ']);
        $metaTag=self::fetchIndex($myTabel,$url);
       return $metaTag;

    }
    public static function info($package='theme'){
          $setApp = file_get_contents(self::expDir("public/$package/package.json"));
          $arr=json_decode($setApp, true);
          return $arr;
        
    }
 /*
    |--------------------------------------------------------------------------
    | Initializes metaTag 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function metaTag($row){
         $Text=tatiye::Text();
         $page=tatiye::tn(0).'/';
         $url=$Text->strreplace([$row['url'],$page,'']);
         $curl = curl_init();
         curl_setopt_array($curl, array(
           CURLOPT_URL => self::LINK("api/v2/".$row['token']),
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => '',
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 0,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => 'POST',
           CURLOPT_POSTFIELDS =>' {
             "limit":"1",
             "page":"1",
             "keywords":"'.$url.'"
            }',
           CURLOPT_HTTPHEADER => array(
             'Authorization: MzI4NzM4ZjgzMGQzZmM5ZjI1MTBjYzhlMTA3OTg4NWViMWNkMzFhZDVmZWY2NTViMTY5MzEyNTc4Ng==',
             'Content-Type: application/json'
        
           ),
         ));

         $response = curl_exec($curl);
         curl_close($curl);
         $DATA=json_decode($response, true);
         return $DATA['storage'][0];
    }
    /* and class metaTag */



    /*
    |--------------------------------------------------------------------------
    | Initializes hello 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function hello($key){
          return $key;
        
    }



    public static function license($key){
         return license::framework($key);  
   }
   /*
   |--------------------------------------------------------------------------
   | Initializes userDev 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function userDev(){
        $row=self::WJT(self::license('ACCESS_TOKEN'));
         return $row;
       
   }
   /* and class userDev */
   /*
   |--------------------------------------------------------------------------
   | Initializes userDevToken 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function userDevToken(){
         return self::license('APP_SECRET');
       
   }
   /* and class userDevToken */


   public static function licenseDev($key=''){
      if($_SERVER["REQUEST_METHOD"] === "POST") {
        self::headerContent('POST');
         $row=self::WJT(self::license('ACCESS_TOKEN'));
         $Exp=array(
            'name'    =>$row['name'],
            'email'   =>$row['email'],
            'avatar'  =>$row['avatar'],
            );
         http_response_code(200);
         echo json_encode($Exp);
       } else {
         return self::index();
       }
       
   }
 

    /*
    |--------------------------------------------------------------------------
    | Initializes trial 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function trial($hashtag=''){
        $Token=tatiye::cookie('trial');
        $user=tatiye::getWJT($Token);
        if (self::license('license')==$user['serialKey']) {
            $status='Active';
            $license=$user['serialKey'];
            $validasi=true;
        } else {
            $license=self::license('license');
            $validasi=false;
            $status='Kode License Tidak Sesuai';
        }
 
        if (self::license('password')==$user['pws']) {
           if (!empty(self::license('password'))) {
               $passwordSet='true';
           } else {
               $passwordSet='false';
           }
           
           $pwsSet=true;
        } else {
           $passwordSet='password tidak sesuai';
           $pwsSet=false;
        }
        
        if ($user['statusId']=='active') {
              $deskripsi=$status;
              $spID=true;
          } else {
              $deskripsi=$user['statusId']??='Kode License Tidak ditemukan';
              $spID=false;
              // code...
          }


        if (!empty($validasi)) {
            if ($pwsSet==$spID) {
                // code...
              $redirect=true;  
            } else {
              $redirect=false;  
            }
        } else {
           $redirect=false;
        }


        if (!empty($user['expair'])) {
                $expair=tatiye::Ft('HTGL',$user['expair']);
            } else {
                $expair='false';
                // code...
            }

        $Expuid[]=array(
           'userid'   =>$user['userid'],
           'name'     =>$user['name']??='false',
           'avatar'   =>$user['avatar']??=tatiye::images('ngoryi.png'),
           'uidkey'   =>$user['tm'],
           'email'    =>$user['email']??='false',
           'telepon'  =>$user['telepon'],
           'redirect' =>$redirect,
           'license'  =>$license??='xxx-xxx-xxxx-xxx',
           'password' =>$passwordSet,
           'status'   =>$deskripsi,
           'date'     =>$user['expair'],
           'expair'   =>$expair,
           );
        if (!empty($hashtag)) {
            // code...
        return $Expuid[0][$hashtag];
        } else {
        return $Expuid;
            // code...
        }
        
        
    }
    /* and class trial */
    /*
    |--------------------------------------------------------------------------
    | Initializes dataVendor 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function vendor(){
           $line=tatiye::dir('composer.json');
           $data =file_get_contents($line);
           $storage=json_decode($data, true);
           return $storage['require'];
        
    }
    /* and class dataVendor */


/*
|--------------------------------------------------------------------------
| Initializes title 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function link_modules(){
      return self::LINK('node_modules/tatiye/es6.js');
    
}
/* and class title */

   /*
   |--------------------------------------------------------------------------
   | Initializes development 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function repository($info=''){
           $line=tatiye::dir('public/package/composer.json');
           $data =file_get_contents($line);
           $variable=json_decode($data, true);
           $Exp=array();
           $num=0;
           foreach ($variable['package'] as $key => $value) {

           if(file_exists(tatiye::dir('public/package/'.$value['package'].'/default.html'))){
              $Sataus=true;
              $path=tatiye::dir('public/package/'.$value['package']);
           } else {
              $Sataus=0;
              $path='null';
               // code...
           }
              $num=$num+1;
           // if (!empty($Sataus)) {
                $Exp[]=array(
                   'id'               =>$num,
                   'title'            =>$value['title'],
                   'package'          =>$value['package'],
                   'icon'             =>$value['icon'],
                   'status'           =>$value['status'],
                   'version'          =>$value['version'],
                   'api_version'      =>$value['api_version'],
                   'deskripsi'        =>$value['deskripsi'],
                   'android'           =>$value['android'],
                   'lisensi'          =>self::lisensiPackage($value['package'].$num),
                   'install_package'  =>'ngorei install '.$value['package'],
                   'install'          =>$Sataus,
                   'path'             =>$path
                   );  
              }
           // }
          
           return $Exp;
       
   }
   /* and class development */
    /*
    |--------------------------------------------------------------------------
    | Initializes infoPackage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function development($get=''){
        if (!empty($get)) {
            foreach (self::repository() as $key => $value) {
                if ($get==$value['package']) {
                         $Exp[]=$value;
                }
            }
           return $Exp; 
        } else {
          return self::repository();
            // code...
        }
        
       
        
    }
    /* and class  */
    /*
    |--------------------------------------------------------------------------
    | Initializes publicPackage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function publicPackage(){
        foreach (self::development() as $key => $value) {
            if (!empty($value['status'])) {
              // if (!empty($value['install'])) {
                 $Exp[]=array(
                    $value['title'],
                    $value['package'],
                    $value['icon'],
                    $value['status'],
                    $value['deskripsi'],
                    $value['android']
                 );
               // }
         }
        }

       return $Exp;
 
    }
    /* and class publicPackage */
    /*
    |--------------------------------------------------------------------------
    | Initializes publicPackageTabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function publicApiTabel(){
         foreach (setdb::tabelApi() as $key => $value) {
                 $Exp[]=array(
                      'tabel'             =>$key,
                      'status'            =>$value,
                    );
         }
          return  $Exp; 
    }
    /* and class publicPackageTabel */
    /*
    |--------------------------------------------------------------------------
    | Initializes publicTabelApi 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function publicTabelApi(){
          return setdb::tabelApi();
        
    }
    /* and class publicTabelApi */
    /*
    |--------------------------------------------------------------------------
    | Initializes control 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function control(){

        $row=control::upgrade();
                  $Exp[]=array(
                     'server'  =>$row['server'],
                     'status'  =>$row['status'],
                     'aplikasi'=>$row['aplikasi'],
                     );
           return $Exp;
        
    }
    /* and class control */

    public static function systemUpgarde($key){
        $Text=tatiye::Text();
        $id=$key['storage'];
        echo $key['primarykey'];
        $pec=explode('-',$id[1]);
        // https://github.com/tatiye/package/archive/refs/tags/1.0.1.zip
        $package=$pec[0];
        $version=$pec[1];
        $primarykey=$key['primarykey'];
        $title=$key['primarykey'].' '.$package;
        $nets=tatiye::rowFalse('package',$id[2],true);
        echo tatiye::tabelRaw(tatiye::rowFalse('package',$id[2]),0);
   


        if ($package=='package') {
             $newFile='src/'.$id[1].'/'.$id[2];
             $toFile='public/package/'.$id[2];
             $status=$nets['Row'];
             // UPDATE INSERT DELETE
             if ($primarykey=='instal') {
                $status=$nets['Row'];

                

             } elseif ($primarykey=='delete') {
                  tatiye::delTree($toFile);
                $status=0;
             } elseif ($primarykey=='update') {
                $status=$nets['Row'];
             }
             


         } elseif ($package == 'app'){
             $status=1;
             $newFile='src/'.$id[1].'/'.$id[2];
             $toFile='app/'.$id[2];

         } elseif ($package == 'theme'){
         } elseif ($package == 'dashboard'){
         } elseif ($package == 'mobile'){
         } elseif ($package == 'app'){
             $status=false;
         }

          if (!empty($status)) {
             $iNext='Sukses';
          } else {
             $iNext='Tidak terdefinisi';
          } 
          $info[]=array(
                "$primarykey" =>   $id[2],
                'Informasi' =>$iNext.' '.$title.' '.$id[2],
                "Date $primarykey"     =>tatiye::dt('DTIE'),
          );
          echo tatiye::tabelRaw($info,0);

         if (!empty($status)) {   
            $pathpackage      =tatiye::dir("src/".$id[1]); 
            $zip_url          = "https://github.com/tatiye/$package/archive/refs/tags/$version.zip";
            $destination_path =$pathpackage.".zip";
            file_put_contents($destination_path, fopen($zip_url, 'r'));
            $zip = new ZipArchive;
            $res = $zip->open($destination_path);
            if ($res === TRUE) {
                $zip->extractTo(tatiye::dir('src'));
                $zip->close();
                   //  unlink($destination_path);
                   // tatiye::copy_file($newFile,$toFile);
                   // tatiye::delTree('src/'.$id[1].'/');
                  $zip ->close();
             } else {
                 echo "Tidak dapat mengistal Package";
             }
              
         } else {

         }
         
    }









    /*
    |--------------------------------------------------------------------------
    | Initializes getFileApi 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function getFileApi($get='',$getid=''){
            $arryID = array();
            $arryIDget = array();
             $Text=tatiye::Text();
            $no =0;
            foreach (self::development() as $key => $value) {
                $api_version=$value['api_version'];
                $path    =$value['path'].'/Api/'.$api_version.'/Doc'; //lokasi folder sekarang 
                $files = scandir($path);
                $files = array_diff(scandir($path), array('.', '..', 'Thumbs.db'));

                foreach($files as $nama_file){
                     $ID=explode('.',$nama_file);
                     if (!empty($ID[1])) {
                              $newToken=tatiye::WJT([
                                 'dir'   =>$value['package']."/Api/$api_version/".$ID[0].'.php', 
                             ]);
                            $composer =file_get_contents($value['path'].'/Api/'.$api_version.'/Doc'.'/'.$nama_file);
                            $info=json_decode($composer, true);
                            $no=$no+1;
                              $arryID[]=array(
                               "id"   =>$no,
                               "package" =>$value['package'],
                               "file" =>$nama_file,
                               "type" =>$info['messages'][0]['segments'],
                               "token" =>$newToken,
                               "tabel" =>$info['messages'][0]['Query']['tabel'],
                               "path" =>$value['path'].'/Api/'.$api_version.'/Doc'.'/'.$nama_file,
                              );
                     } 
                }

        }
        if (!empty($get)) {
           foreach ($arryID as $key => $value) {
             if ($get==$value['package']) {
                     $arryIDget[]=$value;
                 // code...
             }
           }
           if (!empty($getid)) {
           foreach ($arryIDget as $key => $value) {
                 if ($getid==$value['id']) {
                         $arryIDget2[]=$value;
                     // code...
                 }
               }
              return $arryIDget2;
           } else {
              return $arryIDget;
           }
           
        } else {
            // code...
           return $arryID;
        }
        
    }
    /* and class getFileApi */
   

    /*
    |--------------------------------------------------------------------------
    | Initializes packageLisensi 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function packageLisensi(){
            $arryID = array();
            foreach (self::development() as $key => $value) {
                if (!empty($value['status'])) {
                    $row= tatiye::fetch('apppaclicense','serial,date,package',"userid='".tatiye::ssoId('userid')."' AND serial='".$value['lisensi']."'");
                      if (!empty($row['serial'])) {
                         if(strtotime($row['date']) < time()) {
                            $Sataus='expair';
                        } else {
                           $Sataus='active';

                        }
                       $package=$row['package'];
                       $expair=$row['date'];
                    } else {
                       $package=$value['lisensi'];
                       $Sataus='false';
                       $expair='false';
                    }

                    $arryID[]=array(
                       'id'                 =>$value['id'],
                       'package'            =>$value['package'],
                       'lisensi'            =>$value['lisensi'],
                       'uidlisensi'         =>$package,
                       'status'             =>$Sataus,
                       'expair'             =>$expair,
                   );
                }
             }
                return $arryID;
        
    }
    /* and class packageLisensi */
    /*
    |--------------------------------------------------------------------------
    | Initializes getuseLisnsiPackage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function getuseLisnsiPackage($arryID){
         $arryID = array();
            foreach (self::packageLisensi() as $key => $value) {
                    $arryID[$value['package']]=$value['lisensi'];
             }
             return $arryID;

         // $row= tatiye::fetch('apppaclicense','serial,date',"userid='".tatiye::ssoId('userid')."' AND serial='".$arryID."'");
         // if (!empty($row['serial'])) {
         //            if(strtotime($row['date']) < time()) {
         //                 return true;
         //            } else {    
         //               return false;
         //            }
         // } else {
         //     return true;
         // }
         
        
    }
    /* and class getuseLisnsiPackage */
    /*
    |--------------------------------------------------------------------------
    | Initializes useLisnsiPackage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function useLisnsiPackage($get){
            $appStatus=self::appStatus();
            if (!empty($appStatus)) {
               $package=true;
            } else {
               $ret=control::package();
               $package=$ret['lisnsi'];
            }
            
            
            $arryID = array();
            if (!empty($get)) {
            foreach (self::packageLisensi() as $key => $value) {
                    $arryID[$value['package']]=$value['lisensi'];
             }
               $row= tatiye::fetch('apppaclicense','serial,date',"userid='".tatiye::ssoId('userid')."' AND serial='".$arryID[$get]."'");
               if (!empty($row['serial'])) {
                    if(strtotime($row['date']) < time()) {
                        $status='expair';
                    } else {    
                      $status='active';
                    }  
                    return $status;
               } else {
                   if ($get !=='profil' 
                    && $get !=='devices' 
                    && $get !=='default' 
                    && $get !==tatiye::ssoId('sub_domain')) {
                     if ($get=='users') {
                         return true;
                     } else {
                         return $package;
                     }
                     
                   } else {
                       return false;
                       // code...
                   }
                   
               }
             } else {
                   return false;
            
             }
        
    }
    /* and class useLisnsiPackage */
 /*
 |--------------------------------------------------------------------------
 | Initializes indikator 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function indikator($tabel,$failid){
 $db=new tatiye();
 $QUERY="SELECT $failid FROM $tabel GROUP BY  $failid";
 $result=$db->query($QUERY);
  $no=0;
  while($row=$result->fetch_assoc()){
        $Exp[]=$row[$failid];

 }
 return $Exp;
     
 }
 /* and class indikator */
    /*
    |--------------------------------------------------------------------------
    | Initializes packageLisensi 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function lisensiPackage($key){
          if (!empty($key)) {
              $md5 = strtoupper(md5($key));
              $code[] = substr ($md5, 0, 5);
              $code[] = substr ($md5, 5, 5);
              $code[] = substr ($md5, 10, 5);
              $code[] = substr ($md5, 15, 5);
              $membcode = implode ("-", $code);
              return $membcode;
          } else {
              return false;
          }   
   }
        
  
    /* and class packageLisensi */
    /*
    |--------------------------------------------------------------------------
    | Initializes uidToken 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function uidToken(){
          $row= tatiye::fetch('appusertoken','id,accesstoken,accesstokenexpiry AS expiry',"userid='".tatiye::ssoId('userid')."' ORDER BY id DESC ");
               $Exp[]=$row;
          return $Exp;
        
    }
    /* and class uidToken */
    /*
    |--------------------------------------------------------------------------
    | Initializes getFile 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
public static function getFile($dir,$Resize=''){
    $Text=tatiye::Text();
    $expDir=self::dir($dir);
    $arryID = array();
    $no =0;
    $path    = $expDir; //lokasi folder sekarang 
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..', 'Thumbs.db'));
    foreach($files as $nama_file){
         $ID=explode('.',$nama_file);
         if (!empty($ID[1])) {
            if ($ID[1] !=='svg' && $ID[1] !=='gif' && $ID[1] !=='png' && $ID[1] !=='PNG' && $ID[1] !=='html') {
                  $no=$no+1;
                  $arryID[]=array(
                   "id"   =>$no,
                   "file" =>$nama_file,
                   "path" =>$expDir.'/'.$nama_file
                  );
          
            } 
         } 
    }
    return $arryID;
    
}
    /* and class getFile */
    /*
    |--------------------------------------------------------------------------
    | Initializes getRoute 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function getRoute($root=''){
        if($_SERVER["REQUEST_METHOD"] === "GET") {
            self::headerContent('GET');
             $variable=explode('/',$root);
          $str='';
          foreach ($variable as $key => $value) {
            if ($key !==0 && $key !==1 && $key !==2 ) {
                  $str= $str.$value.'/'; 
            }
          }
           $strType = substr($str, 0, -1);
           if (!empty($strType)) {
               $sttr='/'.$strType;
           } else {
               $sttr='';
           }
            http_response_code(200);
            $Text=tatiye::Text();
            $arryID = array();
            $no =0;
            $files = array_diff(scandir(self::dir('public/theme')), array('.', '..', 'Thumbs.db'));
            foreach($files as $nama_file){
                  $newFile = filetype($file);
                 $ID=explode('.',$nama_file);
                 if (!empty($ID[0])) {
                    if ($ID[1] !=='json' && $ID[1] !=='html' && $ID[1] !=='jsx') {

                      $arryID[$nama_file]='public/theme/'.$nama_file.$sttr;
                  
                     } 
                 } 
            }
            $files = array_diff(scandir(self::dir('public/package')), array('.', '..', 'Thumbs.db'));
            foreach($files as $nama_file){
                  $newFile = filetype($file);
                 $ID=explode('.',$nama_file);
                 if (!empty($ID[0])) {
                    if ($ID[1] !=='json' && $ID[1] !=='html' && $ID[1] !=='jsx') {
                     
                       $arryID[$nama_file]='public/package/'.$nama_file.$sttr;
         
                  
                     } 
                 } 
            }
            if (!empty($root)) {
                        


             echo json_encode($arryID[$variable[2]]); 
                // code...
            } else {


               echo json_encode($arryID); 
                // code...
            }
            

     }
        
    }
    /* and class getRoute */
    /*
    |--------------------------------------------------------------------------
    | Initializes getPackage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function getPackage($id='',$get){
     $rbac =Package::Public();
     $Exp=array();
     foreach ($rbac as $key => $value) {
        if ($value[$id]==$get) {
           $Exp=$value;
        }
    
     }
     return $Exp;
        
    }
    /* and class getPackage */
 /*
 |--------------------------------------------------------------------------
 | Initializes Library  icon-feather-layers
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function Library(){
    $Exp=array();
       $Devices= [
         "1"=>['My Devices' ,''           ,'monitor'],
         "3"=>['History',   'history'     ,'clock','1'],
         "4"=>['Report ' ,  'report '     ,'inbox','1'],
         "2"=>['Archive',   'archive'     ,'bookmark','1'],
         "6"=>['Maps',      'maps'        ,'map-pin','1'],
         "5"=>['Spam',      'spam'        ,'slash','1'],
         "7"=>['Recycle' ,  'recycle'     ,'trash','1'],
       ];
     $query=tatiye::QY("SELECT id,name,kode FROM appindikator WHERE value='label' AND userid='".tatiye::ssoId('userid')."' LIMIT 5");   
     while ($row = $query->fetch()) { 
               $Exp[$row['id']]=[
                $row['name'],  $row['kode']   ,'folder','2', $row['id']
               ]
             ;
      };
      return array_merge($Devices,$Exp);
 }
 /* and class Library  icon-feather-map-pin*/
    /*
    |--------------------------------------------------------------------------
    | Initializes publicPackageTabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function publicPackageApi($data=''){
        foreach (self::development() as $key => $value) {
                 $Exp[]=array(

                    $value['package'],
                    $value['api_version']
                );
        }
        return $Exp;
        
    }
    /* and class publicPackageTabel */


   /*
   |--------------------------------------------------------------------------
   | Initializes title 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function replace($key,$set=''){
       $Text=tatiye::Text();
       $ContentText =$Text->strreplace([$key,'-',$set]); 
       return preg_replace("/[^a-zA-Z0-9]/",$set,$ContentText); 
      
   }
   /* and class title */
   /*
   |--------------------------------------------------------------------------
   | Initializes endexplode 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  11/28/2023 2:55:40 PM
   */
   public static function endexplode($key){
      $variable=@end(explode('/',$key));
      return tatiye::replace($variable);
       
   }
   /* and class endexplode */
   /*
   |--------------------------------------------------------------------------
   | Initializes grapApi 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function grapApi($url, $method, $par=null){
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
      return json_decode($html, true);
      curl_close($ch);
       
   }
   /* and class grapApi */
   /*
   |--------------------------------------------------------------------------
   | Initializes getPaging 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static  function getPaging($page, $total_rows, $records_per_page, $page_url=''){
        $paging_arr=array();
        $total_pages = ceil($total_rows / $records_per_page);
        $range =2;
        $initial_num = $page - $range;
        $condition_limit_num = ($page + $range)  + 1;
        $paging_arr['paging']=array();
        $initial_num = $page - $range;
        $condition_limit_num = ($page + $range)  + 1;
        $paging_arr['paging']=array();
        $page_count=0;
        for($x=$initial_num; $x<$condition_limit_num; $x++){
            if(($x > 0) && ($x <= $total_pages)){
                $pe=$x-1;
                $pe1=$page-1;
                $paging_arr['paging'][$page_count]["page"]=$x;
                $paging_arr['paging'][$page_count]["next"]=$x-1;

                   $paging_arr['paging'][$page_count]["calss"] = $pe==$pe1 ? "active" :  "";
                   $paging_arr['paging'][$page_count]["color"] = $pe==$pe1 ? "#F26463" : "#FFF";
                   $paging_arr['paging'][$page_count]["text"] =  $pe==$pe1  ? "#FFF" : "#F26463";
            
                $page_count++;
            }
        }
         $perKali=ceil($total_rows/$records_per_page)+1;
        
         // newer
         if ($page_url==$records_per_page) {
             $paging_arr["newer"]    = 1;
         } else {
             if (!empty($page-1)) {
             $paging_arr["newer"]    = $page;
             } else {
             $paging_arr["newer"]    = 1;
             }
         }
         if ($page_url==$total_rows) {
             $paging_arr["older"]    = 1;
         } else {
           
             if ($page==$perKali) {
                 $paging_arr["older"]    = 1;
             } else {
              $paging_arr["older"]    = $page+1;
             }
             
         }     
        return $paging_arr;
    }
       
     /* and class grapApi */
      public static function grapApiAI($url, $method, $par=null){
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
      return json_decode($html, true);
      curl_close($ch);
       
   }
   /* and class grapApi */
 /*
 |--------------------------------------------------------------------------
 | Initializes set 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function setLogout($key){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      unset($_SESSION['sub_domain']);
      tatiye::cookieUnset('sso');
      session_destroy();
     
 }
 /* and class set */
 /*
 |--------------------------------------------------------------------------
 | Initializes api 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
    public function apiexternal($url, $method, $data=null){
  // return self::grapApi($url, $method); page limit keywords
    $variable=self::grapApi($url, $method); 
    $records=$data->records;
    $page=$data->page;
    $count=count($variable);
        $total_pages = ceil($count / $records);
        $Exp=array(
           '#total_data_'.$data->element      =>$count,
           '#pagination_'.$data->element    =>$total_pages,
           );
         $products_arr["status"]       =200;
         $products_arr["element"]      =$data->element;
         $products_arr["limit"]        =$data->records;
         $products_arr["page"]         =$data->page;
         $products_arr["keywords"]     =$data->keywords;
         $products_arr["atribute"]     =$Exp;
         $products_arr["storage"]      =array();
        $userData=array();
        $userData1=array();
        $record_num = ($data->records * $data->page) - $data->records;
        $no=$record_num;
        foreach (array_slice(array_reverse($variable), $page, $records) as $key1 => $val1) {
            if (!empty($data->keywords)) {
                  foreach ($val1 as $key2 => $val2) {
                        if($val2 == $data->keywords) {
                              $no=$no+1;
                              $number=array("no"=>$no);
                              array_push($products_arr["storage"], array_merge($number,$val1));
                        }
                    }
                $userData1=1;
            } else {
                $userData1=false;
            }
        }
        if (!empty($userData1)) {
            return $products_arr;
         } else {
          foreach (array_slice(array_reverse($variable), $page, $records)  as $key ) {
                $no=$no+1;
                $number=array("no"=>$no);
                array_push($products_arr["storage"], array_merge($number,$key));
           }
            $paging=self::getPaging($page,$count,$records,$number);
            return array_merge($products_arr,$paging);
         }
          

 }
 /* and class api */
   
   /*
   |--------------------------------------------------------------------------
   | Initializes precode 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function precode($dirFile,$type='html'){
       $setJS=tatiye::dir('public/'.$dirFile);
       $output = file_get_contents($setJS); 
       $new    =htmlspecialchars($output, ENT_QUOTES);
       echo '<pre><code class="language-'.$type.'">'.$new.'<code><pre>';  
   }
   /* and class precode */
   /*
   |--------------------------------------------------------------------------
   | Initializes ssoId 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function ssoId($key=''){
        $token=tatiye::cookie('sso');
        $row=tatiye::getWJT($token);
        if (!empty($key)) {
          return $row[$key];
        } else {
          return $row;
        }
        
        
   }
   /* and class ssoId */
   /*
   |--------------------------------------------------------------------------
   | Initializes userid 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function userid(){
           $token=tatiye::cookie('sso');
           $variable=tatiye::getWJT($token);
            $Exp[]=array(
               'userid'    =>$variable['userid'],
               'uid'       =>$variable['uid'],
               'uidkey'    =>$variable['uidkey'],
               'name'      =>$variable['name'],
               'avatar'    =>$variable['avatar'],
               'email'     =>$variable['email'],
               'telepon'   =>$variable['telepon'],
               'tm'        =>$variable['tm'],
               'token'     =>$variable['token'],
               'license'   =>$variable['license'],
               'serialKey' =>$variable['serialKey'],
               'applogin'  =>$variable['applogin'],
               'addres'    =>$variable['addres'],
               'uidsts'    =>$variable['uidsts'],
               );
         return  $Exp;
       
   }
   /* and class userid */
   /*
   |--------------------------------------------------------------------------
   | Initializes visitor 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function userAgent(){
         $db=new tatiye(); 
        if (!isset($_SESSION['visitor'])){
          $_SESSION['visitor']=self::getBrowser('IP');
        }   
         return $_SESSION['visitor'];
   }
   /* and class visitor */
   /*
   |--------------------------------------------------------------------------
   | Initializes skillset 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function skillset($key){
     $cek=tatiye::dbtabel()->show_tabelName('appusertoken');
     if (!empty($cek[0]["tabel"])) {
        if (!empty(tatiye::ssoId('userid'))) {
              $login=tatiye::useHandelCount('appusertoken'," userid='".tatiye::ssoId('userid')."' ");     
              $package=tatiye::useHandelCount('appuserpackage'," userid='".tatiye::ssoId('userid')."' ");     
              $history=tatiye::useHandelCount('apphistory'," userid='".tatiye::ssoId('userid')."' ");  
              $Exp[]=array(
                    'login'    =>$login['count'],
                    'history'  =>$history['count'],
                    'package'  =>$package['count'],
                    );   
                return $Exp[0][$key];
         }
    } else {
      $Exp[]=array(
            'login'    =>false,
            'history'  =>false,
            'package'  =>false,
            );  
     return $Exp[0][$key]; 
    }

   }
   /* and class skillset */
  /*
  |--------------------------------------------------------------------------
  | Initializes apphistory 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function apphistory($row){
     $cek=tatiye::dbtabel()->show_tabelName('apphistory');
     if (!empty($cek[0]["tabel"])) {
         if (!empty($row['autoload'])) {
           $dbhistory=new tatiye();
           $history = array(                                                                  
            "nama"         =>$row['title'],                                                    
            "deskripsi"    =>$row['description'],                                                    
            "categori"     =>$row['categori'],                                                    
            "keyid"        =>$row['PrimaryKey'],                                                    
            "package"      =>$row['package'],                                                    
            "nmtabel"      =>$row['tabel'],                                                    
            "userid"       =>tatiye::ssoId('userid'),                                                
            "time"         =>self::tm(),                                                    
            "date"         =>self::dt("EN"), 
            "bulan"        =>self::dt("M"),                                            
            "tahun"        =>self::dt("Y"),                                                   
           ); 
             $dbhistory->que($history)->insert("apphistory");                                                                      
           } 
     }                                                                          
  }
  /* and class apphistory */
    /*
    |--------------------------------------------------------------------------
    | Initializes sum 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function sum($QUERY){
        $Exp=array();
       $variable=self::QY($QUERY); 
       while ($row = $variable->fetch()) {  
           $Exp=$row;
        } 
        return $Exp;
    }
    /* and class sum */

    /*
    |--------------------------------------------------------------------------
    | Initializes payment 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function payment($oder_id){
       if (!empty($oder_id)) {
        $row=tatiye::sum("SELECT SUM(harga) AS TOTAL,userid FROM biling WHERE order_id='".$oder_id."'"); 
        $Expuid=tatiye::fetchUserID($row['userid']);
        // Required
        $transaction_details = array(
            'order_id'     =>$oder_id,
            'gross_amount' =>$row['TOTAL'], 
        );
        // Optional
           $item_details=array();
           $variable=tatiye::QY("SELECT *  FROM biling WHERE order_id='".$oder_id."'"); 
           while ($row = $variable->fetch()) {  
                    $item_details[] = array (
                      array(
                          'id'       =>$row['id'],
                          'price'    =>$row['harga'],
                          'quantity' =>$row['jumlah'],
                          'name'     =>$row['categori']
                      ),
                  );
            } 
        // Optional       
        $customer_details = array(
            'first_name'          =>$Expuid['name'],
            'last_name'           =>"",
            'email'               =>$Expuid['email'],
            'phone'               =>$Expuid['telepon'],
            'billing_address'     =>'',
            'shipping_address'    =>''
        );
        // Fill transaction details
        $transaction = array(
            'transaction_details' =>$transaction_details,
            'customer_details'    =>$customer_details,
            'item_details'        =>$item_details,
        );
          return $transaction;
        } else {
          return tatiye::index();
        }
        
    }
    /* and class payment */
   /*
   |--------------------------------------------------------------------------
   | Initializes appLogin 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  LICENSE
   */
   public static function appSSO($key){
        if (!empty($key)) {
            $template=$key;
        } else {
           $template='login';
        }
        $Expuid=self::fetchUserID($_SESSION['user_id']);
        $applogin=array(
            'tm'        =>self::tm(),
            'token'     =>$_SESSION['access_token'],
            'license'   =>LICENSE,
            'serialKey' =>self::serialKey(1),
            "sub_domain"=>$_SESSION['sub_domain'] ,
            "applogin"=>$template
        );

        $array=array_merge($Expuid,$applogin);
       //$_SESSION['access_token']; 
       $newToken=self::WJT($array);
       return $newToken;
       
   }
   /* and class appLogin */
   /*
   |--------------------------------------------------------------------------
   | Initializes authorization 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function authorization(){
    error_reporting(0);
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        self::headerContent('POST');
          $row=tatiye::fetch("appusertoken","*","serialkey='".$_SERVER["HTTP_TOKEN"]."'");
          if (!empty($row['id'])) {
            if(strtotime($row['accesstokenexpiry']) < time()) {
                  $status='expair';
              } else {
                 $status='active';
              }   
              $deskripsi='Token sesuai';
            } else {
              $deskripsi='Token tidak sesuai';
            }
           $Exp=array(
              'serial_key'           =>$_SERVER["HTTP_TOKEN"],
              'expair'               =>$row['accesstokenexpiry']??='',
              'access_token'         =>$row['accesstoken']??='',
              'deskripsi'            =>$deskripsi,
              );
           echo json_encode($Exp);
         } else {
             return  tatiye::index();
        }
   }
   /* and class authorization */
   /*
   |--------------------------------------------------------------------------
   | Initializes serialNumber 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function serialKey(){
          if (!empty($_SESSION['access_token'])) {
              $md5 = strtoupper(md5($_SESSION['access_token']));
              $code[] = substr ($md5, 0, 5);
              $code[] = substr ($md5, 5, 5);
              $code[] = substr ($md5, 10, 5);
              $code[] = substr ($md5, 15, 5);
              $membcode = implode ("-", $code);
              return $membcode;
          } else {
              return false;
          }   
   }
   /* and class serialNumber */
   /*
   |--------------------------------------------------------------------------
   | Initializes license 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function Createlicense(){
        $METHOD=$_SERVER['REQUEST_METHOD'];
        self::headerContent('POST');
        if ($METHOD=='POST') {
      $setUId=$_SERVER["HTTP_USERID"]; 
      $db=new tatiye(); 
      $Text=tatiye::Text(); 
      $row=self::fetch("appuserprofil","*","userid='".$setUId."'");
      $rowkey=self::fetch("applicense","COUNT(*) as count");
      $uidkey=self::fetch("applicense","*","userid='".$setUId."'");
      $natKey=$rowkey['count']+1;
     if (!empty($uidkey['userid'])) {
          echo json_encode($uidkey);  
          $result=$db->que(array("password"=>$row['password']))->update("applicense","id='".$uidkey['id']."'");  
       } else {
         $data = array(                                                     
             "serial"    =>self::serialKey().'-'.$Text->sprintf($natKey,"%05s"),                                    
             "time"      =>tatiye::tm(),                                                 
             "date"      =>tatiye::st('+25 days'),                                             
             "bulan"     =>tatiye::dt("M"),                                              
             "password"  =>$row['password'],                                              
             "tahun"     =>tatiye::dt("Y"),                                              
             "userid"    =>$setUId,                                                      
            );  
            if (!empty($setUId)) {
                                                                                      // code...
            $result=$db->que($data)->insert("applicense"); 
            }                                                                      
             echo json_encode($data);    
       }
                   // code...
        } else {
           return self::index();
        }
        
       
   }
   /* and class license */
     public static function CreatePackagelicense(){
        $METHOD=$_SERVER['REQUEST_METHOD'];
        self::headerContent('POST');
        if ($METHOD=='POST') {
      $setUId=$_SERVER["HTTP_USERID"]; 
      $db=new tatiye(); 
      $Text=tatiye::Text(); 
      $row=self::fetch("appuserprofil","*","userid='".$setUId."'");
      $rowkey=self::fetch("applicense","COUNT(*) as count");
      $uidkey=self::fetch("applicense","*","userid='".$setUId."'");
      $natKey=$rowkey['count']+1;
     if (!empty($uidkey['userid'])) {
          echo json_encode($uidkey);  
         // $result=$db->que(array("password"=>$row['password']))->update("applicense","id='".$uidkey['id']."'");  
       } else {
         $data = array(                                                     
             "package"      =>self::serialKey(),                                    
             "time"         =>tatiye::tm(),                                                 
             "package_exp"  =>tatiye::st('+3 days'),                                             
             "bulan"        =>tatiye::dt("M"),                                              
             "password"     =>$row['password'],                                              
             "tahun"        =>tatiye::dt("Y"),                                              
             "userid"       =>$setUId,                                                      
            );  
            if (!empty($setUId)) {            
              $result=$db->que($data)->insert("applicense"); 
            }                                                                      
             echo json_encode($data);    
       }
                   // code...
        } else {
           return self::index();
        }
        
       
   }
   /* and class license */
     /* and class license */
   public static function licenseKey($key=''){
          self::headerContent('GET');
          $userApp=self::fetch('appusertoken',"*","serialkey='".$key."' ORDER BY id DESC");
          $row=self::fetch("appuser","*","id='".$userApp['userid']."'");
          $user=self::fetch('appuserprofil',"*","userid='".$userApp['userid']."'");
           if (!empty($user['avatar'])) {
               $avatar=$user['avatar'];
           } else {
               $avatar='images/admin.jpeg';
           }
            if(strtotime($userApp['accesstokenexpiry']) < time()) {
                 $status='expair';
              } else {
                 $status='active';
              }  

             $sso=array(
              'userid'     =>$userApp['userid']??='',
              'name'       =>$user['nama'],
              'avatar'     =>tatiye::LINK($avatar),
              'uid'        =>$user['id']??='',
              'email'      =>$user['email']??='',
              'telepon'    =>$user['telepon']??='',
              'tm'         =>$user['time'],
              'pws'        =>$user['password'],
              'statusId'   =>$status,
              'token'      =>$userApp['accesstoken'],
              'license'    =>$userApp['serialkey'],
              'serialKey'      =>$key,
              'useractive'     =>$row['useractive'],
              'loginattempts'  =>$row['loginattempts'],
              "applogin"  =>'public',
              'expair'     =>$userApp['accesstokenexpiry']??='',
              );  

           $ssoUser=array(
              'name'       =>$user['nama'],
              'avatar'     =>tatiye::LINK('images/'.$avatar),
              'email'      =>$user['email']??='',
              'telepon'    =>$user['telepon']??='',
              'tm'         =>$user['time'],
              );  
          if (!empty($userApp['id'])) {
              $deskripsi='Token sesuai';
              $setSSO=self::WJT($sso);
              $setSSOUser=$ssoUser;
            } else {
              $deskripsi='Token tidak sesuai';
              $setSSO='';
              $setSSOUser='';
            }
           $Exp=array(
              'serial'     =>$key,
              'expair'     =>$userApp['accesstokenexpiry']??='',
              'deskripsi'  =>$deskripsi,
              'status'     =>$status,
              'agent'      =>$setSSOUser,
              'sso'        =>$setSSO,
              );
           echo json_encode($Exp);    
   }
   /*
   |--------------------------------------------------------------------------
   | Initializes dateTime 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function dateTime($pubdate){
         return self::timeAgo(date("Y-m-d H:i:s",$pubdate));
       
   }
   /* and class dateTime */


    public static function uidProfil($setUId,$mode='light'){
         $Text=tatiye::Text();

         $row=tatiye::fetch("appuserprofil","*","userid='".$setUId."'");
         $token=tatiye::fetch("appusertoken","*","userid='".$setUId."' ORDER BY id DESC");
          if (!empty($row['avatar'])) {
            $avatar=tatiye::LINK($row['avatar']);
          } else {
            $avatar=tatiye::LINK('images/admin.jpeg');
          }
          if (!empty($row['cover'])) {
            $cover=tatiye::LINK($row['cover']);
          } else {
            $cover='https://www.bootdey.com/image/400x400/3b4863a3/fff';
          }
          if (!empty($row['pubdate'])) {
            $pubDate=self::timeAgo(date("Y-m-d H:i:s",$row['pubdate'])) ;
          } else {
            $pubDate=tatiye::Ft('HTGL',$row['date']);
          }
          $IDd=explode(' ',$row['nama']); 
          $Exp=array(
              'id'                 =>$row['id'],
              'uid'                =>$row['id'],
              'loggedIn'           =>true,
              'base_ulr'           =>tatiye::LINK('/'),
              'base_api'           =>tatiye::LINK('api'),
              'sub_domain'         =>strtolower(str_replace(' ', '',$row['nama'])),
              'uthorization'       =>$token['accesstoken'],
              'expiry'             =>$token['accesstokenexpiry'],
              'user_id'            =>$row['userid'],
              'nama'               =>$row['nama'],
              'name'               =>$IDd[0],
              'fullname'           =>$row['nama'],
              'email'              =>$row['email'],
              'password'           =>$row['password'],
              'telepon'            =>$row['telepon'],
              'alamat'             =>$row['alamat'],
              'avatar'             =>$avatar,
              'mapId'              =>$row['mapId'],
              "latitude"           =>$row['latitude'],                                               
              "longitude"          =>$row['longitude'],  
              'mode'               =>$row['mode']?$row['mode']:'light',
              'cover'              =>$cover,
              'value'              =>0,
              'lokasi'             =>$row['region'].','.$row['subregion'].','.$row['city'].','.$row['district'],
              'date'               =>$row['date'],
              'time'               =>$row['time'],
              'color'              =>$row['color']?$row['color']:'#F26522',
              'circle'             =>$row['color']?$row['color']:'transparent',
              'background'         =>$row['background']?$row['background']:'#e8ecf4',
              'simcart'            =>$Text->provider($row['telepon']),
              'userStatus'         =>self::userActiv($row['pubdate']),
              'timeAgo'            =>$pubDate,
           );
             return $Exp;

   }
   /*
   |--------------------------------------------------------------------------
   | Initializes profil 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function useProfil($id){
       $row=tatiye::fetch("appuserprofil","*","id='".$id."'");
          if (!empty($row['avatar'])) {
            $avatar=tatiye::LINK($row['avatar']);
          } else {
            $avatar=tatiye::LINK('images/admin.jpeg');
          }
       $Exp=array(
              'id'                 =>$row['id'],
              'uid'                =>$row['id'],
              'loggedIn'           =>true,
              'base_ulr'           =>$_SESSION['base_ulr'].'/',
              'base_api'           =>$_SESSION['base_ulr'].'/api',
              'sub_domain'         =>$_SESSION['base_ulr'].'/'.tatiye::ssoId('sub_domain'),
              'access_token'       =>$_SESSION['access_token'],
              'uthorization'       =>$_SESSION['access_token'],
              'userid'             =>$row['userid'],
              'user_id'            =>$row['userid'],
              'nama'               =>$row['nama'],
              'fullname'           =>$row['nama'],
              'email'              =>$row['email'],
              'password'           =>$row['password'],
              'telepon'            =>$row['telepon'],
              'alamat'             =>$row['alamat'],
              'avatar'             =>$avatar,
              'mapId'              =>$row['mapId'],
              'date'               =>$row['date'],
              'time'               =>$row['time'],
              );
       return $Exp;
       
   }
   /* and class profil */
 public static function setserialKey($key=''){
      $db=new tatiye();  
      $Expuid=tatiye::fetch("appusertoken","id,serialKey","accesstoken='".$key."'");
      $md5 = strtoupper(md5($key));
      $code[] = substr ($md5, 0, 5);
      $code[] = substr ($md5, 5, 5);
      $code[] = substr ($md5, 10, 5);
      $code[] = substr ($md5, 15, 5);
      $membcode = implode ("-", $code);
      $db->que(array("serialKey"=>$membcode))->update("appusertoken","id='".$Expuid['id']."'");
      return $Expuid['serialKey'];
   }
   /*
   |--------------------------------------------------------------------------
   | Initializes getUserIP 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function getUserIP(){
    $userIP =   '';
    if(isset($_SERVER['HTTP_CLIENT_IP'])){
        $userIP =   $_SERVER['HTTP_CLIENT_IP'];
    }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $userIP =   $_SERVER['HTTP_X_FORWARDED_FOR'];
    }elseif(isset($_SERVER['HTTP_X_FORWARDED'])){
        $userIP =   $_SERVER['HTTP_X_FORWARDED'];
    }elseif(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
        $userIP =   $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    }elseif(isset($_SERVER['HTTP_FORWARDED_FOR'])){
        $userIP =   $_SERVER['HTTP_FORWARDED_FOR'];
    }elseif(isset($_SERVER['HTTP_FORWARDED'])){
        $userIP =   $_SERVER['HTTP_FORWARDED'];
    }elseif(isset($_SERVER['REMOTE_ADDR'])){
        $userIP =   $_SERVER['REMOTE_ADDR'];
    }else{
        $userIP =   'UNKNOWN';
    }
    // 
    return $userIP;
       
   }
   /* and class getUserIP */
 public static function getBrowser($keyBrowser){
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent)){
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent)){
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent)){
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent)){
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent)){
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

 
        $return =array(
            'browser'   => $ub,
            'version'   => $version,
            'platform'  => $platform,
            'IP'        =>self::getUserIP(),
           
         );
      return $return[$keyBrowser];
    }
    /* and class getBrowser */
 //    date_default_timezone_set('America/New_York');  
 // echo facebook_time_ago('2016-03-11 04:58:00');  
 public static function timeAgo($timestamp)  {  

      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
     return "Baru saja";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "1 Menit";  
     }  
     else  
           {  
       return "$minutes Menit";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "1 Jam";  
     }  
           else  
           {  
       return "$hours Jam";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "Kemarin";  
     }  
           else  
           {  
       return "$days  hari";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "Seminggu";  
     }  
           else  
           {  
       return "$weeks Minggu";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "Sebulan";  
     }  
           else  
           {  
       return "$months Bulan";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "1 Tahun";  
     }else {
       if ($years ==54) {
           return "";  
        } else {
          return "$years Tahun lalu";  
        }
         
       
     }  
   }  
 }  
  /*
  |--------------------------------------------------------------------------
  | Initializes raw 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
    public static function tabelRaw($options,$set=''){
        $renderer = new tatiyeNetTabelRaw($options);
        $renderer->showHeaders(true);
        print '<pre>';
        print "\n";
        $renderer->render(false,$set);
        print "\n";
        print '</pre>';
    }

    public static function tabelRawSell($options,$set=''){
        $renderer = new tatiyeNetTabelRaw($options);
        $renderer->showHeaders(true);
        print "\n";
        $renderer->render(false,$set);
        print "\n";
    }

    public static function tabelRawColom($options,$variable,$line='',$get=''){
  
         $sdkKey=array();
         if (!empty($line)) {
           foreach ($line as $key2 => $row) {
  
                foreach ($options as $key => $value) {
                     $sdkKey[$key][$variable[$key2]]=$value[$row];
                }
        
            }
         } else {
           foreach ($variable as $key2 => $row) {
                foreach ($options as $key => $value) {
                     $sdkKey[$key][$row]=$value[$row];
                }
        
            }
         }
         if (!empty($get)) {
             return $sdkKey[0];
         } else {
                $renderer = new tatiyeNetTabelRaw($sdkKey);
                $renderer->showHeaders(true);
                print '<pre>';
                print "\n";
                $renderer->render(false,$set);
                print "\n";
                print '</pre>';
         }
    }


    /* and class Tabel Raw */
    public static function setRaw($options,$set='',$num=2){
      
         $sdkKey=array();
         $sdk=array();
         $number=count($set);
        foreach ($options[0] as $key => $value) {
          if($number == 2) {
             $Exp[]=array(
                $set[0]              =>$key,
                $set[1]              =>$value,
                );
          }


        }
        $renderer = new tatiyeNetTabelRaw($Exp);
        $renderer->showHeaders(true);
        print '<pre>';
        print "\n";
        $renderer->render(false,$set);
        print "\n";
        print '</pre>';
     }
      public static function tabelRawHeader($options,$set){
      $renderer = new tatiyeNetRawHeader($options);
      $renderer->showHeaders(true);
      $renderer->render(false,$set);
      }
    /*
    |--------------------------------------------------------------------------
    | Initializes tabelRaw 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function tabelRawset($options,$header='',$footer='',$xheader=''){
       $renderer = new tatiyeNetRawset($options);
       $renderer->showHeaders(true);
        print '<pre>';
        print "\n";
        $renderer->render(false,$header,$footer,$xheader);
         print "\n";
        print '</pre>';
    }
    /* and class tabelRaw */

    public static function WJT($options='',$key=''){
        if(is_array($options)) {
             return Wjt::init()->array($options)->Encode();
        } else {
            if (!empty($key)) {
                return Wjt::init()->token($options)->Decode($key);
            } else {
               return Wjt::init()->token($options)->code();
            }   
        }
    }
        /*
    |--------------------------------------------------------------------------
    | Initializes headeUtf 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function headeUtf8(){
         header('Content-type:application/json;charset=utf-8');
    }
    /* and class headeUtf */
    /*
    |--------------------------------------------------------------------------
    | Initializes AsciiTable 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function AsciiTable($key=''){
        $database='demo';
        return AsciiTable::init($database);
        
    }
    /* and class AsciiTable */
    /*
    |--------------------------------------------------------------------------
    | Initializes idOorder 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function idOorder($key,$id,$date){
          return $key.$id.date('Ymd', strtotime($date, strtotime(date("y/m/d")))); 
        
    }
    /* and class idOorder */

    public static function userActiv($lastactivity){
              if(time() > $lastactivity+600){
                $onlineStats = "Offline";
              }else if(time() < $lastactivity+600){
                 $onlineStats = "Online";
              }
              return $onlineStats;
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes fetchUserID 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function fetchUserID($key=''){
     $cek=tatiye::dbtabel()->show_tabelName('appuserprofil');
     if (!empty($cek[0]["tabel"])) {
         $user=self::fetch('appuserprofil',"id,nama AS name ,avatar,email,telepon,alamat,status","userid='".$key."'");
        $userApp=self::fetch('appuser',"loginattempts","id='".$key."'");
        if (!empty($user['avatar'])) {
            $avatar=$user['avatar'];
        } else {
            $avatar='images/admin.jpeg';
        }
            $ID=explode(' ',$user['name']);
        
        $Expuid=array(
           'inid'     =>$user['id'],
           'userid'   =>$key,
           'name'     =>$user['name'],
           'pic'      =>$ID[0],
           'avatar'   =>tatiye::LINK($avatar),
           'uidkey'   =>$userApp['loginattempts'],
           'email'    =>$user['email'],
           'telepon'  =>$user['telepon'],
           'addres'  =>$user['alamat'],
           'uidsts'  =>$user['status'],
           );
     } else {
            $rowdev=tatiye::userDev();
              $ID=explode(' ',$rowdev['name']);
              $Expuid=array(
               'inid'     =>$rowdev['userid'],
               'userid'   =>$key,
               'name'     =>$rowdev['name'],
               'pic'     =>$rowdev['name'],
               'avatar'   =>$rowdev['avatar'],
               'uidkey'   =>$rowdev['loginattempts'],
               'email'    =>$rowdev['email'],
               'telepon'  =>$rowdev['telepon'],
               'addres'  =>false,
               'uidsts'  =>'Development',
               );
        }
        
        
  
        return $Expuid;
        
    }
    /* and class fetchUserID */
    /*
    |--------------------------------------------------------------------------
    | Initializes htmlClass 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function htmlClass($key){
          // return tatiyeAssets::;
        
    }
    /* and class htmlClass */

    public static function fetchArrayTabel($key){
     $cek=tatiye::dbtabel()->show_tabelName('appuserprofil');
     if (!empty($cek[0]["tabel"])) {
        $user=self::fetch('appuserprofil',"nama AS name ,avatar,email,telepon","userid='".$key."'");
        if (!empty($user['avatar'])) {
            $avatar=$user['avatar'];
        } else {
            $avatar='images/admin.jpeg';
        }
        $Expuid=array(
           $key,
           $user['name'],
           tatiye::LINK('images/'.$avatar),
           $user['email'],
           $user['telepon'],
           );
     } else {
            $rowdev=tatiye::userDev();

              $Expuid=array(
                 $key,
                 $user['name'],
                 $user['avatar'],
                 $rowdev['email'],
                 $rowdev['telepon'],
               );
     }
 return $Expuid;


        
    }
    /* and class fetchUserID */

      /*
    |--------------------------------------------------------------------------
    | Initializes fetchUserID 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function fetchUserIDTabel($key){
     $cek=tatiye::dbtabel()->show_tabelName('appuserprofil');
     if (!empty($cek[0]["tabel"])) {
        $user=self::fetch('appuserprofil',"nama AS name ,avatar,email,telepon","userid='".$key."'");
        if (!empty($user['avatar'])) {
            $avatar=$user['avatar'];
        } else {
            $avatar='images/admin.jpeg';
        }
        
        $Expuid=array(
           $key,
           $user['name'],
           tatiye::LINK('images/'.$avatar),
           $user['email'],
           $user['telepon'],
           );
     } else {
            $rowdev=tatiye::userDev();

              $Expuid=array(
                 $key,
                 $user['name'],
                 $user['avatar'],
                 $rowdev['email'],
                 $rowdev['telepon'],
               );
     }
     return $Expuid;
        
    }
    /* and class fetchUserID */
    /*
    |--------------------------------------------------------------------------
    | Initializes Assets 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Assets($key){

         return tatiyeAssets::init(self::eksfile($key),$key);
        
    }
    /* and class Assets */
    /*
    |--------------------------------------------------------------------------
    | Initializes AssetsBase 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function AssetsBase($link){
          $external=explode('://',$link);
          if ($external[0]=='https') {
              $baseLink=$link;
          } else {
              $baseLink=tatiye::LINK($link);
          }
          return $baseLink;
        
    }
    /* and class AssetsBase */
    /*
    |--------------------------------------------------------------------------
    | Initializes AssetsBase 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function AssetsImport($link){
          $external=explode('://',$link);
          if ($external[0]=='https') {
              $baseLink=$link;
          } else {
              $baseLink=tatiye::LINK('modules/'.$link);
          }
          return $baseLink;
        
    }
    /* and class AssetsBase */
    /*
    |--------------------------------------------------------------------------
    | Initializes iconDeva 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function iconDrive($key){
    /* and class iconDeva */
      if ($key=='png') {
       $icon='tx-orange far fa-file-image';
    } else if ($key=='jpg') {
       $icon='tx-purple far fa-file-image';
    } else if ($key=='docx') {
       $icon='tx-primary far fa-file-word'; 
    } else if ($key=='ppt') {
       $icon='tx-orange far fa-file-powerpoint';
    } else if ($key=='pptx') {
       $icon='tx-orange far fa-file-powerpoint';
    } else if ($key=='pdf') {
       $icon='tx-danger far fa-file-pdf';
    } else if ($key=='xlsx') {
       $icon='tx-success far fa-file-excel';
    } else {
       $icon='tx-gray-600 far fa-file-alt';
    } 
    return $icon;
}
/*
|--------------------------------------------------------------------------
| Initializes title 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function iconData($key,$red=''){
       if($key == 'images') {
          $setAddImg=tatiye::LINK('assets/images/images.svg');
       } elseif ($key == 'drive'){
          $setAddImg=tatiye::LINK('assets/images/Drive.png'); 
       } elseif ($key == 'data'){
          $setAddImg=tatiye::LINK('assets/images/data.png'); 
       } else {
           $setAddImg=tatiye::LINK('assets/images/anomous.png'); 
       }
      return $setAddImg;
    
}
/* and class title */
  /*
  |--------------------------------------------------------------------------
  | Initializes useHandelID 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function useHandelID($tabel,$key,$useHandel='',$itemkey=''){
      //if($tabel == 'appfile') {
        //$WH="id='".$key."'";
      //} else {
        $WH="id='".$key."'";
      //}
        $row=self::fetch($tabel,"*",$WH);
        if (!empty($useHandel)) {
              $natKey=$useHandel;
        } else {
           if (!empty($row['userid'])) {
              $natKey='userid';
           } else {
              $natKey='user_id';
           }
        }

        $Expuid=self::fetchUserID($row[$natKey]);
        $Exp= array_merge($row,$Expuid);
        return $Exp;
      
  }
  /* and class useHandelID */

 public static function useHandelIDKey($tabel,$key,$nat){
         $row=self::fetch($tabel,"*","$nat='".$key."'");
         if ($nat=='id') {
            $natKey='userid';
         } else {
            $natKey=$nat;
         }
         $Expuid=self::fetchUserID($row[$natKey]);
         $Exp= array_merge($row,$Expuid);
         return $Exp;
  }
  /*
  |--------------------------------------------------------------------------
  | Initializes useHandelCount 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function useHandelCount($tabel,$key){
        $row=self::fetch($tabel,"COUNT(*) as count","$key");
        return $row;
      
  }
  /* and class useHandelCount */
  /*
  |--------------------------------------------------------------------------
  | Initializes useHandelSheet 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function useHandelSheet($tabel,$key,$userid='userid'){
    $query="SELECT * FROM ". $tabel . " WHERE  $key  ";
   
    $stmt=tatiye::QY($query); 

     $products_arr=array();
     while ($row = $stmt->fetch()) { 
        $Expuid=self::fetchUserID($row[$userid]);
        $product_item=array_merge($row,$Expuid);
        array_push($products_arr, $product_item);
     }
     return $products_arr;

      
  }
  /* and class useHandelSheet */


  /*
  |--------------------------------------------------------------------------
  | Initializes openSell 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function uidSSL($password){
             $key_enc =tatiye::ssoId('userid'); //key for encrypt
             $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
             $iv = '16_characters'; //a random string with 16 characters
             @$pass_enc = openssl_encrypt($password, $met_enc, $key_enc, 0, $iv);
             @$ID=explode('==',$pass_enc);
             return  $ID[0]; 
       
  }
    public static function uidSSLKey($password){
              $key_enc = tatiye::ssoId('userid'); //key for encrypt
              $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
              $iv = '16_characters'; //a random string with 16 characters
             @$pass = openssl_decrypt($password, $met_enc, $key_enc, 0, $iv);
             return  $pass; 
        
  }
  /* and class openSell */

  /*
  |--------------------------------------------------------------------------
  | Initializes openSell 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function openSSL($password,$setkey=''){
         if (!empty(tatiye::ssoId('userid'))) {
             $key_enc =tatiye::ssoId('userid'); //key for encrypt
             $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
             $iv = '16_characters'; //a random string with 16 characters
         } else {
              $key_enc = $setkey; //key for encrypt
              $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
              $iv = '16_characters'; //a random string with 16 characters
         }

        if (!empty($setkey)) {
             $pass = openssl_decrypt($password, $met_enc, $key_enc, 0, $iv);
             return  $pass; 
        } else {
             $pass_enc = openssl_encrypt($password, $met_enc, $key_enc, 0, $iv);
             $ID=explode('==',$pass_enc);
             return  $ID[0]; 
        }
  }
    public static function openSSLKey($password,$setkey=''){
         // if (!empty(tatiye::ssoId('userid'))) {
         //     $key_enc =tatiye::ssoId('userid'); //key for encrypt
         //     $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
         //     $iv = '10_characters'; //a random string with 16 characters
         // } else {
              $key_enc = '1'; //key for encrypt
              $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
              $iv = '16_characters'; //a random string with 16 characters
         // }
        if (!empty($setkey)) {
             $pass = openssl_decrypt($password, $met_enc, $key_enc, 0, $iv);
             return  $pass; 
        } else {
             $pass_enc = openssl_encrypt($password, $met_enc, $key_enc, 0, $iv);
             $ID=explode('==',$pass_enc);
             return  $ID[0]; 
        }
  }
  /* and class openSell */
    public static function privateKey($kunci,$setkey=''){

         // if (!empty(tatiye::ssoId('userid'))) {
         //     $key_enc =tatiye::ssoId('userid'); //key for encrypt
         //     $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
         //     $iv = '10_characters'; //a random string with 16 characters
         // } else {
              $key_enc =$kunci['password']; //key for encrypt
              $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
              $iv = '16_characters'; //a random string with 16 characters
         // }

             $newToken=tatiye::WJT($kunci['details']);
             $pass_enc = openssl_encrypt($kunci['license'], $met_enc, $key_enc, 0, $iv);
          
          $Header = [['title'=>'     -----BEGIN  PUBLIC KEY-----']];
          $body[] =array(""=>chunk_split($pass_enc, 45, "\n"));
          $footer = [['title' =>'     -----END  PUBLIC KEY-------']];
          tatiye::tabelRawSell($body,$Header,$footer);



          $Header2 = [['title'=>'     -----BEGIN  PRIVATE KEY-----']];
          $body2[] =array(""=>chunk_split($newToken, 45, "\n"));
          $footer2 = [['title' =>'     -----END  PRIVATE KEY-------']];
          tatiye::tabelRawSell($body2,$Header2,$footer2);


             // return $newToken; 
      
  }

    public static function privateKey3($kunci,$setkey=''){

         // if (!empty(tatiye::ssoId('userid'))) {
         //     $key_enc =tatiye::ssoId('userid'); //key for encrypt
         //     $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
         //     $iv = '10_characters'; //a random string with 16 characters
         // } else {
              $key_enc =$kunci['license']; //key for encrypt
              $met_enc = 'aes128'; //method to encrypt: aes128, aes192, aes256, blowfish, cast-cbc
              $iv = '16_characters'; //a random string with 16 characters
         // }
        // if (!empty($setkey)) {
        //      $pass = openssl_decrypt($password, $met_enc, $key_enc, 0, $iv);
        //      return  $pass; 
        // } else {
             $newToken=tatiye::WJT($setkey);
             $pass_enc = openssl_encrypt($kunci['password'], $met_enc, $key_enc, 0, $iv);
             $ID=explode('==',$pass_enc);
             return $ID[0]; 
        // }
  }
    /*
  |--------------------------------------------------------------------------
  | Initializes dirFile 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function appfile($payload){
      if ($payload['upload']=='profil') {
            $setDir='images/profil';
        } else {
            $setDir=$payload['upload'];
        }
       $dir           =$setDir;                                          
       $id            =$payload['setId'];                                        
       $setUId        =$payload['setUId'];                                         
       $entri         =$payload['file'];                                              
       $image_parts   =$payload['base64'];
       $tabel         =$payload['tabel'];

      


   if ($payload['upload']=='profil') {
     if (!file_exists(tatiye::dir()."/public/$dir/".$id)) {
         @mkdir(tatiye::dir()."/public/$dir/".$id, 0777);
         exit;
     }
    $filename     =end(explode('/',$entri));
    $target_dir = tatiye::dir()."/public/$dir/".$id."/$filename";
  } else {
     if (!file_exists(tatiye::dir()."/public/$dir/".tatiye::dt("Y")."/".tatiye::dt("M")."/".$id)) {
         @mkdir(tatiye::dir()."/public/$dir/".tatiye::dt("Y"), 0777);
         @mkdir(tatiye::dir()."/public/$dir/".tatiye::dt("Y")."/".tatiye::dt("M"), 0777);
         @mkdir(tatiye::dir()."/public/$dir/".tatiye::dt("Y")."/".tatiye::dt("M")."/".$id, 0777);
         exit;
     }
    $filename     =end(explode('/',$entri));
    $target_dir = tatiye::dir()."/public/$dir/".tatiye::dt("Y")."/".tatiye::dt("M")."/".$id."/$filename";
  }
  




  if (!file_exists($target_dir)) {


 $image_base64 = base64_decode($image_parts);
 file_put_contents($target_dir, $image_base64);
 $type=tatiye::eksfile($entri);
 $db=new tatiye();
  if ($payload['upload']=='profil') {
     $filename='images/profil/'.$id."/$filename";
     $data = array(                                                                      
       "avatar"     =>$filename,                                                        
     );                                                                                 
      $result=$db->que($data)->update("appuserprofil","id =$id AND userid=$setUId"); 
      
      $val["hasil"]    ="sukses";    
 } else {
   $filename=$dir.'/'.tatiye::dt("Y")."/".tatiye::dt("M")."/".$id."/$filename";
 }
 
 $Exp=array(
         "userid"   =>$setUId,
         "keyid"    =>$id,
         "nmtabel"  =>$tabel,
         "filename" =>$filename,
         "categori" =>$payload['upload'],
         "fileType" =>$type,
         "time"     =>tatiye::tm(),
         "date"     =>tatiye::dt("EN"),
         "bulan"    =>tatiye::dt("M"),
         "tahun"    =>tatiye::dt("Y"),
     );
     $result=$db->que($Exp)->insert("appfile");

  }
  }
  /* and class dirFile */

  /*
  |--------------------------------------------------------------------------
  | Initializes uidkey 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function uidkey(){
        return tatiye::ssoId('userid');
  }
  /* and class uidkey */
   /*
   |--------------------------------------------------------------------------
   | Initializes date 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function tm($data=''){
      date_default_timezone_set(TIMEZONE);
      if (!empty($data)) {
         if($data == 'Time') {
           return tatiyeNetTime::init($data);
         } elseif ($data == 'c'){
          return tatiyeNetTime::init($data);
         } elseif ($data == 'zona'){
            return tatiyeNetTime::init($data);
         } else {
            return tatiyeNetTime::TimeSet($data);
         }
      } else {
         return date("h:i:sa");
      }  
   }
   /* and class date */

  /*
  |--------------------------------------------------------------------------
  | Initializes st 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  
  */
  public static function st($key,$Set=''){
        if (is_numeric($key)) {
           return tatiyeNetDateTime::Strtodate($key);
        } else {
            $CEK =self::stristrText(['/','-'],$key);
            if ( !empty( $CEK ) && !empty( $key ) ) { 
            $ID=explode($CEK,$key);
            }
            if (!empty($ID[0])) {
                return tatiyeNetDateTime::Strtotime($key);
            } else {
            
                
                  $CEK1 =self::stristrText(['days','month','year','MNT'],$key);
                  return tatiyeNetDateTime::$CEK1($key,$Set);
                
            }
            
        }
        
      // return ;
  }
  /*
  |--------------------------------------------------------------------------
  | Initializes month 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function month($month){
        switch ($month) { 
        case '01':{$BULAN='Januari'; }break;
        case '02':{$BULAN='Februari';}break;
        case '03':{$BULAN='Maret';  }break;
        case '04':{$BULAN='April'; }break;
        case '05':{$BULAN='Mei'; }break;
        case '06':{$BULAN='Juni'; }break;
        case '07':{$BULAN='Juli'; }break;
        case '08':{$BULAN='Agustus'; }break;
        case '09':{$BULAN='September'; }break;
        case '10':{$BULAN='Oktober'; }break;
        case '11':{$BULAN='November'; }break;
        case '12':{$BULAN='Desember'; }break;
      }
      return $BULAN;
      
  }
    public static function monthEn($month){
        switch ($month) { 
        case '01':{$BULAN='Jan'; }break;
        case '02':{$BULAN='Feb';}break;
        case '03':{$BULAN='Mar';  }break;
        case '04':{$BULAN='Apr'; }break;
        case '05':{$BULAN='Mei'; }break;
        case '06':{$BULAN='Jun'; }break;
        case '07':{$BULAN='Jul'; }break;
        case '08':{$BULAN='Agu'; }break;
        case '09':{$BULAN='Sep'; }break;
        case '10':{$BULAN='Okt'; }break;
        case '11':{$BULAN='Nov'; }break;
        case '12':{$BULAN='Des'; }break;
      }
      return $BULAN;
      
  }
  public static function monthEnTicks($month){
      //   switch ($month) { 
      //   case '0'  :{0 ='';    }break;
      //   case '8'  :{01='Jan'; }break;
      //   case '20' :{02='Feb'; }break;
      //   case '32' :{03='Mar'; }break;
      //   case '44' :{04='Apr'; }break;
      //   case '56' :{05='Mei'; }break;
      //   case '68' :{06='Jun'; }break;
      //   case '80' :{07='Jul'; }break;
      //   case '92' :{08='Agu'; }break;
      //   case '104':{09='Sep'; }break;
      //   case '116':{10='Okt'; }break;
      //   case '128':{11='Nov'; }break;
      //   case '140':{12='Des'; }break;
      // }
      // return $BULAN;
      
  }
             
  /* and class month */
  public static function Ft($key,$Set=''){
        if (is_numeric($key)) {
            return tatiyeNetDateTime::Strtodate($key);
        } else {
            $CEK =self::stristrText(['/','-'],$key);
            if ( !empty( $CEK ) && !empty( $key ) ) { 
            $ID=explode($CEK,$key);
          }
            if (!empty($ID[0])) {
                return tatiyeNetDateTime::Strtotime($key);
            } else {
                $CEK1 =self::stristrText(['D','M','Y'],$key);
                if (!empty($CEK1)) {
                 
                  return tatiyeNetDateTime::$CEK1($Set);
                } else {
                   return tatiyeNetDateTime::$key($Set);
                }
                
                
            }

            
        }
  }
  public static function stristrText($H1,$teks,$H2=''){
   if (!empty($H1)) {
     $stristrText = $H1;
     $hasil =$H2;
     $jml_kata = count($stristrText);
     for ($i=0;$i<$jml_kata;$i++){
      if (stristr($teks,$stristrText[$i]))
        { 
          $hasil=$stristrText[$i]; 
        }
     }
      return $hasil;
     } else {
      return '';
     }
   }

   /*
   |--------------------------------------------------------------------------
   | Initializes dt 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
  public static function dt($Exp='',$Set=''){
     date_default_timezone_set(TIMEZONE);
     if (!empty($Exp)) {
        if ($Exp=='EN') {
            return date('Y/m/d');  
         } elseif ($Exp=='IN'){
           return date('d/m/Y');  
         }  else {
          return tatiyeNetDate::init($Exp);   
         }
     } else {
           return date('Y/m/d');  
     }
  }
   /* and class dt */
   /*
   |--------------------------------------------------------------------------
   | Initializes route 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function route($key){
    if (file_exists(APPROOT.'/views/'.self::tn(0).'/'.self::tn(1).'.html')) {
      return self::tn(0).'/'.self::tn(1);
    } else {
      return $key;
    }
   }
   /* and class route */
   /*
   |--------------------------------------------------------------------------
   | Initializes pecType 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function pecType($key=''){
         return 'html';
       
   }
   /* and class pecType */
   /*
   |--------------------------------------------------------------------------
   | Initializes routePackage Saat Di refresh Page
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  Saat Di refresh Page
   */
   public static function routePackage($key=''){
      $Text=tatiye::Text();
      $IDPAGE=explode(self::tn(0),$_GET['url']);
      $IDPAGE1=explode('_',$IDPAGE[1]);
      $IDPAGE2=explode('/',$key);
      $type='html';
       // echo 'routePackage='.$IDPAGE2[0];
        $IDdevices=explode('/',$IDPAGE2[0]); 
       if (self::useLisnsiPackage($IDdevices[0])==1) {
        if ($IDPAGE2[0]=='users') {
           return self::dir('public/package/default.html');
        } else {
         return self::dir('public/dashboard/lisnsi.html');
        }
     } else {
      if (file_exists(self::dir('public/package/'.$IDPAGE1[0].'.'.$type))) {
        return self::dir('public/package/'.$IDPAGE1[0].'.'.$type);
      } else {
           $default=self::dir('public/package/'.$key.'.'.$type);
           $IDdefault=explode('package/',$default);
           if ($IDdefault[1]=='default.html') {
             return self::dir('public/package/'.$key.'.'.$type);
           } else {
             return self::dir('public/package/'.$key.'.'.$type);
           }
      }
  }
}

// public/package
// vendor/tatiye
   /* and class routePackage vendor/tatiye */

   /*
   |--------------------------------------------------------------------------
   | Initializes routePanel refresh Page Ajax
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  routePanel refresh Page Ajax
   */
   public static function routePanel($key){
          $type='html';
         // echo 'routePanel= '.$key;
              $IDdevices=explode('/',$key);
       if (self::useLisnsiPackage($IDdevices[0])==1) {
         return self::dir('public/dashboard/lisnsi.html');
     } else {

          if (file_exists(self::dir('public/package/'.$key.'.'.$type))) {
             return self::dir('public/package/'.$key.'.'.$type);
          } else {
            if (file_exists(self::dir('public/package/'.$key))) {
              if (!empty($key)) {
               return self::dir('public/package/'.$key.'/default.'.$type);
              } else {
                return self::dir('public/package/default.html');
              }
            } else {
                // code...
             return self::dir('public/package/default.'.$type);
            }
          }
      }
   }
   /* and class routePanel */

   /*
   |--------------------------------------------------------------------------
   | Initializes forbidden 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function setForbidden($setKey=''){
       if (!empty($setKey)) {
           $tn=$setKey;
       } else {
          $tn=self::tn(1);
       }
       $packageKey='';
       $rbac=Package::Public();
       foreach ($rbac as $key => $value) {
         if ($tn==$value[1]) {
            $packageKey=$packageKey.$key;
         }
       }
       if (!empty(tatiye::ssoId('userid'))) {
            $uid=tatiye::ssoId('userid');
            $row=tatiye::fetch("appuserpackage","packageid","packageid='".$packageKey."'  AND userid='".$uid."'");
           if (!empty($row['packageid'])) {
              return true;
           } else {
                if (self::tn(1)=='') {
                     return true;
                } else {
                   if (tatiye::ssoId('userid')==1) {
                      return true;
                   } else {
                      return false;
                   }   
                }
           }
       } else {
            return false;
            // code...
        
       }
   }
   /* and class forbidden */
    /*
    |--------------------------------------------------------------------------
    | Initializes Protokol 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function Protokol(){
          return tatiyeNetProtokol::httpServer();
        
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes mobile 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function mobile(){
        $setApp = file_get_contents(tatiye::expDir("public/theme/package.json"));
        $arr=json_decode($setApp, true);
        if (!empty($arr['app']['mobile'])) {
           return 'mobile';
        } else {
           return 'theme';
        }
        
        
    }
    /* and class mobile */


   /*
   |--------------------------------------------------------------------------
   | Initializes statusUser 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function statusHeader(){
        if (tatiye::ssoId('uidsts')=='admin') {
            return self::expDir('public/dashboard/inc/header.html');
         } else {
            return self::expDir('public/dashboard/inc/client.html');
         }  
   }
   /* and class statusUser */
   /*
   |--------------------------------------------------------------------------
   | Initializes login 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function login(){
    return signin::init();
   }
   /* and class login */
   /*
   |--------------------------------------------------------------------------
   | Initializes title 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function registrasi(){
       return signup::init();
       
   }
   /* and class title */

      /*
   |--------------------------------------------------------------------------
   | Initializes title 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function profil(){
       return profil::init();
       
   }
   /* and class title */

   /*
   |--------------------------------------------------------------------------
   | Initializes Text 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
    public static function  Text(){
          return new Text();
     }

   /* and class Text */
    /*
    |--------------------------------------------------------------------------
    | Initializes tn 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function tn($key){
            @$ID=explode('/',$_GET['url']);
            if (!empty($ID[$key])) {
               return $ID[$key];
            } else {
               return '';
            }
    }
    /* and class tn */

    /*
    |--------------------------------------------------------------------------
    | Initializes fileType 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function  setfileType($file,$ekstensi='',$call=''){

             if ($file=='docx') {
                  $myIcon='https://img.freepik.com/free-icon/word_318-674258.jpg';
              } elseif ($ekstensi=='doc') {
                  $myIcon='https://img.freepik.com/free-icon/word_318-674258.jpg';
             
              } elseif ($ekstensi=='pdf') {
                   $myIcon='https://cdn-icons-png.flaticon.com/512/179/179483.png';
              } elseif ($ekstensi=='xlsx') {
                  $myIcon='https://img.freepik.com/free-icon/excel_318-566085.jpg';
              } elseif ($ekstensi=='pptx') {
                  $myIcon='https://img.freepik.com/free-icon/powerpoint_318-674249.jpg';
              } elseif ($ekstensi=='csv') {
                   $myIcon='https://img.freepik.com/free-icon/excel_318-566085.jpg';
              } elseif ($ekstensi=='odes') {
                   $myIcon='https://img.freepik.com/free-icon/excel_318-566085.jpg';
              } else {
                  $myIcon='https://cdn-icons-png.flaticon.com/512/179/179483.png';
              }
             return $myIcon;
        
    }
    /* and class fileType */

   /*
   |--------------------------------------------------------------------------
   | Initializes entri 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function entri(){
       if (@$this->tabel['tabel']) {
          if (tatiye::dbtabel()->cek_tabel($this->tabel['tabel'])) {
             return entri::init($this->tabel['tabel']); 
          } else {
             return self::index();
          }
       } else {
        return self::index();
       }
      
   }
   /* and class entri */
   /*
   |--------------------------------------------------------------------------
   | Initializes sqli 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function sqli($SELECT){
     $db = new tatiye();
     $mysqli=$db->mysqli();
     $sql =$SELECT;
     $result = $mysqli -> query($sql);
     return $result;
       
   }
   /* and class sqli */

   public  function select(){
       if (@$this->tabel['tabel']) {
          if (tatiye::dbtabel()->cek_tabel($this->tabel['tabel'])) {
             return setSelect::init($this->tabel['tabel']); 
          } else {
             return self::index();
          }
       } else {
        return self::index();
       }


   }
   /* and class entri */
   /*
   |--------------------------------------------------------------------------
   | Initializes APIV3 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function restV3($key){
    $Text=tatiye::Text();
        $METHOD=$_SERVER['REQUEST_METHOD'];
        self::headerContent($METHOD);
    if ($_SERVER['REQUEST_METHOD'] ==$METHOD) {
      $IDPEC=explode('/',$key);
      $page=$Text->strreplace([$key,$IDPEC[0],$IDPEC[0].'/Api']).'.php';
      require_once self::dir('public/package/'.$page);

     } else {
        return self::index();
     }
     
   }
   /* and class APIV3 */

   public  function rest(){
    $Text=tatiye::Text();
        $METHOD=$_SERVER['REQUEST_METHOD'];
        self::headerContent($METHOD);
    if ($_SERVER['REQUEST_METHOD'] ==$METHOD) {
            //error_reporting(0);
            $IDPEC=explode('/',$this->tabel['tabel']);
            if ($IDPEC[0]=='package') {
                $IDROUTE=explode('v1',$_GET['url']);
                require_once self::dir().'public'.$IDROUTE[1].'.php';
            } else {
               if (self::tn(1)=='v2') {
                  $row=tatiye::getWJT($this->tabel['tabel']);
                  $validasiToken=$row['dir']??=false;
                  if ($validasiToken) {
                     require_once self::dir('public/package/'.$row['dir']);
                  } else {
                     return self::index();
                  }
                } else {
                  require_once APPROOT.'/helpers/Rest/'.$this->tabel['tabel'].'.php';
                }   
            }
    } else {
         return self::index();
         
                // } elseif (self::tn(1)=='license'){
                //     echo "string";
                  
             

    }

   }

    /*
    |--------------------------------------------------------------------------
    | Initializes getWJT 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function getWJT($token){
             $GetID=tatiye::WJT($token); 
            return $GetID;
    }
    /* and class getWJT */


   /* and class entri */
    public static function URL($seg=''){
           if (!empty($seg)){
              $Exp="/".$seg;
           }else{
              $Exp="";
           }
           if (!empty(tatiye::ssoId('sub_domain'))) {
               return URLROOT.'/'.tatiye::ssoId('sub_domain').$Exp;
           } else {
               return URLROOT.$Exp;
           }
    }

    public static function LINK($seg=''){
           if (!empty($seg)){
              $Exp="/".$seg;
           }else{
              $Exp="";
           }
     
         return URLROOT.$Exp;
          
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes query 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 24 Mar 2022 11:18:48  WITA 
    */
    public  function query($sql,$version=''){
        if ($result = mysqli_query(self::connect(), $sql)) {
           return $result;
          mysqli_free_result($result);
        }
        self::connect()-> close();
    }
    /* and class query */



    /*
    |--------------------------------------------------------------------------
    | Initializes delete 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function delete($table,$where){
          $conn=Database::connectWriteDB();
          $query="DELETE FROM $table WHERE $where";
          $conn->exec($query);
          return false;
    }
    /* and class delete */
    public  function PDO() {
        $this->db=Database::connectWriteDB();
        return $this->db;
    }
    /* and class PDO */
 /*
 |--------------------------------------------------------------------------
 | Initializes validation 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2021
 | @Date  
 */
 public static function val($options,$H1='',$H2='',$H3='',$H4='',$H5=''){
          $set= new tatiyeNetValidation();
          if (!empty($H2)) {
            return $set->$options($H1,$H2,$H3,$H4,$H5);
          } else {
            return $set->$options($H1,$H2,$H3,$H4,$H5);
          }
          
 }
 /* and class validation */
 /*
 |--------------------------------------------------------------------------
 | Initializes cekValidation 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2021
 | @Date  
 */
 public static function validation($validasi,$segment=''){
       foreach ($validasi as $key => $value) {
          if ($value=='valid') {
               $val['sukses'][$key] = $value; 
          } else {
              if ($validasi[$key]['status']=='valid') {
                  $val['sukses'][$key] = $validasi[$key]; 
              } else {
              $val['error'][$key] =$value;; 
                  // code...
              }
            
          }
       }
  return $val;
 }
    /* and class cekValidation */
   /*
   |--------------------------------------------------------------------------
   | Initializes Firebase 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function Firebase($tabel){
         return Firebase::init($tabel);
       
   }
   /* and class Firebase */

   /*
    |--------------------------------------------------------------------------
    | Initializes query 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 24 Mar 2022 11:18:48  WITA 
    */
    public  function que($result){
          return db::init()->result($result);
    }
    /* and class query */




    /*
    |--------------------------------------------------------------------------
    | Initializes DBTabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  Sel 02 Mei 2023 01:42:28  WITA
    */
    public static function setPDO($tabel,$bin='*',$where='',$limit='LIMIT 100'){
        $conn=Database::connectWriteDB();;
        if (!empty($where)) {
            $IDWH=explode(' ',$where);
             if($IDWH[0] == 'JOIN') {
                $WH="$where";
             
              } elseif ($IDWH[0] == 'GROUP'){
                 $WH="$where";
             } else {
                $WH="WHERE $where";
             }
        } else {
            $WH='';
        }
        if (!empty($limit)) {
            $LMT='';
        } else {
            $LMT='LIMIT 50';
        }
        $query = "SELECT $bin FROM $tabel  $WH ";
        $stmt =$conn->prepare($query);
        $stmt->execute();
        return $stmt; 
    }
    /* and class DBTabel */
    public static function setPDO1($query){
        $conn=Database::connectWriteDB();;
        $stmt =$conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;

    }
   /*
   |--------------------------------------------------------------------------
   | Initializes BQ 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function QY($query){
        $conn=Database::connectWriteDB();
        $stmt =$conn->prepare($query);
        $stmt->execute();
        return $stmt;
   }
   /* and class BQ */
   public static function BQ($query){
        $conn=Database::connectWriteDB();
        $stmt =$conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         return $row;
   }
   /* and class BQ */
   public static function count($tabel){
         $stmt =self::setPDO1($tabel); 
         $row = $stmt->fetchAll(PDO::FETCH_CLASS);
         return $row;
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes rangeColor 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function rangeColor($for,$set){
           $array=self::indexJson('bg_color'); 
           $Exp=array();
           $data=$array['count'];
           $x =1;
           $i=0;
          while($x <= $for) {
                  $i=$i+1;
                for($j = 0; $j < $data; $j++){
                    $range[]=$j-1;
                }
           
              $Exp[$x]=$array['data'][abs($range[$i])];
             
            $x++;
          }
        return $Exp[$set]; 
    }


    public static function imgPlaceholder($for,$set){
       $array=array( 
          '0'  =>'images/img/01.png',
          '1'  =>'images/img/02.png',
          '2'  =>'images/img/03.png',
          '3'  =>'images/img/04.png',
          '4'  =>'images/img/05.png',
          '5'  =>'images/img/06.png',
          '6'  =>'images/img/07.png',
          '7'  =>'images/img/08.png',
          '8'  =>'images/img/09.png',
          '9'  =>'images/img/10.png',
       ); 
           $Exp=array();
           $data=10;
           $x =1;
           $i=0;
          while($x <= $for) {
                  $i=$i+1;
                for($j = 0; $j < $data; $j++){
                    $range[]=$j-1;
                }
              $Exp[$x]=$array[abs($range[$i])];
             
            $x++;
          }
        return $Exp[$set];
    }

    public static function color3($for,$set){
       $array=array( 
          "0"=>"#0168fa",
          "1"=>"#6f42c1",
          "2"=>"#ffc107",
          "3"=>"#f10075",
          "4"=>"#10b759",
          "5"=>"#00cccc",
          "6"=>"#5b47fb",
          "7"=>"#dc3545",
          "8"=>"#00b8d4",
          "9"=>"#fd7e14",
          "10"=>"#7987a1",
          "11"=>"#3b4863",
          "12"=>"#0168fa",
          "13"=>"#7987a1",
          "14"=>"#10b759",
          "15"=>"#00b8d4",
          "16"=>"#ffc107",
          "17"=>"#dc3545",
          "18"=>"#f4f5f8",
          "19"=>"#3b4863",
          "20"=>"#494949",
       ); 
           $Exp=array();
           $data=9;
           $x =1;
           $i=0;
          while($x <= $for) {
                  $i=$i+1;
                for($j = 0; $j < $data; $j++){
                    $range[]=$j-1;
                }
              $Exp[$x]=$array[abs($range[$i])];
             
            $x++;
          }
        return $Exp[$set];
    }
    /* and class rangeColor */
    // '#f77eb9', '#7ebcff','#7ee5e5','#fdbd88'
    public static function color($for,$set){
       $array=array( 
          '0'  =>'#f77eb9',
          '1'  =>'#7ebcff',
          '2'  =>'#7ee5e5',
          '3'  =>'#fdbd88',
          '4'  =>'#65e0e0',
          '5'  =>'#69b2f8',
          '6'  =>'#6fd39b',
          '7'  =>'#fdb16d',
          '8'  =>'#c693f9',
       ); 
           $Exp=array();
           $data=9;
           $x =1;
           $i=0;
          while($x <= $for) {
                  $i=$i+1;
                for($j = 0; $j < $data; $j++){
                    $range[]=$j-1;
                }
              $Exp[$x]=$array[abs($range[$i])];
             
            $x++;
          }
        return $Exp[$set];
    }

      public static function indexJson($key){
          $setApp = file_get_contents(self::expDir("public/assets/index.json"));
          $arr=json_decode($setApp, true); 
               $Exp=array(
                  'count'=>count($arr['elements'][$key])+1,
                  'data'  =>$arr['elements'][$key],
                  );
               return $Exp;
 
      }
  
    
      public static function ticks($key){
       $array=array( 
          '1'  =>0,
          '2'  =>5,
          '3'  =>10,
          '4'  =>15,
          '5'  =>20,
          '6'  =>25,
          '7'  =>30,
          '8'  =>35,
          '9'  =>40,
          '10' =>45,
          '11' =>50,
          '12' =>55,  
       ); 
        return $array[$key]; 
  
    } 
      public static function df1($data,$row,$count=''){
          $Text=self::Text();
          $x=0;
          while($x <= 4) {
          $totalFd=round($data-$x/4*100,0);
         // $roundFd=round($totalFd/$count*100,0);
          $hasilFd=round($totalFd/$data*100,5);
          if (!empty($data)) {
            if ($hasilFd==100) {
                   $totalFd=round($data-1/4*100,0);
                   $hasilFd=round($totalFd/$data*100,5);
            $BIST=$hasilFd+1;
            } else {
                // code...
            $BIST=$hasilFd;
            }
            
          } else {
            $BIST=0;
          }
          
          $array1[$x]=array(
                  $row+$x.','.abs($BIST)
                 );
           $x++;
          }
         return $array1; 
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes chart 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
public static function chartTabel($tabel,$data,$where=''){
        // $db=new tatiye();
        // $Text=self::Text();
        // $no=0;
        // $str='';
        // $TAHUN=tatiye::dt('Y');
        // $Exp=array();
        // if (!empty($where)) {
        //    $setWH=$where;
        // } else {
        //    $setWH="row=1";
        // }
        
        // $QUERY="SELECT $data AS label ,COUNT(*) AS data FROM $tabel WHERE $setWH GROUP BY $data;";
        // $COUNT=tatiye::fetch($tabel," COUNT(*) as data");
        // $result=$db->query($QUERY);
        //  while($row=$result->fetch_assoc()){
        //          $no=$no+1; 
        //          $str=$str.$row['label'].',';
        //          $Exp[]=array(
        //             'no'                =>$no,
        //             'label'             =>$row['label'],
        //             'data'              =>$Text->numberFormat([$row['data'],0]),
        //             'charts'            =>$row['data'],
        //             'progress'          =>round($row['data']/$COUNT['data'] * 100).'%',
        //             'progress1'         =>round($row['data']/$COUNT['data'] * 100,1).'%',
        //             'progress2'         =>round($row['data']/$COUNT['data'] * 100,2).'%',
        //             'progress3'         =>round($row['data']/$COUNT['data'] * 100),
        //             'progress4'         =>round($row['data']/$COUNT['data'] *80),
        //             'color'             =>self::color($no-1),
        //             'tx_color'          =>self::txColor($no-1),
        //             'bg_color'          =>self::bgColor($no-1),
        //             'bg_wp'             =>self::bgColor($no-1).' wd-'.round($row['data']/$COUNT['data'] * 100).'p',
        //             'bd_wp'             =>self::bdColor($no-1).' wd-'.round($row['data']/$COUNT['data'] * 100).'p',
        //             'description'       =>$Text->beCalculated([$row['data'],'']),
        //             );
        //   };
        //   // $Exp[]=array('setLabel'=>$str); 
        //   return $Exp;    
} 
public static function chart($tabel,$data,$where='',$count,$range='19',$sum){
        $db=new tatiye();
        $Text=self::Text();
        $no=0;
        $str='';
        $Exp=array();
        $setWH="WHERE ".$where;
        $QUERY="SELECT $data AS label ,SUM($sum) AS data FROM $tabel  $setWH GROUP BY $data;";
        $result=$db->query($QUERY);
        while($row=$result->fetch_assoc()){
                 $no =$no+1; 
                 $Exp[]=array(
                   'id'                =>$no,
                   'no'                =>$no,
                   'bg'                =>'bg-'.self::rangeColor($range,$no),
                   'tx'                =>'tx-'.self::rangeColor($range,$no),
                   'clr'               =>self::color($range,$no),
                   'label'             =>$row['label'],
                   'data'              =>$row['data'],
                   "calculat"          =>$row['label'].' '.$Text->beCalculated([$row['data']]),
                   'format'            =>$Text->numberFormat([$row['data'],0]),
                   'progress'          =>round($row['data']/$count * 100,1).'%',
                   'peity'             =>round($row['data']/$count * 100).'0,500',
                   'wd'                =>'bg-'.self::rangeColor($range,$no).' wd-'.round($row['data']/$count * 100).'p' ,
                     );
         };

         return $Exp;
        
    }
    /* and class chart */
    /*
    |--------------------------------------peity------------------------------------
    | Initializes chartMonth 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function chartMonth($tabel,$data,$wh,$dt='',$countx=''){
         $Exp=array();
         $label='';
         $Text=self::Text();
         $i = 1;
         if (!empty($dt)) {
           $TAHUN=tatiye::dt('Y');
         } else {
           $TAHUN=tatiye::dt('Y');
         }
         while ($i < 13) {
           $BULAN=$Text->sprintf($i,"%02s");
           foreach ($data as $key => $value) {
            $myLabel=$value['label'];
             $QUERY="SELECT SUM($dt) AS data,date FROM $tabel WHERE tahun ='".$TAHUN."' AND bulan ='".$BULAN."' AND $wh='".$myLabel."' ORDER BY id DESC ";
             // $monthQUERY="SELECT COUNT(*) AS data FROM $tabel WHERE tahun ='".$TAHUN."' AND bulan ='".$BULAN."' ";
             // $rowmonth=tatiye::setPDO1($monthQUERY);
             $row=tatiye::setPDO1($QUERY);
             $value =$row['data']?$row['data']:'0';
             //$value2=$row['data']?$row['data']:0;
             //$per   =round($Text->numberFormat([$value,0])/$rowmonth['data'] * 100);
                          $Exp[]=array(
                             'month'      =>$BULAN,
                             'en'         =>tatiye::monthEn($BULAN),
                             'data_'.$key =>"$value",
                             'format_'.$key  =>$value,
                             'label'      =>$data[$key]['label'],
                          );
                      }
          $i++;
        }

        return $Exp;
    }
    /* and class chartMonth */


    public static function chartMonthTabelX($tabel,$data,$label='',$where=''){
        $Text=self::Text();
        $x = 1;
        $x2 = 1;
        $str='';
        $str2='';
        $products_arr=array();
    
        foreach ($label as $key => $row) {
         $str=$str. "'".$row['label']."',";
        }
        $str= substr($str, 0, -1);
        $TAHUN=tatiye::dt('Y');
        $COUNT=tatiye::fetch($tabel," COUNT(*) as data","$data IN($str) AND tahun=$TAHUN");
     
        while($x <= tatiye::dt('M')) {
              $BULAN=$Text->sprintf($x,"%02s");
              $QUERY="SELECT COUNT(*) AS data FROM hublang WHERE tahun ='$TAHUN' AND bulan ='$BULAN' AND $data IN($str) ";
              $row=tatiye::setPDO1($QUERY);
                   $Exp[]=array(
                      'en'               =>tatiye::month($BULAN),
                      'data'             =>$row['data'],
                      'format'           =>$Text->numberFormat([$row['data'],0]),
                      'month'            =>tatiye::ticks($x),
                      'progress'         =>round($row['data']/2));
              $x++;
        }

          return $Exp;

        }
        public static function chartMonthX($tabel,$data,$label=''){
        $Text=self::Text();
        $x = 1;
        $x2 = 1;
        $str='';
        $str2='';
        $products_arr=array();
    
        foreach ($label as $key => $row) {
         $str=$str. "'".$row['label']."',";
        }
        $str= substr($str, 0, -1);
        $TAHUN=tatiye::dt('Y');
        $COUNT=tatiye::fetch($tabel," COUNT(*) as data","$data IN($str) AND tahun=$TAHUN");
     
        while($x <= tatiye::dt('M')) {
              $BULAN=$Text->sprintf($x,"%02s");
              $QUERY="SELECT COUNT(*) AS data FROM hublang WHERE tahun ='$TAHUN' AND bulan ='$BULAN' AND $data IN($str) ";
              $row=tatiye::setPDO1($QUERY);
                   $Exp[]=array(
                      'en'               =>tatiye::monthEn($BULAN),
                      'data'             =>$row['data'],
                      'format'             =>$Text->numberFormat([$row['data'],0]),
                      'month'             =>tatiye::ticks($x),
                      'progress'         =>round($row['data']/2));
              $x++;
        }

          return $Exp;
        
    }
    /* and class chart */

   public static function fetch($tabel,$bin='*',$where='',$limit=''){
         $stmt =self::setPDO($tabel,$bin,$where,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         return $row;
    }
    public static function fetchKeys($tabel,$bin='*',$where='',$limit=''){
         $Exp=array();
         $stmt =self::setPDO($tabel,$bin,$where ,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         foreach (array_keys($row) as $key => $value) {
           if ($value !=='userid' 
            && $value !=='id' 
            && $value !=='row' 
            && $value !=='user_id' 
            && $value !=='date' 
            && $value !=='time' 
            && $value !=='bulan' 
            && $value !=='tahun' 
          ) {
             $Exp[]=$value;
           }
         }
         if (is_array($Exp)) {
            return $Exp; 
         } else {
            return ''; 
         }
    }
    public static function fetchKeys2($tabel,$bin='*',$where='',$limit=''){
         $Exp='';
         $stmt =self::setPDO($tabel,$bin,$where ,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         foreach (array_keys($row) as $key => $value) {
           if ($value !=='userid' 
            && $value !=='id' 
            && $value !=='row' 
            && $value !=='user_id' 
            && $value !=='date' 
            && $value !=='time' 
            && $value !=='bulan' 
            && $value !=='tahun' 
          ) {
             $Exp=$Exp.''.$value.',';
           }
         }
            $Exp =substr($Exp, 0, -1);
            return $Exp; 
      
    }
    public static function fetchArray($tabel,$bin='*',$where='',$limit=''){
         $Exp=array();
         $stmt =self::setPDO($tabel,$bin,$where ,$limit); 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         $Exp=$row;
         return $Exp; 
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes SQLI 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public  function mysqli(){
         $args =self::myDb();
         $servername  = isset($args['host']) ? $args['host'] : 'localhost';
         $password    = isset($args['password']) ? $args['password'] : '';
         $dbname      = $args['database'];
         $username    = $args['username'];
         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         $this->db =$conn;
         if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
         return $this->db;
    }
    /* and class SQLI */

    /*
    |--------------------------------------------------------------------------
    | Initializes mycone 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Kam 12 Mei 2022 10:15:26  WITA  
    */
    public static function connect(){
          $args =self::myDb();
         $servername  = isset($args['host']) ? $args['host'] : 'localhost';
         $password    = isset($args['password']) ? $args['password'] : '';
         $dbname      = $args['database'];
         $username    = $args['username'];
         // Create connection
         $mysqli = new mysqli($servername, $username, $password, $dbname);

      if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
      }
       return $mysqli;

        
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes dBmysql 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function dBmysql(){
       return  setdb::db();
        
    }
    /* and class dBmysql */

     public static function myDb(){
           return  setdb::db();
     }
     /*
     |--------------------------------------------------------------------------
     | Initializes firebase 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date  
     */
     public static function fireDb(){
           return  setdb::firebase();
     }
     /* and class firebase */
     /*
     |--------------------------------------------------------------------------
     | Initializes fireDBJs 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date  
     */
     public static function fireDBJs(){
        if($_SERVER["REQUEST_METHOD"] === "POST") {
          self::headerContent('POST');
          $setApp =setdb::firebase();
          $arr=json_decode($setApp, true);
          echo json_encode($setApp);
          } else {
             return tatiye::index();
          }
          
         
     }
     /* and class fireDBJs */

    /*
    |--------------------------------------------------------------------------
    | Initializes rtdb 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function rtdb($tabel){

        if($_SERVER["REQUEST_METHOD"] === "POST") {
          self::headerContent('POST');
          $val=json_decode(file_get_contents("php://input"));
          $setApp =$variable=self::Firebase($tabel)->Select($val);
          $arr=json_decode($setApp, true);
          echo json_encode($setApp);
          } else {
             return tatiye::index();
          }
        
    }
    /* and class rtdb */

    /*
    |--------------------------------------------------------------------------
    | Initializes CekTabel DB 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function dbtabel(){
            return tatiyeNetQueryForge::init(self::myDb()); 
     }
        
   
    /* and class CekTabel DB */

   /*
   |--------------------------------------------------------------------------
   | Initializes title 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function CONTENT_TYPE($YPE){
    if($YPE !== 'application/json') {
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->setSuccess(false);
        $response->addMessage("Content Type header not set to JSON");
        $response->send();
        exit;
    }

       
   }
   /* and class title */
   /*
   |--------------------------------------------------------------------------
   | Initializes appRoot 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function AppRoot($key){
         return $key;
       
   }
   /* and class appRoot */
    /*
  |--------------------------------------------------------------------------
  | Initializes eksfile 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  
  */
  public static function eksfile($Exp){
      return pathinfo($Exp, PATHINFO_EXTENSION);;
  }
  /* and class eksfile */
  /*
  |--------------------------------------------------------------------------
  | Initializes exkType 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function expDir($key){
    if (self::eksfile($key)) {
       return tatiye::dir($key);
    } else {
        return tatiye::dir( $key.'.html');
        // code...
    }
    
      
  }
  /* and class exkType */
  /*
  |--------------------------------------------------------------------------
  | Initializes dir 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function dir($key=''){
        $IDIR=explode('app',APPROOT);
        return $IDIR[0].''.$key;
      
  }
  /* and class dir */
  /*
  |--------------------------------------------------------------------------
  | Initializes images 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  
  */
  public static function images($seg,$resize=''){
           if (!empty($seg)){

             if(file_exists(tatiye::expDir("public/images/".$seg))){
                if (!empty($resize)) {
                   $Exp="/images/".$resize.'/'.$seg;
                } else {
                $Exp="/images/".$seg;
                }
              } else {
                $Exp="/images/anomous.png";
              }
           }else{
              $Exp="/images/anomous.png";
           }

           if (!empty($resize)) {
              return self::resizeImage($Exp);
           } else {
              return URLROOT.$Exp;
           }           

  }  


  public static function resizeImage($Exp){
          $expanReq = explode("/", $Exp);
          $file=$Exp;
          $type=tatiye::eksfile($file);
          $ID=explode('x',$Exp);
          $st          ='';
          $size        ='';
          $origenal    ='';
          $dir         ='';
          $saveToDir   ='';
          $set=count($expanReq)-1;
          foreach ($expanReq as $key => $value) {
                $Req=explode('x',$value);

               if ($ID[0] ==$Req[0] ) {
                  $str= $str.$value.'/'; 
                  $size=$size.true; 
               } else {
                  $str= $str.$value.'/'; 
                  $size=$size.false; 
               }
               if ($key !==0 ) {
                     $origenal= $origenal.$value.'/'; 
               }

               if ($key !==$set  ) {
                      $saveToDir= $saveToDir.$value.'/'; 
                }

          }
   
            $strType = substr($str, 0, -1);
            $origenal = substr($origenal, 0, -1);
            //$dir = substr($dir, 0, -1);
            $saveToDir = substr($saveToDir, 0, -1);
            if (!empty($size)) {
                 $IMGorigenal= 'public/images/'.$origenal;
                 $IMGdir      ='public/images/'.$strType;
                 $IMGsaveToDir='public/images/'.$saveToDir;
                 $file_exists=tatiye::dir($IMGsaveToDir);
                 $IDIR=tatiye::dir('public/'. $IMGdir);
                if (!file_exists($file_exists)) {
                    @mkdir($file_exists, 0777, true);
                }
                 return tatiyeNetImagesResize::init(
                 $IMGorigenal,
                 $type,
                 $expanReq[0],
                 $expanReq[$set])->resize($IMGdir,$IMGsaveToDir,$IMGorigenal);
            } else {
               return self::images($strType);
            }

  }
  /* and class images */
/*
|--------------------------------------------------------------------------
| Initializes imageTools 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function cropImage($Exp,$crop){
        return self::imageTools($Exp,'crop',$crop);
}

/*
|--------------------------------------------------------------------------
| Initializes blackWhiteImage 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function blackWhiteImage($Exp){
     return self::imageTools($Exp,'grayscaleImage');
    
}
/* and class blackWhiteImage */
/*
|--------------------------------------------------------------------------
| Initializes resizeHeight 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function resizeHeight($Exp,$Height){
     return self::imageTools($Exp,'resizeHeight',$Height);
    
}
/* and class resizeHeight */


/*
|--------------------------------------------------------------------------
| Initializes resizeWidth 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function resizeWidth($Exp,$width){
    return self::imageTools($Exp,'resizeWidth',$width);
    
}
/* and class resizeWidth */
/*
|--------------------------------------------------------------------------
| Initializes watermarkImage 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function watermarkImage($Exp,$watermar,$posisi=''){
          return self::imageTools($Exp,'watermar',$watermar,$posisi);
         // return tatiyeNetImagesResize::init()->watermar($Exp,$watermar);
    
}
/* and class watermarkImage */
/*
|--------------------------------------------------------------------------
| Initializes imageTools 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date 11/17/2023 11:31:44 PM  
*/
public static function imageTools($Exp,$init,$crop='',$posisi=''){
          $expanReq = explode("/", $Exp);
          $file=$Exp;
          $type=tatiye::eksfile($file);
          $ID=explode('x',$Exp);
          $st          ='';
          $size        ='';
          $origenal    ='';
          $dir         ='';
          $saveToDir   ='';
          $set=count($expanReq)-1;
          foreach ($expanReq as $key => $value) {
                $Req=explode('x',$value);

               if ($ID[0] ==$Req[0] ) {
                  $str= $str.$value.'/'; 
                  $size=$size.true; 
               } else {
                  $str= $str.$value.'/'; 
                  $size=$size.false; 
               }
               if ($key !==0 ) {
                     $origenal= $origenal.$value.'/'; 
               }

               if ($key !==$set  ) {
                      $saveToDir= $saveToDir.$value.'/'; 
                }

          }
   
            $strType = substr($str, 0, -1);
            $origenal = substr($origenal, 0, -1);
            //$dir = substr($dir, 0, -1);
            $saveToDir = substr($saveToDir, 0, -1);
            if (!empty($size)) {
                 $IMGorigenal= 'public/images/'.$origenal;
                 $IMGdir      ='public/images/'.$strType;
                 $IMGsaveToDir='public/images/'.$saveToDir;
                 $file_exists=tatiye::dir($IMGsaveToDir);
                 $IDIR=tatiye::dir('public/'. $IMGdir);
                if (!file_exists($file_exists)) {
                    @mkdir($file_exists, 0777, true);
                }
                 return tatiyeNetImagesResize::init(
                 $IMGorigenal,
                 $type,
                 $expanReq[0],
                 $expanReq[$set])->$init($IMGdir,$IMGsaveToDir,$IMGorigenal,$crop,$posisi);
            } else {
               return self::images($strType);
            } 
}
/* and class imageTools */
/* and class 
tn */
public static function filePathApp($dir,$Resize=''){
    $Text=tatiye::Text();
    $expDir=self::dir('app/'.$dir);
    $arryID = array();
    $path    = $expDir; //lokasi folder sekarang 
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..', 'Thumbs.db'));
    foreach($files as $nama_file){
         $ID=explode('.',$nama_file);
         if (!empty($ID[1])) {
            if ($ID[1] !=='svg' && $ID[1] !=='gif' && $ID[1] !=='png' && $ID[1] !=='PNG' && $ID[1] !=='html') {
               require_once __DIR__.'/direktory.php';
                 $arryID[]=array(
                  "file" =>$nama_file,
                  "dir" =>$expDir.'/'.$nama_file,
                  // "path" =>'public/'.$imagesSet1.$nama_file,
                  // "url" =>self::images($imagesSet.$nama_file),
                 );
          
            } 
         } 
    }
    return $arryID;
}


public static function filePath($dir,$Resize=''){
    $Text=tatiye::Text();
    $expDir=self::dir('public/'.$dir);
    $setDirFile=explode('/',$dir);
    if (!empty($setDirFile[1])) {
          $imagesSet=$Resize.$Text->strreplace([$dir,'images/','']);
          $imagesSet1='images/'.$Resize.$Text->strreplace([$dir,'images/','']);
    } else {
        
          $imagesSet=$Resize;
          $imagesSet1='images/'.$Resize;
        // code...
    }
   
    $arryID = array();
    $arryID2= array();
    $path    = $expDir; //lokasi folder sekarang 
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..', 'Thumbs.db'));
    foreach($files as $nama_file){
         $ID=explode('.',$nama_file);
         if (!empty($ID[1])) {
            if ($ID[1] !=='svg' && $ID[1] !=='gif' && $ID[1] !=='png' && $ID[1] !=='PNG') {
                // Resize
                 $arryID[]=array(
                  "file" =>$nama_file,
                  "dir" =>$dir,
                  "link" =>self::LINK($imagesSet1.'/'.$nama_file),
                  "path" =>'public/'.$imagesSet1.'/'.$nama_file,
                  "url" =>self::images($imagesSet1.'/'.$nama_file),
                 );
          
            } else {
                 $arryID2[]=array(
                  "file" =>$nama_file,
                  "dir" =>$dir,
                  "link" =>self::LINK($dir.'/'.$nama_file),
                  "path" =>'public/'.$dir.'/'.$nama_file,
                  "url" =>self::LINK($dir.'/'.$nama_file),
                 );
            }
         } 
    }
    return array_merge($arryID,$arryID2);
}





public static function resizefiledir($dir,$Resize='200x200/'){
    self::headerContent('GET');
    $Text=tatiye::Text();
    $expDir=self::dir('public/'.$dir);
    $setDirFile=explode('/',$dir);
 
  
   
    if (!empty($setDirFile[1])) {
          $imagesSet=$Resize.$Text->strreplace([$dir,'images/','']);
          $imagesSet1='images/'.$Resize.$Text->strreplace([$dir,'images/','']);
    } else {
          $imagesSet=$Resize;
          $imagesSet1='images/'.$Resize;
    }
   
    $arryID = array();
    $arryID2= array();
    $path    = $expDir; //lokasi folder sekarang 
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..', 'Thumbs.db'));
    foreach($files as $nama_file){
         $ID=explode('.',$nama_file);
         if (!empty($ID[1])) {
            if ($ID[1] !=='svg' && $ID[1] !=='gif' && $ID[1] !=='png' && $ID[1] !=='PNG') {
                // Resize
                 $arryID[]=array(
                  "file" =>$nama_file,
                  "dir" =>$dir,
                  "path" =>'public/'.$imagesSet1.$nama_file,
                  "url" =>self::resizeImage($imagesSet.$nama_file),
                 );
          
            } 
         } 


    }
     echo json_encode(array_merge($arryID,$arryID2));

}
public static function filedir($dir,$Resize='200x200/'){
    self::headerContent('GET');
    $Text=tatiye::Text();
    $expDir=self::dir('public/'.$dir);
    $setDirFile=explode('/',$dir);
 
  
   
    if (!empty($setDirFile[1])) {
          $imagesSet=$Resize.$Text->strreplace([$dir,'images/','']);
          $imagesSet1='images/'.$Resize.$Text->strreplace([$dir,'images/','']);
    } else {
          $imagesSet=$Resize;
          $imagesSet1='images/'.$Resize;
    }
   
    $arryID = array();
    $arryID2= array();
    $path    = $expDir; //lokasi folder sekarang 
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..', 'Thumbs.db'));
    foreach($files as $nama_file){
         $ID=explode('.',$nama_file);
         if (!empty($ID[1])) {
            if ($ID[1] !=='svg' && $ID[1] !=='gif' && $ID[1] !=='png' && $ID[1] !=='PNG') {
                // Resize
                 $arryID[]=array(
                  "file" =>$nama_file,
                  "dir" =>$dir,
                  "path" =>'public/'.$imagesSet1.$nama_file,
                  "url" =>self::images($imagesSet.$nama_file),
                 );
          
            } else {
                 $arryID2[]=array(
                  "file" =>$nama_file,
                  "dir" =>$dir,
                  "path" =>'public/'.$dir.'/'.$nama_file,
                  "url" =>self::LINK($dir.'/'.$nama_file),
                 );
            }
         } 


    }
     echo json_encode(array_merge($arryID,$arryID2));  

}

/*
|--------------------------------------------------------------------------
| Initializes headerContent 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function headerContent($key){
        error_reporting(0);
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: ".$key);
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
}
/* and class headerApi */
    /*
  |--------------------------------------------------------------------------
  | Initializes $_COOKIE 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date Jum 18 Mar 2022 12:11:15  WITA  
  */
  public static function cookie($options){
    if (!empty($_COOKIE[$options])) {
        return $_COOKIE[$options];
    } else {
        return '';
    }
    
       
      // return ;
  }
  /* and class $_COOKIE */
    /*
  |--------------------------------------------------------------------------
  | Initializes cookieRead 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date Min 20 Mar 2022 08:13:40  WITA 
  */
  public static function cookieRead($key,$value){
        return cookie::Read($key,$value);
      
  }
  /* and class cookieRead */
  /*
  |--------------------------------------------------------------------------
  | Initializes cookieliats 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function cookieList(){
        return cookie::Select();
      
  }
  /* and class cookieliats */
  /*
  |--------------------------------------------------------------------------
  | Initializes cookieUnset 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function cookieUnset($key){
        return  Cookie::Unset($key);
      
  }
  /* and class cookieUnset */

  /*
  |--------------------------------------------------------------------------
  | Initializes title 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function resizeTabelImage($width,$filename){
        $Text=self::Text();
        if(file_exists(tatiye::expDir("public/".$filename))){
            return tatiye::resizeImage($Text->strreplace([$filename,'images',$width]));
        } else {
            return self::LINK("images/anomous.png");
        }
  }
  /* and class title */
  /*
  |--------------------------------------------------------------------------
  | Initializes img 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function fileimg($key,$doc=''){
        $Text=self::Text();
        $IMGS= tatiye::fetch('appfile','filename',"keyid='".$key[0]."' AND nmtabel='".$key[1]."' AND categori='images' ORDER BY ascId");
       
    if(file_exists(tatiye::expDir("public/".$IMGS['filename']))){
              if (!empty($key[2])) {
                    return self::LINK('images/'.$Text->strreplace([$IMGS['filename'],'images',$key[2]]));
                } else {
                   return self::LINK($IMGS['filename']);
                }
        } else {
            return self::LINK("images/anomous.png");
        }  
      
  }
  /* and class img */

  /*
  |--------------------------------------------------------------------------
  | Initializes thumbnail 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function thumbnail($url){

     if($_SERVER["REQUEST_METHOD"] === "GET") {
            self::headerContent('GET');
             $key=explode('/',$url);
             $number=0;
             $Exp=array();
             $thum =tatiye::sqli("SELECT filename,id FROM appfile WHERE keyid='".$key[2]."'  AND nmtabel='".$key[1]."' AND categori='".$key[0]."' ");
             while ($item = $thum->fetch_array()) {  
                     $number=$number+1;
                          $Exp[]=array(
                             'no'   =>$number,
                             'id'   =>$item['id'],
                             'file' =>self::LINK($item['filename']),
                             );
                  
            } 
            http_response_code(200);
            echo json_encode($Exp);
         } else {
             return  tatiye::index();
     }

      
  }
  /*
  |--------------------------------------------------------------------------
  | Initializes imgGroup 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function imgGroup($key){
        return $key;
      
  }
  /* and class imgGroup */
  /* and class thumbnail */
  /*
  |--------------------------------------------------------------------------
  | Initializes crawler 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function crawler($url, $specificTags=0 ){
    $doc = new DOMDocument();
    @$doc->loadHTML(file_get_contents($url));
    $res['title'] = $doc->getElementsByTagName('title')->item(0)->nodeValue;

    foreach ($doc->getElementsByTagName('meta') as $m){
        $tag = $m->getAttribute('name') ?: $m->getAttribute('property');
        if(in_array($tag,['description','keywords']) || strpos($tag,'og:')===0) $res[str_replace('og:','',$tag)] = $m->getAttribute('content');
    }
    return $specificTags? array_intersect_key( $res, array_flip($specificTags) ) : $res;
      
  }
  /* and class crawler */


    /*
    |--------------------------------------------------------------------------
    | Initializes create_database 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function create_database($key){
         return tatiyeNetQueryForge::init(self::dBmysql())->create_db($key);   
        
    }
    /* and class create_database */

     /*
     |--------------------------------------------------------------------------
     | Initializes create_db 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2022
     | @Date  
     */
     public static function create_db($val,$nMdb){
            $servername=$val['host'];
            $username  =$val['username'];
            $password  =$val['password'];
            // Create connection
            $conn = new mysqli($servername, $username, $password);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // Create database
            $sql = "CREATE DATABASE ".$nMdb;
            if ($conn->query($sql) === TRUE) {
               echo "Database created successfully";
            } else {
               echo "Error creating database: " . $conn->error;
            }
         
     }
     /* and class create_db */


    /*
    |--------------------------------------------------------------------------
    | Initializes from_sql 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function from_sql($query){
         return tatiyeNetQueryForge::init(self::dBmysql())->from_sql($query); 
        
    }
    /* and class from_sql */


    public static function CekDB($key){
          return tatiyeNetConn::init($key,self::dBmysql())->$key();
    }

    /* and class show_tabel */


    /*
    |--------------------------------------------------------------------------
    | Initializes show_database 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function show_db($key=''){
         return tatiyeNetQueryForge::init(self::dBmysql())->show_database($key); 
        
    }
    /* and class show_database */

    // public static function auto_increment($key=''){
    //      return tatiyeNetQueryForge::init(self::dBmysql())->auto_increment($key); 
        
    // }
    public  function auto_increment($tabel=''){
        $db=tatiye::myDb();

             $result = tatiye::sqli("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = '".$tabel."' and table_schema = '".$db['database']."'");
                $row = mysqli_fetch_array($result);  
           return $row['AUTO_INCREMENT'];
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes drop_tabel 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function drop_tabel($key){
          //return tatiyeNetQueryForge::init(Controller::database())->drop_tabel($key);   
        
    }
    /* and class drop_tabel */
    /*
    |--------------------------------------------------------------------------
    | Initializes dropDatabase 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date Jum 25 Mar 2022 11:15:09  WITA 
    */
    public static function drop_database($key){
         //return tatiyeNetQueryForge::init(Controller::database())->dropDatabase($key);   
        
    }
    /* and class dropDatabase */


    public static function netDb($array=''){
         return tatiyeNetDb::init($array)->from_array($array);   
     }

      /*
      |--------------------------------------------------------------------------
      | Initializes etcFolder 
      |--------------------------------------------------------------------------
      | Develover Tatiye.Net 2021
      | @Date 23:52:47 
      */
      public static function etcFolder($Exp){
           return tatiyeNetCore::folder($Exp,'etc');
      }
      /* and class etcFolder */




   /* and class title */
}