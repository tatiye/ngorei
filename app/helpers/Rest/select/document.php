<?php 
  use app\tatiye;
  use app\Graph\Response;
  $Text=tatiye::Text();
  $data = json_decode(file_get_contents("php://input"));
  $tabel=tatiye::tn(4);
  $id   =tatiye::tn(5);
  $db   =new tatiye();
 
if($_SERVER['REQUEST_METHOD'] === 'POST') {
$row= tatiye::fetch($tabel,'*',"id='".$id."'");
// DIREKTORY FILE
if (!file_exists(tatiye::dir()."/public/drive/".tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id)) {
  @mkdir(tatiye::dir()."/public/drive/".tatiye::dt("Y"));
  @mkdir(tatiye::dir()."/public/drive/".tatiye::dt("Y").'/'.tatiye::dt("M"));
  mkdir(tatiye::dir()."/public/drive/".tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id);
}
$target_dir = tatiye::dir()."/public/drive/".tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id.'/';
$dir_file = tatiye::dt("Y").'/'.tatiye::dt("M").'/'.$id.'/';
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
if($filenameType != "docx" && $filenameType != "xlsx" && $filenameType != "pdf" 
&& $filenameType != "pptx" ) {
  $val['status']= "Maaf, hanya file doxc, xlsx, pdf & pptx yang diperbolehkan.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $val['status']= "Maaf, file Anda tidak diunggah.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
    $val['status']= "File  ". htmlspecialchars( basename( $_FILES["filename"]["name"])). " telah diunggah..";
     

      $fetchKeys=tatiye::fetchKeys($tabel);

      $tbl= tatiye::fetch($tabel,$fetchKeys[0],"id=$id");
     if (!empty($tbl[$fetchKeys[0]])) {
        $nmFile=$tbl[$fetchKeys[0]];
      } else {
        $nmFile=tatiye::tm();
      }

      $Exp=array(
             'userid'   =>$_POST['userid'],
             'keyid'    =>$id,
            'nama'     =>$nmFile,
             'nmtabel'  =>$tabel,
             'filename' =>'drive/'.$dir_fileName,
             "time"     =>tatiye::tm(),                                               
             "categori" =>'drive',   
             "fileType" =>$filenameType,                                             
             "date"     =>tatiye::dt("EN"),                                           
             "bulan"    =>tatiye::dt("M"),                                            
             "tahun"    =>tatiye::dt("Y"), 

         );
         $result=$db->que($Exp)->insert('appfile');

  } else {
    $val['status']= "Maaf, terjadi kesalahan saat mengunggah file Anda.";
  }
}

    http_response_code(200);
    echo json_encode($val);
 
  } else {
      return tatiye::index();
  }
  