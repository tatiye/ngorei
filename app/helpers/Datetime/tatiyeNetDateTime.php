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
  namespace app\Datetime;
  use app\tatiye AS tatiyeNet;
/**
 * Generates an HTML block tag that follows the Bootstrap documentation
 * on how to display  component.
 *
 * See {@link https://tatiye.net/} for more information.
 */
class tatiyeNetDateTime  {

    public  function __construct($expn='') {
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes init 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function init($key,$data=''){
          return self::$key($data);
        
    }
    /* and class init */

/*
|--------------------------------------------------------------------------
| Initializes Strtotime 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2021
| @Date  
*/
    public static function Strtotime($options){
         $date=date_create($options);
         return $date->getTimestamp();
      
    }
/* and class Strtotime */


public static function Strtodate($options){
         if (!empty($options)){
           $session_time=$options;
         }else{
            $session_time='';
         }
          date_default_timezone_set("Asia/Makassar");
          $time_difference = time() - floatval($session_time); 
          $seconds         = $time_difference ; 
          $minutes         = round($time_difference / 60 );
          $hours           = round($time_difference / 3600 ); 
          $days            = round($time_difference / 86400 ); 
          $weeks           = round($time_difference / 604800 ); 
          $months          = round($time_difference / 2419200 ); 
          $years           = round($time_difference / 29030400 ); 

                 $timestamp=date('d/m/Y/H:i',floatval($session_time)); 
                 $data=explode('/',$timestamp);
                 
       

                  $TGL= $data[2].'/'.$data[1].'/'.$data[0];
                  $namahari = date('l', strtotime($TGL));


                $Tanggal= $data[0].' '.tatiyeNet::dt("INMonth").', pukul '. $data[3];
                $Tanggal_hari=self::data_hari($namahari).', pukul '. $data[3];
                    switch ($data[2]) {
                      case "1970":
                          $Tanggal_Tahun='';
                          break;
                      default:
                          $Tanggal_Tahun= $data[0].' '.tatiyeNet::dt("INMonth").' '.$data[2];
                  }
                  
                  $Jam=$data[3];
                  // Seconds
                      if($seconds <= 60){
                        if ($seconds==0) {
                          return "1 detik"; 
                        } else {
                         return $seconds." detik"; 
                        }
                        
                        
                      }
                  //Minutes
                      else if($minutes <=60)
                      {

                        if($minutes==1)
                        {
                          return "1 Menit "; 
                        }
                        else
                        {
                          return $minutes." menit "; 
                        }

                      }
                  //Hours
                      else if($hours <=24)
                      {

                        if($hours==1)
                        {
                          return "1 Jam";
                        }
                        else
                        {
                          return "$hours jam ";
                        }

                      }
                  //Days
                      else if($days <= 7)
                      {

                        if($days==1)
                        {
                           return ' Kemarin pukul '. $Jam;
                        }
                        else
                        {
                         return $Tanggal_hari; 
                        }

                      }
                  //Weeks
                      else if($weeks <= 4)
                      {

                        if($weeks==1)
                        {
                           return $Tanggal; 
                        }
                        else
                        {
                           return $Tanggal; 
                        }

                      }
                  //Months
                      else if($months <=12)
                      {

                        if($months==1)
                        {
                            return $Tanggal; 
                        }
                        else
                        {

                          return $Tanggal_Tahun; 

                        }

                      }
                  //Years
                      else
                      {

                        if($years==1)
                        {
                           return $Tanggal_Tahun; 
                        }
                        else
                        {
                          return $Tanggal_Tahun; 
                        }

                      }
     
        // return ;
    }
    /* and class Strtotime */

      public static function data_hari($key){
              $daftar_hari = array(
                'Sunday'    => 'Minggu',
                'Monday'    => 'Senin',
                'Tuesday'   => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday'  => 'Kamis',
                'Friday'    => 'Jumat',
                'Saturday'  => 'Sabtu'
              );
           return $daftar_hari[$key];
      }
      /*
      |--------------------------------------------------------------------------
      | Initializes days 
      |--------------------------------------------------------------------------
      | Develover Tatiye.Net 2021
      | @Date  
      */
      public static function days($key,$H2=''){
          if (!empty($H2)){
           return  date('Y/m/d', strtotime($key, strtotime($H2))); 
         }else{
           return  date('Y/m/d', strtotime($key, strtotime(date("Y/m/d")))); 
         }
      }
      /* and class days */
     /*
     |--------------------------------------------------------------------------
     | Initializes month 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2021
     | @Date  
     */
     public static function month($key,$H2=''){
       if (!empty($H2)){
           return  date('Y/m/d', strtotime($key, strtotime($H2))); 
         }else{
           return  date('Y/m/d', strtotime($key, strtotime(date("Y/m/d")))); 
         }
     }
     /* and class month */
     /*
     |--------------------------------------------------------------------------
     | Initializes year 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2021
     | @Date  
     */
     public static function year($key,$H2=''){
       if (!empty($H2)){
           return  date('Y/m/d', strtotime($key, strtotime($H2))); 
         }else{
           return  date('Y/m/d', strtotime($key, strtotime(date("Y/m/d")))); 
         }
     }
     /* and class year */
      /*
      |--------------------------------------------------------------------------
      | Initializes days 
      |--------------------------------------------------------------------------
      | Develover Tatiye.Net 2021
      | @Date  
      */
      public static function D($key,$H2=''){
          if (!empty($H2)){
           return  date('d', strtotime($key, strtotime($H2))); 
         }else{
           return  date('d', strtotime($key, strtotime(date("Y/m/d")))); 
         }
      }
      /* and class days */
     /*
     |--------------------------------------------------------------------------
     | Initializes month 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2021
     | @Date  
     */
     public static function M($key,$H2=''){
       if (!empty($H2)){
           return  date('m', strtotime($key, strtotime($H2))); 
         }else{
           return  date('m', strtotime($key, strtotime(date("Y/m/d")))); 
         }
     }
     /* and class month */
     /*
     |--------------------------------------------------------------------------
     | Initializes year 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2021
     | @Date  
     */
     public static function Y($key,$H2=''){
       if (!empty($H2)){
           return  date('Y', strtotime($key, strtotime($H2))); 
         }else{
           return  date('Y', strtotime($key, strtotime(date("Y/m/d")))); 
         }
     }
     /* and class year */
       public static function HRI($Key,$H2=''){
          $Sender=date('Y/m/d',strtotime($Key));  
          $namahari = date('l', strtotime($Sender));
          return self::data_hari($namahari);
     }
     /*
     |--------------------------------------------------------------------------
     | Initializes bulan 
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2021
     | @Date  
     */
     public static function BLN($key,$H2=''){
            $monthx1= date('m', strtotime($key, strtotime($H2))); 
            return self::monthx($monthx1);
         
     }
     /* and class bulan */
 public static function monthx($key=''){
      $month=[
        '01'=>'Januari',
        '02'=>'Februari',
        '03'=>'Maret',
        '04'=>'April',
        '05'=>'Mei',
        '06'=>'Juni',
        '07'=>'Juli',
        '08'=>'Agustus',
        '09'=>'September',
        '10'=>'Oktober',
        '11'=>'November',
        '12'=>'Desember',
      ];
      return $month[$key];
 }
    /* and class additionEN */
    /*
    |--------------------------------------------------------------------------
    | Initializes tgl 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date  
    */
    public static function TGL($key,$H2=''){
          return self::D($key,$H2).' '.self::BLN($key,$H2).' '.self::Y($key,$H2).' ';
        // return ;
    }
    /* and class tgl */
    /*
    |--------------------------------------------------------------------------
    | Initializes tgl 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date  
    */
    public static function HTGL($key,$H2=''){
                  return self::HRI($key,$H2).', '.self::D($key,$H2).' '.self::BLN($key,$H2).' '.self::Y($key,$H2).' ';
        // return ;
    }
    /* and class tgl */
    /*
    |--------------------------------------------------------------------------
    | Initializes MTH 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date  
    */
    public static function MNT($key,$H2=''){
       return self::monthx($H2);
    }
    /* and class MTH */

}