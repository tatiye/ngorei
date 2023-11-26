<?php 
use app\tatiye;
use app\models\Package;
use app\tatiyeNetAuthorization AS Authorization;
          $row=tatiye::fetch("applicense","*","serial='".tatiye::tn(4)."'");
          if (!empty($row['id'])) {
            if(strtotime($row['date']) < time()) {
                  $status='expair';
              } else {
                 $status='active';
              }   
              $deskripsi='Token sesuai';
            } else {
              $deskripsi='Token tidak sesuai';
            }
             
           $Exp=array(
              'serial'               =>tatiye::tn(4),
              'expair'               =>$row['date']??='',
              'deskripsi'            =>$deskripsi,
              'status'               =>$status??='',
              );
           echo json_encode($Exp);    
       
           
