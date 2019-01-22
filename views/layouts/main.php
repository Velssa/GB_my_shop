<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/style.css" rel="stylesheet">
    <title>Интернет-магазин PHP2</title>
</head>
<body>
<div class="header">
    <p>Корзина: (<span id="cart-count"><?= \app\models\Cart::countItems()
            // TODO Реализовать вывод счетчика товара в корзине
            ?></span>)</p>
</div>
<div class="container">
    <?=$content?>
</div>
<div class="footer">
</div>
<script src="/js/jquery-3.3.1.js"></script>
<!--<script src="/js/main.js"></script>-->
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            let id = $(this).attr("data-id");
            $.post("/cart/add?id="+id, {}, function (data) {
                $("#1cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>
