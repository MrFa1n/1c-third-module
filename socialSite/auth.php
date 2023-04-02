<?php
include("path.php");
include("application/controllers/users.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Miracle Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style2.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <!-- header bar -->
    <?php
    include("application/include/header.php");
    ?>
    <!-- Начало формы по отправки данных от пользователя -->
    <div class="container">
        <form class="reg" method="post" action="auth.php">
            <h3>Авторизация</h3>
            <div class="mb-3">
                <p><?= $errorMsg; ?></p>
                <label for="exampleInputEmail1" class="form-label">Почта</label>
                <input name="email" type="email" value="<?= $email ?>" class="form-control" id="exampleInputEmail1" placeholder="Введите Адрес электронной почты" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" placeholder="Введите пароль" id="exampleInputPassword1">
            </div>
            <button name="button-log" type="submit" class="btn btn-primary">Войти</button>
            <a href="registration.html">Зарегистрироваться</a>
            <div class="form-text1">Если ещё не регистрировались</div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>