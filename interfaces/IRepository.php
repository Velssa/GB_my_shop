<?php
/**
 * Created by PhpStorm.
 * User: Анастасия
 * Date: 20.01.2019
 * Time: 22:07
 */

namespace app\interfaces;


interface IRepository
{
    function getOne(int $id);

    function getAll();

    function getTableName(): string;
}