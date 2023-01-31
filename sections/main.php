<section class="main" id="main">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8">
                <div class="content">
                    <div class="sub-heading"><?php echo $text['main']['dl'][$ln] ?></div>
                    <h1>
                        <?php echo $text['main']['h1'][$ln] ?>
                    </h1>
                    <div class="benefits">
                        <p><?php echo $text['main']['p1'][$ln] ?></p>
                        <p><?php echo $text['main']['p2'][$ln] ?></p>
                        <p><?php echo $text['main']['p3'][$ln] ?></p>
                    </div>
                    <div class="buttons">
                        <div class="mb-3">
                            <?php include $dir."/sections/elements/apple_btn.php"; ?>
                            <div class="stats">
                                <div class="stars">
                                    <span class="star star-fill"></span>
                                    <span class="star star-fill"></span>
                                    <span class="star star-fill"></span>
                                    <span class="star star-fill"></span>
                                    <span class="star star-half"></span>
                                    <span class="number">4,7</span>
                                </div>
                                <!-- <span class="circle"></span>
                                    <div class="rating">
                                        <span>Оценок:</span>
                                        <span>10</span>
                                    </div> -->
                            </div>
                        </div>
                        <div class="mb-3">
                            <?php include $dir."/sections/elements/google_btn.php"; ?>
                            <div class="stats">
                                <div class="stars">
                                    <span class="star star-fill"></span>
                                    <span class="star star-fill"></span>
                                    <span class="star star-fill"></span>
                                    <span class="star star-fill"></span>
                                    <span class="star star-half"></span>
                                    <span class="number">4,6</span>
                                </div>
                                <!-- <span class="circle"></span>
                                    <div class="rating">
                                        <span>Оценок:</span>
                                        <span>10</span>
                                    </div> -->
                            </div>
                        </div>
                        <!-- <a href="#" class="btn btn--appsote">App Store</a>
                            <a href="#" class="btn btn--googleplay">Google Play</a> -->
                    </div>
                    <div class="info">
                        <div class="info-block info-traced">
                            <img src="/media/img/main/image 35 (Traced).svg" alt="РТ">
                            <p><?php echo $text['main']['halal'][$ln] ?></p>
                        </div>
                        <div class="info-block">
                            <img src="/media/img/main/tf.svg" alt="Тинькофф">
                            <p><?php echo $text['main']['tink'][$ln] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="image">
                    <img src="/media/img/main/main_img.png" alt="Sahih Invest">
                    <div class="blurred-circle"></div>
                </div>
            </div>
        </div>
    </div>
</section>