<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  use app\tatiyeNetProtokol;
  class Pages extends Controller{
    public function __construct(){}
    // Load Homepage
    public function index(){
               // echo $_GET['url'];

           if (tatiye::tn(1)) {
               $route=$_GET['url'];
            } else {
                if(tatiye::tn(0)==tatiye::ssoId('sub_domain')){
                     redirect('users');
                } else {
                    redirect('home');
                }
                
            }

           if (tatiye::tn(0) !=='settings.html') {
                $row=tatiye::requirePages($_GET['url']);
                $this->view($row['path'], $row,'object','Graph');
           }

    
    }

     public function profil(){$this->user('profil/default',[],'profil');}
     public function devices(){$this->user('devices/default',[],'devices');}
     public function office(){$this->user('office/default',[],'office');}
     public function rbac(){$this->user('rbac/default',[]);}
  }