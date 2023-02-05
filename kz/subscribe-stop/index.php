<?php 
$dir = $_SERVER['DOCUMENT_ROOT'];
$domain = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
$ln="kz";
$link = '/kz';

include $dir."/text.php";
include $dir."/sections/pages/subscribe_page.php"; 
?>