<?php
  use app\tatiye;
  use app\tatiyeNetInit;


  class Grab extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      //Set Data
       return  tatiye::getRoute();
    }
    
    public function route(){
       return  tatiye::getRoute($_GET['url']);
    }

    public function object(){
      $tatiyeNet=new tatiyeNetInit(); 
      require_once APPROOT.'/models/Graph.php';
      require_once APPROOT.'/libraries/direktory.php';
      if (!empty($_POST['key'])) {
              $infoToken = array(
                    'key'       =>$_POST['key'],
              );
              foreach(array_merge($DIREKTORY,$app,$infoToken) as $page => $row) {
                 $tatiyeNet->val($page, $row);
              }
      }

      if (!empty($_POST['data'])) {
            $storage=json_decode($_POST['data'], true);
            foreach($storage as $page => $row) {
                 $tatiyeNet->val($page, $row); 
            }
      }

      echo $tatiyeNet->GraphObject(tatiye::expDir($_POST['path']));
    }


  }