<div class="coursesPage">
    <div class="container">
        <h1>Модуль: <?php echo $module['title']?></h1>
        <div class="coursesBlock" moduleGuid="<?php echo $module['guid']?>">
            <div class="card">
                <div class="modCount">
                    Уроков: <?php echo $module['lessonCount']?>
                </div>
                <p>
                    <b>Описание:</b> <?php echo $module['description']?>
                </p>
                <h5>Уроки</h5>
                <div>
                    <?php foreach($module['lessonViewList']  as $key=> $item):?>
                    <div class="lesson <?php if($key===0){echo 'open';}?>" lesson=<?php echo $item['guid'] ?>>
                        <div>
                            <h5>
                                <?php echo $item['title'] ?>
                            </h5>
                            <div class="desc">
                                <?php echo $item['description'] ?>
                            </div>
                        </div>
                        <?php if($item['videoLink']):?>
                        <div class="videoBlock">
                            <div class="btn btn--main openVideo">
                                &#9658; просмотр видео
                            </div>
                            <div class="videoModal" videoSrc="<?=$item['videoLink'] ?>">
                                <div class="close closeAction">&#10060;</div>
                                <div class="fon closeAction"></div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="forOpen">Для просмотра видео необходимо пройти предыдущий урок</div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <a class=" btn btn--main" href="/courses/">В список курсов</a>
        </div>
    </div>
</div>
<script>
(() => {
    const guidCourse = "<?php echo $guidCourse; ?>";
    const guidModule = "<?php echo $guidModule; ?>";

    const openVideoList = document.querySelectorAll('.openVideo');
    const openCourses = JSON.parse(localStorage.getItem('openCourses')) || {};
    if (!openVideoList) return;
    Array.from(openVideoList).map(openVideo => openVideo.addEventListener('click', () => {
        const videoModal = openVideo.nextElementSibling;
        videoModal.classList.add('open');
        const videoLink = videoModal.getAttribute('videoSrc');
        let video = videoModal.querySelector('video');
        if (!video) {
            video = document.createElement('video');
            video.src = videoLink;
            video.classList.add('video');
            video.controls = true;
            video.controlsList = "nodownload";
            videoModal.appendChild(video);
        }
        video.play();
        const closeAction = videoModal.querySelectorAll('.closeAction');
        Array.from(closeAction).map(item => item.addEventListener('click', () => {
            videoModal.classList.remove('open');
            video.pause();
        }));
        const curLesson = video.closest('.lesson');
        const nextLesson = curLesson.nextElementSibling;

        video.addEventListener("progress", function() {
            if (nextLesson && this.currentTime > this.duration * 0.9) {
                nextLesson.classList.add("open");
                const guidLesson = nextLesson.getAttribute('lesson');
                if (openCourses && openCourses[guidCourse] && openCourses[guidCourse][
                        guidModule
                    ] && openCourses[
                        guidCourse][guidModule][guidLesson] &&
                    openCourses[guidCourse][guidModule][guidLesson] !== 'open'
                ) {
                    openCourses[guidCourse][guidModule][guidLesson] = "open"
                    localStorage.setItem("openCourses", JSON.stringify(openCourses));
                }
            }
        });
    }));

    const coursesBlock = document.querySelector('.coursesBlock');
    if (!coursesBlock) return;
    const moduleGuid = coursesBlock.getAttribute('moduleGuid');
    if (!moduleGuid) return;



    const lessons = coursesBlock.querySelectorAll('.lesson');


    Array.from(lessons).map((lesson) => {
        const guidLesson = lesson.getAttribute('lesson');
        if (openCourses && openCourses[guidCourse] && openCourses[guidCourse][guidModule] && openCourses[
                guidCourse][guidModule][guidLesson] && openCourses[guidCourse][guidModule][guidLesson] ===
            "open") {
            lesson.classList.add("open");
        }
    });

})()
</script>