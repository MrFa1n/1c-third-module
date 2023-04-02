<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <h1>Miracle Network</h1>
            </div>
            <nav class="col-5">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>"><i class="las la-home"></i>Домой</a></li>
                    <li>
                        <a href="#">
                            <i class="las la-user"></i>
                            <?php echo $_SESSION['login']; ?>
                        </a>
                        <ul>
                            <li><a href="<?php echo BASE_URL . 'logout.php' ?>">Покинуть конструкт</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>