<?php

include '../config/main.php';
require_once '../services/Autoloader.php';

spl_autoload_register([new Autoloader(), 'loadClass']);

use app\models\Product;

//$product = (new Product())->getOne(5);
//$product->delete();
//
//echo "<br><br>";
//
//$product = Product::getOne(8);
//$product->name = "Плед";
//
//$product->save();

//$product = new Product();
//$product->name = "Шапка-ушанка";
//$product->description = "Брендовая шапка ушанка на все случаи жизни";
//$product->price = "500";
//$product->category_id = "1";
//$product->vendor_id = "1";
//
//$product->save();
//
//var_dump($product->getAll());

$controllerName = $_GET['c'] ?: DEFAULT_CONTROLLER;
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}