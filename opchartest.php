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
// echo $result;
//關閉curl
curl_close($curl);
//json文字轉陣列，如果為false的話轉為物件
$json=json_decode($result,true);
$pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=s1080115","s1080115","s1080115");
localhost:http://220.128.133.15/s1080115/;

foreach($json as $j){
  $o=mb_substr($j['cityName'],0,3,"utf8");
  // echo $o;
  $sql="select count(*) FROM `book` WHERE `book` LIKE '臺北市'";
  $sql2="select count(*) FROM `book` WHERE `book` LIKE '新北市'";
  $sql3="select count(*) FROM `book` WHERE `book` LIKE '臺中市'";
  $sql4="select count(*) FROM `book` WHERE `book` LIKE '新竹市'";
  $sql5="select count(*) FROM `book` WHERE `book` LIKE '新竹縣'";
  $sql6="select count(*) FROM `book` WHERE `book` LIKE '苗栗縣'";
  $sql7="select count(*) FROM `book` WHERE `book` LIKE '雲林縣'";
  $sql8="select count(*) FROM `book` WHERE `book` LIKE '嘉義市'";
  $sql22="select count(*) FROM `book` WHERE `book` LIKE '嘉義縣'";
  $sql9="select count(*) FROM `book` WHERE `book` LIKE '臺南市'";
  $sql10="select count(*) FROM `book` WHERE `book` LIKE '高雄市'";
  $sql11="select count(*) FROM `book` WHERE `book` LIKE '花蓮縣'";
  $sql12="select count(*) FROM `book` WHERE `book` LIKE '臺東縣'";
  $sql13="select count(*) FROM `book` WHERE `book` LIKE '桃園市'";
  $sql14="select count(*) FROM `book` WHERE `book` LIKE '彰化縣'";
  $sql15="select count(*) FROM `book` WHERE `book` LIKE '澎湖縣'";
  $sql16="select count(*) FROM `book` WHERE `book` LIKE '屏東縣'";
  $sql17="select count(*) FROM `book` WHERE `book` LIKE '金門縣'";
  $sql18="select count(*) FROM `book` WHERE `book` LIKE '宜蘭縣'";
  $sql19="select count(*) FROM `book` WHERE `book` LIKE '連江縣'";
  $sql20="select count(*) FROM `book` WHERE `book` LIKE '基隆市'";
  $sql21="select count(*) FROM `book` WHERE `book` LIKE '南投縣'";
  $taipei=$pdo->query($sql)->fetchColumn();
  $newtaipei=$pdo->query($sql2)->fetchColumn();
  $Taichung=$pdo->query($sql3)->fetchColumn();
  $Hsinchu=$pdo->query($sql4)->fetchColumn();
  $Hsinchus=$pdo->query($sql5)->fetchColumn();
  $Miaoli=$pdo->query($sql6)->fetchColumn();
  $Yunlin=$pdo->query($sql7)->fetchColumn();
  $Chiayi=$pdo->query($sql8)->fetchColumn();
  $Tainan=$pdo->query($sql9)->fetchColumn();
  $Kaohsiung=$pdo->query($sql10)->fetchColumn();
  $Hualien=$pdo->query($sql11)->fetchColumn();
  $Taitung=$pdo->query($sql12)->fetchColumn();
  $Taoyuan=$pdo->query($sql13)->fetchColumn();
  $Changhua=$pdo->query($sql14)->fetchColumn();
  $Penghu=$pdo->query($sql15)->fetchColumn();
  $Pingtung=$pdo->query($sql16)->fetchColumn();
  $Kinmen=$pdo->query($sql17)->fetchColumn();
  $Yilan=$pdo->query($sql18)->fetchColumn();
  $Lienchiang=$pdo->query($sql19)->fetchColumn();
  $Keelung=$pdo->query($sql20)->fetchColumn();
  $Nantou=$pdo->query($sql21)->fetchColumn();
  $Chiayis=$pdo->query($sql22)->fetchColumn();
}
$data=[];
$data['台北市']=$taipei;
$data['新北市']=$newtaipei;
$data['基隆市']=$Keelung;
$data['宜蘭縣']=$Yilan;
$data['桃園市']=$Taoyuan;
$data['新竹市']=$Hsinchu;
$data['新竹縣']=$Hsinchus;
$data['苗栗縣']=$Miaoli;
$data['臺中市']=$Taichung;
$data['臺南市']=$Tainan;
$data['彰化市']=$Changhua;
$data['南投縣']=$Nantou;
$data['嘉義市']=$Chiayi;
$data['嘉義縣']=$Chiayis;
$data['高雄市']=$Kaohsiung;
$data['花蓮市']=$Hualien;
$data['臺東縣']=$Taitung;
$data['澎湖縣']=$Penghu;
$data['屏東縣']=$Pingtung;
$data['金門縣']=$Kinmen;
$data['連江縣']=$Lienchiang;

