<?php 
use app\tatiye;
    $db   =new tatiye();
 $variable=$_POST['element'];
 $tempalte=$_POST['tempalte'];
 $setUId=$_SESSION['user_id'];
 $row= tatiye::fetch('appusergrid','id',"app='".$_POST['app']."' AND userid='".$setUId."'");
 $setId=$row['id'];
	$Exp=array(
	   'userid'    =>$setUId,
	   'app'       =>$_POST['app'],
	   'element'   =>$_POST['element'],
	   'tempalte'  =>$_POST['tempalte'],
	   'tabLine'  =>$_POST['tabLine'],
	);
	if (!empty($row['id'])) {
		$result=$db->que($Exp)->update("appusergrid","id =$setId AND userid=$setUId");  
	} else {
	 $result=$db->que($Exp)->insert('appusergrid');
	}
        
 ?>