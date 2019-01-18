<?php

namespace app\models;

class News extends Record
{
    public $id;
    public $name;
    public $data;
    public $description;


    public static function getTableName():string {
        return 'news';
    }
}