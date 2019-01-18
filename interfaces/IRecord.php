<?php

namespace app\interfaces;

interface IRecord
{
    static function getOne($id);

    static function getAll();

    static function getTableName():string ;

}