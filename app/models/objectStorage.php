<?php
  error_reporting(0);                                                               
  use app\tatiye;                                                                   
  $db=new tatiye();                                                                 
  $QUERYrow="SELECT nama,date FROM demo WHERE row='1' ORDER BY id DESC LIMIT 0,2";  
  $resultrow=$db->query($QUERYrow);                                                 
  while($netrow=$resultrow->fetch_assoc()){                                         
   $tatiyeNet->assign_block_vars("row", array(                                      
    "NAMA"  =>$netrow["nama"],                                                      
    "DATE"  =>$netrow["date"],                                                      
   ));                                                                              
  }                                                                                 
