<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2020 wolf05 <info@tatiye.net / https://www.facebook.com/tatiyeNet/>.
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
 * Generates an HTML block tag that follows the Bootstrap documentation
 * on how to display  component.
 *
 * See {@link https://tatiye.net/} for more information.
 */
class tatiyeNetValidation  {
	/*
	|--------------------------------------------------------------------------
	| Initializes token 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/

	/* and class token */
	/*
	|--------------------------------------------------------------------------
	| Initializes terminalEmail 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date Kam 17 Mar 2022 09:20:22  WITA 
	*/
	public static function terminalEmail($key){

		 foreach (tatiyeNet::Consul() as $index => $value) {
		    	if ($value['email']== $key) {
		    		  return 'valid';
		    	} else {
		    		  return 'Incorrect Email ';
		    	}
		 }
	}
	/* and class terminalEmail */
	/*
	|--------------------------------------------------------------------------
	| Initializes terminalPws 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date Kam 17 Mar 2022 09:20:19  WITA  
	*/
	public static function terminalPws($key){
	  		 foreach (tatiyeNet::Consul() as $index => $value) {
		    	if ($value['password']== $key) {
		    		  return 'valid';
		    	} else {
		    		  return 'Incorrect Password ';
		    	}
		 }
	    
	}
	/* and class terminalPws */
/*
|--------------------------------------------------------------------------
| Initializes file_exists 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function file_exists($key){
	   $File=tatiyeNet::etcFile($key);
       if (file_exists($File)) {
       	return 'Incorrect File ';
       } else {
       	return 'valid';
       }
      
    
}
/* and class file_exists */
/*
|--------------------------------------------------------------------------
| Initializes folder_exists 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function folder_exists($key){
	   $File=tatiyeNet::etcFolder($key);
       if (file_exists($File)) {
       	return 'Incorrect Folder ';
       } else {
       	return 'valid';
       }
    
}
/* and class folder_exists */

/******************************************************/
/* VALIDATION */
/******************************************************/
	/* First name */
	public static function text($val, $length) {
		
        $IDlength=explode('|',$length);
        // $error_text = "Min lenght " . $IDlength[0] . " characters";
        $error_text = $IDlength[1];
		$len = mb_strlen($val, 'UTF-8');
		return ($len < $IDlength[0]) ? $error_text : "valid";
	}



	public static function characters($val, $length,$toltip='') {
        $IDlength=explode('|',$length);
        $error_text = $toltip;
        // $error_text = $IDlength[1];
		$len = mb_strlen($val, 'UTF-8');
		return ($len < $IDlength[0]) ? $error_text : "valid";
	}

/*
|--------------------------------------------------------------------------
| Initializes package 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function package($val, $length){
    $IDlength=explode('|',$length);
    $error_text = "Anda belum memiliki hak akses login ";
        // $error_text = $IDlength[1];
		$len = mb_strlen($val, 'UTF-8');
		return ($len < $IDlength[0]) ? $error_text : "valid";
    
}
/* and class package */


	public static function emailAccount($email,$id,$length='12'){
		$error_text = "Incorrect email format";
		$email_template = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
		$CEK= (preg_match($email_template, $email) !== 1) ? $error_text : "valid";
		
		if ($CEK=="valid") {
                       $row=tatiye::fetch("appuserprofil","id","email ='".$email."'");
					   if (!empty($row['id'])) {
					   	    if ($row['id']==$id) {
					   	    	return $CEK;
					   	    } else {
					     	    return 'Silahkan Gunakan Email Lain';
					   	    }
					   	    
					   } else {
					   	    $EM=explode('@',$email);
                           if (strlen($EM[0]) < $length) {
                               	return $CEK;
                            } else {
                             		return $error_text;
                            }
					   }   

		} else {
			 return  $CEK;
		}

	}


	public static function emailAccountIF($email,$length='12',$Condisional=''){
		$error_text = "Incorrect email format";
		  $IDCondisional=explode(',',$Condisional);
		$email_template = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
		$CEK= (preg_match($email_template, $email) !== 1) ? $error_text : "valid";
		
		if ($CEK=="valid") {
              $db=new tatiyeNet();
              $query="SELECT row FROM members WHERE UserName='".$email."' ";
              $result=$db->query($query);
              $row = $result->fetch_object();

 
					   if (!empty($row->row)) {
					     	$mysete='Silahkan Gunakan Email Lain';
					   } else {
					   	    $EM=explode('@',$email);
                           if (strlen($EM[0]) < $length) {
                               	$mysete=$CEK;
                            } else {
                             		$mysete=$error_text;
                            }
					   }   

		} else {
			 $mysete=$CEK;
		}



		if ($mysete=='valid') {
			foreach ($IDCondisional as $key => $value) {
				if ($EM[1]==$value) {
					return 'valid';
				} else {
					return "Ini bukan format email";
				}
				
				
			}
		} else {
			return $mysete;
		}




	}





















	public static function emailIF($email,$length='12',$Condisional=''){
		    $IDCondisional=explode(',',$Condisional);
 $error_text = "Ini bukan format email";
 $email_template = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
 $CEK= (preg_match($email_template, $email) !== 1) ? $error_text : "valid";
 if ($CEK=='valid') {
 	 $EM=explode('@',$email);
      if (strlen($EM[0]) < $length) {
           $error_text = "valid";
       } else {
        	$error_text = $namekey."Nama email  Maxsimal $length carakter";
       }
	
 } else {
 	   $error_text = "Ini bukan format email";
 }

if ($error_text=='valid') {
	foreach ($IDCondisional as $key => $value) {
		if ($EM[1]==$value) {
			return 'valid';
		} else {
			return "Ini bukan format email";
		}
		
		
	}
} else {
	return $error_text;
}

		
		
		//return $error_text;

	}




	/* Email */
	public static function email($email,$length='12'){
		$error_text = "Ini bukan format email";
		$email_template = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
		$CEK= (preg_match($email_template, $email) !== 1) ? $error_text : "valid";
		if ($CEK=='valid') {
			 $EM=explode('@',$email);
             if (strlen($EM[0]) < $length) {
                 $error_text = "valid";
              } else {
               	$error_text = $namekey."Nama email  Maxsimal $length carakter";
              }
			
		} else {
			$error_text = "Ini bukan format email";
		}
		
		return $error_text;

	}
	/*
	|--------------------------------------------------------------------------
	| Initializes secureEmail 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2021
	| @Date  
	*/
	public static function securityEmail($email){
		  $error_text = "Incorrect Email ";
	    if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", trim($email))){
	    


		    if (tatiyeNet::account('email')== $email) {
		    	 return 'valid';
		    } else {
	           return self::emailAccount($email);
		    }
	  
	    return $error_text;
     }
	    // return ;
	}
	/* and class secureEmail */

		/*
	|--------------------------------------------------------------------------
	| Initializes Email Login 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2020
	| @Date Jum 12 Nov 2021 09:32:30  WITA
	*/
		public static function emailLogin($email){
		 $error_text = "Incorrect Email or Phone Number";
   
        if (is_numeric($email)) {
        	$variabel='ContactNo';
        } else {
        	$variabel='UserName';
        }
            
        $db=new tatiyeNet();
        $query="SELECT UserName FROM members WHERE $variabel='".$email."' ";
        $result=$db->query($query);
        $row = $result->fetch_object();  

		 if (is_numeric($email)) {

		    if (!empty($row->UserName)) {
		    	 return 'valid';

		    } else {

		    	return 'Incorrect Email or Phone Number';
		    }

		 } else {

	    if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", trim($email))){
		    if (!empty($row->UserName)) {
		    	 return 'valid';
		    } else {
		    	return 'Silahkan Gunakan Email Lain';
		    }
	    }
	  }
	    return $error_text;
	}


	/*
	|--------------------------------------------------------------------------
	| Initializes Pass Login 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2020
	| @Date 
	*/
	
	public static function passwordLogin($password='',$email=''){
 if (!empty($password)) {

	   if (is_numeric($email)) {
	      $variabel='ContactNo';
	   } else {
	      $variabel='UserName';
	   }

    $db=new tatiyeNet();
    $query="SELECT $variabel FROM members WHERE $variabel='".$email."' AND Password='".$password."'";
    $result=$db->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
	    if (@$row[$variabel]==$email) {
	    	return 'valid';
	    } else {
	    	 return  'Wajib diisi';
	    }
 } else {
    return  'Wajib diisi';
 }   


		
	}
	/*
	|--------------------------------------------------------------------------
	| AND Pass Login 
	|--------------------------------------------------------------------------
	*/
	public static function nameAccount($name ,$length){

        if ($name == '') {
           $error_text = 'Tidak boleh kosong';
        } else {
            if(!preg_match("/^[a-zA-Z ]*$/",$name)){
              $error_text = "Hanya huruf dan spasi";
            } else {
                 if (strlen($name) > $length) {
                   $error_text = "Maxsimal $length carakter";

                 } else {
                 	 $error_text = "valid";
                 }
            }
        }

	    return $error_text;
	}


	public static function nameText($name ,$length,$IF='Can not be empty',$namekey=''){
       if ($name == '') {
           $error_text = $IF;
        } else {
            if(!preg_match("/^[a-zA-Z ]*$/",$name)){
              $error_text = "Hanya huruf (tampa spasi)";

            } else {

                 if (strlen($name) > $length) {
                   $error_text = $namekey." Maxsimal $length carakter";
                 } else {
 
                      if(!preg_match("/^[A-Za-z]*$/",$name)){
                        $error_text =  $namekey.' '.$IF;
                     } else {
                        $error_text = "valid";
                     }
                     
                     
                 }

            }
        }
        return $error_text;
     }

 /*
 |--------------------------------------------------------------------------
 | Initializes nameText1 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public static function nameText1($name ,$length,$IF='Can not be empty',$namekey=''){
       if ($name == '') {
           $error_text = $IF;
        } else {
            if(!preg_match("/^[a-zA-Z ]*$/",$name)){
              $error_text = "Hanya huruf ";

            } else {

                 if (strlen($name) > $length) {
                   $error_text = $namekey." Maxsimal $length carakter";
                 } else {
                    $error_text = "valid";
                 }

            }
        }
        return $error_text;
     
 }
 /* and class nameText1 */

