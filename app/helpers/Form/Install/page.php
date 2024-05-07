<?php
  use app\tatiye;
  echo''.PHP_EOL;
  echo'use app\tatiye;'.PHP_EOL;
  echo'use app\tatiyeNetInit;'.PHP_EOL;
  echo'class '.$_POST['name'].' extends Controller{'.PHP_EOL;
  echo'  public function __construct(){ '.PHP_EOL;  
  echo'  }'.PHP_EOL;
  echo'  public function index(){'.PHP_EOL;
  echo'    if (tatiye::tn(1)) {'.PHP_EOL;
  echo'       $route=tatiye::route($_GET["url"]);'.PHP_EOL;
  echo'    } else {'.PHP_EOL;
  echo'       $route="'.$_POST['router'].'";'.PHP_EOL;
  echo'    }'.PHP_EOL;
  echo'     $this->view($route);'.PHP_EOL;
  echo'  }'.PHP_EOL;
  echo'}'.PHP_EOL;