<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Posts extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
      //Set Data

      $meta=tatiye::metaTag([
        'token'=>'eyJkaXIiOiJwb3N0aW5nYW5cL0FwaVwvMC4xXC9zZWxlY3QucGhwIiwidWlkIjoxfQ',
        'redirect'=>'pages/blog',
        'url'=>$_GET['url'] 
       ]);
       $this->view('posts/index',$meta);

    }

  
  }