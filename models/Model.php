<?php

namespace models;

use interfaces\IDb;
use interfaces\IModel;

abstract class Model implements IModel
{
    protected $db;

    public function __construct(IDb $db)
    {
        $this->db = $db;
    }

    public function getOne(int $id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }
}