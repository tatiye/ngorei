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
namespace app\Images;
use app\tatiye AS tatiyeNet;
use app\Images\tatiyeNetImagesTools;

class tatiyeNetImagesResize {
    protected static $instance;  
  
  private $detection;
  private $driver;
  private $data = array();
  

  public function __destruct(){
    
  } 
    
    
   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */
    public static function init($file,$type,$resize='',$nMFile='') {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }     
         $IDresize=explode('x',$resize);
         self::$instance->width   =$IDresize[0];
         self::$instance->height  =$IDresize[1];
         self::$instance->file   = $file;
         self::$instance->type   = $type;
         self::$instance->resize = $resize;
         self::$instance->nMFile = $nMFile;
     return self::$instance;
  }
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes version 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  python3 --version
   */
   public  function resize($dir,$saveToDir='',$origenal){


              $file=$this->file;
               $IDIR=explode('app',APPROOT);
               $toOrigenal=$IDIR[0].$origenal;
               $saveTo=$IDIR[0].$saveToDir.'/';
               $IDpublic=explode('public',$saveToDir);
           if (file_exists($saveTo.$this->nMFile)) {
                 return  URLROOT.$IDpublic[1].'/'.$this->nMFile;
           } else {         
                   $img=new tatiyeNetImagesTools();
                   $img->ImageTools($toOrigenal);
                   $img->resizeOriginal($this->width,$this->height); // new width, new height  
                   $img->save($saveTo, $this->nMFile, 95, false); 
                   return  URLROOT.$IDpublic[1].'/'.$this->nMFile;
           }
   }
   /* and class version */
   /*
   |--------------------------------------------------------------------------
   | Initializes resizeTools 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function resizeTools($file,$file1){
     //    $img=new tatiyeNetImagesTools();
     //     // return $key;
     //    $img->ImageTools($file);   
     // $img->save('C:\Tnserver\www\localhostDev\assets\images\80x80', "myimage.jpg", 95, true); 




    // path to save image, image name, image quality (if it is JPG format otherwise you can set this parameter 0), overwrite (or not) existing file (with the same name)
    
    // $img->showImage(); // This image is saved on the disk but this function doesn't require disk reference (slower) it only references on memory (quicker)
    
    // $img->destroy();

   }
   /* and class resizeTools */

public static function saveThumbnail($saveToDir, $imagePath, $imageName, $max_x, $max_y) {
    preg_match("'^(.*)\.(gif|jpe?g|png)$'i", $imageName, $ext);
    switch (strtolower($ext[2])) {
        case 'jpg' : 
        case 'jpeg': $im   = imagecreatefromjpeg ($imagePath);
                     break;
        case 'gif' : $im   = imagecreatefromgif  ($imagePath);
                     break;
        case 'png' : $im   = imagecreatefrompng  ($imagePath);
                     break;
        default    : $stop = true;
                     break;
    }
    
    if (!isset($stop)) {
        $x = imagesx($im);
        $y = imagesy($im);
    
        if (($max_x/$max_y) < ($x/$y)) {
            $save = imagecreatetruecolor($x/($x/$max_x), $y/($x/$max_x));
        }
        else {
            $save = imagecreatetruecolor($x/($y/$max_y), $y/($y/$max_y));
        }
        imagecopyresized($save, $im, 0, 0, 0, 0, imagesx($save), imagesy($save), $x, $y);
        
        imagegif($save, "{$saveToDir}{$ext[1]}.gif");
        imagedestroy($im);
        imagedestroy($save);
    }
}

    /*
    |--------------------------------------------------------------------------
    | Initializes router 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Sel 09 Nov 2021 05:50:27  WITA  
    */
     public  function router(){
       return $this->file;
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes type 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date  
    */
    public  function typefrom(){
        return 'from'.$this->type;
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes typeimage 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date  
    */
    public  function typeimage(){
        return 'image'.$this->type;
    }

    /* and class type */

 
    /*
    |--------------------------------------------------------------------------
    | Initializes frompng 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Sel 09 Nov 2021 05:50:27  WITA  
    */
    public  function frompng(){
        return imagecreatefrompng(self::router());
    }  

    /*
    |--------------------------------------------------------------------------
    | Initializes fromjpeg 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Sel 09 Nov 2021 05:50:27  WITA  
    */
    public  function fromjpeg(){
        return imagecreatefromjpeg(self::router());
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes imagepng 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Sel 09 Nov 2021 05:50:27  WITA  
    */

    public  function imagepng($thumbImg){
         header('Content-type:image/png');
         imagepng($thumbImg);
    }  
    /*
    |--------------------------------------------------------------------------
    | Initializes imagejpeg 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Sel 09 Nov 2021 05:50:27  WITA  
    */

    public  function imagejpeg($thumbImg){
        header('Content-type:image/jpeg');
        imagejpeg($thumbImg);
    }
 
      public  function resizeSet(){
             $typefrom=self::typefrom();
             $typeimage=self::typeimage();
             $data = getimagesize(self::router());
             $width = $data[0];
             $height = $data[1];
             $Sizesegment=explode('x',$this->size);
             $Lebar   = $Sizesegment[0];
             $Panjang =$Sizesegment[1]; 
             $myImage = self::$typefrom();

                  if ($width > $height) {
                    $y = 0;
                    $x = ($width - $height) / 1;
                    $smallestSide = $height;
                  } else {
                    $x = 0;
                    $y = ($height - $width) / 1;
                    $smallestSide = $width;
                  }
                   if (!empty($myImage)) {
                          $thumbImg = imagecreatetruecolor($Lebar, $Panjang);
                          imagealphablending($thumbImg, false);
                          imagesavealpha($thumbImg,true);
                          $transparency = imagecolorallocatealpha($thumbImg, 255, 255, 255, 127);
                          imagefilledrectangle($thumbImg, 0, 0, $Lebar, $Panjang, $transparency);
                          imagecopyresampled($thumbImg, $myImage,0,0,0,0,$Lebar,$Panjang, $width,$height); 
                   } 
                   $myImage = self::$typeimage($thumbImg);
    }
  

}