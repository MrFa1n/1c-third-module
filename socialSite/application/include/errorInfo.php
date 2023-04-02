<?php if(count($errorMsg)>0):?>
    <?php foreach($errorMsg as $error): ?>
        <li><?= $error; ?></li>
    <?php endforeach; ?>
<?php endif; ?>