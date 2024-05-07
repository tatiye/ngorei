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
namespace app\Rest\News;
use app\tatiye;
class storage {
    protected static $instance;  
    private $query;
    private $data = array();
    private $where;


    public function __construct(){
         $dbs = new tatiye();
         $this->conn = new tatiye();
         $this->sql  =new tatiye();
        
    }
    
   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */
    public static function init($tabel='',$where='',$search='') {    

        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
        
    if (!empty($where)) {
       $categori=$where;
    } else {
       $categori='terbaru';
    }

     $setWhere=strtolower($tabel.'/'.$categori);
     self::$instance->path          ='https://api-berita-indonesia.vercel.app/'.$setWhere;
     self::$instance->path1         ='https://api-berita-indonesia.vercel.app/';
     self::$instance->search        =$search;
     self::$instance->tabel         =$tabel;
     self::$instance->where         =$where;
     return self::$instance;
  }

   /*
   |--------------------------------------------------------------------------
   | Initializes news 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function news($key){

       $db=new tatiye();
       $Text=tatiye::Text();
       $products_arr=array();
       $variable = $this->grab($this->path, "GET");
       $json_arr = json_decode($variable, 1);
    
       foreach ($json_arr['data']['posts'] as $nuw => $value) {
              $IDDATE=explode('T',$value['pubDate']);
              $IDTIME=explode('T',$value['pubDate']);
              $IDTIMEZ=explode('.000Z',$IDTIME[1]);
              $TGL=$Text->strreplace([$IDDATE[0],'-','/']);
                   
                     $Exp=array(
                        'userid'         =>1,
                        'favicons'        =>'https://www.google.com/s2/favicons?domain='.self::segmen($this->tabel),
                        'web'             =>self::segmen($this->tabel),
                        'categori'        =>$Text->ucfirst($this->where),
                        'segment'         =>$Text->ucfirst($this->tabel),
                        'link'            =>$value['link'],
                        'title'           =>$value['title'],
                        'pubDate'         =>tatiye::Ft('HTGL',$TGL) ,
                        'date'            =>$TGL,
                        'time'            =>$IDTIMEZ[0],
                        'description'     =>$value['description'],
                        'thumbnail'       =>$value['thumbnail'],
                        );
                   
          array_push($products_arr,$Exp);
           
      }
         return $products_arr;

       
   }
   /* and class news */
   /*
   |--------------------------------------------------------------------------
   | Initializes segmen 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function segmen($key=''){
             $Exp1=array(
            'antara'     =>'https://www.antaranews.com',
            'cnbc'       =>'https://www.cnbcindonesia.com/',
            'cnn'        =>"https://www.cnnindonesia.com/",
            'jpnn'       =>"https://www.jpnn.com/",
            'kumparan'   =>"https://kumparan.com",
            'merdeka'    =>"http://www.merdeka.com/",
            'okezone'    =>"https://www.okezone.com",
            'sindonews'  =>"https://www.sindonews.com/",
            'tribun'     =>"https://www.tribunnews.com/",
           );
             if (!empty($key)) {
               return $Exp1[$key];
             } else {
               return $Exp1;

             }
             
       
   }

   /* and class segmen */
   /*
   |--------------------------------------------------------------------------
   | Initializes terbaru 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function terbaru(){
         $products_arr=array();
         $base='https://api-berita-indonesia.vercel.app'; 
         $variable = $this->grab($base, "GET");
         $json_arr = json_decode($variable, 1);
         $no=0;
        foreach (self::segmen() as $nuw => $value) {
              
               $Exp[]=self::onNews($base.'/'.$nuw.'/terbaru',$nuw);
                // code...
            }
              
       return $Exp;
       
   }
   /* and class terbaru */
   /*
   |--------------------------------------------------------------------------
   | Initializes onNews 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function onNews($path,$keywords=''){
       $products_arr=array();
       $db=new tatiye();  
       $variable = $this->grab($path, "GET");
       $json_arr = json_decode($variable, 1);
       $Text=tatiye::Text();
       foreach (array_slice($json_arr['data']['posts'], 0, 1)  as $nuw => $value) {
              $IDDATE=explode('T',$value['pubDate']);
              $IDTIME=explode('T',$value['pubDate']);
              $IDTIMEZ=explode('.000Z',$IDTIME[1]);
              $TGL=$Text->strreplace([$IDDATE[0],'-','/']);

                     $Exp=array(
                        'userid'     =>1,
                        'favicons'    =>'https://www.google.com/s2/favicons?domain='.$json_arr['data']['link'],
                        'web'         =>$json_arr['data']['link'],
                        'categori'    =>'Public',
                        'segment'     =>$Text->ucfirst($keywords),
                        'link'        =>$value['link'],
                        'title'       =>$value['title'],
                        'pubDate'     =>tatiye::Ft('HTGL',$TGL) ,
                        'date'        =>$TGL,
                        'time'        =>$IDTIMEZ[0],
                        'description' =>$value['description'],
                        'thumbnail'   =>$value['thumbnail'],
                        );
       
       
      }
       
       
            $db=new tatiye();
            $row= tatiye::fetch('appnews','id',"title='".$Exp['title']."'");
            if (@!$row['id']) {
            $result=$db->que($Exp)->insert('appnews');
            $setEf['status']='Sukses';
            } else {
            $setEf['status']='Akses Limit';
            }
           
          return $Exp;
       
   }
   /* and class onNews */
   /*
   |--------------------------------------------------------------------------
   | Initializes categori 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function categori($keywords){
         $Text=tatiye::Text();
         $products_arr=array();
         $base='https://api-berita-indonesia.vercel.app'; 
         $variable = $this->grab($base, "GET");
         $json_arr = json_decode($variable, 1);
         $no=0;
        foreach ($json_arr['endpoints'] as $nuw => $value) {
            if ($keywords==$value['name']) {
              foreach ($value['paths'] as $key => $row) {
                  if ($row['name'] !=='terbaru') {
                   if ($this->where==$Text->ucfirst($row['name'])) {
                       $status='activ';
                   } else {
                       $status='Off';
                   }
                   
                   $Exp[]=array(
                      'name'            =>$Text->ucfirst($row['name']),
                      'status'              =>$status,
               );
               }
              }
          
           }
                // code...
            }
       if (@$Exp) {
           return $Exp;
          } else {
              return null;
          }
                     
       
   }
   /* and class categori */




