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
namespace wolf05\helper\Package;
use wolf05\helper\tatiyeNet;
class tatiyeNetPackage 
{
    protected static $instance;  
	
	private $connection;
	private $driver;
	private $helper;
    private $package;
    private $pacname;
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
    public  function init($params,$package='') {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
     self::$instance->driver =  $params;
     self::$instance->package = 'package/'.$package;
     self::$instance->pacname = $package;

     return self::$instance;
	}
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes insert 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function insert($key){
         $package=$this->package;
         $dst=$this->driver;
         $src=self::helper($key);
         if ($this->pacname=='assets') {} else {
              if (file_exists(tatiyeNet::etcFolder($package))) {
                  return 'Package '.$this->pacname." Sudah Ada";
               } else {
                 $data = array(
                     'user_id'    =>1, 
                     'paket'      =>ucfirst($this->pacname),
                     'elements'   =>ucfirst($this->pacname),
                     'pacname'    =>$this->pacname,
                     'data_ins'   =>tatiyeNet::dt(),
                     'icon'       =>'itn ice'
                 );
                 $result=$this->conn->que($data)->insert('package');
               $dir = opendir($src); 
               @mkdir($dst); 
               while( $file = readdir($dir) ) { 
          
                   if (( $file != '.' ) && ( $file != '..' )) { 
                       if ( is_dir($src . '/' . $file) ) { 
                            foreach (tatiyeNet::opendirFolder('helper/Package/'.$key.'/'.$file)  as $key1 => $value) {
                                 mkdir($dst.'/'.$file, 0777, true);
                                // 
                                 if ($file =='app') {
                                    mkdir($dst.'/'.$file.'/'.$value, 0777, true);
                                   foreach (tatiyeNet::opendirFolder('helper/Package/'.$key.'/'.$file.'/'.$value)  as $key2 => $value2) {
                                         
                                       // echo $dst."/".$file.'/'.$value.'/'.$value2.'<br>';
                                        copy($src.'/'.$file.'/'.$value.'/'.$value2, $dst."/".$file.'/'.$value.'/'.$value2);
                                   }
                                 } else {
                                    // echo $src.'/'.$file.'/'.$value.'<br>';
                                    copy($src.'/'.$file.'/'.$value, $dst."/".$file.'/'.$value);
                                 }
                            }
                       } 
                       else { 
                           copy($src."/".$file, $dst."/".$file);   
                       } 
                   } 
               } 

             }
       }
   }
   /* and class insert */

   /*
   |--------------------------------------------------------------------------
   | Initializes insert 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function instances($key){
         $package=$this->package;
         $dst=$this->driver;
         $src=self::helper($key);
         if ($this->pacname=='assets') {} else {
          if (file_exists(tatiyeNet::etcFolder($package))) {
              return 'Package '.$this->pacname." Sudah Ada";
           } else {
               $data = array(
                   'user_id'    =>1, 
                   'paket'      =>ucfirst($this->pacname),
                   'elements'   =>ucfirst($this->pacname),
                   'pacname'    =>$this->pacname,
                   'data_ins'   =>tatiyeNet::dt(),
                   'icon'       =>'itn ice',
                   'code4'      =>'instances'
               );
               $result=$this->conn->que($data)->insert('package');
           }
       }

   }
   /* and class insert */

   /*
   |--------------------------------------------------------------------------
   | Initializes delete 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function delete(){
    if ($this->pacname=='assets') {} else {
          $dirname =$this->driver;
          $package=$this->package;
          if (file_exists(tatiyeNet::etcFolder($package))) {
                         $dir = opendir($dirname); 
                         @mkdir($dst); 
                         while( $file = readdir($dir) ) { 
                    
                             if (( $file != '.' ) && ( $file != '..' )) { 
                               
                                  if ($file !='Controller' && $file !='View'&& $file !='Model') {
                                     // echo $dirname.$src."/".$file.'<br>';
                                     unlink($dirname.$src."/".$file);
                                  } else {
                                      foreach (tatiyeNet::opendirFolder($this->package.'/'.$file)  as $key1 => $value) {  
                                          //echo $dirname.'/'.$file.'/'.$value.'<br>';
                                          unlink($dirname.'/'.$file.'/'.$value);
                                         
                                      }
                                  }
                             } 
                         } 
                   foreach (tatiyeNet::opendirFolder($package)  as $key2 => $value) {
                      //echo $dirname.'/'.$value.'<br>';
                         if(rmdir($dirname.'/'.$value)){
                           // echo ("successfully removed");
                         }
                   }
          
                   if(rmdir($dirname)){
                           return ("successfully removed");
                    }
          
             } else {
                return ($package." successfully removed");
                $query="SELECT id FROM package WHERE pacname='".$this->pacname."'";
                $row=$this->conn->que($query)->singleArray();
                 $this->conn->delete('package',"id='".$row['id']."'");
                 $this->conn->delete('rbac',"rbac_id='".$row['id']."'");
          }
      }
 



   }
   /* and class delete */
   /*
   |--------------------------------------------------------------------------
   | Initializes custom 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function helper($crud){
         return tatiyeNet::etcFolder('helper/Package/'.$crud);
   }
   /* and class custom */
   /*
   |--------------------------------------------------------------------------
   | Initializes rbac 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function rbac($key,$custom){
        $sql="SELECT id,icon FROM package WHERE pacname='".$this->pacname."'";
        $pac=$this->conn->que($sql)->singleArray();

        $pacname="SELECT user_id FROM rbac WHERE paket='".$this->pacname."' AND user_id='".$key."'";
        $row=$this->conn->que($pacname)->singleArray();

         if (!empty($row['user_id'])) {
            return 'Package '.$this->pacname." Sudah Ada";
         } else {
                $data = array(
                    'user_id'    =>$key, 
                    'paket'      =>ucfirst($this->pacname),
                    'rbac_id'    =>$pac['id'],
                    'driver'     =>ucfirst($custom),
                    'icon'       =>$pac['icon'],
                );
                $result=$this->conn->que($data)->insert('rbac');
       
         }

       
   }
   /* and class rbac */
   /*
   |--------------------------------------------------------------------------
   | Initializes elements 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function elements($array,$id){
      $result=$this->conn->que($array)->update('package','id='.$id);
   }
   /* and class elements */

 



}

