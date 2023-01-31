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
                <form class="form--main" action="" method="post" comment="Отключить автопополнение" id="form-subscribe"
                    onsubmit="return !pay_url(this, false, 'self');">
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