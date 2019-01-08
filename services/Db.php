<?php
namespace services;

use interfaces\IDb;

class Db implements IDb
{
    public function queryOne(string $sql, array $params = [])
    {
        return [];
    }

    public function queryAll(string $sql, array $params = [])
    {
        return [];
    }
}