<?php include_once $dir."/text.php"; ?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/login.css" />
</head>

<body>
    <?php 
        include $dir."/sections/header.php"; ?>

    <div class="container loginPage">
        <h1 class="h1">Авторизация</h1>
        <form class="authForm form" method="post" action="/">
            <label for="login">
                Логин
                <input name="username" id="login" class="input" type="text" required />
            </label>
            <label for="password">
                Пароль
                <input name="password" id="password" class="input" type="password" required />
            </label>
            <button class="btn btn--main">Войти</button>
            <div class="error"></div>
            <div class="g_id_signin" data-type="standard"></div>
            <div id="g_id_onload"
                data-client_id="987784905231-ov7kll4eu9l11lcdd2ca79fd0b0ik36b.apps.googleusercontent.com"
                data-callback="handleCredentialResponse">
            </div>
            <a href="/register">Регистрация</a>
        </form>
    </div>

    <?php include $dir."/sections/footer.php";?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo $domain?>/media/js/jquery-libs.js"></script>
    <script src="<?php echo $domain?>/media/js/sc.js?1.13"></script>
    <?php include __DIR__."/md5.php";?>
</body>
<script src="https://accounts.google.com/gsi/client" async defer></script>
<script>
(() => {

    const setToken = (accessToken) => {
        if (!accessToken) return;
        const now = new Date();
        const time = now.getTime();
        const expireTime = time + 1000 * 36000;
        now.setTime(expireTime);
        document.cookie = `token=${accessToken}; path=/; expires=${now.toUTCString()}`;
        return;
    }

    window.handleCredentialResponse = async (googleUser) => {
        const url = "<?php echo $host_api?>/api/google-login";
        const response = await fetch(url, {
            method: 'post',
            body: JSON.parse({
                "token": googleUser.credential,
                "country": "RU"
            }),
            headers: {
                "Content-Type": "application/json"
            }

        });
        const {
            accessToken
        } = await response.json();
        await setToken(accessToken);
        if (!accessToken) {
            error.innerText = "Ошибка";
            error.classList.add("show");
            return;
        }
        document.location.href = "/courses/";
    };

    const form = document.querySelector('.authForm');
    const error = document.querySelector('.error');
    const url = "<?php echo $host_api?>/api/login";

    form.addEventListener('click', () => {
        if (error.classList.contains("show")) {
            error.classList.remove("show");
        }
    });
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const username = form[0].value;
        const password = form[1].value;
        const response = await fetch(url, {
            method: 'post',
            body: `username=${username}&password=${MD5(password)}`,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }
        });
        const data = await response.json();

        if (response.status === 200) {
            const {
                accessToken
            } = data;
            if (!accessToken) {
                error.innerText = "Ошибка";
                error.classList.add("show");
                return;
            }
            await setToken(accessToken);
            document.location.href = "/courses/";
            // const now = new Date();
            // const time = now.getTime();
            // const expireTime = time + 1000 * 36000;
            // now.setTime(expireTime);
            // document.cookie = `token=${accessToken}; path=/; expires=${now.toUTCString()}`;

            return;
        }

        error.innerText = data.message;
        error.classList.add("show");
    });

})();
</script>

</html>