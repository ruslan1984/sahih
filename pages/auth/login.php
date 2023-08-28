<?php include_once $dir."/text.php"; ?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/login.css" />
    <!-- <meta name="google-signin-client_id"
        content="136771247513-h63el1lgpqib5loffag7k7rkla5f2t6d.apps.googleusercontent.com"> -->
</head>

<body>
    <?php 
        include $dir."/sections/header.php"; ?>

    <div class="container loginPage">
        <h1 class="h1">Авторизация</h1>
        <form class="form" method="post" action="/">
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
                data-client_id="136771247513-h63el1lgpqib5loffag7k7rkla5f2t6d.apps.googleusercontent.com"
                data-callback="handleCredentialResponse">
            </div>
            <a href="/register">Регистрация</a>
        </form>
    </div>

    <?php include $dir."/sections/footer.php";?>
    <?php include $dir."/sections/scripts.php";?>
    <?php include __DIR__."/md5.php";?>
</body>
<script src="https://accounts.google.com/gsi/client" async defer></script>
<script>
(() => {


    window.handleCredentialResponse = (googleUser) => {

        console.log(googleUser.credential);
    }


    const form = document.querySelector('.form');
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
        console.log(data);
        if (response.status === 200) {
            const {
                accessToken
            } = data;
            const now = new Date();
            const time = now.getTime();
            const expireTime = time + 1000 * 36000;
            now.setTime(expireTime);
            document.cookie = `token=${accessToken}; path=/; expires=${now.toUTCString()}`;
            document.location.href = "/courses/";
            return;
        }

        error.innerText = data.message;
        error.classList.add("show");
    });
})()
</script>

</html>