<?php 
    header("Cache-Control: max-age=2592000");
    $dir = $_SERVER['DOCUMENT_ROOT'];
    $domain = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
    $ln = 'ru';
    $link = '';
    include "./page.php"; 
?>