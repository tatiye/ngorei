<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  use Dompdf\Dompdf;
  class Docx extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
          $variable=explode('/',$_GET['url']);
          $str='';
           foreach ($variable as $key => $value) {
              if ($key !==0 ) {
                 $str= $str.$value.'/';
              }
           }
           $str = substr($str, 0, -1);
           $title=tatiye::tn(count($variable)-1);
           $Paper=tatiye::tn(2);
           $setPaper=tatiye::tn(3);
           // $dompdf = new Dompdf();
           if (!tatiye::tn(4)) {
              echo '<div style="width:100%;background:red; color:#fff;padding-left: 10px; "> Object does not exist '.$title.'</div>';
             exit;
           }
         
          if(!file_exists(tatiye::dir('public/package/'.$str.'.php'))){
             echo '<div style="width:100%;background:red; color:#fff;padding-left: 10px; "> Object does not exist '.$title.'</div>';
             exit;
          }
          ob_start();
          require_once(tatiye::dir('public/package/'.$str.'.php'));
          $html = ob_get_contents();
          ob_get_clean();     
          $pw = new \PhpOffice\PhpWord\PhpWord();
          $section = $pw->addSection();
          PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);
          header("Content-Type: application/octet-stream");
          header("Content-Disposition: attachment;filename=\"convert.docx\"");
          $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($pw, "Word2007");
          $objWriter->save("php://output");
       }
  }