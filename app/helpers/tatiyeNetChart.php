<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2018 wolf05 <info@tatiye.net / https://www.facebook.com/tatiyeNet/>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace wolf05\helper\Chart;
use wolf05\helper\tatiyeNet;
class tatiyeNetChart {
    protected static $instance;  
  
  private $detection;
  private $conn;
  private $driver;
  private $myMenu;
  private $myQuery;
  private $myCount;
  public  $mydata;
  public  $barline;
  // V02
  public  $failid;
  public  $token;
  public  $atitle;
  public  $mybar;
  public  $set;
  public  $Selectize;
  public  $Selectize1;
  public  $edittabel;
  public  $myQuery2;
  public  $myQuery3;


  private $data = array();
    // private function __construct() { /* ... @return DB */ }
    private function __clone() { /* ... @return DB */ }
    private function __wakeup() { /* ... @return DB */ }
  
  public function __construct(){
          $db = new tatiyeNet();
        $this->conn =$db; 
  } 
    
 
   /*
   |--------------------------------------------------------------------------
   | Initializes ChartV02 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function initV02($Token='',$segment=''){
        $Text=tatiyeNet::Text();  
        if ( !isset(self::$instance) ) {
            $class = __CLASS__;
            self::$instance = new $class();
        }
        $row= tatiyeNet::MyTabelFetch('query_uid_key_name','*',"id='".$Token."'");
        $mytabel= tatiyeNet::MyTabelFetch('query_uid_key_tabel','myQuery,tabeleBit',"id='".$row['tabel']."'");
        $IDGROUP=explode('GROUP',$mytabel['myQuery']);
        $ID=explode('FROM',$IDGROUP[0]);
        $IDKEY=explode(' ',$ID[1]);
        $NATTABEL=$ID[1];

 
                    $str = "";
                    $variable=explode(',',$row['edittabel']);
                    foreach ($variable as $key => $value) {
                        $str = $str .$IDKEY[2].'.'.$value.',';
                    }
                    $str = substr($str, 0, -1);

              $myQuery= "SELECT $variable[0] AS NAMA,COUNT(*) AS TOTAL   FROM ". $NATTABEL ." GROUP BY ".$variable[0];
              if (!empty($variable[1])) {
                    $MYWH=explode('WHERE',$NATTABEL);

                     if (!empty($MYWH[1])) {
                        $WH='AND';
                     } else {
                        $WH='WHERE';
                     }

                     if (!empty($row['scaling'])) {
                         $scQuery=$NATTABEL.' '.$WH.' '.$row['scaling'];
                     } else {
                         $scQuery=$NATTABEL;
                     }

               $myQuery2= "SELECT $variable[1] AS NAMA,COUNT(*) AS TOTAL   FROM ". $scQuery  ." GROUP BY ".$variable[1];
               self::$instance->myQuery2    =$myQuery2;
               self::$instance->myQuery3    =$myQuery2;
              } 

        if (!empty($mytabel['tabeleBit'])) {
           $SQLSUM="SELECT COUNT(*) AS TOTAL FROM ".$mytabel['tabeleBit'];
        } else {
           $SQLSUM="SELECT COUNT(*) AS TOTAL FROM ".$NATTABEL;
        }
        

          self::$instance->myQuery    =$myQuery;
          self::$instance->myCount    =$SQLSUM;
          self::$instance->mybar      =$row['mycolom'];
          self::$instance->title      =$row['title'];
          self::$instance->token      =$Token;
          self::$instance->Selectize  =$row['mytoken'];
          self::$instance->Selectize1 =$row['selectize'];
          self::$instance->edittabel  =$row['edittabel'];
     return self::$instance;
       
   }
   /*
   |--------------------------------------------------------------------------
   | Initializes matrix 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function matrix(){
     
        echo $this->Selectize;
     
       
   }
   /* and class matrix */
   /*
   |--------------------------------------------------------------------------
   | Initializes matrixSelection 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function matrixSelection($key=''){
      if (!empty($this->Selectize1)) {
        $IDC=explode('-',$this->Selectize1);
        $myTabel    =$IDC[0]; 
        $myValue    =$IDC[1]; 
        $myName     =$IDC[2]; 
        $WH="AND $IDC[3]='".$IDC[4]."'";
        $Redirect=tatiyeNet::MyTabelFetch($myTabel,"$myName","$myValue='".$key."'");
    }
     if (!empty($Redirect[$myName])) {
         $nonanme=$Redirect[$myName];
     } else {
         $nonanme=$key;
     }
     return $nonanme;
   }
   /* and class matrixSelection */
   /*
   |--------------------------------------------------------------------------
   | Initializes matrix2 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function matrix_head_01(){
      $Exp=array();
      $NO=0;
     $result=$this->conn->query($this->myQuery);
     while($row=$result->fetch_assoc()){  
        if (!empty($row['NAMA'])) {
          $NO=$NO+1;    

          $Exp[]=array(
           'NO'              =>$NO,
           'NAMA'            =>$row['NAMA'],

       );    
   }  
 }
return $Exp;
       
   }
   /* and class matrix2 */
   /*
   |--------------------------------------------------------------------------
   | Initializes matrix_head_02 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function matrix_head_02(){
      $Exp=array();
      $NO=0;
      $result=$this->conn->query($this->myQuery2);
      while($row=$result->fetch_assoc()){  
        if (!empty($row['NAMA'])) {
          $NO=$NO+1;     
   }  
 }

return $NO;
       
   }
   /* and class matrix_head_02 */
   /*
   |--------------------------------------------------------------------------
   | Initializes myQuery 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function myQuery(){
         return $this->myQuery3;
       
   }
   /* and class myQuery */
   /*
   |--------------------------------------------------------------------------
   | Initializes matrix_head_03 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function matrix_head_03(){
          $Exp=array();
          $NO=0;
         $result=$this->conn->query($this->myQuery2);
         while($row=$result->fetch_assoc()){  
            if (!empty($row['NAMA'])) {
              $NO=$NO+1;    
              $Exp[]=array(
               'NO'              =>$NO,
               'NAMA'            =>$row['NAMA'],
           );    
       }  
      }
   return $Exp;
       
   }
   /* and class matrix_head_03 */
   /*
   |--------------------------------------------------------------------------
   | Initializes matrix_head_04 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function matrix_head_04($key='',$keyx='',$total=''){
     $Text=tatiyeNet::Text();
         $ID=explode('WHERE',$this->myCount);
         $IDKEY=explode(',',$this->edittabel);
         if (!empty($ID[1])) {
           $WH ="AND ".$IDKEY[0]."='$key' AND ".$IDKEY[1]."='$keyx'";
         } else {
           $WH ="WHERE ".$IDKEY[0]."='$key' AND ".$IDKEY[1]."='$keyx'";
         }
         $myQuery=$this->myCount." ".$WH;
         $result=$this->conn->query($myQuery);
         $countRow = $result->fetch_array(MYSQLI_ASSOC); 
         if ($this->Selectize=='persentase') {

              return  round($countRow['TOTAL']/self::countRow() * 100,1);
          } else {
              return $Text->numberFormat([$countRow['TOTAL'],0]);
          }
           
         
      
       
   }
   /* and class matrix_head_04 */

