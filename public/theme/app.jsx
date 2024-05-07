import tatiyeNet,{ngoreiDOM} from "{tatiye}"; 
    ngoreiDOM({
        "status"    :'dev',
        "path"      :'index',
        "public"    :'theme',
        "explode"   :'#',
        "patroutes" :2,
        "fetch":{  
             // Pubic Demo
             "pages"  :["https://jsonplaceholder.typicode.com/photos?_start=0&_limit=10","GET"],
             "blog"   :["eyJkaXIiOiJkZW1vXC9BcGlcLzAuMVwvYmxvZy5waHAiLCJ1aWQiOjF9"]
         },
        "link": { 
          /*
          |--------------------------------------------------------------------------
          | ROUTING FILE
          |--------------------------------------------------------------------------
          | Develover Tatiye.Net 2020
          | @Date 
          */
           "home":{  
               "1":[ "Home"         ,"home"      ,"picons-2"  ,"home"],
               "2":[ "Dokumentasi"  ,"docs"      ,"picons-3"  ,"docs"],
               "4":[ "v1.0.4"       ,"docs"      ,"picons-5"  ,"home"],
              },
          /*
          |--------------------------------------------------------------------------
          | AND ROUTING FILE 
          |--------------------------------------------------------------------------
          */
         },
        // Components 
        "router"    :{
           "useragent" :true,
           "spinner"   :'text-primary',
           "selector"  :'path', 
           "mainroute" :'mainRoute',
           "page"      :'subRoute',
           "switch"    :'dataForm',
           "modal"     :'mainRouteModal',
         },
         "elements":{
             "vendor":'bootstrap',
             "modal":{
               "selector":[
                   '.modal-dialog',
                   '.modal-title',
                   '.modal-body',
                   '.modal-dialog button',
                   '.modal-footer',
                   '.modal-backdrop',
                   '.modal',
                   '.modal-header',
                   '.modal-content',
                   '.modal-dialog a',

                ],
               "oauth"     :true,
               "from"      :true,
               "file"      :true,
               "trash"     :['btn btn-primary tx-13'],
               "route"     :true,
               "multiple"  :true,
              },
             "carousel":{
               "selector":[
                   '.modal-dialog',
                   '.modal-title',
                ],
               "captions"    :true,
               "indicators"      :true
              },
             "dropdown":{
               "selector":[
                   '.dropdown-menu',
                    'dropdown-item'
                ],
               "storage"   :['from','trash','trash'],
               "modal"     :['update','delete','recycle'],
               "outside"   :['update','delete','recycle'],
               "title"     :['Update','Delete','Recycle'],
               "icon"      :['feat feat-edit-3','feat feat-trash-2','feat feat-trash-2'],
               "link"      :true
             },
             "alert":{
               "insert"    :'primary',
               "update"    :'success',
               "delete"    :'danger'
              },
             "bg_color":{ 
                 '0' :'pink',
                 '1' :'primary',
                 '2' :'teal',
                 '3' :'success',
                 '4' :'warning',
                 '5' :'danger',
                 '6' :'info',
                 '7' :'dark',
                 '8' :'indigo',
                 '9' :'purple',
                 '10':'orange',
                 '11':'litecoin',
                 '12':'secondary',
                 '13':'light'
              },
              "el":{
                 "alert":       ['#alert','alert alert-','danger','.alert-body','.alert-footer'],
                 "toast":       ['#toast','.toast-header small','.toast-body'],
                 "spinner":     ['#spinner','button','span'],
                 "offCanvas":   ['#alert'],
                 "dropdown":    ['#dropdown'],
                 "textContent": ['#signin','#signup','#delete','#recycle'],
              }
         },
     });

