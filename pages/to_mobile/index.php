<?php include_once $dir."/text.php"; 
    $title = "Sahih Invest Подарок";
    ?>

<head>
    <?php include_once $dir."/sections/head.php";?>

</head>

<body>
    <?php 
$useragent=$_SERVER['HTTP_USER_AGENT'];

$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");


if( $iPod || $iPhone ){
    header('Location: https://apps.apple.com/ru/app/sahih-invest/id1533653991');
}else if($iPad){
    header('Location: https://apps.apple.com/ru/app/sahih-invest/id1533653991');
}else if($Android){
    header('Location: https://play.google.com/store/apps/details?id=com.sahih.invest&hl=en&gl=US');
}
// else if($webOS){
//     header('Location: https://apps.apple.com/ru/app/sahih-invest/id1533653991');
// }


            include $dir."/sections/header.php"; 
            include $dir."/pages/news/list.php"; 
            include __DIR__."/view.php"; 
            
            include $dir."/sections/footer.php";
            include $dir."/sections/scripts.php";
        ?>
</body>


</html>