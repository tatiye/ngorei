<?php
// error_reporting(0);
  use app\tatiye;
  use app\tatiyeNetInit;
  use app\models\Package;
  use PhpOffice\PhpSpreadsheet\IOFactory;
  use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

  class Handel extends Controller{
    public function __construct(){}
    // Load Homepage
    public function index(){
// echo tatiye::resizefiledir('images/img/','600x315/');
// echo tatiye::resizeTabelImage('300x215','url filename')
echo tatiye::blackWhiteImage('330x250/img/01.jpg');
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
      echo '  <img src="'.tatiye::images('330x250/img/01.jpg').'" alt="">';

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

