<?php
namespace app\models;


class Manufacturer extends Model
{
    public $id;
    public $name;
    public $description;

    public function getTableName():string {
        return 'manufacturer';
    }
}