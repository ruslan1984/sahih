<?php 

    $dir = $_SERVER['DOCUMENT_ROOT'];
    $domain = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
    $ln = 'ru';
    $link = '';
    require_once $dir."/phpmailer/index.php";
    sendMail('ruslanm23091984@gmail.com','222','333');
    include "./page.php"; 
?>