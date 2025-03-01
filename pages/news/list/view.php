<div class="container page">
    <h1>Новости</h1>
    <?php foreach ($newsList as $key=> $item): ?>
    <div class="newsListBlock">
        <h4><?php echo $item[$ln]['title']?></h4>
        <div class="date"><?php echo $item[$ln]['date']?></div>
        <div class="newsListTextBlock">
            <img class="isImg" src=<?php echo $item[$ln]['img']?> alt="">
            <div>
                <div class="text">
                    <?php echo mb_substr($item[$ln]['text'], 0, 230)?>...
                </div>
                <div class="newsBtn">
                    <a href=<?php echo "news/".$key?> class="btn btn--main">Узнать подробнее</a>
                </div>
            </div>
        </div>

    </div>
    <?php endforeach?>
</div>