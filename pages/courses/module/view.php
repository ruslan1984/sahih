<div class="coursesPage">
    <div class="container">
        <h1>Модуль: <?php echo $module['title']?></h1>
        <div class="coursesBlock">
            <div class="card">
                <div class="modCount">
                    Уроков: <?php echo $module['lessonCount']?>
                </div>
                <p>
                    <b>Описание:</b> <?php echo $module['description']?>
                </p>
                <h5>Уроки</h5>
                <div>
                    <?php foreach($module['lessonViewList']  as $item):?>
                    <div class="module">
                        <h5>
                            <?php echo $item['title'] ?>
                        </h5>
                        <div>
                            <?php echo $item['description'] ?>
                        </div>
                        <?php if($item['videoLink']):?>
                        <video class="video" controls="controls">
                            <source src="<?=$item['videoLink'] ?>" />
                            <div id="snow">
                                <p>Ваш браузер не поддерживает формат данного видеофайла.</p>
                            </div>
                        </video>
                        <?php endif; ?>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <a class="btn btn--main" href="/courses/">В список курсов</a>

        </div>
    </div>
</div>