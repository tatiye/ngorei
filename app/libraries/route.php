<?php
 error_reporting(0);
  use app\tatiye;
  use app\tatiyeNetInit;
  $tatiyeNet = new tatiyeNetInit(); 
  $Text=tatiye::Text();
  require_once APPROOT.'/models/Graph.php';
  require_once __DIR__.'/direktory.php';
          $Pages=tatiye::indexPage($_POST['package']);
          $newPages=$Pages['path'];
          if (!empty($Pages['fetch']['path'])) {
              $keyword=tatiye::infoMeta($Pages['fetch'],$_POST['package']);
              $metaTag=array_merge($DIREKTORY,$app,$keyword);
          } else {
              $metaTag=array_merge($DIREKTORY,$app);
          }
 
         foreach($metaTag as $page => $row) {
            $tatiyeNet->val($page, $row);
         }

         if (!empty($_POST['key'])) {
             $infoToken = array(
                   'key'       =>$_POST['key'],
                   'url'       =>tatiye::LINK($_POST['package']),
                   'primarykey'=>$Text->strreplace([end(explode('/',$_POST['key'])),'-',' ']) ,
                   'resheader' =>$_POST['resheader'],
             );
             foreach($infoToken as $page => $row) {
                 $tatiyeNet->val($page, $row);
             }
         } 
        
         if ($newPages=='index') {
             $pathDir='public/theme/'.$newPages;
         } else {
             $pathDir=$newPages;

         }

        // INDEX PAGE
        if(!file_exists(tatiye::dir($pathDir.'.html'))){
          echo '<div style="width:100%;background:red; color:#fff;padding-left: 10px; "> Object does not exist '.$pathDir.'.html</div>';
           exit;
        }

  
       
        if (!empty($_POST['path'])) {
           $assets=tatiye::LINK('modules/theme/'.$_POST['path'].'/assets.jsx');
        } else {
           $assets=tatiye::LINK('modules/theme/assets.jsx');
        }
        
         echo $tatiyeNet->GraphObject(tatiye::expDir($pathDir));
         echo '<script src="'.$assets.'" defer type="module""></script>';
         // echo '<script src="'.$DIREKTORY['ROOTPUBLIC'].'/assets/js/prism/clipboard.code.js"></script>';
         // echo '<script src="'.$DIREKTORY['ROOTPUBLIC'].'/assets/js/prism/clipboard.min.js"></script>';
         ?>

