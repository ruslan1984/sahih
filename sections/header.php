<?php
$host="";
if($curUrl!=="/"){
    $host=$domain."/";
}

?><header class="nav-fix">
    <div class="container">
        <nav class="navbar navbar-expand-lg no-gutters  ">
            <a href='<?php  if($link) {echo $link;} else {echo "/";} ?>' class="logo">
                <img class="logoImg" src="/media/img/logo1.svg" alt="Sahih Invest">
                <div>
                    <div class="logoText1">Sahih Invest</div>
                    <div class="logoText2"><?php echo $text['header']['logo']['t1'][$ln] ?></div>
                </div>
            </a>
            <div class="d-flex align-items-center">
                <div class="d-lg-none text-right">
                    <?php include $dir."/sections/elements/language_btn.php"; ?>
                </div>
                <button class="mb-1 navbar-toggler burg_btn burgBtn" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarToggleExternalContent9" aria-controls="navbarToggleExternalContent9"
                    data-toggle="collapse" data-target=".navbar-collapse-1" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <div class="burg"><span></span><span></span><span></span></div>
                </button>
            </div>
            <div class="navbar-collapse-1 navbar-collapse collapse navbar-collapse-menu justify-content-end">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo $host?>#information2"><?php echo $text['header']['nav']['sk'][$ln] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo $host?>#product"><?php echo $text['header']['nav']['pr'][$ln] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo $host?>#reviews"><?php echo $text['header']['nav']['ot'][$ln] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo $host?>#partner-gift"><?php echo $text['header']['nav']['bn'][$ln] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo $host?>#team"><?php echo $text['header']['nav']['kom'][$ln] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo $host?>#contacts"><?php echo $text['header']['nav']['kont'][$ln] ?></a>
                    </li>
                </ul>
            </div>
            <div class="d-none d-lg-block">
                <?php include $dir."/sections/elements/language_btn.php"; ?>
            </div>
            <div class="collapse navbar-collapse justify-content-end navbar-collapse-1 navbar-collapse-phone">
                <ul class="navbar-nav text-left text-lg-right mt-2 box-contacts">
                    <li class="nav-item">
                        <a class="btn btn--main" href="#modal-free" data-toggle="modal">
                            <?php echo $text['header']['inst'][$ln]?>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>