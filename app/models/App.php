<?php
use app\tatiye;
use app\models\Package;
$Text=tatiye::Text();
$arr=tatiye::info('dashboard');
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
     'datetime'       =>tatiye::dt('DDIN'),
     'bulan'          =>tatiye::dt("INMonth"),
     'sitename'       =>$arr['app']['sitename'],
     'favicon'        =>tatiye::LINK('images/'.$arr['app']['favicon']),
     'icon'           =>tatiye::LINK('images/'.$arr['app']['icon']),
     'logo'           =>tatiye::LINK('images/'.$arr['app']['logo']),
     'SignIn'         =>tatiye::URL('users/login'),
     'SignUp'         =>tatiye::URL('users/register'),
     'headline'       =>$arr['app']['headline'],
     'description'    =>$arr['app']['description'],
     'version'        =>$arr['app']['version'],
     'onclickFalse'   =>'onclick="return false;"',
    ];
 if (!empty(tatiye::ssoId('userid'))) {

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
      foreach ($dev  as $key => $value) {
           $tatiyeNet->assign_block_vars('footer', array(
               'ASSETS'   =>tatiye::Assets($value),
           ));
       }  

        foreach($arr['import'] as $page => $row) {
                $tatiyeNet->val('tatiye.'.$page.'.net', tatiye::AssetsImport($row),'bs');
        }

        foreach($arr['import'] as $page => $row) {
                   $namespace=end(explode('/',$row));
                   $tatiyeNet->val('app.'.$namespace, tatiye::Assets($row));
        }
        

  }



   /*
   |--------------------------------------------------------------------------
   | Initializes Package 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2020
   | @Date 8/26/2023 12:22:10 PM
   */
   if (tatiye::ssoId('userid')==1) {
       $no=0;
       foreach (array_slice(Package::Public(), 0, 13)  as $key => $value) {
          if (!empty($value[3])) {
              $no=$no+1;
              $Exp=$tatiyeNet->assign_block_vars('package', array(
                   'TITLE'  =>$value[0],
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
      $query=tatiye::QY("SELECT packageid FROM appuserpackage WHERE userid='".tatiye::ssoId('userid')."'");                     
      while ($row = $query->fetch()) { 
       $no=$no+1;  
          $Exp=$tatiyeNet->assign_block_vars('package', array(
               'TITLE'  =>@$rbac[$row['packageid']][0],
               'LINK'   =>@$rbac[$row['packageid']][1],
               'ICON'   =>@$rbac[$row['packageid']][2],
               'CLASS'  =>'id="'.@$rbac[$row['packageid']][1].'"',
               'BG'     =>tatiye::rangeColor('bgColor',13,$no),
               'ROUTE'  =>'onclick="return false;"',
            ));
      } 
   }
   
     if (tatiye::ssoId('userid')==1) {
       foreach (array_slice(Package::Public(), 0, 8)  as $key => $value) {
          $Exp=$tatiyeNet->assign_block_vars('navigasi', array(
               'TITLE'  =>$value[0],
               'LINK'   =>$value[1],
               'ICON'   =>$value[2],
               'CLASS'  =>'id="nav'.$value[1].'"',
               'ROUTE'  =>'onclick="return false;"',
            ));
         }
   } else {
      $rbac =Package::Public();
      $query=tatiye::QY("SELECT packageid FROM appuserpackage WHERE userid='".tatiye::ssoId('userid')."' LIMIT 6");                     
      while ($row = $query->fetch()) {   
          $Exp=$tatiyeNet->assign_block_vars('navigasi', array(
               'TITLE'  =>@$rbac[$row['packageid']][0] ,
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
               $row=tatiye::useHandelCount('apparchive',"categori='".$value[1]."' AND userid='".tatiye::ssoId('userid')."' ");
               if (!empty($row['count'])) {
                 $label=''; 
               } else {
                 $label=' <span  onclick="deleteLabel([`'.$value[0].'`,`'.$value[4].'`]);" class="badge"><i class="tx-danger icon-feather-trash"></i></span>';
               }
               
            } else {
               $label='';
            }
                      
       $Exp=$tatiyeNet->assign_block_vars('library', array(
           'TITLE'  =>$value[0],
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
}   /*
   |--------------------------------------------------------------------------
   | Initializes UID 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2020
   | @Date 8/26/2023 12:22:10 PM
   */
   $uid=Package::Profil();

}
?>
