<?php
use app\tatiye;
$db = new tatiye();
// use app\Database\NetDb\tatiyeNetDb;

    // public static function netDb($array=''){
    //      return tatiyeNetDb::init($array)->from_array($array);   
    //  }

// $row=self::netDb()->where('demo','id=4');
// echo $row['title'];



$row=$db->netDb()->where('demo','id=11');
echo $row['title'];

// $arr = array(); 
// $arr["title"]      ='wolf08';
// $result=$db->netDb($arr)->insert('demo');

  echo "string";