   /*
   |--------------------------------------------------------------------------
   | Initializes matrix_head_05 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function matrix_head_05($key=''){
         $Text=tatiyeNet::Text();
         $ID=explode('WHERE',$this->myCount);
         $IDKEY=explode(',',$this->edittabel);
         if (!empty($ID[1])) {
           $WH ="AND ".$IDKEY[1]."='$key'";
         } else {
           $WH ="WHERE ".$IDKEY[1]."='$key'";
         }
         $myQuery=$this->myCount." ".$WH;
         $result=$this->conn->query($myQuery);
         $countRow = $result->fetch_array(MYSQLI_ASSOC);  
      
         if ($this->Selectize=='persentase') {   
              return  round($countRow['TOTAL']/self::countRow() * 100,1).'%';
          } else {
              return $Text->numberFormat([$countRow['TOTAL'],0]);
          }
       
   }
   /* and class matrix_head_05 */



   /*
   |--------------------------------------------------------------------------
   | Initializes set 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function set($key){
     $row= tatiyeNet::MyTabelFetch('query_uid_key_name','*',"id='".$this->token."'");
         return $row[$key];
       
   }
   /* and class set */
   /* and class ChartV02 */
   public  function run($key=''){
      $Exp=array();
      $NO=0;
      $i=0;
      
     if (self::set('tabeleBit')=='matrix') {
        $myQuery=$this->myQuery2;
    } else {
        $myQuery=$this->myQuery;
    }
    

     $result=$this->conn->query($myQuery);
     while($row=$result->fetch_assoc()){  
      $NO=$NO+1;    
        $i=$i+1;
        for($j = 0; $j < 6; $j++){
          $bonus[]=$j+1;
      }

   $Exp[]=array(
       'NO'              =>$NO,
       'NAMA'            =>$row['NAMA'],
       'TITLE'           =>$this->title,
       'DESC'            =>$this->title.' '.$row['NAMA'],
       'TOTAL'           =>$row['TOTAL'],
       'COLOR'           =>self::backgroundColor($bonus[$i-1]),
       'BORDER'          =>self::borderColor($bonus[$i-1]),
       'BOR'             =>$bonus[$i-1],
       'COUNT'           =>round($row['TOTAL']/self::countRow() * 100,1),
       'PER'             =>round($row['TOTAL']/self::countRow() * 100,1).'%',

   );      
 }

   return $Exp;
   }


