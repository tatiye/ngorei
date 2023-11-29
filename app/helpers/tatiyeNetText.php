<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2018-2021 wolf05 <info@tatiye.net / https://www.facebook.com/tatiyeNet/>.
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
/**
 * LinkTo: Generates a link tag.
 */
class tatiyeNetText {

  public $uid;
    /**
     * Initializes the object and returns an instance holding the HTML code for
     * a link tag.
     *
     * @param mixed $name link target.
     * @param array $options link options.
     * @param callable $block closure that generates the content to be surrounding to.
     */
    public function __construct(){
      // $this->options=$options;
    }

/*
|--------------------------------------------------------------------------
| Initializes title 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  3/18/2022 6:08:19 PM 
*/
public  function title($key){
      return $key;
    
}
/* and class title */

/*
|--------------------------------------------------------------------------
| Initializes replace 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Min 12 Apr 2020 03:25:19  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function replace($H1,$H2='',$H3=''){
     $DES_ID2 =preg_replace('/[^A-Za-z0-9]/', ''.$H1[1].'',$H1[0] );
     return $DES_ID2;
}

/*
|--------------------------------------------------------------------------
| Initializes strtolower 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Min 12 Apr 2020 03:40:56  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function strtolower($H1,$H2='',$H3=''){
    return strtolower("$H1");
}

/*
|--------------------------------------------------------------------------
| Initializes ucfirst 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Min 12 Apr 2020 01:00:30  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function ucfirst($H1,$H2='',$H3=''){
   return ucfirst($H1) ;
}

/*
|--------------------------------------------------------------------------
| Initializes strtoupper 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Min 12 Apr 2020 01:02:22  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function strtoupper($H1,$H2='',$H3=''){
     return strtoupper($H1) ;
}

/*
|--------------------------------------------------------------------------
| Initializes ucwords 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function ucwords($H1,$H2='',$H3=''){
      return ucwords($H1) ;
}

/*
|--------------------------------------------------------------------------
| Initializes strreplace 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Min 12 Apr 2020 03:57:05  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function strreplace($H1,$H2='',$H3=''){
return str_replace($H1[1], isset($H1[2]) ? $H1[2] : null, $H1[0]); // Hello you
}

/*
|--------------------------------------------------------------------------
| Initializes substr 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function substr($H1,$H2='',$H3=''){
   return substr($H1[0],$H1[1],$H1[2]);
}

/*
|--------------------------------------------------------------------------
| Initializes numberFormat 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Min 12 Apr 2020 12:21:13  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function numberFormat($H1,$H2='',$H3=''){
return number_format((float)$H1[0],$H1[1],",",",");

   // return number_format($H1[0],$H1[1],",",".");

}

/*
|--------------------------------------------------------------------------
| Initializes beCalculated 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Min 12 Apr 2020 12:40:24  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function beCalculated($H1,$H2='',$H3=''){
    $terbilang= new tatiyeNetText();
     switch ($H1[1]) {
         case "Rp":
             $Bil="Rupiah";
             break;
         default:
             $Bil=$H1[1];
     }
          if (!empty($terbilang->terbilang($H1[0])))
            {
              return  $terbilang->terbilang($H1[0]).' '.$Bil;
            }
            else
            {
              return  '0 '.$Bil;
            }    
}

/* and class beCalculated */
/*
|--------------------------------------------------------------------------
| Initializes beCalculated 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Min 12 Apr 2020 12:40:27  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
  public function terbilang ($angka,$H2='',$H3='') {
        $bilangan = array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas');
        if ($angka < 12) {
            return $bilangan[$angka]??=false;
        } else if ($angka < 20) {
            return $bilangan[$angka - 10] . ' Belas';
        } else if ($angka < 100) {
            $hasil_bagi = (int)($angka / 10);
            $hasil_mod = $angka % 10;
            return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
        } else if ($angka < 200) {
            return sprintf('Seratus %s', $this->terbilang($angka - 100));
        } else if ($angka < 1000) {
            $hasil_bagi = (int)($angka / 100);
            $hasil_mod = $angka % 100;
            return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], $this->terbilang($hasil_mod)));
        } else if ($angka < 2000) {
            return trim(sprintf('Seribu %s', $this->terbilang($angka - 1000)));
        } else if ($angka < 1000000) {
            $hasil_bagi = (int)($angka / 1000); 
            $hasil_mod = $angka % 1000;
            return sprintf('%s Ribu %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod));
        } else if ($angka < 1000000000) {
            $hasil_bagi = (int)($angka / 1000000);
            $hasil_mod = $angka % 1000000;
            return trim(sprintf('%s Juta %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else if ($angka < 1000000000000) {
            $hasil_bagi = (int)($angka / 1000000000);
            $hasil_mod = fmod($angka, 1000000000);
            return trim(sprintf('%s Milyar %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else if ($angka < 1000000000000000) {
            $hasil_bagi = $angka / 1000000000000;
            $hasil_mod = fmod($angka, 1000000000000);
            return trim(sprintf('%s Triliun %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else {
            return 'Data Salah';
        }

    }
  

/*
|--------------------------------------------------------------------------
| Initializes Romawi 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2018
| @Date 
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function romawi($angka,$H2='',$H3=''){
    $hsl = "";
    if ($angka < 1 || $angka > 5000) { 
        // Statement di atas buat nentuin angka ngga boleh dibawah 1 atau di atas 5000
        $hsl = "Batas Angka 1 s/d 5000";
    } else {
        while ($angka >= 1000) {
            // While itu termasuk kedalam statement perulangan
            // Jadi misal variable angka lebih dari sama dengan 1000
            // Kondisi ini akan di jalankan
            $hsl .= "M"; 
            // jadi pas di jalanin , kondisi ini akan menambahkan M ke dalam
            // Varible hsl
            $angka -= 1000;
            // Lalu setelah itu varible angka di kurangi 1000 ,
            // Kenapa di kurangi
            // Karena statment ini mengambil 1000 untuk di konversi menjadi M
        }
    }
    if ($angka >= 500) {
        // statement di atas akan bernilai true / benar
        // Jika var angka lebih dari sama dengan 500
        if ($angka > 500) {
            if ($angka >= 900) {
                $hsl .= "CM";
                $angka -= 900;
            } else {
                $hsl .= "D";
                $angka-=500;
            }
        }
    }
    while ($angka>=100) {
        if ($angka>=400) {
            $hsl .= "CD";
            $angka -= 400;
        } else {
            $angka -= 100;
        }
    }
    if ($angka>=50) {
        if ($angka>=90) {
            $hsl .= "XC";
            $angka -= 90;
        } else {
            $hsl .= "L";
            $angka-=50;
        }
    }
    while ($angka >= 10) {
        if ($angka >= 40) {
            $hsl .= "XL";
            $angka -= 40;
        } else {
            $hsl .= "X";
            $angka -= 10;
        }
    }
    if ($angka >= 5) {
        if ($angka == 9) {
            $hsl .= "IX";
            $angka-=9;
        } else {
            $hsl .= "V";
            $angka -= 5;
        }
    }
    while ($angka >= 1) {
        if ($angka == 4) {
            $hsl .= "IV"; 
            $angka -= 4;
        } else {
            $hsl .= "I";
            $angka -= 1;
        }
    }
    return ($hsl);
}

/*
|--------------------------------------------------------------------------
| Initializes shorten 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Min 12 Apr 2020 01:28:42  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function shorten($H1,$H2='',$H3=''){
     return self::shortenstring($H1[0],$H1[1]);
}

/*
|--------------------------------------------------------------------------
| Initializes shortenString 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Min 12 Apr 2020 01:18:10  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
    public  function shortenstring($string, $maxLength, $addEllipsis = true, $wordsafe = false) {
        $ellipsis = '';
        $maxLength = max($maxLength, 0);
        if (mb_strlen($string) <= $maxLength):
            return $string;
        endif;
        if ($addEllipsis):
            $ellipsis = mb_substr('...', 0, $maxLength);
            $maxLength-= mb_strlen($ellipsis);
            $maxLength = max($maxLength, 0);
        endif;
        if ($wordsafe):
            $matches = array();
            $string = preg_replace('/\s+?(\S+)?$/', '', mb_substr($string, 0, $maxLength));
        else:
            $string = mb_substr($string, 0, $maxLength);
        endif;
        if ($addEllipsis):
            $string.= $ellipsis;
        endif;
        return $string;
    }

/*
|--------------------------------------------------------------------------
| Initializes sizeUnits 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function sizeUnits($bytes,$H2='',$H3=''){
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '1 bytes';
        }

        return $bytes;
}

/*
|--------------------------------------------------------------------------
| Initializes existensi 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function ekstensi($H1,$H2='',$H3=''){
   $pathinfo = pathinfo($H1, PATHINFO_EXTENSION);
   return $pathinfo ;
}

/*
|--------------------------------------------------------------------------
| Initializes stristrText 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date Kam 11 Nov 2021 11:25:01  WITA 
*/
public  function stristrText($H1,$teks,$H2=''){
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
| Initializes title 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  
*/
public  function ucfirststrtolower($H1,$H2='',$H3=''){
     return ucwords(strtolower("$H1"));
}

/*
|--------------------------------------------------------------------------
| Initializes inisial 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  
*/
public  function inisial($H1='',$H2='',$H3=''){

     $ID=explode(' ',$H1);
     $INI1=self::substr([$ID[0],0,1]);
     if (!empty($ID[1])) {
         $INI2=self::substr([$ID[1],0,1]);
     } else {
         $INI2=self::substr([$ID[0],1,1]);
     }
    return $INI1.$INI2 ;
}

/*
|--------------------------------------------------------------------------
| Initializes checkNuts 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  
*/
public  function checkNuts($H1){
  // echo $H1;
  $VALIDASI=date('Y-m-d',strtotime($H1));
  list($year,$month,$day) = explode("-",$VALIDASI);
    $y  =abs(date("Y") - $year);
    $m  =abs(date("m") - $month);
    $d  =abs(date("d") - $day);
    if (!empty($y)) {
        $USIAN=$y."-Tahun";
          if (!empty($d)) {
            $JUMLAH_TAHUN=$y*12;
            $USIANBULAN=$JUMLAH_TAHUN."-Bulan";
            $USIANHARI=$d."-Hari";
          } else {
            $USIANBULAN="";
            $USIANHARI="";
          }
    }
    if (!empty($m)) {
       if (!empty($y)) {} else {
            $USIAN=$m."-Bulan";
            if (!empty($d)) {
              $USIANHARI=$d."-Hari";
            } else {
              $USIANHARI="";
            }
       }
    }
    if (!empty($d)) {
       if (!empty($m)) {} else {
             if (!empty($y)) {
               $USIAN=$y."-Tahun";
            } else {
               $USIAN=$d."-Hari";
            }
            
       }
    }
    return $USIAN.'-'.$USIANBULAN.'-'.$USIANHARI;
}

/*
|--------------------------------------------------------------------------
| Initializes age 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2021
| @Date  
*/
public  function age($H1,$H2){
  // echo $H1;
  $VALIDASI=date('Y-m-d',strtotime($H1));
  list($year,$month,$day) = explode("-",$VALIDASI);
    $y  =abs(date("Y") - $year);
    $m  =abs(date("m") - $month);
    $d  =abs(date("d") - $day);
    return $y." Tahun";
}

/*
|--------------------------------------------------------------------------
| Initializes sprintf 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Rab 14 Okt 2020 07:29:52  WITA
*/
public  function sprintf($H1,$H2){
     return sprintf($H2, $H1);
}

/*
|--------------------------------------------------------------------------
| Initializes generatePassword 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2018
| @Date Min 12 Agu 2018 05:48:45  WITA
*/
/**
* @param array  options the display options .
* @param mixed  Block to generate a customized inside  content.
*/
public  function pswd($length = 8,$H1='',$H2='') {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789DI1";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < $length; $i++):
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    endfor;
    return implode($pass);
}

/*
|--------------------------------------------------------------------------
| Initializes Qrcode 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  Sen 11 Mei 2020 06:49:34  WITA
*/
/**
 * @param array  options the display options .
 * @param mixed  Block to generate a customized inside  content.
 */
public  function QRcode($string, $width = 150, $height = 150) {
    $attributes = array("id"=>'QRcode');
    $attr = "";
    if (isset($attributes) and is_array($attributes) and !empty($attributes)):
        foreach ($attributes as $attributeName => $attributeValue):
            $attr.= $attributeName . '="' . $attributeValue . '" ';
        endforeach;
    endif;
    $apiUrl =  "https://chart.apis.google.com/chart?chs=" . $width . "x" . $height . "&cht=qr&chl=" . urlencode($string);
    return '<img src="' . $apiUrl . '" ' . trim($attr) . ' />';
 }


public  function QRulr($string, $width = 150, $height = 150) {
    $attributes = array("id"=>'QRcode');
    $attr = "";
    if (isset($attributes) and is_array($attributes) and !empty($attributes)):
        foreach ($attributes as $attributeName => $attributeValue):
            $attr.= $attributeName . '="' . $attributeValue . '" ';
        endforeach;
    endif;
    $apiUrl =  "https://chart.apis.google.com/chart?chs=" . $width . "x" . $height . "&cht=qr&chl=" . urlencode($string);
    return $apiUrl;
 }
 
/*
|--------------------------------------------------------------------------
| Initializes provider 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2021
| @Date  
*/
public  function provider($H1){
    $NOMOR=array(
    '0811'=> 'Halo',
    '0812'=> 'Simpati',
    '0813'=> 'Simpati',
    '0821'=> 'Simpati',
    '0822'=> 'Simpati',
    '0852'=> 'AS',
    '0853'=> 'AS',
    '0823'=> 'AS',
    '0851'=> 'AS',
    '0814'=> 'Indosat ',
    '0815'=> 'Matrix dan Mentari',
    '0816'=> 'Matrix dan Mentari',
    '0855'=> 'Matrix',
    '0856'=> 'IM3',
    '0857'=> 'IM3',
    '0858'=> 'Mentari',
    '0817'=> 'XL ',
    '0818'=> 'XL ',
    '0819'=> 'XL ',
    '0859'=> 'XL ',
    '0877'=> 'XL ',
    '0878'=> 'XL ',
    '0879'=> 'XL ',
    '0838'=> 'Axis',
    '0831'=> 'Axis',
    '0832'=> 'Axis',
    '0833'=> 'Axis',
    '0896'=> 'Tri (3)',
    '0897'=> 'Tri (3)',
    '0898'=> 'Tri (3)',
    '0899'=> 'Tri (3)',
    '0881'=> 'Smartfren',
    '0882'=> 'Smartfren',
    '0887'=> 'Smartfren',
    '0888'=> 'Smartfren'
    );
     $HP =substr($H1,0,4) ;
     return $NOMOR[$HP];
}
  /*
  |--------------------------------------------------------------------------
  | Initializes eksfile 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date  
  */
  public static function eksfile($Exp){
     return pathinfo($Exp, PATHINFO_EXTENSION);
  }
  /* and class eksfile */
  /*
  |--------------------------------------------------------------------------
  | Initializes stristrText 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2020
  | @Date  
  */
  public static function stristr($H1,$teks,$H2=''){
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
   | Initializes range 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function range($val,$ket=''){
        $char = range('a', 'z');
         $number=0;
         $response=array();
        foreach ($char as $key => $value) {
            $number=$number+1;
          $h[$number]    =$value;
          array_push($response, $h);
        }
       return $response[$val][$val].''.$ket.''.sprintf("%02s",$val);
       
   }
   /* and class range */

   /*
   |--------------------------------------------------------------------------
   | Initializes range 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function AZ($val,$ket=''){
        $char = range('a', 'z');
         $number=0;
         $response=array();
        foreach ($char as $key => $value) {
            $number=$number+1;
          $h[$number]    =$value;
          array_push($response, $h);
        }
       return $response[$val][$val].''.$ket;
       
   }
   /* and class range */

}