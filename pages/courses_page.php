<?php 
    include $dir."/sections/head.php";
?>
<body>
    <?php 
        include $dir."/sections/header.php"; ?>    
        <div class="container main">
            <video src=""></video>
        </div>
    

    <?php include $dir."/sections/footer.php";?>

</body>
<script>
    (async ()=>{
        const Authorization="Bearer eyJhbGciOiJIUzI1NiJ9.eyJsb2dpbiI6InJ1c2xhbjIzMTk4NEB5YW5kZXgucnUiLCJuYW1lIjoi0KDRg9GB0LvQsNC9IiwiZXhwIjoyMDA3Mjc5MjA4fQ.evmBWvjAWRQ-Ue2apgw0qtow51aYKbVTPi9U9kxUuVk";
        const address= "https://arm-test.sahihinvest.ru";
        const url=address+"/api/courses/all";
        const response = await fetch(url,{
            method: "GET",
            headers: {
                Authorization
            },
            // withCredentials: true
            // credentials: 'omit'
        });
        const courses = await response.json();
        console.log(courses);
    })();
</script>

</html>