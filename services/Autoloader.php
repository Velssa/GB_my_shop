<?php

class Autoloader
{
    public function loadClass ($className) {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . strtolower(str_replace('\\', '/', $className));
        spl_autoload($path);
    }
}