   public  function runMakeChart(){
      $Exp=array();
      $NO=0;
      $i=0;
      
     if (self::set('tabeleBit')=='matrix') {
        $myQuery=$this->myQuery2;
      
    } else {
        $myQuery=$this->myQuery;
    }
    

     $result=$this->conn->query($myQuery);
     while($row=$result->fetch_assoc()){  
      $NO=$NO+1;    
        $i=$i+1;
      for($j = 0; $j < 17; $j++){
          $bonus[]=$j+1;
      }
      if (self::set('mytoken')=='persentase') {
          $myPrendata=round($row['TOTAL']/self::countRow() * 100,1).'%';
      } else {
         $myPrendata=$row['TOTAL'];
      }
      


   $Exp[]=array(
       'no'              =>$NO,
       'name'            =>$row['NAMA'],
       'titel'           =>$this->title,
       'desc'            =>$this->title.' '.$row['NAMA'],
       'data'            =>$row['TOTAL'],
       'color'           =>self::colorAmcharts($bonus[$i-1]),
       'count'           =>$myPrendata,
       
   );      
 }

   return $Exp;
   }





 /*
 |--------------------------------------------------------------------------
 | Initializes dataProvider 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public  function dataJson(){
      $barline        ='';
      $Text           =tatiyeNet::Text();
      $dataJson         ='';
      foreach (self::runMakeChart() as $key => $value) {
         $dataJson            = $dataJson. ' {"titel": "'.$value['name'].'", "data": "'.$value['data'].'", "count": "'.$value['count'].'","color": "'.$value['color'].'"} ,';

      }
          $dataJson            = substr($dataJson, 0, -1);
          return $dataJson;



  
     
 }
 /* and class dataProvider */


   public  function countRow(){
        $result=$this->conn->query($this->myCount);
        $countRow = $result->fetch_array(MYSQLI_ASSOC);  
         return $countRow['TOTAL']|0;
       
   }

 public  function collection(){
    $Exp=array(
       'bar' =>'checked',             
       'line' =>'',            
       'pie' =>'',             
       'doughnut' =>'',        
       'polarArea' =>'',       
       'radar' =>'',               
       );
    return $Exp;
     
 }
   public  function sumRow(){
        $Text=tatiyeNet::Text();
        
          $result=$this->conn->query($this->myCount);
          $countRow = $result->fetch_array(MYSQLI_ASSOC);  
          return $Text->numberFormat([$countRow['TOTAL'],0]);
       
   }
 /*
 |--------------------------------------------------------------------------
 | Initializes myChart 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public  function myChart($key=''){
   
   if (self::set('tabeleBit')=='matrix') {
          $ID=explode('-',self::set('myjoin'));
          $barline=$ID[1];
   } else {
     if (!empty($this->mybar)) {
         $barline=$this->mybar;
     } else {
         $barline='bar';
     }
 }
     return self::bar($barline);
     
 }


  public  function myChart_v02($key=''){
   
   if (self::set('tabeleBit')=='matrix') {
          $ID=explode('-',self::set('myjoin'));
          $barline=$ID[1];
   } else {
     if (!empty($this->mybar)) {
         $barline=$this->mybar;
     } else {
         $barline='bar';
     }
 }
     return self::barPower($barline);
     
 }

 /*
 |--------------------------------------------------------------------------
 | Initializes bar 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public  function bar($Chart=''){
      $barline        =$Chart;
      $Text           =tatiyeNet::Text();
      $labels         ='';
      $data           ='';
      $backgroundColor='';
      $borderColor    ='';
      foreach (self::run($barline) as $key => $value) {
         $labels            = $labels. "'".$value['NAMA']."',";
         $data              = $data. "'".$value['TOTAL']."',";
         $backgroundColor   = $backgroundColor. "'".$value['COLOR']."',";
         $borderColor       = $borderColor. "'".$value['BORDER']."',";
      }
          $labels            = substr($labels, 0, -1);
          $labels            = $labels . "";
          $data              = substr($data, 0, -1);
          $data              = $data . "";
          $backgroundColor   = substr($backgroundColor, 0, -1);
          $backgroundColor   = $backgroundColor . "";
          $borderColor       = substr($borderColor, 0, -1);
          $borderColor       = $borderColor . "";
          // $str = substr($str, 0, -1);
          // $str2 = substr($str2, 0, -1);
      if("add" == "add") {?>
        <script type="text/javascript">
          const ctx = document.getElementById('myChartV02').getContext('2d');
          const myChart = new Chart(ctx, {
              type: '<?=$Chart;?>',
              data: {
                  labels: [<?=$labels;?>],
                  datasets: [{
                      label: '<?=$this->failid;?>',
                      data: [<?=$data;?>],
                      backgroundColor: [<?=$backgroundColor;?>],
                      borderColor: [<?=$borderColor;?>],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      y: {
                          beginAtZero: true
                      }
                  }
              }
          });
</script>
      <?php }
 }


  public  function barPower($Chart=''){
      $barline        =$Chart;
      $Text           =tatiyeNet::Text();
      $labels         ='';
      $data           ='';
      $backgroundColor='';
      $borderColor    ='';
      foreach (self::run($barline) as $key => $value) {
         $labels            = $labels. "'".$value['NAMA']."',";
         $data              = $data. "'".$value['TOTAL']."',";
         $backgroundColor   = $backgroundColor. "'".$value['COLOR']."',";
         $borderColor       = $borderColor. "'".$value['BORDER']."',";
      }
          $labels            = substr($labels, 0, -1);
          $labels            = $labels . "";
          $data              = substr($data, 0, -1);
          $data              = $data . "";
          $backgroundColor   = substr($backgroundColor, 0, -1);
          $backgroundColor   = $backgroundColor . "";
          $borderColor       = substr($borderColor, 0, -1);
          $borderColor       = $borderColor . "";
          // $str = substr($str, 0, -1);
          // $str2 = substr($str2, 0, -1);
      if("add" == "add") {?>
        <script type="text/javascript">
          const ctx = document.getElementById('myChartV02<?=$this->token;?>').getContext('2d');
          const myChart = new Chart(ctx, {
              type: '<?=$Chart;?>',
              data: {
                  labels: [<?=$labels;?>],
                  datasets: [{
                      label: '<?=$this->failid;?>',
                      data: [<?=$data;?>],
                      backgroundColor: [<?=$backgroundColor;?>],
                      borderColor: [<?=$borderColor;?>],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      y: {
                          beginAtZero: true
                      }
                  }
              }
          });
</script>
      <?php }
 }

/*
|--------------------------------------------------------------------------
| Initializes amcharts 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  
*/
public  function amcharts($Chart=''){
      return $key;
    
}
/* and class amcharts */

