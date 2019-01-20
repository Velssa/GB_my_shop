<?php

include '../config/main.php';
include '../vendor/autoload.php';

$controllerName = $_GET['c'] ?: DEFAULT_CONTROLLER;
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    $controller = new $controllerClass(
        new \app\services\renderers\TwigRenderer()
    );
    $controller->runAction($actionName);
}