<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
$db=new tatiye();
$data = json_decode(file_get_contents("php://input"));
$Text=tatiye::Text();
$arry=array();

$QUERY="SELECT $data->id FROM $data->tabel GROUP BY  $data->id";
$result=$db->query($QUERY);
 $no=0;
 while($row=$result->fetch_assoc()){
 	     $Exp[]=array(
 	        'item'              =>$data->id,
 	        'data'           =>$row[$data->id]
 	        );

}
http_response_code(200);
echo json_encode($Exp);