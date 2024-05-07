<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Licenced extends Controller{
    public function __construct(){}
    // Load Homepage
    public function index(){
       echo tatiye::tabelRaw(tatiye::licenced());
    }
 
  }