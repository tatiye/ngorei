 import tatiyeNet,{setRouter,createRouter,userAgent,setLink,storLocation} from "{tatiye.es6}"; 
 let dataset=userAgent({
      'indexOn':'Desktop'
    })
 var index=storLocation('href');
 console.log(dataset)
// public/theme/package.json
// json


      shortcut.add("ctrl+k",function() {
           setLink(['modal','pages/search'],{
            "titel":     'Search',
            "width":     '400px',
            "key":       'add',
            "tabel":     'demo',
            "package":   'demo'
           });
        });


window.newLink=function(page,titel) {
    if(titel == 'Search') {
      var st='400px'
    } else if (titel == 'Portofolio'){
      var st='600px'
    } else {
      var st='400px'
    }
    setLink(['modal',page],{
       "titel":     titel,
       "width":     st,
       "key":       'add',
       "tabel":     'demo',
       "package":   'demo'
    });
}

    createRouter({
        "status"    :'dev1',
        "router"    :'index',
        "public"    :'theme',
        "spinner"   :'text-primary',
        "mainroute" :'bodyRoute',
        "explode"   :'#',
        "patroutes" :1,
        "link": {
         "home":{
            
             "2":[ "Dokumentasi"     ,"docs"            ,"icon"],
             "3":[ "Blog"            ,"blog"            ,"icon"],
             "4":[ "Tutorial"        ,"tutorial"            ,"icon"],
             "5":[ "Pricing"         ,"sales/home"           ,"icon"]
             
            },
          "ecosystem":{
             "1":[ "Download"       ,"Github@ngorei "     ,"picons-106"  ,"docs/intro/Download"],
             "2":[ "Installation"   ,"NPM tatiye"         ,"picons-193"  ,"docs/intro/Installation"],
             "3":[ "Configurasi"    ,"Package & Database" ,"picons-194"  ,"docs/intro/Configurasi"],
             "4":[ "License key"    ,"Trial 25-day"       ,"picons-114"  ,"docs/intro/License"],
             "5":[ "Links & Pages"  ,"Route Page"         ,"picons-117"  ,"docs/intro/Router"],
             "6":[ "API Reference"  ,"Fetch Data"      ,"picons-115"  ,"docs/ApiReference"]
            },
          "rich":{
             "1":[ "HTML"         ,"Ngorei HTML DOM "     ,"{html.png}"         ,"docs/HTML"],
             "2":[ "ECMAScript"   ,"Ngorei ECMAScript"    ,"{js.png}"           ,"docs/Javascript"],
             "3":[ "React Native"  ,"Ngorei React "        ,"{react.png}"        ,"docs/React"],
             "4":[ "Framework7"   ,"Ngorei F7"            ,"{Framework7.svg}"   ,"docs/F7"],
             "6":[ "DevTools"     ,"Ngorei Storage"       ,"{googel.png}"       ,"docs/DevTools"],
             "9":[ "Firebase"     ,"Ngorei Firebase"      ,"{firebase.png}"     ,"docs/Firebase"],
             "10":[ "Datatables"  ,"Ngorei Datatables"    ,"{Datatables.png}"   ,"docs/Datatables"],
             "11":[ "Chart"       ,"Ngorei Chart"         ,"{chart.png}"        ,"docs/Chart"],
             "13":[ "Vue"         ,"Ngorei  Vue"          ,"{vue2.png}"         ,"docs/Vue"],
             "14":[ "Wolf05"      ,"Ngorei  OOP"          ,"{wolf05.png}"       ,"docs/Oop"],
             "15":[ "Midtrans"    ,"Ngorei  payment"      ,"{Midtrans.png}"     ,"docs"],
             "16":[ "WhatsApp"    ,"Ngorei  WA Group"     ,"{WhatsApp.png}"     ,"docs"],
            },

         "core":{
             "2":[ "Website"              ,"Public theme"          ,"picons-496"   ,"docs/core/Website"],
             "3":[ "Mobile"               ,"Detecting Browser"     ,"picons-324"   ,"docs/core/Mobile"],
             "4":[ "App OS, Android "     ,"Webview & Native "     ,"picons-116"   ,"docs/core/App"],
             "5":[ "Dashboard"            ,"Management Package"    ,"picons-309"   ,"docs/core/Dashboard"],
            },
         "sales":{
             "2":[ "Promo"              ,"sales/Peromo"      ,"icon"],
             "3":[ "Website"            ,"sales/Website"     ,"icon"],
             "4":[ "Aplikasi "          ,"sales/Aplikasi "   ,"icon"],
             "5":[ "Webview"            ,"sales/webpage"     ,"icon"],
             "6":[ "Mobile"             ,"sales/Mobile"      ,"icon"],
             "8":[ "Server"             ,"sales/Server"      ,"icon"],
             "9":[ "Maintenance"        ,"sales/Maintenance" ,"icon"]
            },

           "develop":{
             "2":[ "Atribute"             ,"docs/HTML/Content#Atribute"   ,"icon"],
             "3":[ "Stack Group"          ,"docs/HTML/Content#stackGroup" ,"icon"],
             "4":[ "Container"            ,"docs/HTML/Content#Container"  ,"icon"],
             "5":[ "Search"               ,"docs/HTML/Content#Search"     ,"icon"],
             "6":[ "Pagination"           ,"docs/HTML/Content#Pagination"  ,"icon"],
             "7":[ "Dropdown"             ,"docs/HTML/Content#Dropdown"  ,"icon"],
             "8":[ "Menu Selector"        ,"docs/HTML/Content#Selector"  ,"icon"],
             "9":[ "Modal PDF"            ,"docs/HTML/Content#domPdf"  ,"icon"],
             "10":[ "Prind Raw"           ,"docs/HTML/Content#pridRaw"  ,"icon"],
             "11":[ "Modal"               ,"docs/HTML/Content#Modal"  ,"icon"],
             "12":[ "Boostrap"            ,"docs/HTML/Content#Boostrap"  ,"icon"],
             "13":[ "Tabel"               ,"docs/HTML/Content#Tabel"  ,"icon"],
             "14":[ "Grid Default"        ,"docs/HTML/Grid#Default"   ,"icon"],
             "15":[ "Content"             ,"docs/HTML/Grid#content" ,"icon"],
             "16":[ "Flex"                ,"docs/HTML/Grid#Flex"     ,"icon"],
             "17":[ "Card"                ,"docs/HTML/Grid#Card"  ,"icon"],
             "18":[ "Grid Key"            ,"docs/HTML/Grid#key"  ,"icon"],
             "19":[ "Tab Line"            ,"docs/HTML/Grid#TabLine"  ,"icon"],
             "20":[ "Datatables"          ,"docs/HTML/Grid#datatables"  ,"icon"],
             "21":[ "Grid Form"          ,"docs/HTML/Grid#From"  ,"icon"],
             "22":[ "From"                ,"docs/HTML/From#From"  ,"icon"],
             "23":[ "Insert"             ,"docs/HTML/From#Insert"   ,"icon"],
             "24":[ "Update"             ,"docs/HTML/From#Update" ,"icon"],
             "25":[ "Stack"              ,"docs/HTML/From#Stack"  ,"icon"],
             "26":[ "Delete Permanent"   ,"docs/HTML/From#Permanent"     ,"icon"],
             "28":[ "Delete Temporarily" ,"docs/HTML/From#Temporarily"  ,"icon"],
             "29":[ "Images"             ,"docs/HTML/From#Images"  ,"icon"],
             "30":[ "Document"           ,"docs/HTML/From#Document"  ,"icon"],
             "31":[ "Import Excel"       ,"docs/HTML/From#import"  ,"icon"],
             "32":[ "Fetch Eksternal"    ,"docs/HTML/Content#Fetch"  ,"icon"],
             "33":[ "Read DOM"           ,"docs/HTML/Read"  ,"icon"],
             "34":[ "Lihat lebih banyak" ,"docs"  ,"icon"],

             
            },





           "search":{
             "1":[ "Bar Metrics"        ,"docs/Chart#chartBar"                   ,"icon"],
             "2":[ "Peity"              ,"docs/Chart#Peity"                      ,"icon"],
             "3":[ "Horizontal"         ,"docs/Chart#horizontalBar"              ,"icon"],
             "4":[ "Flot Char"          ,"docs/Chart#flotChar"                   ,"icon"],
             "5":[ "Satisfaction"       ,"docs/Chart#Satisfaction"               ,"icon"],
             "6":[ "Points"             ,"docs/Chart#Points"                     ,"icon"],
             "7":[ "Received"           ,"docs/Chart#Received"                   ,"icon"],
             "8":[ "Actual"             ,"docs/Chart#Actual"                     ,"icon"],
             "9":[ "Stack"              ,"docs/Chart#stack"                      ,"icon"],
             "10":[ "Arrowup"           ,"docs/Chart#arrowu"                     ,"icon"],
             "11":[ "Chart Five"        ,"docs/Chart#Chartfive"                  ,"icon"],
             "12":[ "Twelve"            ,"docs/Chart#twelve"                     ,"icon"],
             "13":[ "Currency"          ,"docs/Chart#Currency"                   ,"icon"],
             "14":[ "Markets"           ,"docs/Chart#Markets"                    ,"icon"],
             "15":[ "Sessions"          ,"docs/Chart#Sessions"                   ,"icon"],
             "16":[ "Visits"            ,"docs/Chart#Visits"                     ,"icon"],
             "17":[ "Traffic"           ,"docs/Chart#Traffic"                    ,"icon"],
             "18":[ "Watchlist"         ,"docs/Chart#Watchlist"                  ,"icon"],
             "19":[ "Line Chart"        ,"docs/Chart#LineChart"                  ,"icon"],
             "20":[ "Grid System"       ,"docs/datatables#grid"                  ,"icon"],
             "21":[ "From Entri"        ,"docs/datatables#gridFrom"              ,"icon"],
             "22":[ "From Stack"        ,"docs/datatables#gridFromStack"         ,"icon"],
             "23":[ "Select Option"     ,"docs/datatables#selectData"            ,"icon"],
             "24":[ "Column Hide"       ,"docs/datatables#columnHide"            ,"icon"],
             "25":[ "Use Click"         ,"docs/datatables#useClick"              ,"icon"],
             "26":[ "Dropdown"          ,"docs/datatables#Dropdown"              ,"icon"],
             "27":[ "Column Defs"       ,"docs/datatables#columnDefs"            ,"icon"],
             "28":[ "Footer Callback"   ,"docs/datatables#footerCallback"        ,"icon"],
             "29":[ "Primary Key"       ,"docs/datatables#primarykey"            ,"icon"],
             "30":[ "Use Devices"       ,"docs/datatables#useDevices"            ,"icon"],
             "31":[ "Getting started"   ,"docs/datatables#started"               ,"icon"],
             "32":[ "Head Tabel"        ,"docs/datatables#headTabel"             ,"icon"],
             "33":[ "From Modal"        ,"docs/datatables#from"                  ,"icon"],
             "34":[ "Grid System"       ,"docs/datatables#gridOne"               ,"icon"],
             "35":[ "Column Sheet"      ,"docs/datatables#sheet"                 ,"icon"],
             "36":[ "Column Role"       ,"docs/datatables#search"                ,"icon"],
             "37":[ "IndexOn"           ,"docs/datatables#indexFrom"             ,"icon"],

             "38":[ "Assets QRcode"     ,"docs/components#QRcode"                  ,"icon"],
             "39":[ "List Group"        ,"docs/components#listGroup"               ,"icon"],
             "40":[ "List"              ,"docs/components#list"                    ,"icon"],
             "41":[ "Avatar"            ,"docs/components#avatar"                  ,"icon"],
             "42":[ "Image Background"  ,"docs/components#imagesbackground"        ,"icon"],
             "43":[ "Image Group"       ,"docs/components#imagesgroup"             ,"icon"],
             "44":[ "Image Toolbar"     ,"docs/components#imagestoolbar"           ,"icon"],
             "45":[ "Badges"            ,"docs/components#Badges"                  ,"icon"],
             "46":[ "Breadcrumbs"       ,"docs/components#Breadcrumbs"             ,"icon"],
             "47":[ "Card Decks"        ,"docs/components#CardDecks"               ,"icon"],
             "48":[ "Card"              ,"docs/components#Card"                    ,"icon"],
             "49":[ "Carousel"          ,"docs/components#Carousel"                ,"icon"],


             "50":[ "Module Text"       ,"docs/Modules#Text"                     ,"icon"],
             "51":[ "Module DateTime"   ,"docs/Modules#DateTime"                 ,"icon"],
             "52":[ "Module Decode"     ,"docs/Modules#Decode"                   ,"icon"],
             "53":[ "Module OnClick"    ,"docs/Modules#OnClick"                  ,"icon"],
             "55":[ "Insert"            ,"docs/From#Entri"                       ,"icon"],
             "56":[ "Update"            ,"docs/From#Update"                      ,"icon"],
             "57":[ "Stack"             ,"docs/From#Stack"                       ,"icon"],
             "58":[ "Permanent"         ,"docs/From#Permanent"                   ,"icon"],
             "59":[ "Temporarily"       ,"docs/From#Temporarily"                 ,"icon"],
             "60":[ "Images"            ,"docs/From#Upload"                      ,"icon"],
             "61":[ "Document"          ,"docs/From#document"                    ,"icon"],
             "62":[ "Import Excel"      ,"docs/From#import"                      ,"icon"],
             "63":[ "Default"           ,"docs/Grid#Default"                     ,"icon"],
             "64":[ "Content"           ,"docs/Grid#content"                     ,"icon"],
             "65":[ "Flex"              ,"docs/Grid#Flex"                        ,"icon"],
             "66":[ "Card"              ,"docs/Grid#Card"                        ,"icon"],
             "67":[ "Key Sortable"      ,"docs/Grid#key"                         ,"icon"],
             "68":[ "Tab Line"          ,"docs/Grid#TabLine"                     ,"icon"],
             "69":[ "From"              ,"docs/Grid#From"                        ,"icon"],
             "70":[ "Datatables"        ,"docs/Grid#datatables"                  ,"icon"],
             "71":[ "Object"            ,"docs/Read#dataObject"                  ,"icon"],
             "72":[ "Stack"             ,"docs/Read#readStack"                   ,"icon"],
             "73":[ "Container"         ,"docs/Read#container"                    ,"icon"],
             "74":[ "Modal"             ,"docs/Read#readElementModal"             ,"icon"],
             "75":[ "Plugin"            ,"docs/Read#ModalPlugin"                  ,"icon"],
             "76":[ "Target ID"         ,"docs/Read#readElementTarget"            ,"icon"],
             "77":[ "Firebase"          ,"docs/Modules#Firebase"                   ,"icon"],
             "78":[ "Pagination"        ,"docs/Read#readPagination"               ,"icon"],
             "79":[ "Dropdown"          ,"docs/Read#readDropdown"                 ,"icon"],
             "80":[ "Selector"          ,"docs/Read#readDropdownQuerySelector"    ,"icon"],
             "81":[ "Dom Pdf"           ,"docs/Read#domPdf"                       ,"icon"],
             "82":[ "Prind Raw"         ,"docs/Read#pridRaw"                      ,"icon"],
             "83":[ "Grid System"       ,"docs/Read#GridSystem"                   ,"icon"],
             "84":[ "Tabel"             ,"docs/Read#Tabel"                        ,"icon"],
             "85":[ "Picons"            ,"docs/components/icon#picons"            ,"icon"],
             "86":[ "Themify Icons"     ,"docs/components/icon#themify"           ,"icon"],
             "87":[ "Icon Feathe"       ,"docs/components/icon#iconFeather"       ,"icon"],
             "88":[ "MDI Icons"         ,"docs/components/icon#mdi"               ,"icon"],
             "89":[ "Feather"           ,"docs/components/icon#iconFeather"       ,"icon"],
             "90":[ "MS Icon"           ,"docs/components/icon#mdi"               ,"icon"],
             "91":[ "Element"           ,"docs/Modal#Element"                     ,"icon"],
             "92":[ "Boostrap"          ,"docs/Modal#Boostrap"                    ,"icon"],
             "93":[ "Route"             ,"docs/Modal#Route"                       ,"icon"],
             "94":[ "useUid"            ,"doc/react#useUid"                       ,"icon"],
             "95":[ "Feather"           ,"doc/react#FeatherIcon"                  ,"icon"],
             "96":[ "Material Community","doc/react#MaterialCommunityIcons"       ,"icon"],
             "97":[ "useHandelCreate"   ,"doc/react#useHandelCreate"              ,"icon"],
             "98":[ "useHandelList"     ,"doc/react#useHandelList"                ,"icon"],
             "99":[ "useHandelHttp"     ,"doc/react#useHandelHttp"                ,"icon"],
             "100":[ "Get List item"    ,"doc/react#getList"                      ,"icon"],
             "101":[ "List map"         ,"doc/react#getListmap"                   ,"icon"],
             "102":[ "Search"           ,"doc/react#getListSearch"                ,"icon"],
             "103":[ "Pagination"       ,"doc/react#getListPagination"            ,"icon"],
             "104":[ "Modal"            ,"doc/react#Modal"                        ,"icon"],
             "105":[ "Bulder"           ,"doc/react#Bulder"                       ,"icon"],
             "106":[ "Text Input"       ,"doc/react#TextInput"                    ,"icon"],
             "107":[ "Select List"      ,"doc/react#SelectList"                   ,"icon"],
             "108":[ "Date Picker"      ,"doc/react#datePicker"                   ,"icon"],
             "109":[ "Time Picker"      ,"doc/react#timePicker"                   ,"icon"],
             "110":[ "Validasi"         ,"doc/react#validasi"                     ,"icon"],
             "111":[ "Camera"           ,"doc/react#upCamera"                     ,"icon"],
             "112":[ "Galery"           ,"doc/react#upGaler"                      ,"icon"],
             "113":[ "Object"           ,"docs/Read#dataObject"                   ,"icon"],
             "114":[ "Stack"            ,"docs/Read#readStack"                    ,"icon"],
             "115":[ "Container"        ,"docs/Read#container"                    ,"icon"],
             "116":[ "Modal"            ,"docs/Read#readElementModal"             ,"icon"],
             "117":[ "Plugin"           ,"docs/Read#ModalPlugin"                  ,"icon"],
             "118":[ "Target ID"        ,"docs/Read#readElementTarget"            ,"icon"],
             "119":[ "Search"           ,"docs/Read#readSearch"                   ,"icon"],
             "120":[ "Pagination"       ,"docs/Read#readPagination"               ,"icon"],
             "121":[ "Dropdown"         ,"docs/Read#readDropdown"                 ,"icon"],
             "122":[ "Selector"         ,"docs/Read#readDropdownQuerySelector"    ,"icon"],
             "123":[ "Dom Pdf"          ,"docs/Read#domPdf"                       ,"icon"],
             "124":[ "Prind Raw"        ,"docs/Read#pridRaw"                      ,"icon"],
             "125":[ "Grid System"      ,"docs/Read#GridSystem"                   ,"icon"],
             "127":[ "Datetime"         ,"docs/rest-api#datetime"                  ,"icon"],
             "128":[ "Text"             ,"docs/rest-api#text"                      ,"icon"],
             "129":[ "Cookie"           ,"docs/rest-api#cookie"                    ,"icon"],
             "130":[ "Encryption"       ,"docs/rest-api#encryption"                ,"icon"],
             "131":[ "Validation"       ,"docs/rest-api#validation"                ,"icon"],
             "132":[ "local storage"    ,"docs/Storage#storage"                   ,"icon"],
             "133":[ "cookies"          ,"docs/Storage#Cookie"                    ,"icon"],
             "135":[ "IndexedDB"        ,"docs/Storage#indexedDB"                 ,"icon"],
             "136":[ "Firebase"         ,"docs/Storage#Firebase"                  ,"icon"],
             "137":[ "CarouselIndicators" ,"docs/components#CarouselIndicators"    ,"icon"],
             "138":[ "CarouselCaption"    ,"docs/components#CarouselCaption"       ,"icon"],
             "139":[ "Marker"             ,"docs/components#Marker"                ,"icon"],
             "140":[ "Media"              ,"docs/components#Media"                 ,"icon"],
             "142":[ "Object"           ,"docs/components#dataObject"              ,"icon"],
             "145":[ "Create Auth"      ,"docs/rest-api#Auth"                     ,"icon"],
             "146":[ "Package"          ,"docs/rest-api#Package"                   ,"icon"],
             "147":[ "Get Token"        ,"docs/rest-api#Token"                     ,"icon"],
             "148":[ "Read Package"     ,"docs/rest-api#Read"                      ,"icon"],
             "149":[ "Datatables Api"   ,"docs/rest-api#Datatables"                ,"icon"],
             "150":[ "Add Query"        ,"docs/rest-api#Add"                    ,"icon"],
             "151":[ "Data Entri"       ,"docs/rest-api#Entri"                     ,"icon"],
             "152":[ "Data Update"      ,"docs/rest-api#Update"                    ,"icon"],
             "153":[ "Upload Images"    ,"docs/rest-api#Images"                    ,"icon"],
             "154":[ "Upload File"      ,"docs/rest-api#File"                      ,"icon"],
             "155":[ "Delete"           ,"docs/rest-api#Delete"                    ,"icon"],
             "156":[ "Token Office"     ,"docs/rest-api-office#Token"              ,"icon"],
             "157":[ "Property Office"  ,"docs/rest-api-office#Property"           ,"icon"],
             "158":[ "Syntax Pdf"       ,"docs/rest-api-office#Pdf"                ,"icon"],
             "159":[ "Syntax Ppt"       ,"docs/rest-api-office#Ppt"                ,"icon"],
             "160":[ "Syntax Xlsx"      ,"docs/rest-api-office#Xlsx"               ,"icon"],
             "161":[ "Syntax Docx"      ,"docs/rest-api-office#Docx"               ,"icon"],
             "162":[ "Doc Type"         ,"docs/configurasi#doctype"                ,"icon"],
             "163":[ "Assets js,css"    ,"docs/configurasi#Assets"                 ,"icon"],
             "164":[ "Condisi"          ,"docs/configurasi#Condisi"                ,"icon"],
             "165":[ "Base URL"         ,"docs/configurasi#Base"                   ,"icon"],
             "166":[ "Import"           ,"docs/configurasi#Import"                 ,"icon"],
             "167":[ "Navbar"           ,"docs/configurasi#Navbar"                 ,"icon"],
             "168":[ "Helper link"      ,"docs/configurasi#link"                   ,"icon"],
             "169":[ "Include File"     ,"docs/configurasi#Include"                ,"icon"],
             "170":[ "Use Href"         ,"docs/router#useRouter"                   ,"icon"],
             "171":[ "Theme"            ,"docs/router#objecTheme"                  ,"icon"],
             "172":[ "Package"          ,"docs/router#objecPackage"                ,"icon"],
             "173":[ "Hashtag"          ,"docs/router#objechashtag"                ,"icon"],
             "174":[ "Handel Link"      ,"docs/router#routerDom"                   ,"icon"],
             "175":[ "SQL To Firebase"  ,"docs/From#Firebase"                      ,"icon"]             
            }
         },
        "hashtag": {
           "zero":{
             "1":[ "Doc Type"        ,"docs/configurasi/" ,"doctype"     ,"icon"]
            }
         }
     });


// setRouter({
//   spinner:'text-primary',
//   selector :['utilities','zzsdsds'],
//   mainroute :'mainRoute',
//   patroutes :2
// })
