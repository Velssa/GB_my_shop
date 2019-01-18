<?php

namespace app\models;

class Category extends Record
{
    public $id;
    public $name;
    public $description;

    public static function getTableName():string {
        return 'category';
    }
}