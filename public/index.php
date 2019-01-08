<?php

require_once '../services/Autoloader.php';

spl_autoload_register([new Autoloader(), 'loadClass']);

$product = new \models\Product();
var_dump($product);

echo "<br><br>";

$user = new \models\User();
var_dump($user);