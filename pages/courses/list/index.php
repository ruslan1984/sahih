<?php include_once $dir."/text.php"; ?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/courses.css" />
</head>
<?php
    $courses=[];
    // $token = "eyJhbGciOiJIUzI1NiJ9.eyJsb2dpbiI6InJ1c2xhbjIzMTk4NEB5YW5kZXgucnUiLCJuYW1lIjoicnVzbGFuIiwiZXhwIjoyMDA3ODEyNzg3fQ.K9IqjhiNe9e8L7tENbCXQZdoMPbjnKkDColBmiGPjrk";
    if(array_key_exists( 'token',$_COOKIE )) {
        $token =  $_COOKIE['token'];
        try {
            $opts = [
                "http" => [
                    "method" => "GET",
                    "header" => "Accept-language: RU \r\n".
                        "Authorization: Bearer $token",
                ]
            ];
            $context = stream_context_create($opts);
            $api = "$host_api/api/courses/preview/all";
            $cour = file_get_contents($api, false, $context);  
            $courses = json_decode($cour, true);
        } catch(Exception $e) {

        }
    }
?>

<body>
    <?php 
        include $dir."/sections/header.php"; 
        include __DIR__."/view.php"; 
        
        ?>

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

<?php
// $courses=[
    //     0=>[
    //         'guid'=>'1111-sdsada-2222-dwdw',
    //         'title'=>"Основы исламских финансов",
    //         'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ"
    //     ],
    //     1=>[
    //         'guid'=>'1111-sdsada-2222-dwdw',
    //         'title'=>"Основы исламских финансов",
    //         'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ"
    //     ],
    //     2=>[
    //         'guid'=>'1111-sdsada-2222-dwdw',
    //         'title'=>"Основы исламских финансов",
    //         'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ",
    //         "price" => "6000 ₽"
    //     ],
    //     3=>[
    //         'guid'=>'1111-sdsada-2222-dwdw',
    //         'title'=>"Основы исламских финансов",
    //         'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ"
    //     ],
    //     4=>[
    //         'guid'=>'1111-sdsada-2222-dwdw',
    //         'title'=>"Основы исламских финансов",
    //         'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ",
    //         "price" => "6000 ₽"
    //     ],
    //     5=>[
    //         'guid'=>'1111-sdsada-2222-dwdw',
    //         'title'=>"Основы исламских финансов",
    //         'author' => "Курс читает: Ахмад Абу Яхья, Директор   РЦИЭФ при РИИ"
    //     ],
    // ];
    ?>