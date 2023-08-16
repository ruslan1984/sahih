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
    $api = 'https://arm-test.sahihinvest.ru/api/courses/preview/all';
    $cour = file_get_contents($api, false, $context);  
    $courses = json_decode($cour, true);

    $courses=[
        0=>[
            'guid'=>'1111-sdsada-2222-dwdw',
            'title'=>"Основы исламских финансов",
            'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ"
        ],
        1=>[
            'guid'=>'1111-sdsada-2222-dwdw',
            'title'=>"Основы исламских финансов",
            'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ"
        ],
        2=>[
            'guid'=>'1111-sdsada-2222-dwdw',
            'title'=>"Основы исламских финансов",
            'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ",
            "price" => "6000 ₽"
        ],
        3=>[
            'guid'=>'1111-sdsada-2222-dwdw',
            'title'=>"Основы исламских финансов",
            'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ"
        ],
        4=>[
            'guid'=>'1111-sdsada-2222-dwdw',
            'title'=>"Основы исламских финансов",
            'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ",
            "price" => "6000 ₽"
        ],
        5=>[
            'guid'=>'1111-sdsada-2222-dwdw',
            'title'=>"Основы исламских финансов",
            'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ"
        ],
    ];
?>

<body>
    <?php 
        include $dir."/sections/header.php"; ?>
    <div class="coursesPage">

        <div class="container">
            <h1>Курсы</h1>
            <p>Смотрите наши курсы и улучшайте свои знания в финансах</p>
            <div class="coursesBlock">
                <?php foreach($courses as $item ):?>
                <a class="card" href="/courses/<?=$item['guid']?>">
                    <div class="imgBlock">
                        <img width="80px" src="/pages/courses/list/image.png" />
                        <div>
                            <?php if(array_key_exists('price',$item)):?>
                            <div class="lab labPr"><?=$item['price']?></div>
                            <?php else:?>
                            <div class="lab lab1">Курс доступен</div>
                            <?php endif?>
                            <div class="labLine">
                                <div class="lab lab2">Онлайн эфиры</div>
                                <div class="lab lab2">Тесты</div>
                            </div>
                        </div>
                    </div>
                    <h4 class="h4">
                        <?=$item['title']?>
                    </h4>
                    <p class="author">
                        Курс читает: <?=$item['author']?>
                    </p>
                </a>
                <?php endforeach;?>
            </div>
            <div class="paginate">
                <div class="page">
                    &#x2190;</div>
                <a href="?page=1" class="page cur">1</a>
                <a href="?page=2" class="page">2</a>
                <a href="?page=3" class="page">3</a>
                <a href="?page=4" class="page">4</a>
                <div class="page">&#x2192;</div>
            </div>
        </div>
        <?php include $dir."/sections/footer.php";?>
    </div>
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