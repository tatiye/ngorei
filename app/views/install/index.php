<?php
  use app\tatiye;
  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Inspection</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- GOOGEL -->
    <meta name="description"content="{description}">
    <meta name="keywords"content="{title}">
    <!-- FACEBOOK -->
    <meta property="og:type"content="article">
    <meta property="og:title"content="{title}">
    <meta property="og:description"content="{description}">
    <meta property="og:url"content="{url}">
    <meta property="og:site_name"content="{site_name}">
    <meta property="og:image"content="{images}">
    <meta property="og:image:width"content="600">
    <meta property="og:image:height"content="315">
    <link rel="shortcut icon" type="image/x-icon" href="{favicon}">
    <!-- App header -->{header.ASSETS}
    <!-- END_App header -->
    
  </head>
    <body>
<div class="container">
    <div class="row">
      <div class="col-md-12">
<li class="list-group-item1 d-flex align-items-center">
  <img src="{logo}" class="wd-70 rounded-circle1 mg-r-10" alt="">
  <div>
    <h1 class="tx-color-01 mg-b-5 pt-15px">Inspection</h1>
    <p class="tx-color-03 tx-16 mg-b-10"> Tatiye Framework  Ngorei v1.0.4</p>
  </div>
</li>
      </div>

      <div class="col-md-6 pt-40px">
      <div id="sublime" class="window mb-20px" >
        <div class="headerx">
          <div class="buttonsx">
            <div class="btnx closex"></div>
            <div class="btnx min"></div>
            <div class="btnx max"></div>
          </div>
          <div class="title">Pemeriksaan persyaratan </div>
        </div>
        <div class="body p-30px">
  <table  class="table mg-b-0 mb-30px">
        <thead>
            <tr>
                <th id="requirement">Persyaratan</th>
                <th>Tersedia?</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>PHP 7.4.33</td>
                <td class="available">{php}</td>
            </tr>
            <tr>
                <td>PDO supported</td>
                <td class="available">{pdo}</td>
            </tr>
            <tr>
                <td>PDO supports MySQL <sup>1)</sup></td>
                <td class="available">{mysql}</td>
            </tr>
            <tr>
                <td>PDO supports SQLite 3 <sup>1)</sup></td>
                <td class="available">{sqlite}</td>
            </tr>
            <tr>
                <td>PDO supports PostgreSQL <sup>1)</sup></td>
                <td class="available">{pgsql}</td>
            </tr>
            <tr>
                <td>Config file exists <sup>2)</sup></td>
                <td class="available">true</td>
            </tr>
            <tr>
                <td>Config file is writable <sup>2)</sup></td>
                <td class="available">true</td>
            </tr>
            <tr>
                <td>Public directory is writable <sup>3)</sup></td>
                <td class="available">{public_writable}</td>
            </tr>
            <tr>
                <td>Clean URLs support available <sup>4)</sup></td>
                <td class="available">{modrewrite}</td>
            </tr>
        </tbody>
    </table>
      <div class="alert alert-primary01 pl-10px pt-30px mt-10px" role="alert">
            Semua item yang di atas , diperlukan untuk instalasi dan pengoperasian Ngorei  yang benar kecuali ditentukan lain dalam catatan terpisah.
          </div>
        </div>
        <div class="footer"><span class="left text-capitalize">Line 1, Column 1</span><span class="right text-capitalize">PHP</span><span class="right borders text-capitalize">Spaces: 4</span></div>
      </div>







   
   
  
      </div>
      <div class="col-md-6 pt-40px">

      <div id="sublime" class="window mb-20px" >
        <div class="headerx">
          <div class="buttonsx">
            <div class="btnx closex"></div>
            <div class="btnx min"></div>
            <div class="btnx max"></div>
          </div>
          <div class="title">Database </div>
        </div>
        <div class="body p-30px">
<pre class="hljs" style="display: block; overflow-x: auto; padding: 0.5em; color: rgb(68, 68, 68);"> <span class="hljs-keyword" style="font-weight: 700;">public</span> <span class="hljs-keyword" style="font-weight: 700;">static</span> <span class="hljs-function"><span class="hljs-keyword" style="font-weight: 700;">function</span> <span class="hljs-title" style="color: rgb(136, 0, 0); font-weight: 700;">db</span><span class="hljs-params">()</span></span>{
      <span class="hljs-keyword" style="font-weight: 700;">return</span>  <span class="hljs-keyword" style="font-weight: 700;">array</span>(
        <span class="hljs-string" style="color: rgb(136, 0, 0);">"driver"</span>   =&gt;<span class="hljs-string" style="color: rgb(136, 0, 0);">"mysqli"</span>,
        <span class="hljs-string" style="color: rgb(136, 0, 0);">"port"</span>     =&gt;<span class="hljs-string" style="color: rgb(136, 0, 0);">"80"</span>,
        <span class="hljs-string" style="color: rgb(136, 0, 0);">"host"</span>     =&gt;<span class="hljs-string" style="color: rgb(136, 0, 0);">"localhost"</span>,
        <span class="hljs-string" style="color: rgb(136, 0, 0);">"username"</span> =&gt;<span class="hljs-string" style="color: rgb(136, 0, 0);">""</span>,
        <span class="hljs-string" style="color: rgb(136, 0, 0);">"password"</span> =&gt;<span class="hljs-string" style="color: rgb(136, 0, 0);">""</span>,
        <span class="hljs-string" style="color: rgb(136, 0, 0);">"database"</span> =&gt;<span class="hljs-string" style="color: rgb(136, 0, 0);">""</span>,
      );
 }</pre>
        </div>
        <div class="footer"><span class="left text-capitalize">Line 1, Column 1</span><span class="right text-capitalize">PHP</span><span class="right borders text-capitalize">Spaces: 4</span></div>
      </div>

    <p>Catatan </p>
    <ol>
        <li>Silahkan lakukan configurasi database: <code>app/config/database.php</code></li>
        <li>Database dapat di configurasi melalui terminal command Line </li>
    </ol>
                 <div class="list-group-item d-flex align-items-center mt-5px" >
                      <div class="wd-30 mg-r-15 pt-10px">
                       <i id="copy" 
                          data-clipboard-text="composer" 
                          class="picons-193 fs-30px mt-10px"></i>
                      </div>
                      <div>
                        <h6 class="tx-13 tx-inverse tx-semibold mg-b-0"><?=tatiye::DIR('app>');?> ./ngorei con/host,user,pass,dbname</h6>
                        <span class="d-block tx-11 text-muted">*Mengetikan perintah 
                         <code>./ngorei con/host,user,pass,dbname</code>
                        </span>
                      </div>
                    </div>

</div> 



   
      </div>
    </div>
</div>
  <!-- App footer -->{footer.ASSETS}
  <!-- END_App footer --> 
</body>
</html>