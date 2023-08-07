<section class="information" id="information">
    <div class="container" anim="fade">
        <div class="row">
            <div class="col">
                <h2><?php echo $text['information']['h2'][$ln] ?></h2>
                <div class="sub-title"><?php echo $text['information']['t'][$ln] ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <span class="numbers"><?php echo $text['information']['n1'][$ln] ?></span>
                <div class="info"><?php echo $text['information']['c1'][$ln] ?></div>
            </div>
            <div class="col-12 col-md-4">
            <span class="numbers"><?php echo $text['information']['n2'][$ln] ?></span>
                <div class="info"><?php echo $text['information']['c2'][$ln] ?></div>
            </div>
            <div class="col-12 col-md-4">
                <span class="numbers"><?php echo $text['information']['c3h'][$ln] ?></span>
                <div class="info"><?php echo $text['information']['c3'][$ln] ?></div>
            </div>
        </div>
    </div>
    <div class="overlay" id="information2">
        <div class="container" anim="fade">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3><?php echo $text['information']['ul'][$ln] ?></h3>
                    <ul class="list">
                        <li><?php echo $text['information']['li1'][$ln] ?></li>
                        <li><?php echo $text['information']['li2'][$ln] ?></li>
                        <li><?php echo $text['information']['li3'][$ln] ?></li>
                        <li><?php echo $text['information']['li4'][$ln] ?></li>
                    </ul>
                    <div class="buttons">
                        <a href="#modal-support" class="btn btn--main"
                            data-toggle="modal"><?php echo $text['information']['pod'][$ln] ?></a>
                    </div>
                    <!-- <form action="" method="post" comment="Поддержать проект" class="form k_off">
                            <input type="text" name="donate_amount" value="" pattern="[0-9]+" placeholder="Введите сумму, ₽" required>
                            <button type="submit" class="btn btn--main">Поддержать проект</button>
                        </form> -->
                </div>
                <div class="col-12 col-sm-6">
                    <div class="wrap">
                        <!-- <div class="video">
                                <div class="blurred-circle"></div>
                                <img src="/media/img/information/iphone-12--black.png" alt="mobile">
                            </div> -->
                        <div class="video">
                            <!-- <div class="blurred-circle"></div>
                            <div class="tab-content" id="nav-tabContent">
                                <iframe class="tab-pane active" id="video1" role="tabpanel"
                                    src="https://www.youtube.com/embed/ruKvLm2SR5M" allowfullscreen></iframe>
                                <iframe class="tab-pane" id="video2" role="tabpanel"
                                    src="https://www.youtube.com/embed/CUB43NOvJb4" allowfullscreen></iframe>
                            </div> -->
                        </div>
                        <div class="switcher list-group" id="myList" role="tablist">
                            <div class="btn--switcher list-group-item list-group-item-action active" data-toggle="list"
                                href="#video1" role="tab"><?php echo $text['information']['vid'][$ln] ?></div>
                            <div class="btn--switcher list-group-item list-group-item-action" data-toggle="list"
                                href="#video2" role="tab"><?php echo $text['information']['com'][$ln] ?></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>