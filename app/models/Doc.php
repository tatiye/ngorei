<?php
use app\tatiye;
error_reporting(0);  
use app\tatiyeNetInit;
$Text=tatiye::Text();
$tatiyeNet = new tatiyeNetInit();
$setApp = file_get_contents(tatiye::expDir('public/theme/package.json'));
$arr = json_decode($setApp, true);
      $Root = [
         'sitename'     =>$arr['app']['sitename'],
         'favicon'        =>tatiye::LINK('images/'.$arr['app']['favicon']),
         'icon'           =>tatiye::LINK('images/'.$arr['app']['icon']),
         'logo'           =>tatiye::LINK('images/'.$arr['app']['logo']),
         'SignIn'       =>tatiye::URL('users/login'),
         'SignUp'       =>tatiye::URL('users/register'),
         'title'        =>$arr['app']['title'],
         'headline'     =>$arr['app']['headline'],
         'description'  =>$arr['app']['description'],
         'version'      =>$arr['app']['version'],
         'ROOTTHEME'    =>tatiye::dir('/public/theme'),
         'ASSETROOT'    =>URLROOT.'/assets',
         'ROOTPUBLIC'   =>URLROOT.'/public',
         'ROOTMOBILE'   =>URLROOT.'/public/mobile',
         'ASSETMOBILE'  =>URLROOT.'/public/mobile/assets',
         'ROOTMODULES'  =>URLROOT.'/node_modules/tatiye',
         'URLROOT'      =>URLROOT,
         'HOME'         =>URLROOT,
         'onclickFalse'        =>'onclick="return false;"',
      ];



