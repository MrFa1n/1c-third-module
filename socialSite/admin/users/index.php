<?php
session_start();
include("../../path.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Miracle Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="../../css/admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <!-- header bar -->
    <?php
    include("../../application/include/headerAdmin.php");
    ?>

    <div class="container">
        <?php include("../../application/include/sidebarAdmin.php"); ?>
        <div class="posts col-8">
            <div class="button row">
                <a href="create.php" class="btn btn-secondary col-3">Добавление </a>
                <a href="index.php" class="btn btn-secondary col-2">Управление </a>
            </div>
            <div class="row title-table">
                <h2>Панель пользователей</h2>
                <div class="id col-1">Id</div>
                <div class="title col-4">Логин</div>
                <div class="author col-3">Права</div>
                <div class="edit col-3">Редактировать</div>
                <div class="delete col-1">Удалить</div>
            </div>
            <div class="row">
                <div class="id col-1">1</div>
                <div class="title col-4">Монк</div>
                <div class="author col-3">Author</div>
                <div class="edit col-3">Edit</div>
                <div class="delete col-1">Delete</div>
            </div>
            <div class="row">
                <div class="id col-1">2</div>
                <div class="title col-4">Никола</div>
                <div class="author col-3">Author</div>
                <div class="edit col-3">Edit</div>
                <div class="delete col-1">Delete</div>
            </div>
            <div class="row">
                <div class="id col-1">3</div>
                <div class="title col-4">Ник</div>
                <div class="author col-3">Author</div>
                <div class="edit col-3">Edit</div>
                <div class="delete col-1">Delete</div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include("../../application/include/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>