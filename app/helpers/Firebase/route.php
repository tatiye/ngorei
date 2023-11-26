<?php 
   use app\tatiye;
   use app\Rest\Firebase\sdk;
   $products_arr=array();
   // $storage=json_decode($_POST['key'], true);
   $storage=json_decode(file_get_contents("php://input"));
   $tabel=$storage->tabel;
   $from=$storage->from;
   $data=$storage->data;
 

    if($from == 'insert') {
      $setData=tatiye::Firebase($tabel)->insert($storage->data);
    } elseif ($from == 'update'){
      // $id=$storage['data']['id'];
      //$setData=tatiye::Firebase($tabel)->update($id,$storage['data']);
    } elseif ($from == 'delete'){
      // $id=$storage['data']['id'];
      //$setData=tatiye::Firebase($tabel)->delete($id);
    } elseif ($from == 'where'){
       //$setData=sdk::init($tabel,$from,$storage)->where();
    } elseif ($from == 'paging'){
       //$setData=sdk::init($tabel,$from,$storage)->paging();
    } elseif ($from == 'search'){
       //$setData=tatiye::Firebase($tabel)->setData($storage['data']['colom'],'LIKE',$storage['data']['keywords']);
        //$setData=sdk::init($tabel,$from,$storage)->search();
    } else {
       //$setData=tatiye::Firebase($tabel)->setData();
    }
    http_response_code(200);
    echo json_encode($setData);
   
?>



