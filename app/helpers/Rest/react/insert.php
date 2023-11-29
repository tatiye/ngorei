<?php 
use wolf05\helper\tatiyeNet;
$db=new tatiyeNet();
$conn=$db->PDO();
$Text=tatiyeNet::Text();
$data = json_decode(file_get_contents("php://input"));
$row= tatiyeNet::fetch('app_user','*',"id='".$data->user_id."'");
$tabel=tatiyeNet::tn(3);
$arry=array();
$arry1=array();
$arry2=array();
$number=0;
if (!empty($row['id'])) {
	foreach ($data as $key => $value) {
	  $number=$number+1;
      $arry1[$number]=$key;
      $arry2[$number]=$value;
      $arry[$key]=$value;
	}
	$date=array(
		'date'=>tatiyeNet::dt('EN'),
		'time'=>tatiyeNet::tm(),
	);
	$result=$db->que(array_merge($arry,$date))->insert($tabel);
	   // $nama_file=$arry1[1];
	   // $stmt = $conn->query("
	   // 	SELECT id,$nama_file, COUNT($nama_file) AS SUM 
	   // 	FROM $tabel GROUP BY $nama_file 
	   // 	HAVING COUNT($nama_file) > 1");
       //  while ($row1 = $stmt->fetch()) {
       //   $db->delete($tabel,"id !='".$row1['id']."' AND $nama_file ='".$arry2[1]."' AND user_id='".$data->user_id."'");
       //        }  
	$val['status']='sukses';
} else {
	$val['status']='errors';
}

 http_response_code(200);
 echo json_encode($val);