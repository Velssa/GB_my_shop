<?php

class ProductPrice extends Product
{
    public $price;

    public function __construct()
    {
        $this->price = $this->whitePrice();
    }

    public function whitePrice() {
        $this->price = 'Product Price';
        return $this->price;
    }
}