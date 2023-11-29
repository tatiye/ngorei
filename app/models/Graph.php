<?php
error_reporting(0);
use app\tatiye;
$Text=tatiye::Text();
$db=new tatiye();
use app\tatiyeNetInit;
$tatiyeNet = new tatiyeNetInit();
$setApp = file_get_contents(tatiye::expDir('public/theme/package.json'));
$arr = json_decode($setApp, true);
foreach($arr['routePath'] as $keyPath => $value) {
        $routePath['path.'.$keyPath]=file_get_contents(tatiye::dir('public/'.$value));
}
$newSetapp= [
 'sitename'     =>$arr['app']['sitename'],
 'favicon'      =>tatiye::LINK('images/'.$arr['app']['favicon']),
 'icon'         =>tatiye::LINK('images/'.$arr['app']['icon']),
 'logo'         =>tatiye::LINK('images/'.$arr['app']['logo']),
 'SignIn'       =>tatiye::URL('users/login'),
 'SignUp'       =>tatiye::URL('users/register'),
 'title'        =>$arr['app']['title'],
 'headline'     =>$arr['app']['headline'],
 'description'  =>$arr['app']['description'],
 'version'      =>$arr['app']['version'],
 'ROOTTHEME'    =>tatiye::dir('/public/theme'),
 'URLROOT'      =>URLROOT,
 'HOME'         =>URLROOT,
 'onclickFalse' =>'onclick="return false;"',
];
$app=array_merge($newSetapp,$routePath);

foreach($arr['index'] as $key => $value) {
        if ($value[3]=='dropdown') {
           $setLink='javascript:void(0);';
        } else {
           $setLink=URLROOT.'/'.$value[1];
        }
        
        $tatiyeNet->assign_block_vars('index', array(
           'TITEL'  =>$value[0],
           'LINK'   =>$setLink,
           'ICON'   =>$value[2],
           'ROUTE'  =>'',
        ));
}
foreach($arr['link'] as $key => $value) {
        $tatiyeNet->assign_block_vars('link', array(
           'TITEL'  =>$value[0],
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
        $tatiyeNet->val($value['file'], $value['url']);
    }
}

    if (!empty($arr['graph'][tatiye::tn(0)])) {
        require_once tatiye::dir('app/views/router/'.tatiye::tn(0).'.php');
    } else {
        require_once tatiye::dir('app/views/router/index.php');
    }
   foreach ($routeLink as $router => $value) {
      foreach ($value as $key => $row) {
        $tatiyeNet->assign_block_vars($router, array(
           'TITEL'  =>$key,
           'LINK'   =>URLROOT.'/'.$row[0],
           'ICON'   =>$row[1],
           'ROUTE'  =>'',
        ));
      }
   }

   foreach ($hashtag as $router => $value) {
      foreach ($value as $key => $row) {
        $tatiyeNet->assign_block_vars($router, array(
           'TITEL'  =>$key,
           'LINK'   =>$row[1],
           'ICON'   =>$row[1],
           'ROUTE'  =>'onclick="useClickHashtag(`'.$row[0].'`);"',
        ));
      }
   }



   if (!empty($arr['assets']['autoload'])) {
      foreach ($arr['assets']['header']  as $key => $value) {
           $tatiyeNet->assign_block_vars('header', array(
               'ASSETS'   =>tatiye::Assets($value),
           ));
       }




      foreach ($arr['assets']['footer']  as $key => $value) {
           $tatiyeNet->assign_block_vars('footer', array(
               'ASSETS'   =>tatiye::Assets($value),
           ));
       }  
       // CONDISONAL
        foreach(array_merge($arr['assets']['header'],$arr['assets']['footer']) as $page => $row) {
                $namespace=end(explode('/',$row));
                $tatiyeNet->val($namespace, tatiye::Assets($row));
        }
        foreach(array_merge($arr['assets']['header'],$arr['assets']['footer']) as $page => $row) {
                $namespace=end(explode('/',$row));
                $tatiyeNet->val('bs.'.$namespace, tatiye::AssetsBase($row),'bs');
        }

        foreach(array_merge($arr['assets']['header'],$arr['assets']['footer']) as $page => $row) {
                $namespace=end(explode('/',$row));
                $namespaceJS=explode('.js',$namespace);
                if (!empty($namespaceJS[0])) {
                $tatiyeNet->val('tatiye.'.$namespaceJS[0], tatiye::AssetsBase($row),'bs');
                }
        }

        foreach($arr['import'] as $page => $row) {
                $tatiyeNet->val('tatiye.'.$page.'.net', tatiye::AssetsImport($row),'bs');
        }

  }
   require_once __DIR__.'/objectStorage.php';
 
 ?>
