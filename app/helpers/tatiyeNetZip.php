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
namespace wolf05\helper\Zip;
use wolf05\helper\tatiyeNet;
use ZipArchive;

class tatiyeNetZip {
  protected static $instance;  
  private $name_file;
  private $driver;
  private $dir;
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
    public static function init($dir) {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
     $etc=tatiyeNet::etcFolder($dir);
     $ID=explode('/',$dir);
     $D= count($ID)-1;
     self::$instance->driver       =  $etc.'/';
     self::$instance->dir          =  $dir.'/';
     self::$instance->name_file    =  "./".$ID[$D].'.zip';
     return self::$instance;
  }
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes file_exists 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function file_exists(){
   $zip = new ZipArchive();
   $filename =$this->name_file;

     if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
         exit("cannot open <$filename>\n");
     }

     $dir = $this->driver;
     if (is_dir($dir)){

         if ($dh = opendir($dir)){
             while (($file = readdir($dh)) !== false){
              
              
                 if (is_file($dir.$file)) {
                     if($file != '' && $file != '.' && $file != '..'){

                        
                      
                         $zip->addFile($dir.$file);
                     }
                 }else{
                     // If directory
                     if(is_dir($dir.$file) ){

                         if($file != '' && $file != '.' && $file != '..'){

                             // Add empty directory
                             $zip->addEmptyDir($this->dir.$file);

                             $folder = $dir.$file.'/';
                          
                             // Read data of the folder
                          
                         }
                     }
                  
                 }
                  
             }
             closedir($dh);
         }
     }

     $zip->close();
    
       
   }
   /* and class file_exists */









}