/*
|--------------------------------------------------------------------------
| Initializes nik 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function nik($name ,$length='',$namekey=''){
	 $K=strlen($name);
	if (is_numeric($name)) {
		 if ($K==16) {
		 	$Redirect=tatiyeNet::MyTabelFetch($length,'nik',"nik='".$name."'");
		 	 if (!empty($Redirect['nik'])) {
		 	 	$error_text = "Sudah terdaftar sebelumnya";
		 	 } else {
		 	 	$error_text = "valid";
		 	 }
		 	 
		 } else {
		 	 $error_text = "Maxsimal 16 digit";
		 }
	} else {
		$error_text = "Hanya Angka";
	}
	


	 return $error_text;
	// echo $K;
      // return $key;
    
}
/* and class nik */



 public static function nameText2($name ,$length,$IF='Can not be empty',$namekey=''){
       if ($name == '') {
           $error_text = $IF;
        } else {
            if(!preg_match("/^[a-zA-Z ]*$/",$name)){
              $error_text = "Hanya huruf ";

            } else {

                 if (strlen($name) == $length) {
                    $error_text = "valid";
                 } else {
                 	$error_text = $namekey." Maxsimal $length carakter";
                    
                 }

            }
        }
        return $error_text;
     
 }
 /* and class nameText1 */
 public static function PasswordStr($password, $min_length,$namekey=''){

      // Validasi kekuatan password
      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@', $password);
      $number    = preg_match('@[0-9]@', $password);
      $specialChars = preg_match('@[^\w]@', $password);
     
      if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
          return '8 karakter dan huruf besar,kecil, angka, dan spesial karakter.';
      }else{
          return 'valid';
      }

 }
 /* and class nameText1 */
	public static function password($pass, $min_length,$namekey='') {
		$error_text = "Password: min lenght " . $min_length . " characters";
		$len = mb_strlen($pass, 'UTF-8');
		$Cek=($len < $min_length) ? $error_text : "valid";
		if ($Cek=='valid') {
	         if ($len == $min_length) {
                 $red = "valid";
              } else {
              	$red = $namekey." Maxsimal $min_length carakter";
              
              }
		} else {
			$red = $namekey." Maxsimal $min_length carakter";
		}

		return $red;
		
	}


 public static function nameText3($name ,$length,$IF='Can not be empty',$namekey=''){
  if ($name == '') {
  	 $error_text = $IF;
  } else {
  	 if(is_numeric($name)) {
          if (strlen($name) == $length) {
             $error_text = "valid";
          } else {
          	$error_text = $namekey." Maxsimal $length carakter";
          }
  	} else {
  		$error_text =" Ini bukan angka";
  	}
  	
  }
  
   return $error_text;

 }
 /* and class nameText1 */














	public function select($select,$key='Silahkan Pilih'){
		$error_text =$key;
		if ($select=='') {
			return $error_text;
		} else {
			return "valid";
		}
		
		// return ($select == "") ? $error_text : "valid";
		//return ($select == "none") ? $error_text : "valid";
	}
	/*
	|--------------------------------------------------------------------------
	| Initializes selectText 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public static function selectText($select,$ket){
		$error_text =$ket;
	  return ($select == "") ? $error_text : "valid";  
	}
	/* and class selectText */
	/*
	|--------------------------------------------------------------------------
	| Initializes number 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public static function number($key){
	      if (is_numeric($key)) {
	      	return 'valid';
	      } else {
	      	return 'Hanya Angka';
	      }
	}
	/* and class number */
	/*
	|--------------------------------------------------------------------------
	| Initializes numberSet 
	|--------------------------------------------------------------------------
	| Develover Tatiye.Net 2022
	| @Date  
	*/
	public static function numberSet($key,$val){
	 	      if (is_numeric($key)) {
	 	      	$s11=strlen($key);

	      	 if ($val==$s11) {
	      	 	  return 'valid';
	      	 } else {
	      	    return 'Maksimal '.$val;
	      	 }
	      	 
	      } else {
	      	return 'Hanya Angka';
	      }
	    
	}
	/* and class numberSet */



  public static function validateFile($valid_types) {
    $attach_file_size = 1*1024*1024;
    $error_exist    = false;
    $error_text     = "File: incorrect extension and/or too big file size";
    if (!empty($_FILES["file"])) {
      if (!in_array($_FILES["file"]["type"], $valid_types)) {
        $error_exist = true;
      }
      if (!is_uploaded_file($_FILES["file"]["tmp_name"])) {
        $error_exist = true;
      }
      if ($_FILES["file"]["size"] > $attach_file_size) {
        $error_exist = true;
      }
      return ($error_exist) ? $error_text : "valid";
    } else {
      return "Upload some file";
    }
  }

  /* Generate uniq name for file */
  public static function generateFileName(){
    return uniqid().'-'.strtolower($_FILES["file"]["name"]);
  }

  /* Upload file */
  public static function uploadFile(){
    $new_file = 'No file to upload.';
    if (!empty($_FILES["file"])) {
      $new_file = generateFileName();
      move_uploaded_file($_FILES["file"]["tmp_name"], '../upload_file/'.$new_file);
    }
    return $new_file;
  }


