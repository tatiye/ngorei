 import tatiyeNet,{setRouter,createRouter,setLink} from "{tatiye.es6}"; 
    window.license=function(page,titel) {
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
    window.setF7=function(page,titel) {
        setLink(['modal',page],{
           "titel":     titel,
           "width":     '600x700',
           "key":       'add',
           "tabel":     'percode',
           "package":   'html'
        });
    }

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
        "status"    :'dev',
        "router"    :'docs',
        "public"    :'theme',
        "spinner"   :'text-primary',
        "mainroute" :'bodyRoute',
        "explode"   :'#',
        "patroutes" :1,
        "link": {
          "ecosystem":{
             "1":[ "Download"       ,"Github@ngorei "     ,"picons-106"  ,"docs/intro/Download"],
             "2":[ "Installation"   ,"NPM tatiye"         ,"picons-193"  ,"docs/intro/Installation"],
             "3":[ "Configurasi"    ,"Package & Database" ,"picons-194"  ,"docs/intro/Configurasi"],
             "4":[ "License key"    ,"Trial 25-day"       ,"picons-114"  ,"docs/intro/License"],
             "5":[ "Links & Pages"  ,"Package & Database" ,"picons-359"  ,"docs/intro/Router"],
             "6":[ "API Reference"  ,"Package & Database" ,"picons-359"  ,"docs/ApiReference"]
            },
         "core":{
             "2":[ "Website"      ,"Public theme"          ,"picons-496"   ,"docs/core/Website"],
             "3":[ "Mobile"       ,"Detecting Browser"     ,"picons-324"   ,"docs/core/Mobile"],
             "4":[ "OS, Android"  ,"Webview & Native "     ,"picons-116"   ,"docs/core/App"],
             "5":[ "Dashboard"    ,"Management Package"    ,"picons-309"   ,"docs/core/Dashboard"]
            },
         "core_web":{
             "1":[ "Links & Pages"          ,"Public theme"          ,"picons-496"           ,"docs/core/Website#ngorei=Links-Pages"],
             "3":[ "Scroll Content"         ,"Public theme"          ,"picons-496"           ,"docs/core/Website#content=Scroll-Content"],
             "4":[ "Icon Images"            ,"Detecting Browser"     ,"picons-324"           ,"docs/core/Website#ngorei=Icon-Images"],
             "5":[ "Height"                 ,"Public theme"          ,"picons-496"           ,"docs/core/Website#ngorei=Height"],
             "6":[ "Width"                  ,"Detecting Browser"     ,"picons-324"           ,"docs/core/Website#ngorei=Width"],
             "7":[ "Size"                   ,"Detecting Browser"     ,"picons-324"           ,"docs/core/Website#ngorei=Size"],
             "8":[ "Font Size"                   ,"Detecting Browser"     ,"picons-324"           ,"docs/core/Website#ngorei=Font-Size"],
             "9":[ "Margin"                 ,"Detecting Browser"     ,"picons-324"           ,"docs/core/Website#ngorei=Margin"],
             "10":[ "Padding"                ,"Webview & Native "     ,"picons-116"           ,"docs/core/Website#ngorei=Padding"],
             "20":[ "Background"             ,"Webview & Native "     ,"picons-116"           ,"docs/core/Website#ngorei=Background"],
             "21":[ "Color Text"                 ,"Webview & Native "     ,"picons-116"           ,"docs/core/Website#ngorei=Color-Text"],
             "22":[ "Image Resizer"         ,"Webview & Native "     ,"picons-116"           ,"docs/core/Website#images=Image-Resizer"],
             "23":[ "Resize Width"         ,"Webview & Native "      ,"padding-left:20px"    ,"docs/core/Website#images=Image-Resize-Width"],
             "24":[ "Resize Height"         ,"Webview & Native "     ,"padding-left:20px"    ,"docs/core/Website#images=Image-Resize-Height"],
             "25":[ "Watermark"         ,"Webview & Native "         ,"padding-left:20px"    ,"docs/core/Website#images=Image-Watermark"],
             "26":[ "Crop Image"         ,"Webview & Native "         ,"padding-left:20px"    ,"docs/core/Website#images=Crop-Image"],
             "27":[ "Black White"         ,"Webview & Native "         ,"padding-left:20px"   ,"docs/core/Website#images=Images-Black-White"],
            }, 
 


         "framework":{
             "1":[ "HTML"         ,"Ngorei HTML DOM "     ,"{html.png}"        ,"docs/HTML"],
             "2":[ "ECMAScript"   ,"Ngorei ECMAScript"    ,"{js.png}"          ,"docs/Javascript"],
             "4":[ "React Native"  ,"Ngorei React "        ,"{react.png}"       ,"docs/React"],
             "5":[ "Framework7"   ,"Ngorei Framework7"    ,"{Framework7.svg}"  ,"docs/F7"],
             "6":[ "DevTools"     ,"Ngorei Storage"       ,"{googel.png}"      ,"docs/DevTools"],
             "8":[ "Firebase"     ,"Ngorei firebase"      ,"{firebase.png}"    ,"docs/Firebase"],
             "9":[ "Datatables"   ,"Ngorei Datatables"    ,"{Datatables.png}"  ,"docs/Datatables"],
             "10":[ "Chart"       ,"Ngorei Chart"         ,"{chart.png}"       ,"docs/Chart"],
             "12":[ "Vue"         ,"Ngorei  Vue"           ,"{vue2.png}"       ,"docs/Vue"],
             "13":[ "Wolf05"         ,"Ngorei  OOP"           ,"{wolf05.png}"       ,"docs/Oop"], 
            },
  
           "html_content":{
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
             "29":[ "Upload Images"      ,"docs/HTML/From#Images"  ,"icon"],
             "30":[ "Upload Document"    ,"docs/HTML/From#Document"  ,"icon"],
             "31":[ "Import Excel"       ,"docs/HTML/From#import"  ,"icon"],
             "32":[ "Fetch Eksternal"    ,"docs/HTML/Content#Fetch"  ,"icon"],
             "33":[ "Read DOM"           ,"docs/HTML/Read"  ,"icon"]

            },
           "html_components":{
             "30":[ "Picons"             ,"docs/HTML/components/icon#picons"  ,"icon"],
             "31":[ "Themify Icons"      ,"docs/HTML/components/icon#themify"  ,"icon"],
             "32":[ "Icon Feather"       ,"docs/HTML/components/icon#iconFeather"  ,"icon"],
             "33":[ "MDI Icons"          ,"docs/HTML/components/icon#mdi"  ,"icon"],
             "34":[ "Feather"            ,"docs/HTML/components/icon#feather"  ,"icon"],
             "35":[ "MS Icon"            ,"docs/HTML/components/icon#msIcon"  ,"icon"],
             "36":[ "QRcode"             ,"docs/HTML/components#QRcode"  ,"icon"],
             "37":[ "List Group"         ,"docs/HTML/components#listGroup"  ,"icon"],
             "38":[ "List"               ,"docs/HTML/components#list"  ,"icon"],
             "39":[ "avatar"             ,"docs/HTML/components#avatar"   ,"icon"],
             "40":[ "images background"  ,"docs/HTML/components#imagesbackground" ,"icon"],
             "41":[ "imagesgroup"        ,"docs/HTML/components#imagesgroup"     ,"icon"],
             "42":[ "images toolbar"     ,"docs/HTML/components#imagestoolbar"  ,"icon"],
             "43":[ "Badges"             ,"docs/HTML/components#Badges"  ,"icon"],
             "44":[ "Breadcrumbs"        ,"docs/HTML/components#Breadcrumbs"  ,"icon"],
             "45":[ "Card Decks"         ,"docs/HTML/components#CardDecks"  ,"icon"],
             "47":[ "Card"               ,"docs/HTML/components#Card"   ,"icon"],
             "48":[ "Carousel"           ,"docs/HTML/components#Carousel" ,"icon"],
             "49":[ "Indicators"         ,"docs/HTML/components#CarouselIndicators"  ,"icon"],
             "50":[ "Caption"            ,"docs/HTML/components#CarouselCaption"     ,"icon"],
             "51":[ "Marker"             ,"docs/HTML/components#Marker"  ,"icon"],
             "52":[ "Media Object"       ,"docs/HTML/components#Media"  ,"icon"]
            },
             "html_datatables":{
             "30":[ "Grid System"      ,"docs/Datatables#grid"  ,"icon"],
             "31":[ "From Entri"       ,"docs/Datatables#gridFrom"  ,"icon"],
             "32":[ "From Stack"       ,"docs/Datatables#gridFromStack"  ,"icon"],
             "33":[ "Select Option"    ,"docs/Datatables#selectData"  ,"icon"],
             "34":[ "Column Hide"      ,"docs/Datatables#columnHide"  ,"icon"],
             "35":[ "Use Click"        ,"docs/Datatables#useClick"  ,"icon"],
             "36":[ "Dropdown"         ,"docs/Datatables#Dropdown"  ,"icon"],
             "37":[ "Column Defs"      ,"docs/Datatables#columnDefs"  ,"icon"],
             "38":[ "Footer Callback"  ,"docs/Datatables#footerCallback"  ,"icon"],
             "39":[ "Primary Key"      ,"docs/Datatables#primarykey"   ,"icon"],
             "40":[ "Use Devices"      ,"docs/Datatables#useDevices" ,"icon"],
             "41":[ "Getting started"  ,"docs/Datatables#started"     ,"icon"],
             "42":[ "Head Tabel"       ,"docs/Datatables#headTabel"  ,"icon"],
             "43":[ "From Modal"       ,"docs/Datatables#from"  ,"icon"],
             "44":[ "Grid System"      ,"docs/Datatables#gridOne"  ,"icon"],
             "45":[ "Column Sheet"     ,"docs/Datatables#sheet"  ,"icon"],
             "47":[ "Column Role"      ,"docs/Datatables#search"   ,"icon"]

            },
        "html_mobile":{
             "1":[ "App index"           ,"docs/F7#Layout"   ,"icon"],
             "2":[ "Routes General"      ,"docs/F7#Routes"   ,"icon"],
             "3":[ "Object Navigasi"     ,"docs/F7#Navigasi" ,"icon"],
             "4":[ "additional pages"    ,"docs/F7#Pages"    ,"icon"],
             "5":[ "Dark Mode"           ,"docs/F7#Mode"     ,"icon"],
             "6":[ "Fetch Eksternal "    ,"docs/F7#Fetch"    ,"icon"],
             "7":[ "Fetch HTML DOM"      ,"docs/F7#Dom"      ,"icon"],
             "8":[ "Fetch Object"        ,"docs/F7#Object"   ,"icon"],
            },
        "html_mobilecomponents":{
             "1":[ "Action Sheet"           ,"docs/F7/pages#action-sheet"     ,"/action-sheet/"],
             "2":[ "Columns"                ,"docs/F7/pages#columns"          ,"/columns/"],
             "3":[ "Dialog"                 ,"docs/F7/pages#dialog"           ,"/dialog/"],
             "4":[ "Icons"                  ,"docs/F7/pages#icons"            ,"/icons/"],
             "5":[ "infinite Scroll"        ,"docs/F7/pages#infinite-scroll"  ,"/infinite-scroll/"],
             "6":[ "Notification"           ,"docs/F7/pages#notification"     ,"/notification/"],
             "7":[ "Page"                   ,"docs/F7/pages#page"             ,"/page/"],
             "8":[ "Panel"                  ,"docs/F7/pages#panel"            ,"/panel/"],
             "9":[ "Photo Browser"          ,"docs/F7/pages#photo-browser"    ,"/photo-browser/"],
             "10":[ "Popover"               ,"docs/F7/pages#popover"          ,"/popover/"],
             "11":[ "Popup"                 ,"docs/F7/pages#popup"            ,"/popup/"],
             "12":[ "Pull to refresh"        ,"docs/F7/pages#pull-to-refresh" ,"/pull-to-refresh/"],
             "13":[ "Sheet modal"           ,"docs/F7/pages#sheet-modal"      ,"/sheet-modal/"],
             "14":[ "Swipe to delete"       ,"docs/F7/pages#swipe-to-delete"  ,"/swipe-to-delete/"],
             "15":[ "Tabs"                  ,"docs/F7/pages#tabs"             ,"/tabs/"],
             "16":[ "Text editor"           ,"docs/F7/pages#text-editor"      ,"/text-editor/"],
             "17":[ "Toast"                 ,"docs/F7/pages#toast"            ,"/toast/"],
             "18":[ "Tooltip"               ,"docs/F7/pages#tooltip"          ,"/tooltip/"],
             "19":[ "Typography"            ,"docs/F7/pages#typography"       ,"/typography/"],
             "20":[ "Accordion"             ,"docs/F7/pages#accordion"        ,"/accordion/"],
             "21":[ "Album list"            ,"docs/F7/pages#album-list"       ,"/album-list/"],
             "22":[ "Author list"           ,"docs/F7/pages#author-list"       ,"/author-list/"],
             "23":[ "Badge"                 ,"docs/F7/pages#badge"            ,"/badge/"],
             "24":[ "Button"                ,"docs/F7/pages#button"           , "/button/"],
             "25":[ "Checkbox"              ,"docs/F7/pages#checkbox"         ,"/checkbox/"],
             "26":[ "Card"                  ,"docs/F7/pages#card"             ,"/card/"],
             "27":[ "Card Footer"           ,"docs/F7/pages#card-footer"      ,"/card-footer/"],
             "28":[ "Card Big Footer"       ,"docs/F7/pages#card-big-footer"  ,"/card-big-footer/"],
             "29":[ "Comments"              ,"docs/F7/pages#comments"         ,"/comments/"],
             "30":[ "Event list"            ,"docs/F7/pages#event-list"       ,"/event-list/"],
             "31":[ "History timeline"      ,"docs/F7/pages#history-timeline","/history-timeline/"],
             "32":[ "Information block"     ,"docs/F7/pages#information-block","/information-block/"],
             "33":[ "Link banner"           ,"docs/F7/pages#link-banner"      ,"/link-banner/"],
             "34":[ "list"                  ,"docs/F7/pages#list"             ,"/list/"],
             "35":[ "List icon"             ,"docs/F7/pages#list-icon"        ,"/list-icon/"],
             "36":[ "Picker"                ,"docs/F7/pages#picker"           ,"/picker/"],
             "37":[ "Post list"             ,"docs/F7/pages#post-list"        ,"/post-list/"],
             "38":[ "Preloader"             ,"docs/F7/pages#preloader"        ,"/preloader/"],
             "39":[ "Progress bar"          ,"docs/F7/pages#progress-bar"     ,"/progress-bar/"],
             "40":[ "Radio"                 ,"docs/F7/pages#radio"            ,"/radio/"],
             "41":[ "Range slider"          ,"docs/F7/pages#range-slider"     ,"/range-slider/"],
             "42":[ "Rating"                ,"docs/F7/pages#rating"           ,"/rating/"],
             "43":[ "Slider cards"          ,"docs/F7/pages#slider-cards"     ,"/slider-cards/"],
             "44":[ "Slider cards footer"   ,"docs/F7/pages#slider-cards-footer","/slider-cards-footer/"],
             "45":[ "Slider categories"     ,"docs/F7/pages#slider-categories","/slider-categories/"],
             "46":[ "Slider authors"        ,"docs/F7/pages#slider-authors"   ,"/slider-authors/"],
             "47":[ "Slider albums"         ,"docs/F7/pages#slider-albums"    ,"/slider-albums/"],
             "48":[ "Slider movies"         ,"docs/F7/pages#slider-movies"    ,"/slider-movies/"],
             "49":[ "Stepper"               ,"docs/F7/pages#stepper"          ,"/stepper/"],
             "50":[ "Stocks"                ,"docs/F7/pages#stocks"           ,"/stocks/"],
             "51":[ "Text input"            ,"docs/F7/pages#text-input"       ,"/text-input/"],
             "52":[ "Ticket"                ,"docs/F7/pages#ticket"           ,"/ticket/"],
             "53":[ "Toggle button"         ,"docs/F7/pages#toggle-button"    ,"/toggle-button/"],
             "54":[ "Signup"                ,"docs/F7/pages#signup"           ,"/signup/"],
             "55":[ "Signin"                ,"docs/F7/pages#signin"           ,"/signin/"],
             "56":[ "Forgot password"       ,"docs/F7/pages#forgot-password"  ,"/forgot-password/"],
             "57":[ "Messages"              ,"docs/F7/pages#messages"         ,"/messages/"],
             "58":[ "Chat"                  ,"docs/F7/pages#chat"             ,"/chat/"],
             "59":[ "Single"                ,"docs/F7/pages#single"           ,"/single/"],
             "60":[ "Create post"           ,"docs/F7/pages#create-post"      ,"/create-post/"],
             "61":[ "Movie"                 ,"docs/F7/pages#movie"            ,"/movie/"],
             "62":[ "Album"                 ,"docs/F7/pages#album"            ,"/album/"],
             "63":[ "Calendar"              ,"docs/F7/pages#calendar"         ,"/calendar/"],
             "64":[ "Help center"           ,"docs/F7/pages#help-center"      ,"/help-center/"],
             "65":[ "Contact"               ,"docs/F7/pages#contact"          ,"/contact/"],
             "66":[ "Settings"              ,"docs/F7/pages#settings"         ,"/settings/"],
             "67":[ "Categories"            ,"docs/F7/pages#categories"       ,"/categories/"],
             "68":[ "Profile"               ,"docs/F7/pages#profile"          ,"/profile/"],
             "69":[ "Search"                ,"docs/F7/pages#search"           ,"/search/"],
             "70":[ "Notifications"         ,"docs/F7/pages#notifications"    ,"/notifications/"],
             "71":[ "Onboarding"            ,"docs/F7/pages#onboarding"       ,"/onboarding/"]
            },

          "db_php":{
             "1":[ "Datetime"             ,"docs/Oop#datetime"        ,"icon"],
             "2":[ "Text"                 ,"docs/Oop#text"            ,"icon"],
             "3":[ "Cookie"               ,"docs/Oop#cookie"          ,"icon"],
             "4":[ "Encryption"           ,"docs/Oop#encryption"      ,"icon"],
             "5":[ "Validation"           ,"docs/Oop#validation"      ,"icon"],
             "6":[ "Images"               ,"docs/Oop#resizeimages"    ,"icon"],
             "7":[ "Pre Code"             ,"docs/Oop#precode"         ,"icon"],
             "8":[ "MangoDB"              ,"docs/Oop#MangoDB"         ,"icon"],
             "9":[ "Postgre SQL"          ,"docs/Oop#PostgreSQL"      ,"icon"],
             "10":[ "Python"              ,"docs/Oop#Python"          ,"icon"],
             "11":[ "SQL Lite"            ,"docs/Oop#SQLlite"         ,"icon"],
             "12":[ "Face Detector"       ,"docs/Oop#Facedetector"    ,"icon"],
             "13":[ "TOCR"                ,"docs/Oop#TOCR"            ,"icon"],
             "14":[ "NIK"                 ,"docs/Oop#NIK"             ,"icon"]
            },

         },


        "hashtag": {
           "zero_config":{
             "15":[ "Struktur"        ,"docs/intro/configurasi/" ,"doctype"     ,"icon"],
             "16":[ "Struktur Assets" ,"docs/intro/configurasi/" ,"Assets"   ,"icon"],
             "17":[ "Assets Condisi"  ,"docs/intro/configurasi/" ,"Condisi"   ,"icon"],
             "18":[ "Base URL"        ,"docs/intro/configurasi/" ,"Base"   ,"icon"],
             "19":[ "Import Module"   ,"docs/intro/configurasi/" ,"Import"   ,"icon"],
             "20":[ "Navbar"          ,"docs/intro/configurasi/" ,"Navbar"   ,"icon"],
             "22":[ "Include Path"    ,"docs/intro/configurasi/" ,"Include"   ,"icon"]
            },
           "app_config":{
             "15":[ "Url Root"        ,"docs/intro/configurasi/" ,"root"     ,"icon"],
             "16":[ "Database"        ,"docs/intro/configurasi/" ,"database"   ,"icon"]
            },
           "object_router":{
             "1":[ "Object"       ,"docs/intro/Router/" ,"Object"      ,"icon"],
             "2":[ "Hashtag"      ,"docs/intro/Router/" ,"Hashtag"      ,"icon"],
             "3":[ "Onclick"      ,"docs/intro/Router/" ,"Onclick"      ,"icon"],
             "5":[ "Pages"        ,"docs/intro/Router/" ,"Pages"        ,"icon"]
            },
 
           "db_storage":{
             "31":[ "Localstorage"  ,"docs/DevTools/" ,"storage"    ,"icon"],
             "32":[ "Cookie"        ,"docs/DevTools/" ,"Cookie"     ,"icon"],
             "33":[ "indexedDB"     ,"docs/DevTools/" ,"indexedDB"  ,"icon"]
            },
           "db_firebase":{
             "127":[ "For Each" ,"docs/DevTools/"  ,"Firebase=forEach"  ,"icon" ],
             "128":[ "Insert"   ,"docs/DevTools/"  ,"Firebase=Insert"  ,"icon" ],
             "129":[ "Update"   ,"docs/DevTools/"  ,"Firebase=Update"  ,"icon" ],
             "130":[ "Delete"   ,"docs/DevTools/"  ,"Firebase=Delete"  ,"icon" ],
             "131":[ "Select"   ,"docs/DevTools/"  ,"Firebase=Select"  ,"icon" ],
             "132":[ "Push"     ,"docs/DevTools/"  ,"Firebase=Push"  ,"icon" ],
             "133":[ "Limit"    ,"docs/DevTools/"  ,"Firebase=Limit"  ,"icon" ]
            },
           "set_firebase":{
             "127":[ "For Each" ,"docs/Firebase/"    ,"Firebase=forEach"  ,"icon" ],
             "128":[ "Insert"  ,"docs/Firebase/"     ,"Firebase=Insert"  ,"icon" ],
             "129":[ "Update"  ,"docs/Firebase/"     ,"Firebase=Update"  ,"icon" ],
             "130":[ "Delete"  ,"docs/Firebase/"     ,"Firebase=Delete"  ,"icon" ],
             "131":[ "Select"  ,"docs/Firebase/"     ,"Firebase=Select"  ,"icon" ],
             "132":[ "Push"    ,"docs/Firebase/"     ,"Firebase=Push"  ,"icon" ],
             "133":[ "Limit"   ,"docs/Firebase/"     ,"Firebase=Limit"  ,"icon" ]
            },

            "db_api":{
             "1":[ "Create Auth"       ,"docs/ApiReference/","Auth"        ,"icon"],
             "2":[ "Package"           ,"docs/ApiReference/","Package"     ,"icon"],
             "3":[ "Get Token"         ,"docs/ApiReference/","Token"       ,"icon"],
             "4":[ "Read Data"         ,"docs/ApiReference/","Read"        ,"icon"],
             "5":[ "Datatables"        ,"docs/ApiReference/","Datatables"  ,"icon"],
             "6":[ "Add Query"         ,"docs/ApiReference/","Add"         ,"icon"],
             "7":[ "Data Entri"        ,"docs/ApiReference/","Entri"       ,"icon"],
             "8":[ "Data Update"       ,"docs/ApiReference/","Update"      ,"icon"],
             "9":[ "Upload Images"     ,"docs/ApiReference/","Images"      ,"icon"],
             "10":[ "Upload File"      ,"docs/ApiReference/","File"      ,"icon"],
             "11":[ "Delete"           ,"docs/ApiReference/","Delete"      ,"icon"],
             "12":[ "Office"           ,"docs/ApiReference-office"        ,"Office"      ,"icon","click","#appRoute"]
            },

            "db_office":{
             "1":[ "Get Token" ,"docs/ApiReference-office/"    ,"Token"       ,"icon"], 
             "2":[ "Property"  ,"docs/ApiReference-office/"    ,"Property"    ,"icon"], 
             "3":[ "Pdf"       ,"docs/ApiReference-office/"    ,"Pdf"         ,"icon"],
             "4":[ "Ppt"       ,"docs/ApiReference-office/"    ,"Ppt"         ,"icon"],
             "5":[ "Xlsx"      ,"docs/ApiReference-office/"    ,"Xlsx"        ,"icon"],
             "6":[ "Docx"      ,"docs/ApiReference-office/"    ,"Docx"        ,"icon"]
            },


            "db_modules":{
             "31":[ "Text"       ,"docs/Javascript/" ,"Text"      ,"icon","db_text","margin-left:10px; display:none"],
             "32":[ "Date Time"  ,"docs/Javascript/" ,"DateTime"  ,"icon","db_dateTime","margin-left:10px; display:none "],
             "33":[ "Encode"     ,"docs/Javascript/" ,"Decode"    ,"icon","db_encode","margin-left:10px; display:none"],
             "34":[ "OnClick"    ,"docs/Javascript/" ,"OnClick"   ,"icon","db_onclick","margin-left:10px; display:none "],
             "35":[ "Get History","docs/Javascript/" ,"History"   ,"icon","db_onclick","margin-left:10px;  "],
             "36":[ "User Agent" ,"docs/Javascript/" ,"userAgent" ,"icon","db_onclick","margin-left:10px;  "],
             "37":[ "Location"   ,"docs/Javascript/" ,"Location"  ,"icon","db_onclick","margin-left:10px;  "],
             "38":[ "Shortcut"   ,"docs/Javascript/" ,"Shortcut"  ,"icon","db_onclick","margin-left:10px;  "],
             "39":[ "SetLink"    ,"docs/Javascript/" ,"SetLink"   ,"icon","db_onclick","margin-left:10px;  "]
            },

            "db_dateTime":{
             "31":[ "Date Hari"     ,"docs/Javascript/" ,"DateTime=setDateTime=hari"   ,"icon"],
             "32":[ "Date Bulan"    ,"docs/Javascript/" ,"DateTime=setDateTime=bulan"  ,"icon"],
             "33":[ "Date Tahun"    ,"docs/Javascript/" ,"DateTime=setDateTime=tahun"  ,"icon"],
             "34":[ "Date Jam"      ,"docs/Javascript/" ,"DateTime=setDateTime=jam"    ,"icon"],
             "35":[ "Date EN"       ,"docs/Javascript/" ,"DateTime=setDateTime=EN"     ,"icon"],
             "36":[ "Date DIN"      ,"docs/Javascript/" ,"DateTime=setDateTime=DIN"    ,"icon"],
             "37":[ "Date IN"       ,"docs/Javascript/" ,"DateTime=setDateTime=IN"     ,"icon"],
             "38":[ "Date IND"      ,"docs/Javascript/" ,"DateTime=setDateTime=IND"    ,"icon"],
             "39":[ "Date Day"      ,"docs/Javascript/" ,"DateTime=setDateTime=Day"    ,"icon"],
             "40":[ "Date Month"    ,"docs/Javascript/" ,"DateTime=setDateTime=Month"  ,"icon"],
             "41":[ "Date Year"     ,"docs/Javascript/" ,"DateTime=setDateTime=Year"   ,"icon"],
             "42":[ "Date Bln"      ,"docs/Javascript/" ,"DateTime=setDateTime=Bln"    ,"icon"],
             "43":[ "Date Time"     ,"docs/Javascript/" ,"DateTime=setDateTime=time"   ,"icon"],
             "44":[ "Date Time dmy" ,"docs/Javascript/" ,"DateTime=setDateTime=dmy"    ,"icon"],
             "45":[ "Time v"        ,"docs/Javascript/" ,"DateTime=setDateTime=v"      ,"icon"],
             "46":[ "Time time"     ,"docs/Javascript/" ,"DateTime=setDateTime=timex"  ,"icon"],
             "47":[ "Time Day"      ,"docs/Javascript/" ,"DateTime=setDateTime=day"    ,"icon"],
             "48":[ "Time Month"    ,"docs/Javascript/" ,"DateTime=setDateTime=month"  ,"icon"],
             "49":[ "Time Year"     ,"docs/Javascript/" ,"DateTime=setDateTime=year"   ,"icon"]
            },
            "db_encode":{
             "31":[ "Set Decode"       ,"docs/Javascript/" ,"Decode=setDecode"    ,"icon"],
             "32":[ "Set Token"        ,"docs/Javascript/" ,"Decode=setToken"     ,"icon"],
             "33":[ "Get Token"        ,"docs/Javascript/" ,"Decode=getToken"     ,"icon"]
            },

            "db_onclick":{
             "31":[ "Insert"             ,"docs/Javascript/" ,"OnClick=insert"       ,"icon"],
             "32":[ "Update"             ,"docs/Javascript/" ,"OnClick=update"       ,"icon"],
             "33":[ "Stack"              ,"docs/Javascript/" ,"OnClick=stack"        ,"icon"],
             "34":[ "Delete Permananet"  ,"docs/Javascript/" ,"OnClick=permananet"   ,"icon"],
             "35":[ "Delete Temporarily" ,"docs/Javascript/" ,"OnClick=temporarily"  ,"icon"],
             "36":[ "Upload Images"      ,"docs/Javascript/" ,"OnClick=images"       ,"icon"],
             "37":[ "Upload Document"    ,"docs/Javascript/" ,"OnClick=documents"    ,"icon"],
             "38":[ "Import Excel"       ,"docs/Javascript/" ,"OnClick=import"       ,"icon"],
             "39":[ "Modal"              ,"docs/Javascript/" ,"OnClick=modals"       ,"icon"],
             "40":[ "Plugin"             ,"docs/Javascript/" ,"OnClick=plugis"       ,"icon"],
             "41":[ "Target"             ,"docs/Javascript/" ,"OnClick=targets"      ,"icon"],
             "42":[ "Dom Pdf"            ,"docs/Javascript/" ,"OnClick=dopdf"        ,"icon"],
             "43":[ "Prind Raw"          ,"docs/Javascript/" ,"OnClick=prindraw"     ,"icon"],
             "44":[ "Route"              ,"docs/Javascript/" ,"OnClick=routes"       ,"icon"],
             "45":[ "Dialog"             ,"docs/Javascript/" ,"OnClick=dialogs"      ,"icon"],
             "46":[ "Link Route"         ,"docs/Javascript/" ,"OnClick=lroute"       ,"icon"],
             "47":[ "Link Sign"          ,"docs/Javascript/" ,"OnClick=lsign"        ,"icon"]
            },

            "db_text":{
             "31":[ "Romawi"       ,"docs/Javascript/" ,"Text=romawi"    ,"icon"],
             "32":[ "Readmore"     ,"docs/Javascript/" ,"Text=readmore"  ,"icon"],
             "33":[ "Substr"       ,"docs/Javascript/" ,"Text=substr"     ,"icon"],
             "34":[ "Split"        ,"docs/Javascript/" ,"Text=setSplit"   ,"icon"],
             "35":[ "Replace"      ,"docs/Javascript/" ,"Text=replace"    ,"icon"],
             "36":[ "Rupiah"       ,"docs/Javascript/" ,"Text=rupiah"     ,"icon"],
             "37":[ "Terbilang"    ,"docs/Javascript/" ,"Text=terbilang"  ,"icon"],
             "38":[ "Explode"      ,"docs/Javascript/" ,"Text=explode"    ,"icon"]
            }

         }
     });
setRouter({
  spinner:'text-primary',
  selector :['document'],
  mainroute :'appRoute',
  patroutes :1
})

