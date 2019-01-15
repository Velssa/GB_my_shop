<?php

require_once '../services/Autoloader.php';

spl_autoload_register([new Autoloader(), 'loadClass']);

use app\models\Product;

//$product = (new Product())->getOne(5);
//$product->delete();

echo "<br><br>";

$product = (new Product())->getOne(8);
$product->name = "Пледище";
$product->description = "";
$product->price = "3500";
$product->category_id = "1";
$product->vendor_id = "1";

$product->update();

//var_dump($product->getOne(8));