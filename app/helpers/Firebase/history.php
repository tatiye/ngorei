<?php 
  use wolf05\helper\tatiyeNet;
  use wolf05\helper\Rest\Firebase\sdk;
   $products=array();

   $setData=tatiyeNet::Firebase('history')->setData();
   $products_arr["count"]=count($setData);
   $products_arr["data"]=array();
   tatiyeNet::cookieRead('sethistory',count($setData));
   $NO=0;
   foreach (array_slice(array_reverse($setData), 0, count($setData))  as $row ) {
   //foreach ($setData as $key => $row) {
   	$NO=$NO+1;
	   	if (!empty($row['deskripsi'])) {
	   		$deskripsi=$row['deskripsi'];
	   	} else {
	   		$deskripsi='Alat dan Privasi';
	   	}
		  $products=array(                                                           
		  $NO,     
		  $row['avatar'],        
		  $row['name'],         
		  $row['title'],     
		  $deskripsi,      
		  $row['date'],      
		  $row['time'],              
		  $row['id'],              
		  $key,     
		);
    array_push($products_arr["data"], $products);
 // }
// avatar: "drive/user/admin_user.jpg",
// color: "bg-secondary",
// date: "2023/07/15",
// deskripsi: "Update data dipackage Etc",
// icon: "wd-17 icon-feather-package",
// id: 3,
// keyId: "MjIy",
// keyTabel: "eyJ0b2tlbiI6MTY4ODQ0NjE2NiwidWlkIjoiMSJ9",
// mapid: "{"code":"0.4702851,121.9359228"}",
// name: "admin user",
// package: "Etc",
// segment: "package",
// time: "Sabtu 15 Juli 2023, 03:19:36 PM",
// title: "No 3",
// uid: "MQ"

   }
  
    http_response_code(200);
    echo json_encode($products_arr);
   
?>
