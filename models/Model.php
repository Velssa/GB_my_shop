<?php
/**
 * Created by PhpStorm.
 * User: Анастасия
 * Date: 06.01.2019
 * Time: 23:01
 */

namespace models;

use services\Db;

abstract class Model
{
    protected $db;
    protected $tableName;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getOne($id) {
        $sql = 'SELECT * FROM ($this->tableName) WHERE id = {$id}';
        return $this->db->queryOne($sql);
    }

    public function getAll() {
        $sql = 'SELECT * FROM ($this->tableName)';
        return $this->db->queryAll($sql);
    }
}