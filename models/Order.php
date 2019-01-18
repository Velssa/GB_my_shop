<?php

namespace app\models;


class Order extends Record
{
    public $id;
    public $user_id;
    public $product_id;
    public $quantity;
    public $total_price;

    public static function getTableName():string {
        return 'order';
    }
}