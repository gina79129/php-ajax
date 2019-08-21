<?php
$curl = curl_init();
//識別發出請求的軟體/瀏覽器類型
curl_setopt($curl, CURLOPT_USERAGENT,"Mozilla/5.0 (X11;linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.02.2704.103 Safari/537.36");
//預設為ture,要驗證https ssl憑證
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
//將curl回傳的資料以字串接收，而不是直接顯示
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

curl_setopt($curl,CURLOPT_URL,"https://cloud.culture.tw/frontsite/trans/emapOpenDataAction.do?method=exportEmapJson&typeId=M");

$result = curl_exec($curl);
echo $result;
//關閉curl
// curl_close($curl);
//json文字轉陣列，如果為false的話轉為物件
// $json=json_decode($result,true);
// print_r($json);



?>


