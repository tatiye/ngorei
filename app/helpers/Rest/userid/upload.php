<?php 
  use app\tatiye;
  use app\Graph\Response;
  $Text=tatiye::Text();
  $tabel=tatiye::tn(4);
  $id   =tatiye::tn(5);
  $db   =new tatiye();
 
if($_SERVER['REQUEST_METHOD'] === 'POST') {
$row= tatiye::fetch($tabel,'*',"id='".$id."'");
// DIREKTORY FILE
if (!file_exists(tatiye::dir()."/public/images/profil/".$id)) {
   mkdir(tatiye::dir()."/public/images/profil/".$id, 0700);
}

 
$target_dir = tatiye::dir()."/public/images/profil/".$id.'/';
$dir_file   = "profil/".$id.'/';
$uploadOk = 1;

    $file      = basename($_FILES["filename"]["name"]); 
    $fileType  = pathinfo($file, PATHINFO_EXTENSION); 
    $fileName  = $Text->strreplace([$file,' ','_']); 
    $target_file =  $target_dir . $fileName;
    $dir_fileName = $dir_file.$fileName;


$filenameType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["filename"]["tmp_name"]);
  if($check !== false) {
    $val['status']= "File adalah gambar - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $val['status']= "File bukan gambar.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $val['status']= "Maaf, file sudah ada";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["filename"]["size"] > 500000) {
  $val['status']= "Maaf, file Anda terlalu besar.";
  $uploadOk = 0;
}

// Allow certain file formats
if($filenameType != "jpg" && $filenameType != "png" && $filenameType != "jpeg"
&& $filenameType != "gif" ) {
  $val['status']= "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $val['status']= "Maaf, file Anda tidak diunggah.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
    $val['status']= "File  ". htmlspecialchars( basename( $_FILES["filename"]["name"])). " telah diunggah..";
      $Exp=array(
             'userid'   =>$_POST['userid'],
             'keyid'    =>$id,
             'nmtabel'  =>$tabel,
             'filename' =>$dir_fileName,
             "time"     =>tatiye::tm(),                                               
             "categori" =>'Profil',                                               
             "fileType" =>$filenameType,                                               
             "date"     =>tatiye::dt("EN"),                                           
             "bulan"    =>tatiye::dt("M"),                                            
             "tahun"    =>tatiye::dt("Y"), 
         );
         $result=$db->que($Exp)->insert('appfile');
        $Exp2=array(
             'avatar'   =>$dir_fileName,                                               
             "date"     =>tatiye::dt("EN"),                                           
             "bulan"    =>tatiye::dt("M"),                                            
             "tahun"    =>tatiye::dt("Y"), 
         );  
         $result2=$db->que($Exp2)->update("appuserprofil","userid='".$_POST['userid']."'");
  } else {
    $val['status']= "Maaf, terjadi kesalahan saat mengunggah file Anda.";
  }
}
    http_response_code(200);
    echo json_encode($val);
  } else {
    return tatiye::index();
  }
  