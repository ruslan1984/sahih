<?php include_once $dir."/text.php"; ?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/courses.css" />
</head>
<?php
    $courses=[];
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
            if(trim($http_response_header[0])==="HTTP/1.1 403" ){
                header("Location: /login");
                header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                die();
            }
            
            $courses = json_decode($cour, true);
            
        } catch(Exception $e) {
            header("Location: /login");
            header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            die();
        }
    }else{
        header("Location: /login");
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        die();
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
<script>
(() => {
    const courses = <?php echo $cour ?>;

    /* 
        Наполнение курсов 
    */
    let openCourses = JSON.parse(localStorage.getItem('openCourses')) || {};

    courses.map((course) => {

        if (!openCourses[course.guid]) {
            openCourses[course.guid] = {};
        }
        course.moduleViewList.map((modul) => {
            if (!openCourses[course.guid][modul.guid]) {
                openCourses[course.guid][modul.guid] = {};
            }
            modul.lessonViewList.map((lesson, index) => {
                if (!openCourses[course.guid][modul.guid][lesson.guid]) {
                    openCourses[course.guid][modul.guid][lesson.guid] = index === 0 ?
                        "open" : "close"
                }
            });
        });
    });

    localStorage.setItem("openCourses", JSON.stringify(openCourses));

})();
</script>

</html>