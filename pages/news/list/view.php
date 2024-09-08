<div class="container page">
    <h1>Новости</h1>
    <?php foreach ($newsList as $key=> $item): ?>
    <a class="newsListBlock" href=<?php echo "/news/".$key?>>
        <h4><?php echo $item['title']?></h4>
        <div class="newsListTextBlock">
            <img class="isImg" src=<?php echo $item['img']?> alt="">
            <div class="text">
                <?php echo mb_substr($item['text'], 0, 350)?>...
            </div>
        </div>
    </a>
    <?php endforeach?>
</div>