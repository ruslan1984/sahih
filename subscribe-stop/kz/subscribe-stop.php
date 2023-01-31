<!DOCTYPE html>
<html lang="ru">
<?php 
$dir = $_SERVER['DOCUMENT_ROOT'];
$ln = 'kz';
$link = 'kz';
include $dir."/text.php";
include $dir."/sections/head.php";
?>

<body>
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
                            <button type="submit"
                                onclick="subscribeStop_init()"><?php echo $text['subscribe-stop']['code'][$ln] ?></button>
                            <div class="agree text-center">
                                <?php echo $text['subscribe-stop']['mes'][$ln] ?></a>
                            </div>
                        </form>
                    </div>
                    <div class="form--main" id="step-2" style="display: none;">
                        <div class="modal-header">
                            <h3>2/2 <?php echo $text['subscribe-stop']['uns'][$ln] ?></h3>
                            <div class="sub-title">
                                Проверьте почту, там должно быть письмо с кодом.
                            </div>
                        </div>
                        <form action="" method="post" id="form-step2" comment="Проверка компании">
                            <input type="text" placeholder="Код подтверждения" name="code" id="code" min="" max="">
                            <span id="error-step2" style="display: none;"></span>
                            <button type="button" onclick="subscribeCode_init()">Подтвердить код</button>
                            <div class="agree text-center">
                                <?php echo $text['subscribe-stop']['mes'][$ln] ?></a>
                            </div>
                            <div class="go-back text-center">
                                <span>← Указать другой e-mail</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 col-md-6 offset-1 offset-md-3">
                    <div class="form--main" id="confirmed" style="display: none;">
                        <div class="modal-header">
                            <h3>Автопродление подписки успешно отменено!</h3>
                            <div class="sub-title">
                                Текущая подписка будет действовать до окончания оплаченного срока.
                            </div>
                        </div>
                        <div class="button-wrap text-center">
                            <a href="/" class="btn btn--main">Вернуться на сайт</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer" id="footer">
        <div class="container" anim="fade">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12">
                    <div class="privacy">
                        <a href="terms.pdf" target="_blank">Политика конфиденциальности</a>
                    </div>
                    <div class="developer">
                        Разработано в&nbsp;<a href="https://kvin.agency" target="_blank">KVIN.AGENCY</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="modal fade" id="modal-check-company" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Запросить проверку компании по нормам ислама</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body form--main">
                    <form class="form--main" action="" method="post" comment="Проверка компании">
                        <input type="text" name="name" value="" placeholder="Ваше имя" required>
                        <input type="tel" name="phone" placeholder="Телефон" required>
                        <input type="email" name="email" value="" placeholder="E-mail" required>
                        <input type="text" name="company" value="" placeholder="Название компании на проверку" required>
                        <button type="submit">Проверить компанию</button>
                        <div class="agree">
                            Нажимая на&nbsp;кнопку «Проверить компанию», вы соглашаетесь с&nbsp;<a target="_blank"
                                href="terms.pdf">политикой конфиденциальности</a>.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-consult" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><?php echo $text['modal-consult']['h1'][$ln] ?></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body form--main">
                    <form class="form--main" action="" method="post" comment="Интеграция Sahih API">
                        <input type="text" name="name" value="" placeholder="Ваше имя" required>
                        <input type="tel" name="phone" placeholder="Телефон" required>
                        <button type="submit"><?php echo $text['modal-consult']['btn'][$ln] ?></button>
                        <div class="agree">
                            Нажимая на&nbsp;кнопку «Заказать консультацию», вы соглашаетесь с&nbsp;<a target="_blank"
                                href="terms.pdf">политикой конфиденциальности</a>.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-free" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Мобильное приложение<br>Sahih Invest</h3>
                    <div class="sub-title">Пробная версия</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body form--main">
                    <div class="buttons">
                        <div>
                            <a href="https://apps.apple.com/ru/app/sahih-invest/id1533653991" target="_blank"><img
                                    src="../media/img/app_store_badge.svg" alt="app-sotre"></a>
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
                        <div>
                            <a href="https://play.google.com/store/apps/details?id=com.sahih.invest&hl=en&gl=US"
                                target="_blank"><img src="../media/img/google_play_badge.svg" alt="google-play"></a>
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


    <div class="modal fade" id="modal-support" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Поддержите проект<br>Sahih Invest</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body form--main">
                    <form class="form--main ko-off" action="" method="post" comment="Поддержите проект Sahih Invest"
                        id="form-donation" onsubmit="return !pay_url(this, false, 'self');">
                        <input type="text" name="name" value="" placeholder='ФИО или "Аноним"'>
                        <input type="email" name="email" value="" placeholder="E-mail" required>
                        <input type="text" name="donate_amount" value="" pattern="[0-9]+" placeholder="Сумма, ₽"
                            required>
                        <button type="submit">Поддержать проект</button>
                        <div class="agree">
                            Нажимая на&nbsp;кнопку «Поддержите проект», вы соглашаетесь с&nbsp;<a target="_blank"
                                href="terms.pdf">политикой конфиденциальности</a>.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-subscribe" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><?php echo $text['modal-subscribe']['h1'][$ln] ?></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body form--main">
                    <form class="form--main ko-off" action="" method="post"
                        comment="<?php echo $text['modal-subscribe']['h1'][$ln] ?>" id="form-subscribe"
                        onsubmit="return !pay_url(this, false, 'self');">
                        <input type="email" name="email" value="" placeholder="E-mail" required>

                        <select class="form-select selectpicker" aria-label="Default select example"
                            name="donate_amount">
                            <!-- <option value="3590" selected>12 меc. — 3 590 ₽</option> -->
                            <option value="3590" selected>
                                12&nbsp;<?php echo $text['modal-subscribe']['month'][$ln] ?>&nbsp;— 3&nbsp;590
                                <?php echo $text['modal-subscribe']['rub'][$ln] ?>
                            </option>
                            <option value="1299">3&nbsp;<?php echo $text['modal-subscribe']['month'][$ln] ?>&nbsp;—
                                1&nbsp;299 <?php echo $text['modal-subscribe']['rub'][$ln] ?></option>
                            <option value="499">1&nbsp;<?php echo $text['modal-subscribe']['month'][$ln] ?>&nbsp;— 499
                                <?php echo $text['modal-subscribe']['rub'][$ln] ?></option>
                        </select>

                        <button type="submit"><?php echo $text['modal-subscribe']['sub'][$ln] ?></button>
                        <div class="renewal-info">
                            Подписка приложения продлевается автоматически. Вы можете отказаться от&nbsp;подписки
                            написав нам.
                        </div>
                        <div class="agree">
                            Нажимая на&nbsp;кнопку «Оформить подписку», вы соглашаетесь с&nbsp;<a target="_blank"
                                href="terms.pdf">политикой конфиденциальности</a>.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-result" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3></h3>
                    <div class="sub-title"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body form--main">
                    <div class="close-w">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">Закрыть
                            окно</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-auto-replenishment" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Отключение автопополнения</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body form--main">
                    <form class="form--main" action="" method="post" comment="Отключить автопополнение"
                        id="form-subscribe" onsubmit="return !pay_url(this, false, 'self');">
                        <input type="text" name="name" value="" placeholder="Ваше имя" required>
                        <input type="email" name="email" value="" placeholder="E-mail" required>
                        <button type="submit">Отключить автопополнение</button>
                        <div class="agree">
                            Нажимая на&nbsp;кнопку «Отключить автопополнение», вы соглашаетесь с&nbsp;<a target="_blank"
                                href="terms.pdf">политикой конфиденциальности</a>.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    feather.replace({
        'stroke-width': 1
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../media/js/jquery-libs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApaKMAilNYsX9vHCxmTgWCygep1xZ2BUw"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/granim/1.1.1/granim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.2/jquery.fancybox.min.js"></script>
    <script src="../media/js/slick.min.js"></script>

    <script src="../media/js/script.js?v1.2"></script>
    <script src="script.js"></script>
</body>

</html>