/*
|--------------------------------------------------------------------------
| Initializes HP 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date  
*/
public static function Handphone($Phone){
		$error_text ='Telepon Minimal 12 Digit';
		$error_text1 ='Gunakan No Lain';
		$error_text2 ='Format Telepon';
    $CHP=self::provider($Phone);
    $s12=strlen($Phone);
    $s11=strlen($Phone);


if (is_numeric($Phone)) {

		    if (!empty($CHP)) {
		    	if ($s12 ==12) {
		           $val='cek';
		    	} elseif ($s11 ==11){
		    			$val='cek';
		    	} else {
		    			return $error_text;
		    	}
		    	if ($val=='cek') {
                      return 'valid'; 
		    	} 
		    	
		    } else {
		    	return $error_text2;
		    }

    }else {
       return $error_text2;
    }

}



public static function Phone($Phone){
		$error_text ='Telepon Minimal 12 Digit';
		$error_text1 ='Gunakan No Lain';
		$error_text2 ='Format Telepon';
    $CHP=self::provider($Phone);
    $s12=strlen($Phone);
    $s11=strlen($Phone);


if (is_numeric($Phone)) {

		    if (!empty($CHP)) {
		    	if ($s12 ==12) {
		           $val='cek';
		    	} elseif ($s11 ==11){
		    			$val='cek';
		    	} else {
		    			return $error_text;
		    	}
		    	if ($val=='cek') {

          $db=new tatiyeNet();
          $query="SELECT ContactNo FROM members WHERE ContactNo='".$Phone."'";
          $result=$db->query($query);
          $row = $result->fetch_array(MYSQLI_ASSOC);
      
					    	  if (!empty($row['ContactNo'])) {
					    	    	return $error_text1;
					    	  } else {
					    	  	 return 'valid';
					    	  }   
		    	} 
		    	
		    } else {
		    	return $error_text2;
		    }

    }else {
       return $error_text2;
    }

}


