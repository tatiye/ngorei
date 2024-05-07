<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
// Authorization::init(1);
$data = json_decode(file_get_contents("php://input"));


$db=new tatiye();
$QUERY="SELECT * FROM $data->tabel WHERE ".$data->where;
$result=$db->query($QUERY);
 $no=0;
 while($row=$result->fetch_assoc()){
 	     $Exp[]=$row;
}

echo json_encode($Exp);