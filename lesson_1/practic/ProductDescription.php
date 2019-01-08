<?php

class ProductDescription extends Product
{
    public $description;

    public function __construct()
    {
        $this->description = $this->whiteDescription();
    }

    public function whiteDescription() {
        $this->description = 'Product Description';
        return $this->description;
    }
}