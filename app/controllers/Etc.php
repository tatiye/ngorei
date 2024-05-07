<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Etc extends Controller{
    public function __construct(){
     
    }
    public function index(){
      $data = [];
      $this->etc('libraries/etchelper', $data,'etc','app');

    }

  }