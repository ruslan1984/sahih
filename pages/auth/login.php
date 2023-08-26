<?php include_once $dir."/text.php"; ?>

<head>
    <?php include_once $dir."/sections/head.php";?>
    <link rel="stylesheet" href="<?php echo $domain?>/media/css/login.css" />
    <meta name="google-signin-client_id"
        content="713052553041-7g97tip4a82027el00e89qntlgqn2lck.apps.googleusercontent.com">
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
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
            <a href="/register">Регистрация</a>
        </form>


    </div>


    <?php include $dir."/sections/footer.php";?>
    <?php include __DIR__."/md5.php";?>
</body>
<script src="https://apis.google.com/js/platform.js" async defer></script>

<script>
(() => {

    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
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