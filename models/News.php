<?php

namespace models;

class News extends Model
{
    public $id;
    public $name;
    public $description;

    public function getTableName():string {
        return 'news';
    }
}