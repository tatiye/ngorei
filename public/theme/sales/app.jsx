import tatiyeNet,{setModal,setHttp,Router,useHandel,setRouter,createRouter}  from "{tatiye.es6}"; 
Router({
  spinner:'text-primary',
  selector :['navigation','routeLink'],
  mainroute :'mainRoute',
  patroutes :4
})


   var desain=`
            <a href="#" class="media">
                <div class="avatar avatar-sm avatar-online"><span class="avatar-initial bg-dark rounded-circle">b</span></div>
                <div class="media-body mg-l-10">
                  <h6 class="mg-b-0">dfbot</h6>
                  <small class="d-block tx-color-04">5 mins ago</small>
                </div>
              </a> 
   `;

    createRouter({
        "status"    :'dev',
        "router"    :'sales',
        "public"    :'theme',
        "spinner"   :'text-primary',
        "mainroute" :'bodyRoute',
        "explode"   :'#',
        "patroutes" :1,
        "link": {
         "home":{
             "1":[ "Framework"              ,"sales/Framework"    ,"icon"],
             "2":[ "Program"                ,"sales/Program"    ,"icon"],
             "3":[ "Billing"                ,"sales/Billing"    ,"icon"],
             "4":[ "Invoice"                ,"sales/Invoice"    ,"icon"],
             "6":[ "Panduan Pembayaran"        ,"sales/Pembayaran"    ,"icon"]
            },
         "sales":{
             "1":[ "Home"                       ,"sales/home"       ,"icon"],
             "2":[ "Promo"                       ,"sales/Peromo"       ,"icon"],
             "3":[ "Framework"                  ,"sales/Framework"       ,"icon"],
             "4":[ "Website"                     ,"sales/Website"       ,"icon"],
             "5":[ "Aplikasi "                   ,"sales/Aplikasi "       ,"icon"],
             "6":[ "Webview"                     ,"sales/webpage"  ,"icon"],
             "7":[ "Mobile"                      ,"sales/Mobile"   ,"icon"],
             // "8":[ "Server"                      ,"sales/Server"          ,"icon"],
             "9":[ "Template"                    ,"sales/Template"          ,"icon"],
             "10":[ "Maintenance"                 ,"sales/Maintenance"          ,"icon"]
            }
         },
        "hashtag": {
           "zero_config":{
             "15":[ "Doc Type"        ,"docs/configurasi/" ,"doctype"     ,"icon"],
             "16":[ "Assets js,css"   ,"docs/configurasi/" ,"Assets"   ,"icon"],
             "17":[ "Condisi"         ,"docs/configurasi/" ,"Condisi"   ,"icon"],
             "18":[ "Base URL"        ,"docs/configurasi/" ,"Base"   ,"icon"],
             "19":[ "Import"          ,"docs/configurasi/" ,"Import"   ,"icon"],
             "20":[ "Navbar"          ,"docs/configurasi/" ,"Navbar"   ,"icon"],
             "21":[ "link"            ,"docs/configurasi/" ,"link"   ,"icon"],
             "22":[ "Include File"    ,"docs/configurasi/" ,"Include"   ,"icon"]
            },
           "create_router":{
             "23":[ "Theme"      ,"docs/router/" ,"forTheme"     ,"icon"],
             "24":[ "Package"    ,"docs/router/" ,"forPackage"   ,"icon"],
             "25":[ "Hashtag"    ,"docs/router/" ,"forHashtag"   ,"icon"]
            },
           "object_router":{
             "26":[ "Use Href"    ,"docs/router/" ,"useRouter"      ,"icon"],
             "27":[ "Theme"       ,"docs/router/" ,"objecTheme"     ,"icon"],
             "28":[ "Package"     ,"docs/router/" ,"objecPackage"   ,"icon"],
             "29":[ "Hashtag"     ,"docs/router/" ,"objechashtag"   ,"icon"],
             "30":[ "Handel Link" ,"docs/router/" ,"routerDom"      ,"icon"]
            },
           "db_storage":{
             "31":[ "Localstorage"  ,"docs/Storage/" ,"storage"      ,"icon"],
             "32":[ "Cookie"        ,"docs/Storage/" ,"Cookie"     ,"icon"],
             "33":[ "indexedDB"     ,"docs/Storage/" ,"indexedDB"   ,"icon"]
            },
            "db_modules":{
             "31":[ "Text"       ,"docs/Modules/" ,"Text"      ,"icon","db_text","margin-left:10px; display:none"],
             "32":[ "Date Time"  ,"docs/Modules/" ,"DateTime"  ,"icon","db_dateTime","margin-left:10px; display:none "],
             "33":[ "Encode"     ,"docs/Modules/" ,"Decode"    ,"icon","db_encode","margin-left:10px; display:none "]
            }

         
         }
     });






    
setRouter({
  spinner:'text-primary',
  selector :['document'],
  mainroute :'appRoute',
  patroutes :2
})

