<?php

namespace app\traits;


trait TSingltone
{
    private static $instance = null;

    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    public static function getInstance() {
        if(is_null(static::$instance)){
            static::$instance = new static();
        }
        return static::$instance;
    }
}