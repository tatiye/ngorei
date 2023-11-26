<?php 
use app\tatiye;
use app\tatiye AS tatiyeNet;
use app\Rest\react\storage;
$db=new tatiye();
$Text=tatiye::Text();
$data = json_decode(file_get_contents("php://input"));
$tabel=tatiye::tn(4);
$select=$data->select;

if (!empty($data->where)) {
  $where="WHERE ".$data->where;
} else {
  $where="";
}
if (!empty($data->limit)) {
  $limit=$data->limit;
} else {
  $limit=10;
}
if ($data->page==1) {
   $page=0;
} else {
  $page=$data->page;
}
if (!empty($data->keywords)) {
	$keywords="WHERE ".storage::init($tabel,$where,$select)->keywords($data->keywords);
	$Key=1;
} else {
	$keywords=$where;
	$Key=0;
}

        $setpage =$data->page;
        $records =$data->limit;
        $record_num = ($records * $setpage) - $records;

$arry=array();


$total_data                   =storage::init($tabel,$where)->total_data($keywords);
$total_peging                 =storage::init($tabel,$where)->total_paging($total_data, $limit,$keywords,$Key);
$products_arr["limit"]        =$limit;
$products_arr["page"]         =$page;
$products_arr["total_data"]   =$total_data;
$products_arr["total_peging"] =$total_peging;
$products_arr["storage"]         =array();
 if (!empty($Key)) {
    $record=0;
    $query="SELECT $select,id FROM $tabel $keywords      ORDER BY id DESC LIMIT 0, $records ";
 } else {
    $record=$record_num;
    $query="SELECT $select,id FROM $tabel $where     ORDER BY id DESC LIMIT $record_num, $records ";
 }

$hostBase=(!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/'; 
$result=$db->query($query);
while($row=$result->fetch_assoc()){
	$uid= tatiyeNet::fetch('appuserprofil','id,nama,userid,avatar',"userid='".$row['userid']."'");
  $record=$record+1;
  $number=array('no'=>$record);
  $user=array(
    'name'=>$uid['nama']?$uid['nama']:'',
    'uid'=>$uid['id']?$uid['id']:'',
    'avatar'=>$hostBase.'public/images/'.$uid['avatar']?$hostBase.'public/images/'.$uid['avatar']:tatiyeNet::URL('drive/user/L.jpeg'),
  );
    array_push($products_arr["storage"], array_merge($number,$row,$user));
}

 @$paging=storage::init($tabel,$keywords,$select)->getPaging($page, $total_data, $limit,$number);
 http_response_code(200);
 echo json_encode(array_merge($products_arr,$paging));