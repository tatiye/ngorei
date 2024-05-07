<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Navigasi extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
          $url=explode('/',$_GET['url']);
          $str='';
          foreach ($url as $key => $value) {
            if ($key !==0 ) {
                  $str= $str.$value.'/'; 
            }
          }
         $strType = substr($str, 0, -1);

          if (!empty(tatiye::tn(1))) {
            $index=$strType;
          } else {
            $index='home';
          }
         tatiye::headerContent('GET');
         $row=tatiye::requirePackage($index);
              $Exp[]=array(
                 'name'           =>$row['name'],
                 'base'             =>$row['base'],
                 'path'             =>$row['path'],
                 );
         echo json_encode($Exp);

      
    }

  
  }
     
  
