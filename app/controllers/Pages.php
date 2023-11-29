<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  class Pages extends Controller{
    public function __construct(){}
    // Load Homepage
    public function index(){
        if (!empty($_SESSION['sub_domain'])) {
             if(tatiye::tn(0)==$_SESSION['sub_domain']){
             redirect('users');
            } 
            
        }
           if (tatiye::tn(1)) {
              $route=tatiye::route('pages/'.tatiye::tn(1));
            } else {
              $route='index';
            }
           if (tatiye::tn(0) !=='settings.html') {
            
              $this->view($route, [],'object','Graph');
           }
    
    }

     public function demo(){
       $this->user('demo/default',[]);
    }
 
 
 
  



  }