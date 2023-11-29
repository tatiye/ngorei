import tatiyeNet,{navLinkPackage} from "../node_modules/tatiye/es6.js";
   navLinkPackage({
        "status"    :'dev1', //dev Update
        "spinner"   :'text-primary',
        "mainroute" :'mainRoute',
        "link": {
           "demo":{
             "1":[ "Beranda"  ,"demo/" ,"home"    ,"icon"],
             "2":[ "about"    ,"demo/" ,"data"   ,"icon"],
             "3":[ "Vue"      ,"demo/" ,"Qrcode"     ,"icon"],
             "4":[ "Privacy"  ,"demo/" ,"privacy" ,"icon"]
            }
         }
     });
   //   routes: [
   //  // Features
   // {
   //    path: "/action-sheet/",
   //    url: BASE_URL+"/pages/features/action-sheet.html",
   //  },