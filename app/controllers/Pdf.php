<?php
  use app\tatiye;
  use app\tatiyeNetInit;
  use Dompdf\Dompdf;
  class Pdf extends Controller{
    public function __construct(){
     
    }
    // Load Homepage
    public function index(){
          $variable=explode('/',$_GET['url']);
          $str='';
          foreach ($variable as $key => $value) {
            if ($key !==0 && $key !==2 && $key !==3) {
            $str= $str.$value.'/';
            }
          }
           $str = substr($str, 0, -1);
           $title=tatiye::tn(count($variable)-1);
           $Paper=tatiye::tn(2);
           $setPaper=tatiye::tn(3);
           $dompdf = new Dompdf();

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
          $dompdf->set_option('isRemoteEnabled',TRUE); 
          $dompdf->loadHtml('<title>'.$title.'</title>'.$html); 
          $dompdf->setPaper($Paper, $setPaper);
          $dompdf->render();
          $dompdf->stream($title.".pdf", array("Attachment" => 0)); 
       }
  }