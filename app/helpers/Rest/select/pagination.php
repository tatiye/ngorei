<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
$db=new tatiye();
// Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));
$Text=tatiye::Text();
//$tabel=tatiye::openSSLKey($data->tabel,$_SESSION['user_id']); 
$arry=array();
if (!empty($data->syntax)) {
	$syntax= $Text->strreplace([$data->syntax,'.',',']);
} else {
	$syntax='1,3';
}
if (!empty($data->query)) {
	$addQue=$data->query;
} else {
	$addQue="ORDER BY id DESC";
}



$COUNT=tatiye::fetch("$data->tabel"," COUNT(*) as count",$data->id);
$arry['date']=tatiye::dt('DTIE');
$IDlimit=end(explode('.',$data->syntax));
$IDPage=explode('.',$data->syntax);

           $keywords='title,date';
        
           if (!empty($data->search)) {
           $setatributBit=explode(',',$keywords);
           foreach ($setatributBit as $key => $value) {
               $mykeywords= $mykeywords.$value." LIKE '%$data->search%' OR ";
           }
           $mykeywords = substr($mykeywords, 0, -3)." LIMIT ".$IDlimit;
           } else {
           $mykeywords ="$data->id $addQue LIMIT $syntax";
           	// code...
           }
         


$total_pages = ceil($COUNT['count'] / $IDlimit);
$arry['limit']=$IDlimit;
$arry['page'] =$IDPage[0];
$arry["total"] =$COUNT['count'];
$arry["paging"] =$total_pages;
$arry['data']=array();
        if ($IDPage[0]=='0') {
        	$retPage=1;
        } else {
        	$retPage=$IDPage[0];
        }
        $setpage =$retPage;
        $records =$IDPage[1];
        $record_num = ($records * $setpage) - $records;


$QUERY="SELECT * FROM $data->tabel WHERE  $mykeywords    ";
$result=$db->query($QUERY);
 $no=$record_num;
 while($row=$result->fetch_assoc()){
 	$no=$no+1;
 	$Expuid=tatiye::fetchUserID($row['userid']);
		if ($no==1) {
			$class='active';
		} else {
			$class='not';
		}

	if (!empty($data->ekstrak)) {
 	$number=array(
 		"no"=>$no,
 		"bg"=>tatiye::rangeColor($IDlimit,$no),
 		"class"=>$class,
 		"ekstrak"=>$Text->strreplace([$row[$data->ekstrak],' ','-']) 
 	 );
	} else {	
 	$number=array(
 		"no"=>$no,
 		"bg"=>tatiye::rangeColor($IDlimit,$no),
 		"class"=>$class
 	 );
	}
  array_push($arry["data"],array_merge($number,$row,$Expuid));
}
http_response_code(200);
echo json_encode($arry);