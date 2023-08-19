<?php include_once $dir."/text.php"; ?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/login.css" />
</head>

<body>
    <?php 
        include $dir."/sections/header.php"; ?>

    <div class="container loginPage">
        <h1 class="h1">Регистрация</h1>
        <form class="form" method="post" action="/">
            <label for="username">
                Имя
                <input name="username" id="username" class="input" type="text" required />
            </label>
            <label for="email">
                Email
                <input name="email" id="email" class="input" type="text" required />
            </label>
            <label for="password">
                Пароль
                <input name="password" id="password" class="input" type="password" required />
            </label>
            <label for="confirmPassword">
                Подтвердить пароль
                <input name="confirmPassword" id="confirmPassword" class="input" type="password" required />
            </label>
            <button class="btn btn--main">Зарегистрироваться</button>
            <a href="/login">Авторизация</a>
            <div class="error">Неверные логин или пароль</div>
        </form>
    </div>
    </div>
    <?php include $dir."/sections/footer.php";?>
</body>

<script>
(() => {
    const form = document.querySelector('.form');
    const error = document.querySelector('.error');
    const url = "<?php echo $host_api?>/api/sign-up";
    form.addEventListener('click', () => {
        if (error.classList.contains("show")) {
            error.classList.remove("show");
        }
    });
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const username = form[0].value;
        const email = form[1].value;
        const password = form[2].value;
        const confirmPassword = form[3].value;

        if (password !== confirmPassword) {
            error.innerText = "Пароли не совпадают";
            error.classList.add("show");
            return;
        }

        const response = await fetch(url, {
            method: 'post',
            body: {
                "login": email,
                "name": username,
                "password": password,
                "email": email,
                "country": "RU"
            },
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }
        });
        if (response.status === 200) {
            const {
                accessToken
            } = await response.json();
            const now = new Date();
            const time = now.getTime();
            const expireTime = time + 1000 * 36000;
            now.setTime(expireTime);
            document.cookie = `token=${accessToken}; path=/; expires=${now.toUTCString()}`;
            document.location.href = "/courses/";

            return;
        }
        error.classList.add("show");
    });
})()
</script>

</html>