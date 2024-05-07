<?php
use app\tatiye;
$arr=tatiye::info('theme');
if (!empty(tatiye::ssoId('sub_domain'))) {
   $sub_domain=tatiye::ssoId('sub_domain');
   $serialKey=tatiye::serialKey();
   $SITENAME=tatiye::tn(1);
   // $login=tatiye::skillset('login');
   // $history=tatiye::skillset('history');
   // $package=tatiye::skillset('package');
  if (!empty(tatiye::tn(1))) {
 
  } else {
     $SITENAME=SITENAME;
  }
} else {
  $sub_domain='';
  $serialKey='';
  $login='';
  $history='';
  $package='';
  $SITENAME=SITENAME;
}
$DIREKTORY=[
  'SITENAME'      =>$SITENAME,
  'sitename'      =>$arr['app']['sitename'],
  'login'         =>$login,
  'history'       =>$history,
  'instance'      =>$package,
  'uiname'        =>$sub_domain,
  'serialkey'     =>$serialKey,
  'tahun'         =>tatiye::dt('Y'),
  'bulan'         =>tatiye::dt("INMonth"),
  'hari'          =>tatiye::dt("INDay"),
  'tggl'          =>tatiye::dt("DDIN"),
  'date'          =>tatiye::dt("EN"),
  'ASSETROOT'     =>URLROOT.'/assets',
  'ROOTTHEME'     =>URLROOT.'/theme/assets',
  'APPTHEME'      =>URLROOT.'/theme',
  'ROOTPUBLIC'    =>URLROOT.'/',
  'ROOTMOBILE'    =>URLROOT.'/mobile',
  'ASSETMOBILE'   =>URLROOT.'/mobile/assets',
  'ROOTAPPS'      =>URLROOT.'/public/webview',
  'ASSETAPPS'     =>URLROOT.'/public/webview/assets',
  'ROOTMODULES'   =>URLROOT.'/node_modules/tatiye',
  'ASSETTHEME'    =>tatiye::LINK('theme/assets'),
  'URLROOT'       =>URLROOT,
  'HOME'          =>URLROOT,
  'Route'         =>URLROOT.'/'.$sub_domain,
  'URLBASE'       =>URLROOT.'/'.$sub_domain,
  'LOGOUT'        =>URLROOT.'/users/logout',
  'LOGOUT'        =>URLROOT.'/users/logout',
  'onclickFalse'  =>'onclick="return false;"',
  'tatiye.es6'    =>URLROOT.'/node_modules/tatiye/es6.js',
  'es6'           =>URLROOT.'/node_modules/tatiye/es6.js',
  'ES6'           =>URLROOT.'/node_modules/tatiye/es6.js',
  'ngorei'        =>URLROOT.'/node_modules/tatiye/es6.js',
  'tatiye'        =>URLROOT.'/node_modules/tatiye/es6.js',
  'modules'       =>URLROOT.'/modules',
];
