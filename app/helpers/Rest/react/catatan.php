<!-- 
INSERT,UPDATE DELETE,SELECT GENERAL INPUT
Berlaku secara umum dengan pemangilan api
http://192.168.1.123/localhostDev/api/react/insert/nama_tabel
 {
 "user_id" :"18",
 "nama" :"admin@gmail.com",
 "title":"12345678"
}

http://192.168.1.123/localhostDev/api/react/update/demo
{
 "id" :"483",
 "user_id" :"18",
 "nama" :"dantrik@gmail.com",
 "title":"12345678"
}

http://192.168.1.123/localhostDev/api/react/delete/demo

 {
 "id" :"483",
 "user_id" :"18"
}

http://192.168.1.123/localhostDev/api/react/select/demo

 {
 "select" :"title,nama,date,time",
 "where" :"row='1'",
 "limit":"2",
 "page":"1",
 "keywords":""

}


http://192.168.1.123/localhostDev/api/react/read/demo
{
 "id":"242",
 "select" :"title,nama,date,time"
}



http://192.168.1.123/localhostDev/api/react/import/demo

{
 "select" :"title,nama,date,time",
 "user_id":"18"

}

http://192.168.1.123/localhostDev/api/react/news
 {
 "select" :"favicons,web,link,title,pubDate,date,time,description,thumbnail",
 "where" :"user_id='1'",
 "limit":"2",
 "page":"1",
 "keywords":""
}
-->

Menmpilkan data dalam react Nativ
Insert Data
edit data
hapus data
select Data 