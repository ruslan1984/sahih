<body>

    <head>
        <?php include $dir."/sections/head.php";?>
    </head>
    <?php include $dir."/sections/header.php"; ?>

    <style>
    body,
    html {
        height: 100%;
    }

    .form--main {
        padding: 30px;
        background: #fff;
        box-shadow: 0 0 20px #0000001a;
        border-radius: 10px;
    }

    .form--main .modal-header {
        padding: 0 0 1rem 0;
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    .resend-code {
        margin-bottom: 1rem;
    }

    .go-back {
        margin-top: 30px;
    }

    .go-back span {
        cursor: pointer;
        color: #0d6efd;
    }

    .main {
        padding-top: 100px;
        padding-bottom: 100px;
        min-height: 100%;
        position: relative;
    }

    #error-step1,
    #error-step2 {
        margin-bottom: 20px;
        color: #ff6a64;
    }

    .button-wrap .btn--main {
        padding: 0.92rem 1.5rem;
    }
    </style>

    <section class="main form" id="form">
        <div class="container">
            <div class="row">
                <div class="col-10 col-md-8 offset-1 offset-md-2">
                    <div class="form--main" id="step-1">
                        <div class="modal-header">
                            <h3>1/2 <?php echo $text['subscribe-stop']['uns'][$ln] ?></h3>
                        </div>
                        <form action="" method="post" id="form-step1" comment="Проверка компании"
                            onsubmit="return false;">
                            <input type="email" name="email"
                                placeholder="<?php echo $text['subscribe-stop']['re'][$ln] ?>" required>
                            <span id="error-step1" style="display: none;"></span>
                            <button type="button" onclick="subscribeStop_init()">
                                <?php echo $text['subscribe-stop']['code'][$ln] ?></button>
                            <div class="agree text-center">
                                <?php echo $text['subscribe-stop']['mes'][$ln] ?></a>
                            </div>
                        </form>
                    </div>
                    <div class="form--main" id="step-2" style="display: none;">
                        <div class="modal-header">
                            <h3>2/2 <?php echo $text['subscribe-stop']['uns'][$ln] ?></h3>
                            <div class="sub-title">
                                <?php echo $text['subscribe-stop']['testm'][$ln]?>
                            </div>
                        </div>
                        <form action="" method="post" id="form-step2"
                            comment="<?php echo $text['subscribe-stop']['prcom'][$ln] ?>">
                            <input type="text" placeholder="<?php echo $text['subscribe-stop']['codp'][$ln]?>"
                                name="code" id="code" min="" max="">
                            <span id="error-step2" style="display: none;"></span>
                            <button type="button"
                                onclick="subscribeCode_init()"><?php echo $text['subscribe-stop']['podc'][$ln]?></button>
                            <div class="agree text-center">
                                <?php echo $text['subscribe-stop']['mes'][$ln]?>
                            </div>
                            <div class="go-back text-center">
                                <span>← <?php echo $text['subscribe-stop']['oem'][$ln]?></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="form--main" id="confirmed" style="display: none;">
                <div class="modal-header">
                    <h3><?php echo $text['confirmed']['h1'][$ln]?></h3>
                    <div class="sub-title">
                        <?php echo $text['subscribe-stop']['tekp'][$ln]?>
                    </div>
                </div>
                <div class="button-wrap text-center">
                    <a href="/" class="btn btn--main"><?php echo $text['subscribe-stop']['bas'][$ln]?></a>
                </div>
            </div>
        </div>
    </section>
    <?php
        include $dir."/sections/footer.php";
    
        include $dir."/sections/modal-check-company.php";
        include $dir."/sections/modal-consult.php";
        include $dir."/sections/modal-free.php";
        include $dir."/sections/modal-support.php";
        include $dir."/sections/modal-result.php";
        include $dir."/sections/modal-subscribe-stopped.php";
        include $dir."/sections/modal-auto-replenishment.php";
        include $dir."/sections/modal-subscribe.php";
        include $dir."/sections/scripts.php";
        include $dir."/sections/metrica.php";
?>
</body>

</html>