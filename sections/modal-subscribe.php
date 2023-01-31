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

                         <div class="subscription">
                             <input type="checkbox" checked="checked" name="auto_renew" value="1">
                             <label for="a5">
                                 <span>Включить ежемесячное автоматическое продление подписки. Его можно отключить
                                     позже, написав нам.</span>
                             </label>
                         </div>

                         <button type="submit"><?php echo $text['modal-subscribe']['sub'][$ln] ?></button>
                         <div class="agree">
                             Нажимая на&nbsp;кнопку «Оформить подписку», вы соглашаетесь с&nbsp;<a target="_blank"
                                 href="terms.pdf">политикой конфиденциальности</a>.
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>