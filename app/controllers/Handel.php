<?php
// error_reporting(0);
  use app\tatiye;
  use app\tatiyeNetInit;
  use app\tatiyeJson;
  use app\models\Package;
  use PhpOffice\PhpSpreadsheet\IOFactory;
  use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Firebase\JWT\JWT;


  class Handel extends Controller{
    public function __construct(){}
    // Load Homepage
    public function index(){

      $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
      $HTTP_HOST = $protocol."://". $_SERVER['HTTP_HOST'].str_replace("index.php", "", $_SERVER['PHP_SELF']);
      $HTTP=substr($HTTP_HOST, 0, -8);
      echo $HTTP;
      // self::cookieRead('urlroot',$Text->strreplace([$substr,'/public','']));
      // return $Text->strreplace([$substr,'/public','']).$in;




//   echo tatiye::cookieRead('nama','tatiye');
//   echo tatiye::cookieUnset('nama');;



// function table_exists(&$db, $table)
// {
//   $result = $db->query("SHOW TABLES LIKE '{$table}'");
//   if( $result->num_rows == 1 )
//   {
//           return TRUE;
//   }
//   else
//   {
//           return FALSE;
//   }
//   $result->free();
// }



      // $db=tatiye::fireDb();
      // echo $db['database']['databaseURL'];
      // var_dump(tatiye::fireDb());
 
    // $variable=tatiye::Firebase("exsampel")->setData();
    // foreach ($variable as $key => $value) {
    //   echo $value['title'].'===>'.$key.'<br>';
    //   // code...
    // }
       // $setData=tatiye::Firebase("exsampel")->insert([
       //  "id"=>'1',
       //  "title"=>'iandantrik',
       //  "addres"=>'Marisa'
       // ]);

     // $setData=tatiye::Firebase("exsampel")->update('NwVNM_Mr3nlx7uU8-f9',[
     //    "title"=>'Gibran',
     //    "addres"=>'Marisa'
     //   ]);

     // $setData=tatiye::Firebase("exsampel")->delete('-NwVP_Ao4EqTrDW1J72W');


//  $toFile='public/package/demo2/controllers/send';
// $dir=tatiye::dir($toFile);
// shell_exec("rm -rf $dir");

 // exec('rm -rf '.escapeshellarg(tatiye::dir($toFile)));
 // $dlet=tatiye::delTree($toFile);
 // var_dump($dlet);
 //   $directoryPath = '/path/to/directory';
  // echo tatiye::deleteDirectory(tatiye::dir($toFile));

// exec("/usr/bin/ffmpeg -i ".$movie." -vframes 1 -ss 00:00:06 -s 
// 120x72 -f image2 ".$thumbnail);

     //  $var=tatiye::uidProfil(1);
     // echo tatiye::dir();
      //   $setApp = file_get_contents(tatiye::expDir("public/theme/package.json"));
      //   $arr=json_decode($setApp, true);
      //  echo "<br>";
      // echo $arr['app']['mobile'];
 // $rbac =Package::Public();
 // foreach ($rbac as $key => $value) {
 //  echo $value[1];
 //  echo "<br>";
 // }
  // $token=tatiye::cookie('geolocation');
  // $storage=json_decode($token, true);
  // echo $token;
    //$rbac=tatiye::getPackage(4,'Absen');
   // echo $rbac[2];
      //echo "string";
// echo "<br>";
// echo $rbac[2][0];
// echo "<br>";
// echo $rbac[2][4];

      // $chart=tatiye::color("10",'9');
      // var_dump($chart);
       // $Protokol=tatiye::Protokol();
       // echo $Protokol;
     // echo $variable=tatiye::indexJson('bg_color');
     // var_dump($variable);
     // foreach ($variable as $key => $value) {
     //  echo $value[0];
     //   // code...
     // }
     // echo tatiye::getRoute();
//   echo tatiye::CekDB('mySQL');
//   echo "<br>";
//   echo $_SERVER["HTTP_REFERER"];
// $bat=tatiye::privateKey([
//   'password' =>'^^Nugi112',
//   'license'  =>'5BBCE-8321B-7AFB9-07F58-00001',
//   'details'  =>[
//     "iss" => "http://example.org",
//     "aud" => "http://example.com",
//     "iat3" => 1356999524,
//     "iats" => 1356999524,
//     "iat4" => 1356999524,
//     "nbf" => 1357000000
//   ],
// ]);
//   //Split lines:
// echo tatiye::control();
// var_dump(tatiye::control());
 
//  echo tatiye::tabelRaw(tatiye::canononical());
 //$db = new tatiye();
 // var_dump(tatiye::dBmysql());

// generate a 1024 bit rsa private key, returns a php resource, save to file

// Create the private and public key

// $db->create_database('ngorei3');
// $data = array(
//     'id'         => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY', 
//     'title'      => 'varchar(100) DEFAULT NULL',
//     'deskripsi'  => 'varchar(100) DEFAULT NULL',
//     'images'     => 'varchar(200) DEFAULT NULL'
// );
// $db->from_sql($data)->create_tabel('demo6');


// $db->netDb()->select('demo');
// foreach ($result as $red => $row) {
//   echo $row['title'];
//   echo $row['deskripsi'];
//   echo $row['images'];
// };
// $arr = array();

// $link='aa/';
// $row=tatiye::requirePackage($link);
// echo $row['path'];

 // $arr["id"]         ='wolf0831';
 // $arr["title"]      ='Hando112';
 // $arr["deskripsi"]  ='Framework';
 // $arr["images"]     ='images';



 //$result=$db->netDb($arr)->update('package',"id=wolf083");
 // $result=$db->netDb($arr)->insertkey('package',"id|wolf0831");
// // echo "<br>";

// // $variable=tatiye::publicApiTabel();
// // echo $variable[0]['tabel'];
// // // var_dump($variable);

// // $data[]=array(
   
// //         'Platform' => 'Tatiye',
// //         'Framework' => 'Ngorei',
// //         'version' =>'1.0.4',
   
// // );
             
     // $db = new tatiye();
     // $mysqli=$db->mysqli();
   







// echo tatiye::auto_increment('demo');


// echo tatiye::tabelRaw(tatiye::control());
// echo tatiye::tabelRaw(tatiye::requirePackage());
// echo tatiye::tabelRaw(tatiye::dbtabel()->show_tabelAll());
// $cek=tatiye::dbtabel()->show_tabelName('demo');
// echo $cek[0]["tabel"];

// echo tatiye::tabelRaw(tatiye::dbtabel()->show_tabelName('demo'));
// echo tatiye::tabelRaw(tatiye::dbtabel()->colom_tabel('demo'));
// echo "platfrom";
//  echo tatiye::tabelRaw(tatiye::platfrom(),0);
//  echo tatiye::tabelRaw(tatiye::licenced(),0);
//  echo tatiye::setRaw(tatiye::component(),["App Public","Status"]);
//  echo tatiye::tabelRaw(tatiye::component(),0);
//   echo "<b>Info Lisensi Ngori :tatiye::trial()</b>";
//  echo tatiye::tabelRaw(tatiye::trial(),0);
//   echo tatiye::setRaw(tatiye::trial(),["App Public","Status"]);
//  echo "<b>Package Install :tatiye::development()</b>";

//  $nets=tatiye::rowFalse('package','demo',true);
//  echo $nets['Package'];
//  echo tatiye::tabelRaw(tatiye::development(),0);
//  echo tatiye::tabelRaw(tatiye::rowFalse('package','demo'),0);


//  echo tatiye::tabelRawColom(tatiye::development('demo'),["id","package","lisensi","install"]);
//  echo "<b>Package Dashboard :tatiye::publicPackage()</b>";
//  echo tatiye::tabelRaw(tatiye::publicPackage(),0);
//  echo tatiye::tabelRawColom(tatiye::publicPackage(),["Package","Icon","Status"],[0,2,3]);
//  echo "<b>Akses API tatiye::publicPackageApi()</b>";
//  echo tatiye::tabelRaw(tatiye::publicPackageApi(),0);
//  echo tatiye::tabelRawColom(tatiye::publicPackageApi(),["Package","Version"],[0,1]);


//  echo "<b>File API tatiye::getFileApi()</b>";
//  echo tatiye::tabelRaw(tatiye::getFileApi(),0);

//  echo "<b>File API tatiye::getFileApi() Json File array</b>";
// echo tatiye::tabelRawColom(tatiye::getFileApi('demo'),["id","tabel","type"]);
// echo "<hr>";
// echo tatiye::tabelRawColom(tatiye::getFileApi('demo'),["id","file","type"]);
// echo "<hr>";
//  echo "<b> Json File array</b>";
//  $arr=tatiye::tabelRawColom(tatiye::getFileApi('demo',21),["id","file","path"],'','a');
// $keyId=tatiye::getFileApi('demo',21);
// echo var_dump($keyId[0]['data']);
// echo "<hr>";

//   echo "<b>package Lisensi tatiye::packageLisensi()</b>";
//  echo tatiye::tabelRaw(tatiye::packageLisensi(),0);
//  $ret=tatiye::getuseLisnsiPackage('demo');
// // var_dump(tatiye::getuseLisnsiPackage('demo'));
//   echo "<b>Akses Tabel API tatiye::publicApiTabel()</b>";
//  echo tatiye::tabelRaw(tatiye::publicApiTabel(),0);
//    echo "<b>Info User tatiye::userid()</b>";
//  echo tatiye::tabelRaw(tatiye::userid(),0);
//  echo tatiye::setRaw(tatiye::component(),["App Public","Status"]);
//    echo "<b> API ACCESS TOKEN USER tatiye::uidToken()</b>";
//  echo tatiye::tabelRaw(tatiye::uidToken(),0);
 // echo tatiye::tabelRaw(tatiye::getFile('D:\Ngorey\ngorei\public/package/Profil/Api/0.1/Doc/appuser.json '),0);





// echo tatiye::resizefiledir('images/img/','600x315/');
// echo tatiye::resizeTabelImage('300x215','url filename')
// echo tatiye::blackWhiteImage('330x250/img/01.jpg');
// var_dump(tatiye::thumbnail([15,'appnews','591x395']));
  //  tatiye::cropImage('500x500/03.jpg','50x120');
 //tatiye::resizeWidth('500x500/03.jpg','400');

 //tatiye::resizeHeight('500x500/03.jpg','700');
// $AppAssets=tatiye::dir('public/assets/navigasi.json');
// $Text=tatiye::Text();
//  require_once tatiye::dir('app/views/router/mobile.php');
//     $Exp2[]=array('no' =>'[');
//     $str='[';
//  foreach ($routeLink['mobilecomponents'] as $router => $value) {
//      $str=$str.'{"path": "/'.$Text->strreplace([$router,' ','-']).'/","url": "'.tatiye::LINK('mobile/'.$value[0].'.html').'"},';
//  };

//  $str = substr($str, 0, -1).']';
//  echo $storage=tatiye::AsciiTable()->crud($Exp2);

//     $filecomponents = fopen($AppAssets, "w");
//    fwrite($filecomponents, $str);







 // echo  tatiye::watermarkImage('500x500/03a.jpg','Logo.png','center');
// bottomCenter
// topLeft
// topCenter
// topRight
// centerLeft
// center
// centerRight
// bottomRight
 //     echo "<hr>";
 //     echo '  <img style="width:500px" src="'.tatiye::images('03.jpg').'" alt="">';
      // echo '  <img src="'.tatiye::images('330x250/img/01.jpg').'" alt="">';

// echo tatiye::precode('theme/docs/F7/pages/columns.html','html');
//  require_once tatiye::dir('app/views/router/docs.php');
//  foreach ($hashtag as $router => $value) {
//       foreach ($value as $key => $row) {
//         echo $router.'<br>';
//         // $tatiyeNet->assign_block_vars($router, array(
//         //    'TITEL'  =>$key,
//         //    'LINK'   =>$row[1],
//         //    'ICON'   =>$row[1],
//         //    'ROUTE'  =>'onclick="useClickHashtag(`'.$row[0].'`);"',
//         // ));
//       }
//    }








// username
// password
// database
  }

 
  }
  ?>

