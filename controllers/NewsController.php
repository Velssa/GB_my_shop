<?php

namespace app\controllers;


class NewsController extends Controller
{
    public function actionNews()
    {
        $news = \app\models\News::getAll();
        echo $this->render("news", ['news' => $news]);
    }
}