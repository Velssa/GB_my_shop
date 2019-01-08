<?php

namespace models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $vendor_id;

    protected $tableName = 'products';
}