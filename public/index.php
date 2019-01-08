<?php

require_once '../services/Autoloader.php';

spl_autoload_register([new Autoloader(), 'loadClass']);

use models\Product;

$product = new Product();
var_dump($product);

echo "<br><br>";
