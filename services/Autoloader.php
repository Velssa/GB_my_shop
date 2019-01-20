<?php

namespace app\services;

class Autoloader
{
    public function loadClass ($className) {
        $path = str_replace("\\", "/", $className);
        $className = str_replace("app/",
            $_SERVER['DOCUMENT_ROOT'] . "/../",
            $path);
        spl_autoload($className);
    }
}