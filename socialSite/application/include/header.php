<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <h1>Miracle Network</h1>
            </div>
            <nav class="col-5">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>"><i class="las la-home"></i>Домой</a></li>
                    <li><a href="<?php echo BASE_URL . 'information.php' ?>"><i class="las la-newspaper"></i>Информация</a></li>
                    <li>
                        <?php if (isset($_SESSION['id'])) : ?>
                            <a href="#">
                                <i class="las la-user"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <ul>
                                <?php if ($_SESSION['admin']) : ?>
                                    <li><a href="<?php echo BASE_URL . 'admin/posts/index.php' ?>">Панель конструкта</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo BASE_URL . 'logout.php' ?>">Покинуть конструкт</a></li>
                            </ul>
                        <?php else : ?>
                            <a href="<?php echo BASE_URL . 'auth.php'; ?>">
                                <i class="las la-user"></i>
                                Личный конструкт
                            </a>
                            <ul>
                                <li><a href="<?php echo BASE_URL . 'registration.php'; ?>">Зарегистрировать конструкта</a></li>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>