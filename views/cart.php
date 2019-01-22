<div class="cart">
    <?php foreach ($cart as $value) :
        $products = (new \app\models\repositories\ProductRepository())->getOne($value); ?>
        <div class="cart-row">
            <div class="cart-name"><p><?= $products->name; ?></p></div>
            <div class="cart-price"><p>$ <?= $products->price; ?></p></div>
            <div class="cart-count"><p><?= current($counts); ?></p></div>
            <div class="cart-close"><p>X</p></div>
        </div>
        <?php
        next($counts);
    endforeach; ?>

</div>