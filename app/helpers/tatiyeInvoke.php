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
use app\tatiye;
class tatiyeInvoke {
  protected static $instance;  
  private $connection;
  private $uid;
  private $token;
  private $data = array();
    private function __clone() { /* ... @return DB */ }
    private function __wakeup() { /* ... @return DB */ }
    public function __construct(){
        $db = new tatiye();
        $this->conn =$db; 
        
    } 


    public static function init($data='') {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
   
     self::$instance->uid       =$data;
     return self::$instance;
  }
  public  function help(){
        $DbTabel = [
            ['Helper'=>'Ngorei version',      'Comment' =>'./ngorei v'],
            ['Helper'=>'Configurasi', 'Comment' =>'./ngorei config ls'],
            ['Helper'=>'Controllers', 'Comment' =>'./ngorei page ls'],
            ['Helper'=>'Database ',   'Comment' =>'./ngorei database ls'],
            ['Helper'=>'Tabel',       'Comment' =>'./ngorei tabel ls'],
            ['Helper'=>'Package',     'Comment' =>'./ngorei package ls'],
            ['Helper'=>'Fetching',    'Comment' =>'./ngorei fetc ls'],
        ];
        echo  tatiye::tabelRawSell($DbTabel);
  }
  public  function app(){
        $DbTabel = [
            ['Controllers'=>'Create Page', 'Comment' =>'./ngorei page/create/pagename'],
            ['Controllers'=>'Delete Page', 'Comment' =>'./ngorei page/delete/pagename'],
            ['Controllers'=>'List Page',   'Comment' =>'./ngorei page/list'],
        ];
        echo  tatiye::tabelRawSell($DbTabel);
  }

  public  function ls(){
        echo  self::help();
  }

  /*
  |--------------------------------------------------------------------------
  | Initializes config 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function config(){
      
        $helpers = [
          ['Configurasi'=>'Status Root',     'Comment' =>'./ngorei status'],
          ['Configurasi'=>'Config Root',     'Comment' =>'./ngorei update/root'],
          ['Configurasi'=>'NPM Root',        'Comment' =>'./ngorei npm'],
          ['Configurasi'=>'NPM Root update', 'Comment' =>'./ngorei npm/init'],
          ['Configurasi'=>'User Credensial', 'Comment' =>'./ngorei user $tatiye=xxx-xxx-xxxx'],
          ['Configurasi'=>'Akses Token',     'Comment' =>'./ngorei token'],
          ['Configurasi'=>'Publish Root',    'Comment' =>'./ngorei publish/https.domainname'],
          ['Configurasi'=>'Terminal name',   'Comment' =>'./ngorei terminal [enter]'],
        ];
        echo tatiye::tabelRawSell($helpers);
      
  }
  /* and class config */
  /*
  |--------------------------------------------------------------------------
  | Initializes database 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function database($key){
        tatiye::ExpairToken($this->uid);
        $Database = [
            ['Database'=>'App Db ',             'Comment' =>'./ngorei db'],
            ['Database'=>'Cek Connection',      'Comment' =>'./ngorei dbcon/'.$nmdb],
            ['Database'=>'Create Database',     'Comment' =>'./ngorei db/host,user,pass,dbname'],
            ['Database'=>'Config Database',     'Comment' =>'./ngorei con/host,user,pass,dbname'],
            ['Database'=>'Change Dbname ',      'Comment' =>'./ngorei cha/dbname'],
        ];
        echo  tatiye::tabelRawSell($Database);
      
  }
  /* and class database */

