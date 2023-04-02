<?php
include("path.php");
include("application/database/db.php");
$post = allSelectPostAuthorOne('posts', 'users', $_GET['post']);
error_reporting(0);
include("application/controllers/topics.php");
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
    <!-- news block -->
    <div class="container">
        <div class="content row">
            <div class="main-content_one col-sm-8">
                <h3><?php echo $post['title']; ?></h3>
                <div class="singel_news row">
                    <div class="img col-12" style="display: flex; justify-content: center; border: 1px solid; align-items: center; flex-direction: column;">
                        <div class="imgBlock">
                            <img src="<?= BASE_URL . 'images/posts/' . $post['path_img'] ?>" class="img-thumbnail" alt="<?= $post['title'] ?>">
                            <!-- <img src="./images/img4.jpg" class="img-thumbnail" alt=""> -->
                        </div>
                    </div>
                    <div class="single_news_text col-12">
                        <i class="las la-user-circle"><?= $post['us_name']; ?></i>
                        <i class="las la-calendar-week"><?= $post['created']; ?></i>
                        <p class="introduction">
                            <?= $post['content']; ?>
                        </p>
                        <?php
                        include("application/include/comment.php");
                        ?>
                    </div>
                </div>
            </div>
            <div class="sidebar col-md-4">
                <div class="par search">
                    <h3>Исследования материалов</h3>
                    <form action="/" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Введите пост, который вас интересует">
                    </form>
                </div>
                <div class="par top">
                    <h3>Разделы</h3>
                    <ul>
                        <?php foreach ($topics as $key => $topic) : ?>
                            <li><a href="#"><?= $topic['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php
    include("application/include/footer.php");
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>