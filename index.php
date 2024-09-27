<?php 
    $dir = $_SERVER['DOCUMENT_ROOT'];
    $domain = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
    $ln = 'ru';
    $link = '';

    $curUrl = $_SERVER['REQUEST_URI'];
    $query = $_SERVER['QUERY_STRING'];

    $patternCourses = '/^\/courses\/$/';
    $patternCoursesCard = '/^\/courses\/(\w|-)*$/';
    $patternModuleList = '/^\/course\/(\w|-)*\/module\/(\w|-)*$/';
    $patternLogin = '/^\/login$/';
    $patternRegister = '/^\/register$/';
    $patternConfirmation = '/^\/confirmation\?email=(\w|-|_|@|.){4,}$/';
    $tBuisness = '/^\/t-buisness$/';
    $newsList = '/^\/news$/';
    $newsCard = '/^\/news\/(\w|-)*$/';
    $host_api = 'https://arm.sahihinvest.ru';
    
    if(str_contains($query, 'referrer=tbank')){

        echo '123';
       // include_once "./pages/to_mobile/index.php"; 
    } else  if(preg_match($patternCourses, $curUrl)){
        include_once "./pages/courses/list/index.php"; 
    }else if(preg_match($patternModuleList, $curUrl)){
        include_once "./pages/courses/module/index.php"; 
    }else if(preg_match($patternCoursesCard, $curUrl)){
        include_once "./pages/courses/card/index.php"; 
    }else if(preg_match($patternLogin, $curUrl)){
        include_once "./pages/auth/login.php"; 
    }else if(preg_match($patternRegister, $curUrl)){
        include_once "./pages/auth/register.php"; 
    }else if(preg_match($patternConfirmation, $curUrl)){
        include_once "./pages/auth/confirmation.php"; 
    } else if(preg_match($tBuisness, $curUrl)){
        include_once "./pages/t-buisness/index.php"; 
    } else if(preg_match($newsList, $curUrl)){
        include_once "./pages/news/list/index.php"; 
    } else if(preg_match($newsCard, $curUrl)){
        include_once "./pages/news/card/index.php"; 
    } else {
        include_once "./page.php"; 
    }


    

?>