  /*
  |--------------------------------------------------------------------------
  | Initializes tabel 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function tabel($key){
        $DbTabel = [
            ['Database Tabel'=>'List tabel',          'Comment' =>'./ngorei tabel/list'],
            ['Database Tabel'=>'Create tabel ',       'Comment' =>'./ngorei tabel/create/tbname'],
            ['Database Tabel'=>'Colom tabel',         'Comment' =>'./ngorei tabel/tbname/colom'],
            ['Database Tabel'=>'Primary key',         'Comment' =>'./ngorei tabel/tbname/key'],
            ['Database Tabel'=>'Row tabel',           'Comment' =>'./ngorei tabel/tbname/row'],
            ['Database Tabel'=>'Row where tabel',     'Comment' =>'./ngorei tabel/tbname/row/id/1'],
            ['Database Tabel'=>'Alter tabel',         'Comment' =>'./ngorei tabel/tbname/nmitem/VAR/12'],
            ['Database Tabel'=>'Truncate tabel',      'Comment' =>'./ngorei tabel/tbname/truncate'],
            ['Database Tabel'=>'Tes Insert Field ',   'Comment' =>'./ngorei tabel/tbname/insert'],
            ['Database Tabel'=>'Delete Field tabel',  'Comment' =>'./ngorei tbname/nmitem/field'],
            ['Database Tabel'=>'Delete tabel',        'Comment' =>'./ngorei tabel/tbname/delete'],
        ];
   
        echo  tatiye::tabelRawSell($DbTabel);
      
  }
  /* and class tabel */
  /*
  |--------------------------------------------------------------------------
  | Initializes page 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function page($key){
        tatiye::ExpairToken($this->uid);
        $Text=tatiye::Text();
         $data=array(
            "root"=>$key[2],
            "storage"=>array(
                "id"        =>$key[2],
                "class"      =>$Text->ucwords($key[2]),
                "project"    =>$this->uid['name'],
                "development"=>true,
                "tabel"      =>false,
                "segment"    =>10,
                "path"       =>false
            )
         ); 
        if ($key[1]=='create') {
           return tatiye::createPage($data,$key[1]);
        } else if ($key[1]=='list') {
            echo "string";
             $variable=$this->conn->netDb()->distribute('theme/manifest');
             foreach ($variable as $key => $value) {
              $Exp[]=array(
                 'controllers'       =>$value['class'],
                 'segment'           =>$value['segment'],
                 'tabel'              =>$value['tabel']?$value['tabel']:'false',
                 'path'              =>$value['path']?$value['path']:'false',
                 'date'               =>$value['update']['date'],
                 'time'               =>$value['update']['time'],
                 );
             }
              echo  tatiye::tabelRawSell($Exp);
        } else if ($key[1]=='delete') {
           return tatiye::createPage($data,$key[1]);
        } else {
            echo  self::app();
        }
        
      
  }
  /* and class page */


        /*
        |--------------------------------------------------------------------------
        | Initializes title 
        |--------------------------------------------------------------------------
        | Develover Tatiye.Net 2022
        | @Date  
        */
        public static function fetc($key){
          $Fetching = [
            ['Fetching Credensial'=>'Select ',        'Comment' =>'./ngorei fetc/select/pacname/0.1/tbname/filename'],
            ['Fetching Credensial'=>'Datatables',     'Comment' =>'./ngorei fetc/datatables/pacname/0.1/tbname/filename'],
            ['Fetching Credensial'=>'Cek Credensial ','Comment' =>'./ngorei fetc/token/XC9kYXRhMy5waHAiLCJ1aWQiOjF9'],
            ['Fetching Credensial'=>'List Credensial ','Comment' =>'./ngorei fetc/list'],
           ];
            echo tatiye::tabelRawSell($Fetching);
            
        }
        /* and class title */
  /*
  |--------------------------------------------------------------------------
  | Initializes package 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public  function package($key=''){
        $package = [
            ['Package'=>'Create',         'Comment' =>'./ngorei package/create/pacname'],
            ['Package'=>'Delete',         'Comment' =>'./ngorei package/delete/pacname'],
            ['Package'=>'List',           'Comment' =>'./ngorei package/list'],
        ];
        echo tatiye::tabelRawSell($package);
  
  }
  /* and class package */



}