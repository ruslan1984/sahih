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
        } catch(Exception $e) {

        }
    }
?>

<body>
    <?php 
        include $dir."/sections/header.php"; 
        include __DIR__."/view.php"; 
        include $dir."/sections/footer.php";?>
</body>
<script>

</script>

</html>