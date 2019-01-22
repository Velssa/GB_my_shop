<?php

include '../config/main.php';
include '../vendor/autoload.php';


$request = new \app\services\Request();
$controllerName = $request->getControllerName() ?: DEFAULT_CONTROLLER;
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    $controller = new $controllerClass(
        new \app\services\renderers\TemplateRenderer()
    );
    $controller->runAction($actionName);
}