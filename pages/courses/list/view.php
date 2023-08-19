<div class="coursesPage">
    <div class="container">
        <h1>Курсы</h1>
        <p>Смотрите наши курсы и улучшайте свои знания в финансах</p>
        <div class="coursesBlock">
            <?php foreach($courses as $item ):?>
            <!-- href="/courses/<?php echo $item['guid']?>" -->
            <div class="card">
                <h4 class="h4">
                    <?php echo $item['title']?>
                </h4>
                <div class="imgBlock">
                    <!-- <img width="80px" src="/pages/courses/list/image.png" /> -->
                    <!-- <div> -->
                    <!-- <?php if(array_key_exists('price', $item)):?>
                        <div class="lab labPr"><?php echo $item['price']?></div>
                        <?php else:?>
                        <div class="lab lab1">Курс доступен</div>
                        <?php endif?>
                        <div class="labLine">
                            <div class="lab lab2">Онлайн эфиры</div>
                            <div class="lab lab2">Тесты</div>
                        </div> -->
                    <div class="modCount">
                        Модулей: <?php echo $item['modulesCount']?> | Уроков: <?php echo $item['lessonsCount']?>
                    </div>
                    <!-- </div> -->
                </div>
                <p class="author">
                    Курс читает: <?php echo $item['author']?>
                </p>
                <p>
                    <b>Описание:</b> <?php echo $item['content']?>
                </p>
                <div>
                    <?php foreach($item['moduleViewList']  as $module):?>
                    <div class="module">
                        <h5>
                            <?php echo $module['title'] ?>
                        </h5>
                        <div class="modCount">
                            Уроков: <?php echo $module['lessonCount']?>
                        </div>
                        <div>
                            <?php echo $module['description'] ?>
                        </div>

                        <div class="moduleFooter">
                            <a class="btn btn--main"
                                href="/course/<?php echo $item['guid']?>/module/<?php echo $module['guid']?>">Подробнее</a>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>