public static function dbPhone($Phone,$db,$nmTabel){

 		$error_text ='Telepon Minimal 12 Digit';
 		$error_text1 ='Gunakan No Lain';
 		$error_text2 ='Format Telepon';
     $CHP=self::provider($Phone);
     $s12=strlen($Phone);
     $s11=strlen($Phone);


 if (is_numeric($Phone)) {

 		    if (!empty($CHP)) {
 		    	if ($s12 ==12) {
 		           $val='cek';
 		    	} elseif ($s11 ==11){
 		    			$val='cek';
 		    	} else {
 		    			return $error_text;
 		    	}
 		    	if ($val=='cek') {
		      // $db=new tatiyeNet();
        //   $query="SELECT ContactNo FROM $db WHERE ContactNo='".$Phone."'";
        //   $row=$db->query($query,'fetch_object');

           $row= tatiyeNet::MyTabelFetch($db,$nmTabel,"$nmTabel='".$Phone."'");



                  if (!empty($row["$nmTabel"])) {
                  	  return $error_text1;
                  } else {
                  	  return 'valid';
                  }   
       } 
	    	
 		    } else {
 		    	return $error_text2;
 		    }

     }else {
        return $error_text1;
     }

}
/*
|--------------------------------------------------------------------------
| Initializes provider 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2021
| @Date  
*/
public static function provider($H1){
	$Phone=substr($H1,0,4);
  switch ($Phone) {
    case'0811' :$CHP='valid';break;
    case'0812' :$CHP='valid';break;
    case'0813' :$CHP='valid';break;
    case'0821' :$CHP='valid';break;
    case'0822' :$CHP='valid';break;
    case'0852' :$CHP='valid';break;
    case'0853' :$CHP='valid';break;
    case'0823' :$CHP='valid';break;
    case'0851' :$CHP='valid';break;
    case'0814' :$CHP='valid';break;
    case'0815' :$CHP='valid';break;
    case'0816' :$CHP='valid';break;
    case'0855' :$CHP='valid';break;
    case'0856' :$CHP='valid';break;
    case'0857' :$CHP='valid';break;
    case'0858' :$CHP='valid';break;
    case'0817' :$CHP='valid';break;
    case'0818' :$CHP='valid';break;
    case'0819' :$CHP='valid';break;
    case'0859' :$CHP='valid';break;
    case'0877' :$CHP='valid';break;
    case'0878' :$CHP='valid';break;
    case'0879' :$CHP='valid';break;
    case'0838' :$CHP='valid';break;
    case'0831' :$CHP='valid';break;
    case'0832' :$CHP='valid';break;
    case'0833' :$CHP='valid';break;
    case'0896' :$CHP='valid';break;
    case'0897' :$CHP='valid';break;
    case'0898' :$CHP='valid';break;
    case'0899' :$CHP='valid';break;
    case'0881' :$CHP='valid';break;
    case'0882' :$CHP='valid';break;
    case'0887' :$CHP='valid';break;
    case'0888' :$CHP='valid';break;
    default    :$CHP='';
}
  return $CHP;
}
/* and class provider */
/* and class HP */
public static function securityPhone($Phone,$key=''){
	  // $Phone='085240902521';
		$error_text ='Telepon Minimal 12 Digit';
		$error_text1 ='Gunakan No Lain';
		$error_text2 ='Ini Bukan Format Telepon';
    $CHP=self::provider($Phone);
    $s12=strlen($Phone);
    $s11=strlen($Phone);


if (is_numeric($Phone)) {
		      $db=new tatiyeNet();

		    if (!empty($CHP)) {
		    	if ($s12 ==12) {
		           $val='cek';
		    	} elseif ($s11 ==11){
		    			$val='cek';
		    	} else {
		    			return $error_text;
		    	}
		    	if ($val=='cek') {
					    // $row=tatiyeNet::Query("SELECT ContactNo FROM members  WHERE ContactNo='".$Phone."' AND id='".$key."'","fetch_array");

               $query="SELECT ContactNo FROM members WHERE ContactNo='".$Phone."'";
               $row=$db->query($query,'fetch_array');

					    if (!empty($row['ContactNo'])) {
					    	   return 'valid';
					    } else {
                   $query="SELECT ContactNo FROM members WHERE ContactNo='".$Phone."'";
                   $row=$db->query($query,'fetch_array');
					    	  if (!empty($row['ContactNo'])) {
					    	    	return $error_text1;
					    	  } else {
					    	  	 return 'valid';
					    	  }  
					    }
					           
		    	} 
		    	
		    } else {
		    	return $error_text2;
		    }

    }else {
       return $error_text2;
    }

	 
}




