<?php 
use app\tatiye;
            $variable=tatiye::BQ($APPQUERY);
            $AZ='az';
            $myNo=0; 
            $myNo1=0; 
            $myNo2=0; 
            $myNo3=0; 
echo 'error_reporting(0);'.PHP_EOL;
echo 'use app\tatiye;'.PHP_EOL;
echo 'use app\Graph\Response AS Response;'.PHP_EOL;
echo 'use app\tatiyeNetAuthorization AS Authorization;'.PHP_EOL;
echo '$NEWTOKEN="'.$NEWTOKEN.'";'.PHP_EOL;
echo 'Authorization::init(1);'.PHP_EOL;
echo 'Authorization::HTTP_KEY($_SERVER["HTTP_KEY"]);'.PHP_EOL;
echo 'Authorization::HTTP_USERID($_SERVER["HTTP_USERID"]);'.PHP_EOL;
echo '$db=new tatiye();'.PHP_EOL;                                                       
echo '$Text=tatiye::Text();'.PHP_EOL;                                                       
echo '$setId=$_SERVER["HTTP_KEY"];'.PHP_EOL;                                                 
echo '$setUId=$_SERVER["HTTP_USERID"];'.PHP_EOL; 
echo 'if($_SERVER["REQUEST_METHOD"] === "POST") {'.PHP_EOL;
            $Exp1[]=array('no' =>'if (is_numeric($setId)) {');
            $Exp1[]=array('no' =>' $segmen="update";');
            $Exp1[]=array('no' =>'} else {');
            $Exp1[]=array('no' =>' $segmen="insert";');
            $Exp1[]=array('no' =>'}');
            $Exp1[]=array('no' =>'#|-------------------------------------');
            $Exp1[]=array('no' =>'#| Initializes SEGMENT INSERT');
            $Exp1[]=array('no' =>'#|-------------------------------------');
            $Exp1[]=array('no' =>'#| Develover Tatiye.Net '.tatiye::dt("Y").'');
            $Exp1[]=array('no' =>'#| @Date  '.tatiye::dt('DTIE').'');
            $Exp1[]=array('no' =>'if($segmen == "insert") {');
            $Exp1[]=array('no' =>'$val=tatiye::validation([');
            foreach (array_keys($variable) as $key => $value) {
              $myNo=$myNo+1;
                 $Exp1[]=array('no'=>'   "'.$value.'"=>tatiye::val("text",$_POST["'.$value.'"]   ,"2|Wajib diisi"),');
              }
              $Exp1[]=array('no' =>']);');
              $Exp1[]=array('no' =>'if (empty($val["error"])) {');
              $Exp1[]=array('no' =>'   $data = array( ');
              foreach (array_keys($variable) as $key => $value) {
              $myNo1=$myNo1+1;
                 $Exp1[]=array('no'=>'     "'.$value.'"    =>$_POST["'.$value.'"],');
              }
              $Exp1[]=array('no'=>'     "time"   =>tatiye::tm(),');
              $Exp1[]=array('no'=>'     "date"   =>tatiye::dt("EN"),');
              $Exp1[]=array('no'=>'     "bulan"  =>tatiye::dt("M"),');
              $Exp1[]=array('no'=>'     "tahun"  =>tatiye::dt("Y"),');
              $Exp1[]=array('no'=>'     "userid" =>$setUId,');
              $Exp1[]=array('no' =>'    );');
              $Exp1[]=array('no' =>'    $result=$db->que($data)->insert("'.$tabel.'");');
              $Exp1[]=array('no' =>'    $val["hasil"]    ="sukses";');
              $Exp1[]=array('no' =>'} else {');
              $Exp1[]=array('no' =>'    $val["hasil"]    ="error";');
              $Exp1[]=array('no' =>' };  ');
              $Exp1[]=array('no' =>'#|-----------------------------------------------');
              $Exp1[]=array('no' =>'#| Initializes  SEGMENT UPDATE');
              $Exp1[]=array('no' =>'#|-----------------------------------------------');
              $Exp1[]=array('no' =>'#| Develover Tatiye.Net '.tatiye::dt("Y").'');
              $Exp1[]=array('no' =>'#| @Date  '.tatiye::dt('DTIE').'');
              $Exp1[]=array('no' =>'} elseif ($segmen == "update") {');
              $Exp1[]=array('no' =>'  $val=tatiye::validation([');
                foreach (array_keys($variable) as $key => $value) {
                   $myNo2=$myNo2+1;
                   $Exp1[]=array('no'=>'   "'.$value.'"=>tatiye::val("text",$_POST["'.$value.'"]   ,"2|Wajib diisi"),');
                }
              $Exp1[]=array('no' =>' ]);');
              $Exp1[]=array('no' =>'if (empty($val["error"])) {');
              $Exp1[]=array('no' =>'   $data = array( ');
              $myNo3=0;
              foreach (array_keys($variable) as $key => $value) {
              $myNo3=$myNo3+1;
                 $Exp1[]=array(
                   'no'=>'     "'.$value.'"    =>$_POST["'.$value.'"],',             
                 );
              }
               $Exp1[]=array('no'=>'     "time"     =>tatiye::tm(),');
               $Exp1[]=array('no'=>'     "date"     =>tatiye::dt("EN"),');
               $Exp1[]=array('no'=>'     "bulan"    =>tatiye::dt("M"),');
               $Exp1[]=array('no'=>'     "tahun"    =>tatiye::dt("Y"),');
               $Exp1[]=array('no' =>'    );');
               $Exp1[]=array('no' =>'    $result=$db->que($data)->update("'.$tabel.'","id =$setId AND userid=$setUId");');
               $Exp1[]=array('no' =>'    $val["hasil"]    ="sukses";');
               $Exp1[]=array('no' =>'} else {');
               $Exp1[]=array('no' =>'    $val["hasil"]    ="error";');
               $Exp1[]=array('no' =>' };  ');
               $Exp1[]=array('no' =>'}');
echo tatiye::AsciiTable()->crud($Exp1);
echo '    echo json_encode($val); '.PHP_EOL;
echo '    exit;'.PHP_EOL;                                                  
echo ' } elseif ($_SERVER["REQUEST_METHOD"] === "DELETE"){'.PHP_EOL;
echo '    $db->delete("'.$tabel.'","id=$setId AND userid=$setUId");'.PHP_EOL; 
echo '    $response = new Response();'.PHP_EOL;
echo '    $response->setHttpStatusCode(200);'.PHP_EOL;
echo '    $response->setSuccess(false);'.PHP_EOL;
echo '    $response->addMessage("success delete id $setId");'.PHP_EOL;
echo '    $response->send();'.PHP_EOL;
echo '    exit;'.PHP_EOL;
echo ' } else {'.PHP_EOL;
echo '    return tatiye::index();'.PHP_EOL;
echo ' }'.PHP_EOL;