<?php
// error_reporting(0);
  use app\tatiye;
  use app\tatiyeNetInit;
  use app\models\Package;
  class Modules extends Controller{
    public function __construct(){
      // if(isset($_SESSION['user_id'])){
      //   redirect('pages');
      // }
    }
    public function index(){
       $tatiyeNet = new tatiyeNetInit();
       $Text=tatiye::Text();
       $variable=explode('modules/',$_GET['url']);
        $appAssest= [
         'tatiye.es6'  =>tatiye::LINK('node_modules/tatiye/es6.js'),
         'tatiye'      =>tatiye::LINK('node_modules/tatiye/es6.js'),
         'tatiye.net'      =>tatiye::LINK('node_modules/tatiye/es6.js'),
         'ES6'         =>tatiye::LINK('node_modules/tatiye/es6.js'),
         'es6'         =>tatiye::LINK('node_modules/tatiye/es6.js'),
         'Ngorey'      =>tatiye::LINK('node_modules/tatiye/es6.js'),
        ];

        foreach($appAssest as $page => $value) {
           $tatiyeNet->val($page, $value);
        }
   

          header('Content-Type:application/javascript');
          if (tatiye::tn(1)=='pec') {
            echo $tatiyeNet->GraphObject(tatiye::dir('public/package/'.tatiye::tn(2).'/'.tatiye::tn(3)));
           } elseif (tatiye::tn(1) == 'apps'){
            echo $tatiyeNet->GraphObject(tatiye::expDir('public/'.$Text->strreplace([$variable[1],'apps','webview'])));
          } else {
            echo $tatiyeNet->GraphObject(tatiye::expDir('public/'.$variable[1]));
          }
    }
  }