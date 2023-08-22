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