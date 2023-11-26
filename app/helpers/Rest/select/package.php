<?php
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
use app\Graph\Response;
use app\models\Package;
$val = json_decode(file_get_contents("php://input"));
Authorization::init(1);
if (!$val->package) {
 $response = new Response();
 $response->setHttpStatusCode(200);
 $response->setSuccess(false);
 $response->addMessage("package:sesuikan package name   ");
 $response->addMessage(Package::Assets());
 $response->send();
 exit;
}
if (!$val->version) {
 $response = new Response();
 $response->setHttpStatusCode(200);
 $response->setSuccess(false);
 $response->addMessage("version:sesuikan version name   ");
 $response->addMessage(Package::Assets());
 $response->send();
 exit;
}

if (!file_exists(tatiye::dir('public/package/'.$val->package.'/Api/'.$val->version))) {
 $response = new Response();
 $response->setHttpStatusCode(200);
 $response->setSuccess(false);
 $response->addMessage("Assets version :Tidak ditemukan   ");
 $response->send();
  exit;
}

        $dir    =tatiye::dir('public/package/'.$val->package.'/Api/'.$val->version.'/Doc');
        $page    =10;
        $pg        =isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1;
        if($pg<2){
            $start    =0;
        }
        else{
            $start    =($pg-1)*$page;
        }
        // membuka folder direktori
        $open    =opendir($dir) or die('Folder tidak ditemukan ...!');
        while ($file    =readdir($open)) {
            if($file !='.' && $file !='..'&& $file !='datatables.php'){   
                $files[]=$file;
            }
        }
        // menghitung jumlah file
        $jumlah_file    =count($files);
        $jumlah_page    =ceil($jumlah_file / $page); 
        //echo 'Jumlah file: '.$jumlah_file.' | Jumlah page: '.$jumlah_page.'<hr/><div> </div>';
        // membuka isi file dalam folder
        for($x=$start;$x<($start+$page);$x++){
            if($x<$jumlah_file){
                   $ID=explode('.json',$files[$x]);
                    $file_get = file_get_contents($dir.'/'.$files[$x]);
                    $json_arr = json_decode($file_get, true);
                    $Exp[]=array(
                       $ID[0] =>[
                         'token' =>$json_arr['messages'][0]['token'],
                         'segments' =>$json_arr['messages'][0]['segments'],
                         'query' =>$json_arr['messages'][0]['Query'],
                       ],
                       );
                //print '» <a href="'.$dir.$files[$x].'" target="_blank">'.ucwords($files[$x]).'</a><br/>';
            }
        }
        // if($jumlah_file>$page){
        //     echo '<div> </div>';
        //     if($pg>1){
        //         //echo '<a href="?page='.($pg-1).'">« Prev</a>';
        //     }
        //     if($pg<$jumlah_page){
        //         //echo ' | <a href="?page='.($pg+1).'">Next »</a>';
        //     }
        // }
        http_response_code(200);
        echo json_encode($Exp);