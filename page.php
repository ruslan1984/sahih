<!DOCTYPE html>
<html lang="ru">

<?php include $dir."/text.php"; 

include $dir."/sections/head.php"; 

?>

<body>
    <?php 
        include_once $dir."/sections/header.php";  
        include_once $dir."/sections/main.php";
        // include_once $dir."/sections/partners.php";
        // include_once $dir."/sections/its.php";
        include_once $dir."/sections/information.php";
        include_once $dir."/sections/analysis-company.php";
        include_once $dir."/sections/check-company.php"; 
        include_once $dir."/sections/product.php";  
        include_once $dir."/sections/partner-gift.php";
        include_once $dir."/sections/api-info.php";
        include_once $dir."/sections/team.php";
        include_once $dir."/sections/events.php";
        include_once $dir."/sections/reviews.php";
        include_once $dir."/sections/faq.php";
        include_once $dir."/sections/contacts.php";
    
        include_once $dir."/sections/footer.php";
    
        include_once $dir."/sections/modal-check-company.php";
        include_once $dir."/sections/modal-consult.php";
        include_once $dir."/sections/modal-free.php";
        include_once $dir."/sections/modal-support.php";
        include_once $dir."/sections/modal-auto-replenishment.php";
        include_once $dir."/sections/modal-subscribe.php";
        include_once $dir."/sections/modal-mail-ok.php";

        include_once $dir."/sections/scripts.php";
        // include_once $dir."/sections/metrica.php";
    ?>

</body>

</html>