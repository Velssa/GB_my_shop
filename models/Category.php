<?php

namespace models;

class Category extends Model
{
    public $id;
    public $name;
    public $description;

    public function getTableName():string {
        return 'category';
    }
}