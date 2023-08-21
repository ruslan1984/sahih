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
                    <div class="lesson">
                        <div>
                            <h5>
                                <?php echo $item['title'] ?>
                            </h5>
                            <div>
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
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <a class="btn btn--main" href="/courses/">В список курсов</a>
        </div>
    </div>
</div>
<script>
(() => {
    const openVideoList = document.querySelectorAll('.openVideo');

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
            videoModal.appendChild(video);
        }
        video.play();
        const closeAction = videoModal.querySelectorAll('.closeAction');
        Array.from(closeAction).map(item => item.addEventListener('click', () => {
            videoModal.classList.remove('open');
            video.pause();
        }));
        video.addEventListener('progress', function(e) {
            // let loadedPercentage = this.buffered.end(0) / this.duration;
            console.log("duration", this.duration);
            console.log("currentTime", this.currentTime);
            console.log("e", e);
            console.dir(this);
            // console.log(e.timeStamp);
        });


    }))
})()
</script>