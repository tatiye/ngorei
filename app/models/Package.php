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
namespace app\models;
use app\tatiye;
class Package {
    protected static $instance;  
    private $query;
    private $data = array();
    private $where;


    public function __construct(){
         $dbs = new tatiye();
         $this->conn = new tatiye();
         $this->sql  =$dbs->mysqli();
        
    }
   /*
   |--------------------------------------------------------------------------
   | Initializes Public 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function Public(){
        return [
         "1"=>['Demo'              ,'demo'          ,'package'     ,true],
         "2"=>['Datatables'        ,'datatables'    ,'package'     ,true],
         "3"=>['Rbac'              ,'rbac'          ,'settings'    ,true],
         "4"=>['Buku Kas'          ,'bukukas'       ,'layers'      ,true],
         "5"=>['Office'            ,'office'        ,'database'    ,true],
         "6"=>['Pricing'           ,'pricing'       ,'trending-up' ,true],
         "7"=>['Item Produk'       ,'item'          ,'pie-chart'   ,false],
         "8"=>['Sisinfo'           ,'sisinfo'       ,'server'      ,true],
         "9"=>['Biling'            ,'biling'        ,'server'      ,true],
         "10"=>['Portfolio'        ,'portfolio'     ,'pocket'      ,true],
         "11"=>['Payment'          ,'payment'       ,'credit-card' ,false],
         "12"=>['WhatsApp'         ,'whatsapp'      ,'phone'       ,false],
         "13"=>['Postingan'        ,'postingan'     ,'layout'       ,true],
         // "10"=>['cmeter'            ,'cmeter'        ,'server'      ,true],
       ];
       
   }
   /* and class Public */
   /*
   |--------------------------------------------------------------------------
   | Initializes tabel 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function tabel(){
       return array(
          'demo'              =>true,
          'appfile'           =>true,
          'appuserprofil'     =>true,
          'appnews'           =>true,
          'appuserpackage'    =>true,
          'appsampah'         =>true,
          'apparchive'        =>true,
          'appplaceholder'    =>true,
          'sisinfo'           =>true,
          'appplaceholder'    =>true,
          'bukukas'           =>true,
          'appoffice'         =>true,
          'sales'             =>true,
          'salesitem'         =>true,
          'biling'            =>true,
          'portfolio'         =>true,
          'appnews'           =>true,
     );
       
   }
   /* and class tabel */
  /*
  |--------------------------------------------------------------------------
  | Initializes Assets 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function Api(){
       return array(
       'demo/0.1',
       'tables/0.1',
       'devices/0.1',
       'profil/0.1',
       'news/0.1',
       'react/0.1',
       'datatables/0.1',
       'rbac/0.1',
       'sisinfo/0.1',
       'bukukas/0.1',
       'office/0.1',
       'pricing/0.1',
       'item/0.1',
       'biling/0.1',
       'portfolio/0.1',
       'payment/0.1',
       'whatsapp/0.1',
       'postingan/0.1',
     );
  }
  /* and class news Assets  office */
  /*
  |--------------------------------------------------------------------------
  | Initializes Assets 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2022
  | @Date  
  */
  public static function Assets(){
       return array(
       'demo',
       'tables',
       'devices',
       'profil',
     );
  }
  /* and class Assets */

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
         "2"=>['Archive',   'archive'     ,'archive','1'],
         "3"=>['History',   'history'     ,'clock','1'],
         "4"=>['Report ' ,  'report '     ,'inbox','1'],
         "5"=>['Spam',      'spam'        ,'slash','1'],
         "6"=>['Bookmark',  'bookmark'    ,'bookmark','1'],
         "7"=>['Recycle' ,  'recycle'     ,'trash','1'],
       ];
     $query=tatiye::QY("SELECT id,name,kode FROM appindikator WHERE value='label' AND userid='".$_SESSION['user_id']."' LIMIT 5");   
     while ($row = $query->fetch()) { 
               $Exp[$row['id']]=[
                $row['name'],  $row['kode']   ,'folder','2', $row['id']
               ]
             ;
      };
      return array_merge($Devices,$Exp);
 }
 /* and class Library */
 /*
 |--------------------------------------------------------------------------
 | Initializes Profil 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function Profil(){
       $uid=tatiye::ssoId(); 
       return $uid;   
 }
 /* and class Profil */

}