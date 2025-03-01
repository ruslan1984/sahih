<?php include_once $dir."/text.php"; 
$title = "Новости Сахих инвест";
?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/courses.css" />
</head>

<body>
    <?php 
        include $dir."/sections/header.php"; 
        
        include $dir."/pages/news/list.php"; 
        include __DIR__."/view.php"; 
        
        include $dir."/sections/footer.php";
        include $dir."/sections/scripts.php";
    ?>
</body>


</html>