   public  function datatables($key='',$tabel=''){
    $Text=tatiyeNet::Text();
     if (!empty($this->Selectize)) {
        $IDC=explode('-',$this->Selectize);
        $myTabel    =$IDC[0]; 
        $myValue    =$IDC[1]; 
        $myName     =$IDC[2]; 
        $WH="AND $IDC[3]='".$IDC[4]."'";
     } 
    $products_arr["data"]=array();
    $NO=0;
    $result=$this->conn->query($this->myQuery);
    while($row=$result->fetch_assoc()){     
    $NO=$NO+1;    
     if (!empty($this->Selectize)) {
         $Redirect=tatiyeNet::MyTabelFetch($myTabel,"$myName","$myValue='".$row['NAMA']."' $WH");
    }
    if (!empty($Redirect[$myName])) {
        $nonanme=$Redirect[$myName];
        $mycode=$row['NAMA'];
    } else {
        $nonanme=$row['NAMA'];
        $mycode='';
    }
    $product_item=array(
        $NO,
        $nonanme,
        $mycode,
        $Text->numberFormat([$row['TOTAL'],0]),
        round($row['TOTAL']/self::countRow() * 100,1).'%',
    );    
    array_push($products_arr["data"], $product_item);
   }
  return $products_arr;
   }
 /*
 |--------------------------------------------------------------------------
 | Initializes myChart 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date  
 */
 public  function myChart1($key=''){
     // $IDC=explode('-',$this->Selectize);
     //     $myTabel    =$IDC[0]; 
     //     $myValue    =$IDC[1]; 
     //     echo $myName     =$IDC[2]; 
     //      $WH="WHERE $IDC[3]='".$IDC[4]."'";
     
 }
/*
   |--------------------------------------------------------------------------
   | Initializes backgroundColor 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function backgroundColor($key){
         $Exp=array(
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'            
            );
         return $Exp[$key];
       
   }
   /* and class backgroundColor */
   /*
   |--------------------------------------------------------------------------
   | Initializes borderColor 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function borderColor($key){
         $Exp=array(
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'           
            );
         return $Exp[$key];
       
   }
   /* and class borderColor */

   public  function colorAmcharts($key){
         $Exp=array(
            '#FF0F00',
            '#FF6600',
            '#FF9E01',
            '#FCD202',
            '#F8FF01',
            '#B0DE09',
            '#04D215',           
            '#0D8ECF',           
            '#0D52D1',           
            '#2A0CD0',           
            '#8A0CCF',           
            '#CD0D74',           
            '#754DEB',           
            '#DDDDDD',           
            '#999999',           
            '#333333',           
            '#000000'           
            );
         return $Exp[$key];
       
   }
   /* and class borderColor */




}