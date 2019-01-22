<?php

namespace app\models\repositories;


class CartRepository extends Repository
{
    public function getTableName() : string
    {
        return '';
    }

    public function getRecordClass()
    {
        return Cart::class;
    }
}