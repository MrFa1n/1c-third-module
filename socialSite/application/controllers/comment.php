<?php
include("../../application/database/db.php");
include("../../path.php");
$page = $_GET['post'];

$email = '';
$comment = '';
$errormsg = [];
$status = 0;
$comments = [];

// код для создания комментариев
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clickComment'])) {

    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);

    if ($email === '' || $comment === '') {
        array_push($errorMsg, "Не все поля заполнены");
    } elseif (mb_strlen($comment, $encoding = 'UTF8') < 5) {
        array_push($errorMsg, "Пипин - Короткий у комментария, подумай ещё над комментарием, ленивая жопа, это важно для всех!");
    } else {
        $user = oneSelect('users', ['email' => $email]);
        if ($user['email'] == $email) {
            $status = 1;
        }
        $comment = [
            'status' => $status,
            'page' => $page,
            'email' => $email,
            'comment' => $comment,
        ];

        $comment = insert('comments', $comment);
        $comments = allSelect('comments', ['page' => $page, 'status' => 1]);

        // printUser($post);
        // exit();


        // $topic = oneSelect('posts', ['id' => $id]);


        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
} else {
    $email = '';
    $comment = '';
    $comments = allSelect('comments', ['page' => $page, 'status' => 1]);
}

// для удаления комментария
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {

    $id = $_GET['del_id'];
    delete('comments', $id);

    header('location: ' . BASE_URL . 'admin/comments/index.php');
}

// обновление/снятие с комментария статуса видимости
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {

    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postUP = update('comments', $id, ['status' => $publish]);

    header('location: ' . BASE_URL . 'admin/comments/index.php');
    // exit();
}
