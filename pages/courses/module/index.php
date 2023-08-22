<?php include_once $dir."/text.php"; ?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/courses.css" />
</head>
<?php
    $curUrl = $_SERVER['REQUEST_URI'];
    $urlArr = explode("/", $curUrl);
    $guidCourse= $urlArr[2];
    $guidModule= $urlArr[4];
    $modules = [];
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
            $api = "$host_api/api/courses/module/$guidModule";
            $cour = file_get_contents($api, false, $context);  
            $module = json_decode($cour, true);
            $module['lessonViewList'] = array_filter($module['lessonViewList'], function($k) {
                return $k["type"] === 'VIDEO';
            }, ARRAY_FILTER_USE_BOTH);

        } catch(Exception $e) {
            header("Location: /login");
        }
    }else{
        header("Location: /login");
    }
?>

<body>
    <?php 
        include $dir."/sections/header.php"; 
        include __DIR__."/view.php"; 
        include $dir."/sections/footer.php";
        include $dir."/sections/scripts.php";
    ?>
</body>


</html>