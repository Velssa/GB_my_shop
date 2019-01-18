<?php /** @var \app\models\Product $product */ ?>
<div class="catalog">
    <?php foreach ($product as $value): ?>
    <div class="cat-product">
        <h1><?= $value["name"] ?></h1>
        <p><?= $value["description"] ?></p>
        <p>$ <?= $value["price"] ?></p>
    </div>
<?php endforeach; ?>
</div>