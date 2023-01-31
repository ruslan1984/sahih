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