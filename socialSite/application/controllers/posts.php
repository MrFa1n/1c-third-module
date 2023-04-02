<?php

include("../../application/database/db.php");
include("../../path.php");

$errorMsg = [];
$id = '';
$title = '';
$content = '';
$topics = '';

$topics = allSelect('categories');
$post = allSelect('posts');
$postAdmin = allSelectPostUsers('posts', 'users');

// для создания постов
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {

    if (!empty($_FILES['path_img']['name'])) {
        $imgName = time() . "-" . $_FILES['path_img']['name'];
        $tmpFile = $_FILES['path_img']['tmp_name'];
        $fileType = $_FILES['path_img']['type'];
        $path = ROOT_PATH . "/images/posts/" . $imgName;

        if (strpos($fileType, 'image') === false) {
            array_push($errorMsg, "Грузи только фото, ты!!");
        }

        $result = move_uploaded_file($tmpFile, $path);

        if ($result) {
            $_POST['path_img'] = $imgName;
        } else {
            array_push($errorMsg, "Загрузка не прошла!");
        }
    } else {
        array_push($errorMsg, "Ошибка получения картинки");
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if ($title === '' || $content === '' || $topic === '') {
        array_push($errorMsg, "Не все поля заполнены");
    } elseif (mb_strlen($title, $encoding = 'UTF8') < 5) {
        array_push($errorMsg, "Пипин - Короткий у поста, подумай ещё над названием, ленивая жопа!");
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'path_img' => $_POST['path_img'],
            'published' => $publish,
            'id_topic' => $topic,
        ];

        $post = insert('posts', $post);

        // printUser($post);
        // exit();


        $topic = oneSelect('posts', ['id' => $id]);


        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
} else {
    $id = '';
    $title = '';
    $content = '';
    $topic = '';
    $publish = '';
}


// для редактирования поста
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    $id = $_GET['id'];
    $post = oneSelect('posts', ['id' => $id]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['publish'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])) {

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    // printUser($_POST);
    // exit();

    if (!empty($_FILES['path_img']['name'])) {
        $imgName = time() . "-" . $_FILES['path_img']['name'];
        $tmpFile = $_FILES['path_img']['tmp_name'];
        $fileType = $_FILES['path_img']['type'];
        $path = ROOT_PATH . "/images/posts/" . $imgName;

        if (strpos($fileType, 'image') === false) {
            array_push($errorMsg, "Грузи только фото, ты!!");
        }

        $result = move_uploaded_file($tmpFile, $path);

        if ($result) {
            $_POST['path_img'] = $imgName;
        } else {
            array_push($errorMsg, "Загрузка не прошла!");
        }
    } else {
        array_push($errorMsg, "Ошибка получения картинки");
    }

    if ($title === '' || $content === '' || $topic === '') {
        array_push($errorMsg, "Не все поля заполнены");
    } elseif (mb_strlen($title, $encoding = 'UTF8') < 5) {
        array_push($errorMsg, "Пипин - Короткий у поста, подумай ещё над названием, ленивая жопа!");
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'path_img' => $_POST['path_img'],
            'published' => $publish,
            'id_topic' => $topic,
        ];


        $post = update('posts', $id, $post);

        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
} else {
    $title = '';
    $content = '';
    $topic = '';
    $publish = isset($_POST['publish']) ? 1 : 0;
}


// для удаления категории
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {

    $id = $_GET['del_id'];
    delete('posts', $id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
}

// обновление/снятие с публикации
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {

    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postUP = update('posts', $id, ['published' => $publish]);

    header('location: ' . BASE_URL . 'admin/posts/index.php');
}



// для получения инофрмации о конктреной категории
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

//     $id = $_GET['id'];
//     $topic = oneSelect('categories', ['id' => $id]);

//     $id = $topic['id'];
//     $name = $topic['name'];
//     $notice = $topic['notice'];
// }
