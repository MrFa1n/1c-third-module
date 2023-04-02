<?php
include("application/controllers/comment.php");
?>

<link rel="stylesheet" href="css/style3.css">

<div class="single_news_text col-12">
    <div class="col comment">
        <h4>Написать комментарий</h4>
        <form action="<?= BASE_URL . "one.php?post=$page" ?>" method="post">
            <input type="hidden" name="page" value="<?= $page; ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email адрес</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Жду твой комментарий</label>
                <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col">
                <button type="submit" name="clickComment" class="btn btn-secondary">Отправить комментарий</button>
            </div>
        </form>
        <div class="all-comments">
            <?php if (count($comments) > 0) : ?>
                <h5>Комментарии к публикации</h5>
                <?php foreach ($comments as $comment) : ?>
                    <div class="col-12 one-comment">
                        <span>
                            <?= $comment['email'] ?>
                        </span>
                        <span>
                            <?= $comment['created'] ?>
                        </span>
                    </div>
                    <div class="col-12 text">
                        <?= $comment['comment'] ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>