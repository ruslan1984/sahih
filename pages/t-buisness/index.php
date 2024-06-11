<?php include_once $dir."/text.php"; 
$title = "Халяль акции с Т-инвестици";
?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/courses.css" />
</head>
<?php
    $curUrl = $_SERVER['REQUEST_URI'];
    

?>

<body>
    <?php 
        include $dir."/sections/header.php"; 
        include __DIR__."/view.php"; 
        include $dir."/sections/footer.php";
        include $dir."/sections/scripts.php";
    ?>
</body>


</html>