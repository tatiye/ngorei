<?php 
  use app\tatiye;
  use app\Graph\Response;
  $storage = json_decode(file_get_contents("php://input"));
  $format=$storage->from;
 foreach ($storage as $key => $value) {
        $setValue=$key;
        $asosiatif["$setValue"] =tatiye::val('text',$value ,'2|Wajib diisi');
        $asosiatif2["$key"] =$value;

 
}


  foreach ($asosiatif as $key => $value) {
     if ($value=='valid') {
       $val['sukses'][$key] = $value; 
       $val['sukses']['.'.$key] = $value; 
       $val['sukses']['#'.$key] = $value; 
       $val['sukses'][$key] = ''; 
     } else {
       $val['error']['.'.$key] = $value; 
       $val['error']['.'.$key] = $value; 
       $val['error']['#'.$key] = $value; 
       $val['error'][$key] = $value; 
     }
  }
   if (empty($val['error'])) {
          $val['data']     =$asosiatif2;
          $val['hasil']  = 'sukses';
    } else {
        $val['data'] = 'error';
        $val['hasil'] = 'error';
    }
    
 
 echo json_encode($val);

