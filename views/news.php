<?php /** @var \app\models\Product $product */ ?>
<div class="news">
    <?php foreach ($news as $value): ?>
        <div class="news-item">
            <h1><?= $value["name"] ?></h1>
            <p><?= $value["description"] ?></p>
            <p><?= $value["data"] ?></p>
        </div>
    <?php endforeach; ?>
</div>