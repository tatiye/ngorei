<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Blog extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
       $row=tatiye::requirePackage($_GET['url']);
       // echo $row['path'];
       $this->view($row['path'],$row);
      
    }

  
  }
     
  