/*
|--------------------------------------------------------------------------
| Initializes phone
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date Sab 02 Okt 2021 11:14:27  WITA
*/
public static function HP_rek($H1,$H2){
		$error_text ='Telepon Minimal 12 Digit';
		$error_text1 ='Gunakan No Lain';
		$error_text2 ='Ini Bukan Format Telepon';
	 if (!empty($H1)) {

		// 7504092501860001 
		$KDKEY=preg_replace('/\D/', '', $H1);

    $CHP=self::provider($ID1[0]);

		$len = mb_strlen($KDKEY, 'UTF-8');
		$val=($len > 12) ? $error_text : "cek";
		if ($val=='cek') {
      if (!empty($CHP)) {


		     $data   = new tatiyeNet();
		     $EN  = $data->select("phone", "$H2", "  phone= '".$KDKEY."'");
		     $row=$EN->fetch_array(MYSQLI_ASSOC);
		      if (!empty($row['phone'])) {
		      	 return $error_text1;

		      } else {
		       return 'valid';
		      }

      } else {
      	return $error_text2;
      }
      
		
		 } else {
		 	return $error_text;
		 }

	 	// code...
	 } else {
	   return $error_text;
	 }
	 


}

/*
|--------------------------------------------------------------------------
| AND HP phone 
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| Initializes token 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2021
| @Date  
*/
public static function token($options){
     $cek=tatiyeNet::check_token($options);
     if (!empty($cek)) {
         return 'valid';
     } else {
     	   return 'Expire token';
     }
     
    // return ;
}
/* and class token */

/*
|--------------------------------------------------------------------------
| Initializes emailValid 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2021
| @Date  
*/
public static function emailValid($Exp){
     $userData=array(
        'gmail.com'     =>'valid',
        'yahoo.com'     =>'valid',
        'hotmail.com'   =>'valid',
        'outlook.com'   =>'valid',
        );
     return $userData[$Exp];
}
/* and class emailValid */
/*
|--------------------------------------------------------------------------
| Initializes Captcha 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public static function Captcha($key){
	session_start();
	if (!empty($key)) {
		if ($_SESSION['code']==$key) {
			 return 'valid';
		} else {
			return 'Isi Captcha';
		}
		
	} else {
			return 'Isi Captcha';
	}
	
  

    
}
/* and class Captcha */


}