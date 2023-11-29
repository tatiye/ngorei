 import tatiyeNet,{setRouter,createRouter} from "{tatiye.es6}"; 
    createRouter({
        "status"    :'dev1',
        "router"    :'posts',
        "public"    :'theme',
        "spinner"   :'text-primary',
        "mainroute" :'bodyRoute',
        "explode"   :'#',
        "patroutes" :1,
        "link": {
         "home":{
             "1":[ "Home"           ,""                ,"icon"],
             "2":[ "About"          ,"pages/about"     ,"icon"],
             "3":[ "Pricing"        ,"pages/about"     ,"icon"],
             "4":[ "privacy"        ,"pages/privacy"     ,"icon"]
            }
         },
        "hashtag": {
           "zero_config":{
             "1":[ "Doc Type"        ,"docs/configurasi/" ,"doctype"     ,"icon"]
            }
         }
     });


setRouter({
  spinner:'text-primary',
  selector :['utilities'],
  mainroute :'mainRoute',
  patroutes :1
})
