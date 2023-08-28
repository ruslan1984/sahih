<?php include_once $dir."/text.php"; ?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/login.css" />
</head>

<body>
    <?php 
        include $dir."/sections/header.php"; ?>

    <div class="container loginPage">
        <h1 class="h1">Подтверждение Регистрации</h1>
        <form class="form" action="/">
            <label for="code">
                Код отправлен вам на email
                <input name="code" id="code" class="input" type="text" required />
            </label>
            <button class="btn btn--main">Зарегистрироваться</button>
            <a href="/login">Авторизация</a>
            <div class="error"></div>
        </form>
    </div>
    </div>
    <?php include $dir."/sections/footer.php";?>
    <?php include $dir."/sections/scripts.php";?>
</body>

<script>
(() => {
    const form = document.querySelector('.form');

    const error = document.querySelector('.error');
    const url = "<?php echo $host_api?>/api/users/check-code/<?php echo $_GET['email']?>";
    form.addEventListener('click', () => {
        if (error.classList.contains("show")) {
            error.classList.remove("show");
        }
    });
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const code = form[0].value;

        const response = await fetch(url, {
            method: 'post',
            headers: {
                "Content-Type": "application/json",
                "Accept-Language": "RU"
            },
            body: JSON.stringify({
                code,
            }),
        });
        if (response.status === 200) {
            const {
                isCorrect
            } = await response.json();

            if (isCorrect) {
                document.location.href = "/login";
                return;
            }
            error.innerText = "Неверный код";
            error.classList.add("show");
        }
    });
})()
</script>

</html>