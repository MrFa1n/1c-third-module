<?php
include("application/database/db.php");

$errorMsg = '';

function userAuth($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['us_name'];
    $_SESSION['admin'] = $user['admin'];

    if ($_SESSION['admin']) {
        header('location' . BASE_URL . 'admin/posts/index.php');
    } else {
        header('location: ' . BASE_URL);
    }
}


// для регистрации
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $admin = '0';
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $age = trim($_POST['age']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if ($login === '' || $email === '' || $passF === '') {
        $errorMsg = 'Не все поля заполнены';
    } elseif (mb_strlen($login, $encoding = 'UTF8') < 2) {
        $errorMsg = 'Пипин - Короткий';
    } elseif ($passF !== $passS) {
        $errorMsg = 'Пароли не идентичны. Ты ошибся - ошибка!';
    } else {

        $check = oneSelect('users', ['email' => $email]);
        if (!empty($check['email']) && $check['email'] === $email) {
            $errorMsg = "Данная почта уже используется, попробуйте воспользоваться другим почтовым адресом!";
        } else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'us_name' => $login,
                'email' => $email,
                'age' => $age,
                'password' => $pass
            ];

            $id = insert('users', $post);

            // $errorMsg = "Пользователь $login успешно зарегистрировался!";

            $user = oneSelect('users', ['id' => $id]);

            userAuth($user);
        }
    }
} else {
    $login = '';
    $email = '';
    $age = '';
}

// авторизация
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if ($email === '' || $pass === '') {
        $errorMsg = 'Не все поля заполнены';
    } else {
        $check = oneSelect('users', ['email' => $email]);
        if ($check && password_verify($pass, $check['password'])) {
            userAuth($check);
        } else {
            $errorMsg = "Почта или пароль введены неверно!";
        }
    }
} else {
    $email = '';
}