// print_r($data);
// $o=count($data);
// echo $o;

foreach($data as $k =>$v){

  // print_r($v);
  $str[]=sprintf("'%s'",$k);
  $str1[]=sprintf("%s",$v);
  $s="[".implode(",",$str)."]";
  $s1="[".implode(",",$str1)."]";


}


?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <title>書店資訊網</title>

    <!-- favicon  -->
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">

    <!-- 網站META -->
    <meta name="keywords" content="獨立書店、網路書店、書局、二手書">
    <meta name="description" content="書店資訊網">
    <meta name="author" content="泰山網頁設計班-葉珏汝">

    <!-- META facebook引用打法 -->
    <meta property="og:title" content="書店資訊網">
    <meta property="og:image" content="./img/bgImg.jpg">
    <meta property="og:site_name" content="書店資訊">
    <meta property="og:description" content="書店資訊網">

    <!-- PWA -->
    <link rel="manifest" href="manifest.json">

    <!-- css -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/Site.css">
    <link rel="stylesheet" href="./css/font-google.css">
    <link rel="stylesheet" href="./css/animate.css">

    <!-- mycss -->
    <link rel="stylesheet" href="./css/mycss.css">


    <style>
        .aStyle:hover {
            color: blue !important;
        }
    </style>
</head>

<body>
<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.html" id="tit">書店資訊網</a>
            <button class="navbar-toggler navbar-toggler-right menuIcon" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                選單
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="store.html">獨立書店</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="opchartest.php">獨立書店分布圖</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="library.html">網路書店</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="contact.html">聯絡我們</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="page">
        <div class="container-fluid" id="loading">
            <div class="row h-100">
                <div class="col-12 text-center align-self-center">
                    <img src="./img/book.svg" width="300" height="300">
                    <p class="text-white">載入中...</p>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: transparent;height: 8vh;">
    </div>
    <div class="container-fluid">
    <div style="height: 80vh; width: 100vw; display: table-cell; vertical-align: middle; text-align:center;padding:1rem;" id="content">
        <div class="row">
            <div class="hidden-sm  col-md-4 col-lg-4 ">
  <div style="width:85vw;margin-left:18%;">
  <div id="chartContainer" style="height:80vh; max-width:100vw; margin: 0px auto;"></div>
  </div>
  </div>
  </div>
  </div>
      </div>
  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50" id="footer">
        <div class="container">
                Copyright &copy;泰山網頁設計班 2019
        </div>
    </footer>

  <script src="./js/jquery-3.4.1.min.js"></script>
  <script src="./js/Chart.min.js"></script>
  <script src="./js/wow.min.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


  <script>
window.onload = function () {
   
   
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
  
 
	title: {
		text: "獨立書店分布",
        fontSize: 30,
	},
	axisY: {
		title: "總數",
		// suffix: "%",
		includeZero: false
        // fontSize: 18,
	},
	axisX: {
		title: "縣市",
        // fontSize: 18
	},
    
    
	data: [{
		type: "doughnut",
		// yValueFormatString: "#,##0.0#\"%\"",
		dataPoints: [
			{ label: "臺北市", y: <?=$taipei?> },	
			{ label: "新北市", y: <?=$newtaipei?> },	
			{ label: "基隆市", y:<?=$Keelung?> },
			{ label: "宜蘭縣", y: <?=$Yilan?> },	
			{ label: "桃園市", y: <?=$Taoyuan?> },
			{ label: "新竹市", y: <?=$Hsinchu?> },
			{ label: "新竹縣", y: <?=$Hsinchus?> },
			{ label: "苗栗縣", y: <?=$Miaoli?> },
			{ label: "臺中市", y: <?=$Taichung?> },
			{ label: "臺南市", y: <?=$Tainan?> },
			{ label: "彰化市", y: <?=$Changhua?> },
			{ label: "南投縣", y: <?=$Nantou?> },
			{ label: "嘉義市", y: <?=$Chiayi?> },
			{ label: "嘉義縣", y: <?=$Chiayis?> },
			{ label: "高雄市", y: <?=$Kaohsiung?> },
			{ label: "花蓮市", y: <?=$Hualien?> },
			{ label: "臺東縣", y: <?=$Taitung?> },
			{ label: "澎湖縣", y: <?=$Penghu?> },
			{ label: "屏東縣", y: <?=$Pingtung?> },
			{ label: "金門縣", y: <?=$Kinmen?> },
			{ label: "連江縣", y: <?=$Lienchiang?> }
			
		]
	}]
});
chart.render();
}
$(document).on("readystatechange", function () {
            if (document.readyState == "complete") {
                $("#loading").fadeOut(2000, function () {
                    $("#content").fadeIn(3000);
                    $("#footer").fadeIn(3000);
                    new WOW().init();
                });

            }
        })
  </script>
</body>

</html>


