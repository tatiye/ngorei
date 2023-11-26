<?php
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
use app\Graph\Response;
use app\models\Package;
$val = json_decode(file_get_contents("php://input"));

$Text=tatiye::Text();

// tatiye::crawler($val->link);
function getSiteOG( $url, $specificTags=0 ){
    $doc = new DOMDocument();
    @$doc->loadHTML(file_get_contents($url));
    $res['title'] = $doc->getElementsByTagName('title')->item(0)->nodeValue;

    foreach ($doc->getElementsByTagName('meta') as $m){
        $tag = $m->getAttribute('name') ?: $m->getAttribute('property');
        if(in_array($tag,['description','keywords']) || strpos($tag,'og:')===0) $res[str_replace('og:','',$tag)] = $m->getAttribute('content');
    }
    return $specificTags? array_intersect_key( $res, array_flip($specificTags) ) : $res;
}

if(isset($_POST['url']) && $_POST['url']!=''){
  $url = $_POST['url'];
  if (filter_var($url, FILTER_VALIDATE_URL)) {
      $og_details = getSiteOG($url);
  } else {
     $og_details=false;
  }
}

         
     if (!empty(@$og_details['title'])) {
        $db=new tatiye();
     $web=explode('/',@$og_details['url']);
     $Exp=array(
        'userid'      =>$_POST['userid']??='0',
        'favicons'     =>'https://www.google.com/s2/favicons?domain=https://'.$web[2],
        'web'         =>'https://'.$web[2],
        'categori'    =>'Crawler',
        'segment'     =>@$og_details['site_name'],
        'link'        =>@$og_details['url'],
        'title'       =>@$og_details['title'],
        'description' =>@$og_details['description'],
        'thumbnail'   =>@$og_details['image'],
         "time"       =>tatiye::tm(),                                                    
         "pubDate"    =>tatiye::dt('DDIN'),                                                
         "date"       =>tatiye::dt("EN"),                                                
         "bulan"      =>tatiye::dt("M"),                                                 
         "tahun"      =>tatiye::dt("Y"),  
        );
       $send=true;
     } else {
       $send=false;
       $Exp=array(
        'userid'      =>'false',
        'favicon'     =>'false',
        'web'         =>'false',
        'categori'    =>'false',
        'segment'     =>'false',
        'link'        =>'false',
        'title'       =>'false',
        'description' =>'false',
        'site_name'   =>'false',
        'thumbnail'   =>'false',
         "time"       =>'false',                                              
         "date"       =>'false',                                              
         "bulan"      =>'false',                                              
         "tahun"      =>'false',
        );
     }
     if (!empty($_POST['send'])) {
        if (!empty($send)) {
            $row=tatiye::fetch('appnews','id',"title='".$Exp['title']."'");
            if (!$row['id']) {
                // code...
            $result=$db->que($Exp)->insert('appnews'); 
            }
        }
        
     }
           // $db=new tatiye();


echo json_encode($Exp);