<?php
namespace app\models;


class Manufacturer extends Record
{
    public $id;
    public $name;
    public $description;

    public static function getTableName():string {
        return 'manufacturer';
    }
}