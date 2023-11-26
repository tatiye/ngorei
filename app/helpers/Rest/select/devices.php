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
$products_arr["storage"]      =array();
 if (!empty($Key)) {
    $record=0;
    $query="SELECT $select,id FROM $tabel $keywords  ORDER BY id DESC LIMIT 0, $records ";
 } else {
    $record=$record_num;
    $query="SELECT $select,id FROM $tabel $where     ORDER BY id DESC LIMIT $record_num, $records ";
 }
$result=$db->query($query);
while($row=$result->fetch_assoc()){
  $uid= tatiyeNet::fetch('appfile','*',"keyid='".$row['id']."' AND nmtabel='".$tabel."' ORDER BY id DESC");
  $record=$record+1;
  $number=array('no'=>$record);
  $setImg=$uid['filename']??='';
  if (!empty($setImg)) {
      if ($uid['categori'] =='drive') {
         $file= tatiye::setfileType($uid['fileType'],$uid['filename']);
      } else { 
        $handle = @fopen(tatiye::images('400x400/'.$uid['filename']), 'r');
        if(!$handle){
           $file= tatiye::images($uid['filename']);
           $fileX= tatiye::images('400x400/'.$uid['filename']);
        }else{
          $file= tatiye::images('400x400/'.$uid['filename']);
        }
      }
  } else {
    $file=tatiye::images('collections.svg');
  }
  
  $hostBase=(!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
  $appfile=array(
   'keyId'     =>$uid['id']??='0',
   'categori'  =>$uid['categori']??='images',
   'type'      =>$uid['fileType']??='jpg',
   'filename'  =>$file,
   'setDate'   =>$uid['date']??='',
   'setTime'   =>$uid['time']??='',
   'dirfile'   =>$hostBase.'public/'.$uid['categori'].'/'.$uid['filename']??='',
  );
    array_push($products_arr["storage"], array_merge($number,$row,$appfile));
}
// foreach ($variable as $key => $value) {
//   if (!empty($value['keyId'])) {
//     array_push($products_arr["storage"],$value);
//     // code...
//   }
// }
 @$paging=storage::init($tabel,$keywords,$select)->getPaging($page, $total_data, $limit,$number);
 http_response_code(200);
 echo json_encode(array_merge($products_arr,$paging));