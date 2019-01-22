<?php

namespace app\models\repositories;


class NewsRepository extends Repository
{
    public function getTableName() : string
    {
        return 'news';
    }

    public function getRecordClass()
    {
        return News::class;
    }
}