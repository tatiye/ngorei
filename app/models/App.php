<?php
use app\tatiye;
use app\models\Package;
$Text=tatiye::Text();
$setApp = file_get_contents(tatiye::expDir('public/theme/package.json'));
$arr = json_decode($setApp, true);
      $IDPAGE=explode(tatiye::tn(0),$_GET['url']);
      $IDPAGE1=explode('_',$IDPAGE[1]);
      if (!empty($IDPAGE1[1])) {
         $setKeyID=$IDPAGE1[1];
      } else {
         $setKeyID='';
      }
      
$app= [
 'key'            =>$setKeyID,
 'tahun'          =>tatiye::dt('Y'),
 'bulan'          =>tatiye::dt("INMonth"),
 'sitename'       =>$arr['app']['sitename'],
 'favicon'        =>tatiye::LINK('images/'.$arr['app']['favicon']),
 'icon'           =>tatiye::LINK('images/'.$arr['app']['icon']),
 'logo'           =>tatiye::LINK('images/'.$arr['app']['logo']),
 'SignIn'         =>tatiye::URL('users/login'),
 'SignUp'         =>tatiye::URL('users/register'),
 'title'          =>$arr['app']['title'],
 'headline'       =>$arr['app']['headline'],
 'description'    =>$arr['app']['description'],
 'version'        =>$arr['app']['version'],
 'onclickFalse'   =>'onclick="return false;"',
];
 if (!empty($_SESSION['sub_domain'])) {
   /*
   |--------------------------------------------------------------------------
   | Initializes Package 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2020
   | @Date 8/26/2023 12:22:10 PM
   */
   if ($_SESSION['user_id']==1) {
       $no=0;
       foreach (array_slice(Package::Public(), 0, 13)  as $key => $value) {
          if (!empty($value[3])) {
              $no=$no+1;
              $Exp=$tatiyeNet->assign_block_vars('package', array(
                   'TITEL'  =>$value[0],
                   'LINK'   =>$value[1],
                   'ICON'   =>$value[2],
                   'NO'      =>$no,
                   'CLASS'  =>'id="'.$value[1].'"',
                   'BG'     =>tatiye::rangeColor('bgColor',13,$no),
                   'ROUTE'  =>'onclick="return false;"',
                ));
          }
         }
   } else {
      $no=0;
      $rbac =Package::Public();
      $query=tatiye::QY("SELECT packageid FROM appuserpackage WHERE userid='".$_SESSION['user_id']."'");                     
      while ($row = $query->fetch()) { 
       $no=$no+1;  
          $Exp=$tatiyeNet->assign_block_vars('package', array(
               'TITEL'  =>@$rbac[$row['packageid']][0],
               'LINK'   =>@$rbac[$row['packageid']][1],
               'ICON'   =>@$rbac[$row['packageid']][2],
               'CLASS'  =>'id="'.@$rbac[$row['packageid']][1].'"',
               'BG'     =>tatiye::rangeColor('bgColor',13,$no),
               'ROUTE'  =>'onclick="return false;"',
            ));
      } 
   }
   
     if ($_SESSION['user_id']==1) {
       foreach (array_slice(Package::Public(), 0, 6)  as $key => $value) {

          $Exp=$tatiyeNet->assign_block_vars('navigasi', array(
               'TITEL'  =>$value[0],
               'LINK'   =>$value[1],
               'ICON'   =>$value[2],
               'CLASS'  =>'id="nav'.$value[1].'"',
               'ROUTE'  =>'onclick="return false;"',
            ));
         }
   } else {
      $rbac =Package::Public();
      $query=tatiye::QY("SELECT packageid FROM appuserpackage WHERE userid='".$_SESSION['user_id']."' LIMIT 6");                     
      while ($row = $query->fetch()) {   
          $Exp=$tatiyeNet->assign_block_vars('navigasi', array(
               'TITEL'  =>@$rbac[$row['packageid']][0] ,
               'LINK'   =>@$rbac[$row['packageid']][1] ,
               'ICON'   =>@$rbac[$row['packageid']][2] ,
               'CLASS'  =>'id="nav'.@$rbac[$row['packageid']][1].'"',
               'ROUTE'  =>'onclick="return false;"',
            ));
      } 
   }
   /*
   |--------------------------------------------------------------------------
   | Initializes Library 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2020
   | @Date 8/26/2023 12:22:10 PM
   */
   
      foreach (Package::Library() as $key => $value) {
            if (!empty($value[1])) {
                $devices='devices/';
            } else {
                $devices='devices';
            }  

            if (@$value[3]==2) {
               $row=tatiye::useHandelCount('apparchive',"categori='".$value[1]."' AND userid='".$_SESSION['user_id']."' ");
               if (!empty($row['count'])) {
                 $label=''; 
               } else {
                 $label=' <span  onclick="deleteLabel([`'.$value[0].'`,`'.$value[4].'`]);" class="badge"><i class="tx-danger icon-feather-trash"></i></span>';
               }
               
            } else {
               $label='';
            }
                      
       $Exp=$tatiyeNet->assign_block_vars('library', array(
           'TITEL'  =>$value[0],
           'LINK'   =>$devices.$value[1],
           'ICON'   =>$value[2],
           'CLASS'  =>'id="nav1'.$value[1].'"',
           'ROUTE'  =>'onclick="return false;"',
           'LABEL'  =>$label,
        ));
     }

    foreach($arr['import'] as $page => $row) {
            $tatiyeNet->val('app.'.$page, tatiye::AssetsImport($row),'bs');
    }
     
   /*
   |--------------------------------------------------------------------------
   | Initializes UID 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2020
   | @Date 8/26/2023 12:22:10 PM
   */
   $uid=Package::Profil();
   // require_once __DIR__.'/navLinkPackage.php';
   // foreach ($routeLink as $router => $value) {
   //    foreach ($value as $key => $row) {
   //      $tatiyeNet->assign_block_vars($router, array(
   //         'TITEL'  =>$key,
   //         'LINK'   =>$row[1],
   //         'ICON'   =>$row[1],
   //         'ROUTE'  =>'onclick="ClickPackage(`'.tatiye::URL($row[0]).'`);"',
   //      ));
   //    }
   // }
}
?>
