 import tatiyeNet,{setRouter,createRouter,userAgent,setLink} from "{tatiye.es6}"; 
    console.log(userAgent({
      'indexOn':'Desktop',
      'status':'Online'  //Online ,Offline
    }))
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
             "1":[ "Home"            ,""                ,"icon"],
             "2":[ "Developer"       ,"docs"            ,"icon"],
             "3":[ "Pricing"         ,"sales"           ,"icon"],
             "4":[ "Blog"            ,"pages/blog"      ,"icon"]
            },

           "search":{
             "1":[ "Bar Metrics"        ,"docs/Chart" ,"chartBar"                   ,"icon"],
             "2":[ "Peity"              ,"docs/Chart" ,"Peity"                      ,"icon"],
             "3":[ "Horizontal"         ,"docs/Chart" ,"horizontalBar"              ,"icon"],
             "4":[ "Flot Char"          ,"docs/Chart" ,"flotChar"                   ,"icon"],
             "5":[ "Satisfaction"       ,"docs/Chart" ,"Satisfaction"               ,"icon"],
             "6":[ "Points"             ,"docs/Chart" ,"Points"                     ,"icon"],
             "7":[ "Received"           ,"docs/Chart" ,"Received"                   ,"icon"],
             "8":[ "Actual"             ,"docs/Chart" ,"Actual"                     ,"icon"],
             "9":[ "Stack"              ,"docs/Chart" ,"stack"                      ,"icon"],
             "10":[ "Arrowup"           ,"docs/Chart" ,"arrowu"                     ,"icon"],
             "11":[ "Chart Five"        ,"docs/Chart" ,"Chartfive"                  ,"icon"],
             "12":[ "Twelve"            ,"docs/Chart" ,"twelve"                     ,"icon"],
             "13":[ "Currency"          ,"docs/Chart" ,"Currency"                   ,"icon"],
             "14":[ "Markets"           ,"docs/Chart" ,"Markets"                    ,"icon"],
             "15":[ "Sessions"          ,"docs/Chart" ,"Sessions"                   ,"icon"],
             "16":[ "Visits"            ,"docs/Chart" ,"Visits"                     ,"icon"],
             "17":[ "Traffic"           ,"docs/Chart" ,"Traffic"                    ,"icon"],
             "18":[ "Watchlist"         ,"docs/Chart" ,"Watchlist"                  ,"icon"],
             "19":[ "Line Chart"        ,"docs/Chart" ,"LineChart"                  ,"icon"],
             "20":[ "Grid System"       ,"docs/datatables" ,"grid"                  ,"icon"],
             "21":[ "From Entri"        ,"docs/datatables" ,"gridFrom"              ,"icon"],
             "22":[ "From Stack"        ,"docs/datatables" ,"gridFromStack"         ,"icon"],
             "23":[ "Select Option"     ,"docs/datatables" ,"selectData"            ,"icon"],
             "24":[ "Column Hide"       ,"docs/datatables" ,"columnHide"            ,"icon"],
             "25":[ "Use Click"         ,"docs/datatables" ,"useClick"              ,"icon"],
             "26":[ "Dropdown"          ,"docs/datatables" ,"Dropdown"              ,"icon"],
             "27":[ "Column Defs"       ,"docs/datatables" ,"columnDefs"            ,"icon"],
             "28":[ "Footer Callback"   ,"docs/datatables" ,"footerCallback"        ,"icon"],
             "29":[ "Primary Key"       ,"docs/datatables" ,"primarykey"            ,"icon"],
             "30":[ "Use Devices"       ,"docs/datatables" ,"useDevices"            ,"icon"],
             "31":[ "Getting started"   ,"docs/datatables" ,"started"               ,"icon"],
             "32":[ "Head Tabel"        ,"docs/datatables" ,"headTabel"             ,"icon"],
             "33":[ "From Modal"        ,"docs/datatables" ,"from"                  ,"icon"],
             "34":[ "Grid System"       ,"docs/datatables" ,"gridOne"               ,"icon"],
             "35":[ "Column Sheet"      ,"docs/datatables" ,"sheet"                 ,"icon"],
             "36":[ "Column Role"       ,"docs/datatables" ,"search"                ,"icon"],
             "37":[ "IndexOn"           ,"docs/datatables" ,"indexFrom"             ,"icon"],
             "38":[ "Assets QRcode"     ,"docs/components" ,"QRcode"                  ,"icon"],
             "39":[ "List Group"        ,"docs/components" ,"listGroup"               ,"icon"],
             "40":[ "List"              ,"docs/components" ,"list"                    ,"icon"],
             "41":[ "Avatar"            ,"docs/components" ,"avatar"                  ,"icon"],
             "42":[ "Image Background"  ,"docs/components" ,"imagesbackground"        ,"icon"],
             "43":[ "Image Group"       ,"docs/components" ,"imagesgroup"             ,"icon"],
             "44":[ "Image Toolbar"     ,"docs/components" ,"imagestoolbar"           ,"icon"],
             "45":[ "Badges"            ,"docs/components" ,"Badges"                  ,"icon"],
             "46":[ "Breadcrumbs"       ,"docs/components" ,"Breadcrumbs"             ,"icon"],
             "47":[ "Card Decks"        ,"docs/components" ,"CardDecks"               ,"icon"],
             "48":[ "Card"              ,"docs/components" ,"Card"                    ,"icon"],
             "49":[ "Carousel"          ,"docs/components" ,"Carousel"                ,"icon"],
             "50":[ "Module Text"       ,"docs/Modules" ,"Text"                     ,"icon"],
             "51":[ "Module DateTime"   ,"docs/Modules" ,"DateTime"                 ,"icon"],
             "52":[ "Module Decode"     ,"docs/Modules" ,"Decode"                   ,"icon"],
             "53":[ "Module OnClick"    ,"docs/Modules" ,"OnClick"                  ,"icon"],
             "55":[ "Insert"            ,"docs/From" ,"Entri"                       ,"icon"],
             "56":[ "Update"            ,"docs/From" ,"Update"                      ,"icon"],
             "57":[ "Stack"             ,"docs/From" ,"Stack"                       ,"icon"],
             "58":[ "Permanent"         ,"docs/From" ,"Permanent"                   ,"icon"],
             "59":[ "Temporarily"       ,"docs/From" ,"Temporarily"                 ,"icon"],
             "60":[ "Images"            ,"docs/From" ,"Upload"                      ,"icon"],
             "61":[ "Document"          ,"docs/From" ,"document"                    ,"icon"],
             "62":[ "Import Excel"      ,"docs/From" ,"import"                      ,"icon"],
             "63":[ "Default"           ,"docs/Grid" ,"Default"                     ,"icon"],
             "64":[ "Content"           ,"docs/Grid" ,"content"                     ,"icon"],
             "65":[ "Flex"              ,"docs/Grid" ,"Flex"                        ,"icon"],
             "66":[ "Card"              ,"docs/Grid" ,"Card"                        ,"icon"],
             "67":[ "Key Sortable"      ,"docs/Grid" ,"key"                         ,"icon"],
             "68":[ "Tab Line"          ,"docs/Grid" ,"TabLine"                     ,"icon"],
             "69":[ "From"              ,"docs/Grid" ,"From"                        ,"icon"],
             "70":[ "Datatables"        ,"docs/Grid" ,"datatables"                  ,"icon"],
             "71":[ "Object"            ,"docs/Read" ,"dataObject"                  ,"icon"],
             "72":[ "Stack"             ,"docs/Read" ,"readStack"                   ,"icon"],
             "73":[ "Container"         ,"docs/Read" ,"container"                    ,"icon"],
             "74":[ "Modal"             ,"docs/Read" ,"readElementModal"             ,"icon"],
             "75":[ "Plugin"            ,"docs/Read" ,"ModalPlugin"                  ,"icon"],
             "76":[ "Target ID"         ,"docs/Read" ,"readElementTarget"            ,"icon"],
             "77":[ "Firebase"          ,"docs/Modules" ,"Firebase"                   ,"icon"],
             "78":[ "Pagination"        ,"docs/Read" ,"readPagination"               ,"icon"],
             "79":[ "Dropdown"          ,"docs/Read" ,"readDropdown"                 ,"icon"],
             "80":[ "Selector"          ,"docs/Read" ,"readDropdownQuerySelector"    ,"icon"],
             "81":[ "Dom Pdf"           ,"docs/Read" ,"domPdf"                       ,"icon"],
             "82":[ "Prind Raw"         ,"docs/Read" ,"pridRaw"                      ,"icon"],
             "83":[ "Grid System"       ,"docs/Read" ,"GridSystem"                   ,"icon"],
             "84":[ "Tabel"             ,"docs/Read" ,"Tabel"                        ,"icon"],
             "85":[ "Picons"            ,"docs/components/icon" ,"picons"            ,"icon"],
             "86":[ "Themify Icons"     ,"docs/components/icon" ,"themify"           ,"icon"],
             "87":[ "Icon Feathe"       ,"docs/components/icon" ,"iconFeather"       ,"icon"],
             "88":[ "MDI Icons"         ,"docs/components/icon" ,"mdi"               ,"icon"],
             "89":[ "Feather"           ,"docs/components/icon" ,"iconFeather"       ,"icon"],
             "90":[ "MS Icon"           ,"docs/components/icon" ,"mdi"               ,"icon"],
             "91":[ "Element"           ,"docs/Modal" ,"Element"                     ,"icon"],
             "92":[ "Boostrap"          ,"docs/Modal" ,"Boostrap"                    ,"icon"],
             "93":[ "Route"             ,"docs/Modal" ,"Route"                       ,"icon"],
             "94":[ "useUid"            ,"doc/react" ,"useUid"                       ,"icon"],
             "95":[ "Feather"           ,"doc/react" ,"FeatherIcon"                  ,"icon"],
             "96":[ "Material Community","doc/react" ,"MaterialCommunityIcons"       ,"icon"],
             "97":[ "useHandelCreate"   ,"doc/react" ,"useHandelCreate"              ,"icon"],
             "98":[ "useHandelList"     ,"doc/react" ,"useHandelList"                ,"icon"],
             "99":[ "useHandelHttp"     ,"doc/react" ,"useHandelHttp"                ,"icon"],
             "100":[ "Get List item"    ,"doc/react" ,"getList"                      ,"icon"],
             "101":[ "List map"         ,"doc/react" ,"getListmap"                   ,"icon"],
             "102":[ "Search"           ,"doc/react" ,"getListSearch"                ,"icon"],
             "103":[ "Pagination"       ,"doc/react" ,"getListPagination"            ,"icon"],
             "104":[ "Modal"            ,"doc/react" ,"Modal"                        ,"icon"],
             "105":[ "Bulder"           ,"doc/react" ,"Bulder"                       ,"icon"],
             "106":[ "Text Input"       ,"doc/react" ,"TextInput"                    ,"icon"],
             "107":[ "Select List"      ,"doc/react" ,"SelectList"                   ,"icon"],
             "108":[ "Date Picker"      ,"doc/react" ,"datePicker"                   ,"icon"],
             "109":[ "Time Picker"      ,"doc/react" ,"timePicker"                   ,"icon"],
             "110":[ "Validasi"         ,"doc/react" ,"validasi"                     ,"icon"],
             "111":[ "Camera"           ,"doc/react" ,"upCamera"                     ,"icon"],
             "112":[ "Galery"           ,"doc/react" ,"upGaler"                      ,"icon"],
             "113":[ "Object"           ,"docs/Read" ,"dataObject"                   ,"icon"],
             "114":[ "Stack"            ,"docs/Read" ,"readStack"                    ,"icon"],
             "115":[ "Container"        ,"docs/Read" ,"container"                    ,"icon"],
             "116":[ "Modal"            ,"docs/Read" ,"readElementModal"             ,"icon"],
             "117":[ "Plugin"           ,"docs/Read" ,"ModalPlugin"                  ,"icon"],
             "118":[ "Target ID"        ,"docs/Read" ,"readElementTarget"            ,"icon"],
             "119":[ "Search"           ,"docs/Read" ,"readSearch"                   ,"icon"],
             "120":[ "Pagination"       ,"docs/Read" ,"readPagination"               ,"icon"],
             "121":[ "Dropdown"         ,"docs/Read" ,"readDropdown"                 ,"icon"],
             "122":[ "Selector"         ,"docs/Read" ,"readDropdownQuerySelector"    ,"icon"],
             "123":[ "Dom Pdf"          ,"docs/Read" ,"domPdf"                       ,"icon"],
             "124":[ "Prind Raw"        ,"docs/Read" ,"pridRaw"                      ,"icon"],
             "125":[ "Grid System"      ,"docs/Read" ,"GridSystem"                   ,"icon"],
             "127":[ "Datetime"         ,"docs/rest-api","datetime"                  ,"icon"],
             "128":[ "Text"             ,"docs/rest-api","text"                      ,"icon"],
             "129":[ "Cookie"           ,"docs/rest-api","cookie"                    ,"icon"],
             "130":[ "Encryption"       ,"docs/rest-api","encryption"                ,"icon"],
             "131":[ "Validation"       ,"docs/rest-api","validation"                ,"icon"],
             "132":[ "local storage"    ,"docs/Storage" ,"storage"                   ,"icon"],
             "133":[ "cookies"          ,"docs/Storage" ,"Cookie"                    ,"icon"],
             "135":[ "IndexedDB"        ,"docs/Storage" ,"indexedDB"                 ,"icon"],
             "136":[ "Firebase"         ,"docs/Storage" ,"Firebase"                  ,"icon"],
             "137":[ "CarouselIndicators" ,"docs/components" ,"CarouselIndicators"    ,"icon"],
             "138":[ "CarouselCaption"    ,"docs/components" ,"CarouselCaption"       ,"icon"],
             "139":[ "Marker"             ,"docs/components" ,"Marker"                ,"icon"],
             "140":[ "Media"              ,"docs/components" ,"Media"                 ,"icon"],
             "142":[ "Object"           ,"docs/components" ,"dataObject"              ,"icon"],
             "145":[ "Create Auth"      ,"docs/rest-api" ,"Auth"                     ,"icon"],
             "146":[ "Package"          ,"docs/rest-api" ,"Package"                   ,"icon"],
             "147":[ "Get Token"        ,"docs/rest-api" ,"Token"                     ,"icon"],
             "148":[ "Read Package"     ,"docs/rest-api" ,"Read"                      ,"icon"],
             "149":[ "Datatables Api"   ,"docs/rest-api" ,"Datatables"                ,"icon"],
             "150":[ "Add Query"        ,"docs/rest-api" ,"Add"                       ,"icon"],
             "151":[ "Data Entri"       ,"docs/rest-api" ,"Entri"                     ,"icon"],
             "152":[ "Data Update"      ,"docs/rest-api" ,"Update"                    ,"icon"],
             "153":[ "Upload Images"    ,"docs/rest-api" ,"Images"                    ,"icon"],
             "154":[ "Upload File"      ,"docs/rest-api" ,"File"                      ,"icon"],
             "155":[ "Delete"           ,"docs/rest-api" ,"Delete"                    ,"icon"],
             "156":[ "Token Office"     ,"docs/rest-api-office" ,"Token"              ,"icon"],
             "157":[ "Property Office"  ,"docs/rest-api-office" ,"Property"           ,"icon"],
             "158":[ "Syntax Pdf"       ,"docs/rest-api-office" ,"Pdf"                ,"icon"],
             "159":[ "Syntax Ppt"       ,"docs/rest-api-office" ,"Ppt"                ,"icon"],
             "160":[ "Syntax Xlsx"      ,"docs/rest-api-office" ,"Xlsx"               ,"icon"],
             "161":[ "Syntax Docx"      ,"docs/rest-api-office" ,"Docx"               ,"icon"],
             "162":[ "Doc Type"         ,"docs/configurasi" ,"doctype"                ,"icon"],
             "163":[ "Assets js,css"    ,"docs/configurasi" ,"Assets"                 ,"icon"],
             "164":[ "Condisi"          ,"docs/configurasi" ,"Condisi"                ,"icon"],
             "165":[ "Base URL"         ,"docs/configurasi" ,"Base"                   ,"icon"],
             "166":[ "Import"           ,"docs/configurasi" ,"Import"                 ,"icon"],
             "167":[ "Navbar"           ,"docs/configurasi" ,"Navbar"                 ,"icon"],
             "168":[ "Helper link"      ,"docs/configurasi" ,"link"                   ,"icon"],
             "169":[ "Include File"     ,"docs/configurasi" ,"Include"                ,"icon"],
             "170":[ "Use Href"         ,"docs/router" ,"useRouter"                   ,"icon"],
             "171":[ "Theme"            ,"docs/router" ,"objecTheme"                  ,"icon"],
             "172":[ "Package"          ,"docs/router" ,"objecPackage"                ,"icon"],
             "173":[ "Hashtag"          ,"docs/router" ,"objechashtag"                ,"icon"],
             "174":[ "Handel Link"      ,"docs/router" ,"routerDom"                   ,"icon"],
             "175":[ "SQL To Firebase"  ,"docs/From"   ,"Firebase"                    ,"icon"]             
            },



         "doc":{
             "1":[ "Download"             ,"docs/dowload"       ,"icon"],
             "2":[ "Installation"        ,"docs/installation"  ,"icon"],
             "3":[ "Zero configuration"  ,"docs/configurasi"   ,"icon"],
             "4":[ "API Reference"       ,"docs/Rest"          ,"icon"],
             "5":[ "Router"              ,"docs/router"        ,"icon"]
            },
         "docfrom":{
             "6":[ "Stack"              ,"docs/Read#readStack"  ,"icon"],
             "7":[ "Content Grid"       ,"docs/Grid"            ,"icon"],
             "8":[ "Container"          ,"docs/Read#container"  ,"icon"],
             "9":["Swiper Container"   ,"Chart"               ,"icon"],
             "10":["Element Modal"      ,"docs/Modal"           ,"icon"]
            } ,
          "zero":{
             "11":[ "Assets js,css"   ,"docs/configurasi#Assets"    ,"icon"],
             "12":[ "Assets Condisi"  ,"docs/configurasi#Condisi"   ,"icon"],
             "13":[ "Obj Base URL"    ,"docs/configurasi#Base"      ,"icon"],
             "14":[ "Import"          ,"docs/configurasi#Import"    ,"icon"],
             "15":[ "Include File"    ,"docs/configurasi#Include"   ,"icon"]
            },
          "tabels":{
             "16":[ "Grid  Tabel"     ,"docs/datatables#grid" ,"Assets"   ,"icon"],
             "17":[ "Column Defs"     ,"docs/datatables#columnDefs"       ,"icon"],
             "18":[ "Use Devices"     ,"docs/datatables#useDevices"       ,"icon"],
             "19":[ "Data Sheet"      ,"docs/datatables#sheetData"        ,"icon"],
             "20":[ "Use Click"       ,"docs/datatables#useClick"         ,"icon"]
            },
          "helper":{
             "21":[ "Text"          ,"docs/utilities/setText"       ,"icon"],
             "22":[ "Date Time"     ,"docs/utilities/setDateTime"   ,"icon"],
             "23":[ "Encode"        ,"docs/utilities/setDecode"     ,"icon"],
             "24":[ "Atribute"      ,"docs/Atribute"                ,"icon"],
             "25":[ "Chart"         ,"docs/Chart"                   ,"icon"]
            },
          "storage":{
             "26":[ "Localstorage"  ,"docs/Storage#storage"    ,"icon"],
             "27":[ "Cookie"        ,"docs/Storage#Cookie"     ,"icon"],
             "28":[ "indexedDB"     ,"docs/Storage#indexedDB"  ,"icon"],
             "29":[ "Web SQL"       ,"docs/Storage#WebSQL"     ,"icon"],
             "30":[ "From"          ,"docs/From"               ,"icon"]
            },
         },
        "hashtag": {
           "zero_config":{
             "1":[ "Doc Type"        ,"docs/configurasi/" ,"doctype"     ,"icon"],
             "2":[ "Assets js,css"   ,"docs/configurasi/" ,"Assets"   ,"icon"],
             "3":[ "Condisi"         ,"docs/configurasi/" ,"Condisi"   ,"icon"],
             "4":[ "Base URL"        ,"docs/configurasi/" ,"Base"   ,"icon"],
             "5":[ "Import"          ,"docs/configurasi/" ,"Import"   ,"icon"],
             "6":[ "Navbar"          ,"docs/configurasi/" ,"Navbar"   ,"icon"],
             "7":[ "link"            ,"docs/configurasi/" ,"link"   ,"icon"],
             "8":[ "Include File"    ,"docs/configurasi/" ,"Include"   ,"icon"]
            }
         }
     });


// setRouter({
//   spinner:'text-primary',
//   selector :['utilities','zzsdsds'],
//   mainroute :'mainRoute',
//   patroutes :2
// })
