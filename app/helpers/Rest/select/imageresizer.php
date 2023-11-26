<?php 
  use app\tatiye;
  use app\Graph\Response;
  $data = json_decode(file_get_contents("php://input"));
  $db   =new tatiye();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
           if ($data->label=="wt") {
                $resizer=tatiye::resizeWidth($data->size,$data->sizecastom);
            } elseif ($data->label == 'cr'){
                $resizer=tatiye::cropImage($data->size,$data->cropimg);
            } elseif ($data->label == 'black'){
                 $resizer=tatiye::blackWhiteImage($data->size);
            } elseif ($data->label == 'ht'){
                $resizer=tatiye::resizeHeight($data->size,$data->sizecastom);
            } else {
                if (!empty($data->watermark)) {
                     $resizer=tatiye::watermarkImage($data->size,$data->watermark,$data->label);
                } else {
                    $resizer=tatiye::resizeImage($data->size);
                }
                
           
            }
           
               $Exp=array(
                  'resizer'              =>$resizer,
                  'original'             =>$data->file,
                  'data'                 =>$data,
                  );
       

          http_response_code(200);
          // tatiye::resizeTabelImage($data->file,$data->size);
          echo json_encode($Exp);
   } else {
       return tatiye::index();
   }
//    file
// resizer