<?php

namespace app\controllers;


use app\models\Cart;
use app\services\Request;

class CartController extends Controller
{

    protected $productsInCart;

    public function actionIndex()
    {
        $productsInCart = (new Cart())->getProducts();
        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
        }
        echo $this->render("cart", ['cart' => $productsIds, 'counts' => $productsInCart]);
    }

    public function actionAdd() {
        $id = (new Request())->getParams()['id'];
        echo Cart::addProduct($id);
        return true;
    }

    public function actionDel() {
        $id = (new Request())->getParams()['id'];
        echo Cart::delProduct($id);
        return true;
    }

}