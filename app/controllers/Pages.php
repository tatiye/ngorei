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
     public function profil(){$this->user('profil/default',[],'profil');}
     public function devices(){$this->user('devices/default',[],'devices');}
     public function office(){$this->user('office/default',[],'office');}
     public function demo(){$this->user('demo/default',[]);}
     public function datatables(){$this->user('datatables/default',[]);}
     public function rbac(){$this->user('rbac/default',[]);}
    
    
    public function react(){
      $this->user('react/default',[]);
    }

    //Bukukas
      public function bukukas(){
       $this->user('bukukas/default',[]);
     }

      //Sales
      public function pricing(){
       $this->user('pricing/default',[]);
     }

      public function item(){
       $this->user('item/default',[]);
     }

      public function biling(){
       $this->user('biling/default',[]);
     }

     public function portfolio(){
       $this->user('portfolio/default',[]);
     }

     public function payment(){
       $this->user('payment/default',[]);
     }

     public function whatsapp(){
       $this->user('whatsapp/default',[]);
     }

     public function postingan(){
       $this->user('postingan/default',[]);
     }

  




  }