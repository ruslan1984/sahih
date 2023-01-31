<?php  
    $lnArray =[
        [
            "code"=>"ru",
            "text"=>"Русский",
            "img"=>"/media/img/flags/ru.png"
        ],
        [
            "code"=>"kz",
            "text"=>"Қазақша",
            "img"=>"/media/img/flags/kz.png"
        ],
        [
            "code"=>"en",
            "text"=>"English",
            "img"=>"/media/img/flags/gb.png"
        ],
    ]
?>
<div class="selectLnBlock">
    <?php foreach($lnArray as $item):?>
    <?php  if($ln==$item['code']):?>
    <div class="currentLn">
        <img class="img" src="<?php echo $item['img']?>" alt="" />
        <?php echo $item['code']?>
    </div>
    <?php endif;?>
    <?php endforeach;?>
    <div class="selectLn">
        <?php foreach($lnArray as $value):?>
        <div class="option <?php if($ln==$value['code']) echo 'selected' ?>" code="<?php echo $value['code'] ?>">
            <img class="flag" src="<?php echo $value['img']?>" alt="" />
            <?php echo $value['text']?>
        </div>
        <?php endforeach;?>
    </div>
</div>
<script>
(() => {
    const options = document.querySelectorAll(".selectLn .option");
    options.forEach((item) => {
        item.addEventListener("click", function() {
            const code = item.getAttribute("code");
            const href = code === "ru" ? "" : code;
            location.href = `/${href}`;
        });
    });
})();
</script>