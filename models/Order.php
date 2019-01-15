<?php

namespace app\models;


class Order extends Model
{
    public $id;
    public $user_id;
    public $product_id;
    public $quantity;
    public $total_price;

    public function getTableName():string {
        return 'order';
    }
}