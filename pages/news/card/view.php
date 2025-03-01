<div class="container page newsCard">
    <h1><?php echo $newsList[$newsId][$ln]['title']?></h1>
    <div class="date"><?php echo $newsList[$newsId]['date']?></div>
    <img class="isImg" src=<?php echo $newsList[$newsId][$ln]['img']?> alt="">
    <?php echo $newsList[$newsId][$ln]['text']?>
    <a href="/news" class="btn btn--main">В список новостей</a>
</div>