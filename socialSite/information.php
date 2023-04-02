<?php
include("path.php");
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
            <div class="main-content col-12 col-sm-8">
                <h3>Мы молодые разработчики написавшие социальную сеть в 2077 году</h3>
                <div class="news row">
                    <div class="img col-12">
                        <img src="./images/img4.jpg" class="img-thumbnail" alt="">
                    </div>
                    <div class="single_news_text col-12">
                        <p class="introduction"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis
                            nam
                            incidunt nobis dignissimos nulla est suscipit officia aspernatur vel, earum enim veniam ex
                            tempora unde! Magni, velit! Tempore, voluptatum ab.
                        </p>
                    </div>
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