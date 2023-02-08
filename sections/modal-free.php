<div class="modal fade" id="modal-free" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3><?php echo $text['modal-free']['h3'][$ln]?></h3>
                <div class="sub-title"><?php echo $text['product']['c1'][$ln]?></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form--main">
                <div class="buttons gap-3">
                    <div class="flex-fill">
                        <?php include $dir."/sections/elements/apple_btn.php"; ?>
                        <div class="stats">
                            <div class="stars">
                                <span class="star star-fill"></span>
                                <span class="star star-fill"></span>
                                <span class="star star-fill"></span>
                                <span class="star star-fill"></span>
                                <span class="star star-fill"></span>
                                <span class="number">4,8</span>
                            </div>
                            <!-- <span class="circle"></span>
                                <div class="rating">
                                    <span>Оценок:</span>
                                    <span>10</span>
                                </div> -->
                        </div>
                    </div>
                    <div class="flex-fill">
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
            </div>
        </div>
    </div>
</div>