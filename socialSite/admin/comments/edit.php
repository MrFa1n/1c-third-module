<?php
// session_start();
include("../../application/controllers/comment.php");
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
                <a href="create.php" class="btn btn-secondary col-3">Добавление постов</a>
                <a href="index.php" class="btn btn-secondary col-2">Управление постами</a>
            </div>
            <div class="row title-table">
                <h2>Добавление поста</h2>
            </div>
            <div class="row add-post">
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <?php include("../../application/include/errorInfo.php"); ?>
                    <input name="id" value="<?= $id; ?>" type="hidden">
                    <p>Приколист</p>
                    <div class="col">
                        <input value="<?= $post['title']; ?>" name="title" class="form-control form-control-lg" id="floatingInputValue" placeholder="Заголовок">
                    </div>
                    <div class="form-floating">
                        <textarea name="content" class="form-control" placeholder="Leave a comment here" id="editor" style="height:100px"><?= $post['content']; ?></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input name="path_img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Загрузка</label>
                    </div>
                    <select name="topic" class="form-select" aria-label="Пример выбора по умолчанию">
                        <!-- <option selected>Выберете категорию</option> -->
                        <?php foreach ($topics as $key => $topic) : ?>
                            <option value="<?= $topic['id'] ?>"><?= $topic['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="col-auto">
                        <?php if (empty($publish) && $publish == 0) : ?>
                            <label for="publish">Подтверди для публикации</label>
                            <input type="checkbox" name="publish">
                        <?php else : ?>
                            <label for="publish">Подтверди для публикации</label>
                            <input type="checkbox" name="publish" checked>
                        <?php endif; ?>
                    </div>
                    <div class="col-auto">
                        <button name="edit_post" type="submit" class="btn btn-primary mb-3">Опубликовать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include("../../application/include/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="../../javascript/script.js"></script>
</body>

</html>