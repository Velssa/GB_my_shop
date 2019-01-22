<?php

namespace app\models;

class Cart extends Record
{
    public $id;
    public $name;
    public $data;
    public $description;

    public function addProduct($id) {

        $productsInCart = [];

        session_start();
        if (isset($_SESSION['cart'])) {
            $productsInCart = $_SESSION['cart'];
        }
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        } else {
            $productsInCart[$id] = 1;
        }
        $_SESSION['cart'] = $productsInCart;

    }

    public function delProduct($id) {

        session_start();
        $productsInCart = $_SESSION['cart'];

        if (array_key_exists($id, $productsInCart)) {
            unset($productsInCart[$id]);
        }

        $_SESSION['cart'] = $productsInCart;
    }

    public static function getProducts()
    {
        session_start();
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }
        return false;
    }

    public static function countItems()
    {
        $productsInCart = self::getProducts();
        if ($productsInCart) {
            $count = 0;
            foreach ($productsInCart as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();
        $productsSumm = array_sum($productsInCart);
var_dump($productsSumm);
        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }
}