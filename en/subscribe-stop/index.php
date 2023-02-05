<?php 
    $dir = $_SERVER['DOCUMENT_ROOT'];
    $domain = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
    include $dir."/text.php";
    $ln = 'en';
    $link = '/en';
    include $dir."/pages/subscribe_page.php"; 
?>