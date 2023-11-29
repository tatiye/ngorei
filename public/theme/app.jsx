 import tatiyeNet,{setRouter,createRouter,objectStorage,useLisensi} from "{tatiye.es6}"; 


// console.log(tatiyeNet)

    createRouter({
        "status"    :'dev',
        "router"    :'index',
        "public"    :'theme',
        "spinner"   :'text-primary',
        "mainroute" :'mainRoute',
        "explode"   :'#',
        "patroutes" :1,
        "link": {
         "home":{
             "1":[ "Home"           ,"home"                 ,"icon"],
             "2":[ "About"          ,"pages/about"      ,"icon"],
             "3":[ "Info"          ,"pages/info"        ,"icon"],
             "4":[ "privacy"        ,"pages/privacy"     ,"icon"]
            }
         },
        "hashtag": {
           "zero":{
             "1":[ "Doc Type"        ,"docs/configurasi/" ,"doctype"     ,"icon"]
            }
         }
     });
 



     objectStorage({
          "status"    :'dev1', //dev Update
          "storage": {
             "tabel":{
               "row":[ "demo"  ,"nama,date" ,"row='1' ORDER BY id DESC" ,"0,2"],
              }
           }
       });


      setRouter({
        spinner:'text-primary',
        selector :['utilities'],
        mainroute :'mainRoute',
        patroutes :1
      })
