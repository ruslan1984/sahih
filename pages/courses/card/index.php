<?php include_once $dir."/text.php"; ?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/courses.css" />
</head>
<?php 
   $opts = [
        "http" => [
            "method" => "GET",
            "header" => "Accept-language: RU \r\n".
                "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJsb2dpbiI6InJ1c2xhbjIzMTk4NEB5YW5kZXgucnUiLCJuYW1lIjoicnVzbGFuIiwiZXhwIjoyMDA3NDkxMDc3fQ.WWcjj37oXYfpBwGABgd-twP2co4tRUifbemyyXwj0wA",
        ]
    ];
    $context = stream_context_create($opts);
    $api = $host_api.'/api/courses/preview/all';
    $cour = file_get_contents($api, false, $context);  
    $courses = json_decode($cour, true);

    $course=[
        "guid"=> "6a5c7368-f901-4378-bbf1-442ed8f60d1e",
	    "title"=> "Основы исламских финансов",
	    "author"=> "Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ",
	    "content"=> "Sahih Invest обеспечивает надежность своих услуг благодаря аудиту деятельности, проводимому независимым шариатским экспертом от Духовного управления мусульман Республики Татарстан",
	    "videoPreview" =>"https://rr16---sn-n8v7zns6.googlevideo.com/videoplayback?expire=1692206383&ei=z7DcZJ7pIMbl7ASa8IOYDw&ip=130.193.52.106&id=o-AMgyHNBVAc-0R0HRVj4H02kqHkqOl3namIQyXL2Ga9uE&itag=22&source=youtube&requiressl=yes&mh=av&mm=31%2C29&mn=sn-n8v7zns6%2Csn-n8v7kn7y&ms=au%2Crdu&mv=m&mvi=16&pl=19&initcwndbps=1196250&spc=UWF9f3PqYEQxQ650w7WBGLHbiYyco6jNRH0ych47fA&vprv=1&svpuc=1&mime=video%2Fmp4&ns=N9WoyMSA7P-nEyebHi-IqCEP&cnr=14&ratebypass=yes&dur=55.008&lmt=1639496183138982&mt=1692184402&fvip=1&fexp=24007246&c=WEB&txp=4532434&n=2YTu4_OeeaMH9kt8&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cspc%2Cvprv%2Csvpuc%2Cmime%2Cns%2Ccnr%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRQIhAK5lr2b10HNxCMLaWcn-L4vkKsQUA4CtimSWhLkgEwjbAiAbT16c_3zZX6yp5fDqsu_nE3WtIwdWXFta5NySrVhh6Q%3D%3D&lsparams=mh%2Cmm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl%2Cinitcwndbps&lsig=AG3C_xAwRQIgDIcQoWRALB6KUqZEegu4O45Hu7lHeUKD_jgBlkwJIX8CIQCVxdO1Ef1Ra9q7SohnOYwEB_2ufb5Vt-kpUeBpiFozPg%3D%3D"
    ];
?>

<body>
    <?php 
        include $dir."/sections/header.php"; ?>
    <div class="coursesPage">

        <div class="container">
            <h1 class="h1"><?=$course['title'] ?></h1>
            <div class="courseBlock">
                <div class="desc">
                    <div class="author"><b>Курс читает:</b> <u><?=$course['author'] ?></u></div>
                    <div class="content"><?=$course['content'] ?></div>
                    <a class="btn btn--main" href="/courses/">&#x2190; В список курсов</a>
                </div>
                <video class="video" controls="controls">
                    <source src="<?=$course['videoPreview'] ?>" />
                    <div id="snow">
                        <p>Ваш браузер не поддерживает формат данного видеофайла.</p>
                    </div>
                </video>
            </div>
        </div>
    </div>
    <?php include $dir."/sections/footer.php";?>
</body>
<script>
// (async ()=>{
//     const Authorization="Bearer eyJhbGciOiJIUzI1NiJ9.eyJsb2dpbiI6InJ1c2xhbjIzMTk4NEB5YW5kZXgucnUiLCJuYW1lIjoi0KDRg9GB0LvQsNC9IiwiZXhwIjoyMDA3Mjc5MjA4fQ.evmBWvjAWRQ-Ue2apgw0qtow51aYKbVTPi9U9kxUuVk";
//     const address= "https://arm-test.sahihinvest.ru";
//     const url=address+"/api/courses/all";
//     // const url ="https://garab.ru/api/grammar";
//     const response = await fetch(url,{
//         method: "GET",
//         headers: {
//             Authorization
//         },
//         // withCredentials: true
//         // credentials: 'omit'
//     });
//     const courses = await response.json();
//     console.log(courses);
// })();
</script>

</html>