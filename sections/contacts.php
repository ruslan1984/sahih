<section class="contacts" id="contacts">
    <div class="container" anim="fade">
        <div class="row">
            <div class="col">
                <h2><?php echo $text['contacts']['h2'][$ln]?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="sub-title"><?php echo $text['contacts']['n'][$ln]?></div>
                <div class="address"><?php echo $text['contacts']['addr'][$ln]?></div>
                <div class="mail"><a href="mailto:support@sahihinvest.ru">support@sahihinvest.ru</a></div>
                <div class="socials">
                    <a href="https://wa.me/79953305448/?utm_source=whatsapp&utm_medium=messenger&utm_campaign=(whatsapp)&utm_content=(whatsapp)&utm_term=(whatsapp)"
                        target="_blank">WhatsApp</a>
                    <a href="https://t.me/sahihinvest/?utm_source=telegram&utm_medium=messenger&utm_campaign=(telegram)&utm_content=(telegram)&utm_term=(telegram)"
                        target="_blank">Telegram</a>
                </div>
                <div class="form--main">
                    <div class="form-title"><?php echo $text['contacts']['ft'][$ln]?></div>
                    <form class="form--main" action="" method="post"
                        comment="<?php echo $text['contacts']['fn'][$ln]?>">
                        <input type="text" name="name" value="" placeholder="<?php echo $text['contacts']['fe'][$ln]?>">
                        <input type="email" name="email" value="" placeholder="E-mail">
                        <textarea name="comment" placeholder="<?php echo $text['contacts']['fq'][$ln]?>"></textarea>
                        <button type="submit"><?php echo $text['contacts']['fqb'][$ln]?></button>
                        <div class="agree">
                            <?php echo $text['contacts']['fqd'][$ln]?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-6 map" id="#map">
                <iframe
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3A339a1218879d7eccd736df47e5740cd074eb4f87cbd47991f644dc32d41b5e3d&amp;source=constructor&amp;scroll=false"
                    width="100%" height="557" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</section>