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
use app\models\Package;
class storage {
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
        


   
     self::$instance->search        =$search;
     self::$instance->tabel         =$tabel;
     self::$instance->where         =$where;
     return self::$instance;
  }
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes count 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function Cook($data,$search,$keywords=''){
        $setpage =$data->page;
        $records =$data->limit;
        $record_num = ($records * $setpage) - $records;
        if (!empty($keywords)) {
           $SETLIMIT="LIMIT $records ";
        } else {
           $SETLIMIT="LIMIT $record_num, $records ";
        }

         $Exp=array(
            'keywords'            =>$keywords,
            'search'              =>$search,
            'record'              =>$SETLIMIT,
            'limit'               =>$data->limit,
            'page'                =>$data->page,
            );
         return $Exp;
       
   }
   /* and class count */
    public  function keywords($keywords,$search){
         $mykeywords='';
         $setatributBit=explode(',',$keywords);
         foreach ($setatributBit as $key => $value) {
             $mykeywords= $mykeywords.$value." LIKE '%$search%' OR ";
         }
         $mykeywords = substr($mykeywords, 0, -3);
         if (!empty($search)) {
             // code...
         return 'AND '.$mykeywords ;
         } else {
         return '';
             // code...
         }
         
    }

    public  function keywordsId($keywords,$search){
         $mykeywords="$keywords='".$search."'";
         if (!empty($search)) {
         return 'AND '.$mykeywords ;
         } else {
         return '';
             // code...
         }
         
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
                $paging_arr['paging'][$page_count]["id"]=$x;
                $paging_arr['paging'][$page_count]["page"]=$x;
                $paging_arr['paging'][$page_count]["next"]=$x-1;

                   $paging_arr['paging'][$page_count]["class"] = $pe==$pe1 ? "active" :  "";
                   $paging_arr['paging'][$page_count]["color"] = $pe==$pe1 ? "#F26463" : "#FFF";
                   $paging_arr['paging'][$page_count]["text"] =  $pe==$pe1  ? "#FFF" : "#F26463";
            
                $page_count++;
            }
        }
         $perKali=ceil($total_rows/$records_per_page);
        
         // newer
         if ($page_url==$records_per_page) {
             $paging_arr["newer"]    = 1;
         } else {
             if (!empty($page-1)) {
             $paging_arr["newer"]    = abs($page-1);
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
              $paging_arr["older"]    = abs($page+1);
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
   public  function total_paging($total_rows, $records_per_page,$wh=''){
    // if (!empty($Key)) {
    //     $query = "SELECT COUNT(*) as total_rows FROM  $this->tabel ";
    //     $result=$this->conn->query($query);
    //     $row = $result->fetch_array(MYSQLI_ASSOC);   
    //     return $row['total_rows'];
    // } else {
     $total_pages = ceil($total_rows / $records_per_page);
     return $total_pages; 
    // }
     
   }
   /* and class contPaging */
   /*
   |--------------------------------------------------------------------------
   | Initializes index 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function package($key=''){
         return Package::Api();
       
   }
   /* and class index */

}