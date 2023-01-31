<div class="modal fade" id="modal-support" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3><?php echo $text['modal-support']['h3'][$ln] ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form--main">
                <form class="form--main ko-off" action="" method="post" comment="Поддержите проект Sahih Invest"
                    id="form-donation" onsubmit="return !pay_url(this, true, 'self');">
                    <input type="text" name="name" value="" placeholder='ФИО или "Аноним"'>
                    <input type="email" name="email" value="" placeholder="E-mail" required>
                    <input type="text" name="donate_amount" value="" pattern="[0-9]+" placeholder="Сумма, ₽" required>
                    <button type="submit"><?php echo $text['modal-support']['btn'][$ln] ?></button>
                    <div class="agree">
                        Нажимая на&nbsp;кнопку «Поддержите проект», вы соглашаетесь с&nbsp;<a target="_blank"
                            href="terms.pdf">политикой конфиденциальности</a>.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>