<?php 
use app\tatiye;
$db=new tatiye();
$conn=$db->PDO();
$Text=tatiye::Text();
$data = json_decode(file_get_contents("php://input"));
$row= tatiye::fetch('app_user','*',"id='".$data->user_id."'");
$tabel=tatiye::tn(3);
$arry=array();
        $fileType  = pathinfo($data->imagePath, PATHINFO_EXTENSION);
        $folderPath =tatiye::etcFolder('drive/foto/');
        $image_parts = $data->nama_file;
        $image_base64 = base64_decode($image_parts);
        $Namefile =tatiye::tm(). '.'.$fileType;
        $file = $folderPath . $Namefile;
        file_put_contents($file, $image_base64);
if (!empty($row['id'])) {
	foreach ($data as $key => $value) {
       if ($key !=='nama_file') {
      	 $arry[$key]=$value;
        } 
	}
	$date=array(
		'nama_file'=>$Namefile,
		'date'=>tatiye::dt('EN'),
		'time'=>tatiye::tm(),
	);
	$result=$db->que(array_merge($arry,$date))->insert($tabel);

	$val['status']='sukses';
} else {
	$val['status']='errors';
}

 http_response_code(200);
 echo json_encode($val);