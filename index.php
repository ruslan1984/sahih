<?php 
    $dir = $_SERVER['DOCUMENT_ROOT'];
    $domain = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
    $ln = 'ru';
    $link = '';

    $curUrl = $_SERVER['REQUEST_URI'];
    $patternCourses = '/^\/courses\/(\?page=[0-9]*)?$/';
    $patternCoursesCard = '/^\/courses\/(\w|-)*$/';

    
    if(preg_match($patternCourses, $curUrl)){
        include_once "./pages/courses/list/index.php"; 
    }else if(preg_match($patternCoursesCard, $curUrl)){
        include_once "./pages/courses/card/index.php"; 
    } else {
        include_once "./page.php"; 
    }

?>