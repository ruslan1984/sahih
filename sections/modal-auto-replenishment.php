<div class="modal fade" id="modal-auto-replenishment" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3><?php echo $text['modal-auto-replenishment']['otkl'][$ln] ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form--main">
                <form class="form--main" action="" method="post"
                    comment="<?php echo $text['modal-auto-replenishment']['otkluch'][$ln]?>" id="form-subscribe"
                    onsubmit="return !pay_url(this, false, 'self');">
                    <input type="text" name="name" value="" placeholder="<?php echo $text['form']['name'][$ln]?>"
                        required>
                    <input type="email" name="email" value="" placeholder="E-mail" required>
                    <button type="submit"><?php echo $text['modal-auto-replenishment']['otkluch'][$ln] ?></button>
                    <div class="agree">
                        <?php echo $text['modal-auto-replenishment']['priv'][$ln] ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>