    <div class="modal fade" id="modal-check-company" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><?php echo $text['modal-check-company']['zapr'][$ln]?></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body form--main">
                    <form class="form--main" action="" method="post"
                        comment="<?php echo $text['modal-check-company']['prcom'][$ln]?>">
                        <input type="text" name="name" value="" placeholder="<?php echo $text['form']['name'][$ln] ?>"
                            required>
                        <input type="tel" name="phone" placeholder="<?php echo $text['form']['phone'][$ln] ?>" required>
                        <input type="email" name="email" value="" placeholder="E-mail" required>
                        <input type="text" name="company" value=""
                            placeholder="<?php echo $text['modal-check-company']['cnt'][$ln]?>" required>
                        <button type="submit"><?php echo $text['modal-check-company']['provb'][$ln] ?></button>
                        <div class="agree">
                            <?php echo $text['modal-check-company']['provt'][$ln] ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>