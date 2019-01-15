<?php

namespace app\interfaces;

interface IModel
{
    function getOne($id);

    function getAll();

    function getTableName():string ;

}