   /* and class Db */
  public function grab($url, $method, $par=null){
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
      return $html;
      curl_close($ch);
 }


   /*
   |--------------------------------------------------------------------------
   | Initializes title 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function total_data($keywords=''){
        if (!empty($keyword)) {
            $setKey=$keywords;
        } else {
            $setKey=$this->where;
        }
        
         $query = "SELECT COUNT(*) as total_rows FROM  $this->tabel  $keywords";
         $result=$this->conn->query($query);
         $row = $result->fetch_array(MYSQLI_ASSOC);   
         return $row['total_rows'];

   }
   /* and class title */
   /*
   |--------------------------------------------------------------------------
   | Initializes getPaging 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function getPaging($page, $total_rows, $records_per_page, $page_url=''){
        $paging_arr=array();
        $total_pages = ceil($total_rows / $records_per_page);
        $range =3;
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

                   $paging_arr['paging'][$page_count]["color"] = $pe==$pe1 ? "#266EF1" : "#FFF";
                   $paging_arr['paging'][$page_count]["text"] =  $pe==$pe1  ? "#FFF" : "#266EF1";
             
                
                
               
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
       
  
   /* and class getPaging */
   /*
   |--------------------------------------------------------------------------
   | Initializes contPaging 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function total_paging($total_rows, $records_per_page,$keywords='',$Key){
    if (!empty($Key)) {
   
        $query = "SELECT COUNT(*) as total_rows FROM  $this->tabel  $keywords";
        $result=$this->conn->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);   
        return $row['total_rows'];
    } else {
    $total_pages = ceil($total_rows / $records_per_page);
     $perKali=ceil($total_rows/$records_per_page);
     return $perKali; 
    }
   

 

      
       
   }
   /* and class contPaging */
    public  function keywords($keywords){
        $mykeywords='';
        $setatributBit=explode(',',$this->search);
        foreach ($setatributBit as $key => $value) {
            $mykeywords= $mykeywords.$value." LIKE '%$keywords%' OR ";
        }
        $mykeywords = substr($mykeywords, 0, -3);
        return $mykeywords;
    }
}