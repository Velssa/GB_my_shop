<?php

require 'ProductDescription.php';
require 'ProductPrice.php';

class Product
{
    public $id;
    public $title;
    public $description;
    public $price;


    public function __construct($id = null)
    {
        $this->id = $id;
        $this->title = $this->productOne();
        $this->description = new ProductDescription();
        $this->price = new ProductPrice();
    }

    public function productOne() {
        $this->title = 'Product Name';
        return $this->title;
    }

}