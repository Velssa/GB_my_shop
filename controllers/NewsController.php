<?php

namespace app\controllers;


use app\models\repositories\NewsRepository;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $news = (new NewsRepository())->getAll();
        echo $this->render("news", ['news' => $news]);
    }
}