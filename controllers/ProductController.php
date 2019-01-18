<?php

namespace app\controllers;


class ProductController extends Controller {

    public function actionIndex()
    {
        $product = \app\models\Product::getAll();
        echo $this->render("catalog", ['product' => $product]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = \app\models\Product::getOne($id);
        echo $this->render("card", ['product' => $product]);
    }
}