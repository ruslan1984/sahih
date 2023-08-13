<?php
$dir = $_SERVER['DOCUMENT_ROOT'];
    $domain = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
    $ln="ru";
    $link = '';
    include $dir."/text.php";
    include $dir."/pages/courses_page.php"; 
?>