<?php
use app\tatiye;
echo''.PHP_EOL;
echo'export const BASE_URL      ="'.$_POST['urlroot'].'";'.PHP_EOL;
echo'export const VENDOR        ="'.tatiye::license('VENDOR').'";'.PHP_EOL;
echo'export const ACCESS_TOKEN  ="'.tatiye::userDevToken().'";'.PHP_EOL;
echo'export const PATROUTES     ='.$patroutes.';'.PHP_EOL;
echo'export const PATROUTESID   ='.$patroutesId.';'.PHP_EOL;


