<?php
error_reporting(0);
use app\tatiye;
$Text=tatiye::Text();
$db=new tatiye();
use app\tatiyeNetInit;
$tatiyeNet = new tatiyeNetInit();
$arr=tatiye::info('theme');
require_once tatiye::dir('app/views/router/index.php');
    foreach($arr['includePath'] as $keyPath => $value) {
         if (!empty($value)) {
              $routePath['path.'.$keyPath]=file_get_contents(tatiye::dir('public/'.$value));
          }
    }

     $Meta=$arr['require'][tatiye::tn(0)];
     if (!empty($Meta['path'])) {
      $set=tatiye::infoMeta($Meta);
      $settitle=$set['title'];
      $setdescription=$set['description'];
      $setimages=tatiye::LINK('images/'.$set['images']);
      $setulr=tatiye::LINK();
     } else {
      $settitle=$arr['app']['title'];
      $setdescription =$arr['app']['description'];
      $setimages=tatiye::LINK('images/'.$arr['app']['images']);
      $setulr=tatiye::LINK();
     }
 
$newSetapp= [
     'sitename'     =>$arr['app']['sitename'],
     'favicon'      =>tatiye::LINK('images/'.$arr['app']['favicon']),
     'icon'         =>tatiye::LINK('images/'.$arr['app']['icon']),
     'logo'         =>tatiye::LINK('images/'.$arr['app']['logo']),
     'images'       =>$setimages,
     'url'          =>$setulr,
     'SignIn'       =>tatiye::URL('users/login'),
     'SignUp'       =>tatiye::URL('users/register'),
     'title'        =>$settitle,
     'site_name'    =>$arr['app']['sitename'],
     'headline'     =>$arr['app']['headline'],
     'description'  =>$setdescription,
     'version'      =>$arr['app']['version'],
     'ROOTTHEME'    =>tatiye::dir('/public/theme'),
     'URLROOT'      =>URLROOT,
     'HOME'         =>URLROOT,
     'onclickFalse' =>'onclick="return false;"',
];


 if (!empty(tatiye::ssoId('userid'))) {
    $uid=tatiye::ssoId();
 } else {
    $uid=[];
 }

$app=array_merge($newSetapp,$uid);
foreach($arr['navbar'] as $key => $value) {
        
        $tatiyeNet->assign_block_vars('navbar', array(
           'TITLE'  =>$value[0],
           'LINK'   =>URLROOT.'/'.$value[1],
           'ICON'   =>$value[2],
           'ROUTE'  =>'',
        ));
}


foreach($arr['filePath'] as $key => $value) {
    if (!empty($value[1])) {
       $resize=$value[1].'/';
    } else {
       $resize='';
    }
   
    $variable=tatiye::filePath($value[0],$resize);
    foreach ($variable as $key => $value) {
        $tatiyeNet->val($value['file'], $value['link']);
    }
}

    // if (!empty($arr['graph'][tatiye::tn(0)])) {
    //     require_once tatiye::dir('app/views/router/'.tatiye::tn(0).'.php');
    // } else {
        
    // }

   foreach ($routeLink as $router => $value) {
      foreach ($value as $key => $row) { 
        $tatiyeNet->assign_block_vars($router, array(
           'TITLE'  =>$key,
           'LINK'   =>URLROOT.'/'.$row[1],
           'PATH'   =>$row[5],
           'ROUTE'  =>URLROOT.'/'.$row[5],
           'ROW'    =>'#row/'.$row[1],
           'TAB'    =>$row[7],
           'F7'    =>$row[3],
           'HESTACK'=>$row[4],
           'DESC'   =>$row[0],
           'ICON'   =>$row[2],
        ));
           $URL=URLROOT.'/'.$row[1];
           $tatiyeNet->val($router.'.'.$row[7].'.TITLE',$key);
           $tatiyeNet->val($router.'.'.$row[7].'.DESC' ,$row[0]);
           $tatiyeNet->val($router.'.'.$row[7].'.ROUTE' ,URLROOT.'/'.$row[1]);
           $tatiyeNet->val($router.'.'.$row[7].'.ICON' ,$row[2]);
           $tatiyeNet->val($router.'.'.$row[7].'.PATH' ,$row[5]);
           $tatiyeNet->val($router.'.'.$row[7].'.LINK' ,URLROOT.'/'.$row[5]);
           $tatiyeNet->val($router.'.'.$row[7],$URL);
      }

   }


   if (!empty($arr['assets']['autoload'])) {

      
     foreach ($arr['assets']['header']  as $key => $value) {
           $tatiyeNet->assign_block_vars('header', array(
               'ASSETS'   =>tatiye::Assets($value),
           ));
       }

      if (!empty(tatiye::devterminal())) {
         $dev=array_merge($arr['assets']['footer'],tatiye::devterminal());
      } else {
         $dev=$arr['assets']['footer'];
      }
      foreach ($dev as $key => $value) {
           $tatiyeNet->assign_block_vars('footer', array(
               'ASSETS'   =>tatiye::Assets($value),
           ));
       }  
       // CONDISONAL
        foreach(array_merge($arr['assets']['header'],$arr['assets']['footer']) as $page => $row) {
           $namespace=end(explode('/',$row));
           $tatiyeNet->val($namespace, tatiye::Assets($row));
        }

        if (!empty($arr['import'])) {
            foreach($arr['import'] as $page => $row) {
               $namespace=end(explode('/',$row));
               $tatiyeNet->val('app.'.$namespace, tatiye::Assets($row));
            }
         } 


  }
 
 ?>
