<?php

include("../../application/database/db.php");

$errorMsg = "";
$id = '';
$name = '';
$notice = '';
$topics = allSelect('categories');

// printUser($topics);
// exit();

// для создания категории
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topics-create'])) {
    // printUser($_POST);
    // exit();

    $name = trim($_POST['name']);
    $notice = trim($_POST['notice']);


    if ($name === '' || $notice === '') {
        $errorMsg = 'Не все поля заполнены';
    } elseif (mb_strlen($name, $encoding = 'UTF8') < 2) {
        $errorMsg = 'Пипин - Короткий в категории';
    } else {

        $check = oneSelect('categories', ['name' => $name]);
        if ($check['name'] === $name) {
            $errorMsg = "Категория с таким названием уже существует!";
        } else {
            $topic = [
                'name' => $name,
                'notice' => $notice
            ];

            $id = insert('categories', $topic);

            $topic = oneSelect('categories', ['id' => $id]);

            header('location: ' . BASE_URL . 'admin/topics/index.php');
        }
    }
} else {
    $name = '';
    $notice = '';
}
// для получения инофрмации о конктреной категории
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // printUser($_GET);
    // exit();

    $id = $_GET['id'];
    $topic = oneSelect('categories', ['id' => $id]);

    // printUser($topic);
    // exit();

    $id = $topic['id'];
    $name = $topic['name'];
    $notice = $topic['notice'];
}

// для редактирования категории
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topics-edit'])) {
    // printUser($_POST);
    // exit();

    $name = trim($_POST['name']);
    $notice = trim($_POST['notice']);


    if ($name === '' || $notice === '') {
        $errorMsg = 'Не все поля заполнены';
    } elseif (mb_strlen($name, $encoding = 'UTF8') < 2) {
        $errorMsg = 'Пипин - Короткий в категории';
    } else {

        $check = oneSelect('categories', ['name' => $name]);
        if ($check['name'] === $name) {
            $errorMsg = "Категория с таким названием уже существует!";
        } else {
            $topic = [
                'name' => $name,
                'notice' => $notice
            ];

            $id = $_POST['id'];

            $topic_id = update('categories', $id, $topic);

            header('location: ' . BASE_URL . 'admin/topics/index.php');
        }
    }
}

// 
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topics-create'])) {
//     // printUser($_POST);
//     // exit();

//     $name = trim($_POST['name']);
//     $notice = trim($_POST['notice']);


//     if ($name === '' || $notice === '') {
//         $errorMsg = 'Не все поля заполнены';
//     } elseif (mb_strlen($name, $encoding = 'UTF8') < 2) {
//         $errorMsg = 'Пипин - Короткий в категории';
//     } else {

//         $topic = [
//             'name' => $name,
//             'notice' => $notice
//         ];

//         $id = $_POST['id'];

//         $topic_id = update('categories', $id, $topic);

//         header('location: ' . BASE_URL . 'admin/topics/index.php');
//     }
// }

// для удаления категории
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {

    $id = $_GET['del_id'];
    delete('categories', $id);
    header('location: ' . BASE_URL . 'admin/topics/index.php');
    // $topic = oneSelect('categories', ['id' => $id]);

    // $id = $topic['id'];
    // $name = $topic['name'];
    // $notice = $topic['notice'];
}
