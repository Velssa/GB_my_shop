<?php

namespace app\models;

use app\interfaces\IRecord;
use app\services\Db;

abstract class Record implements IRecord
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    /** @return static */
    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [":id" => $id], get_called_class())[0];
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $this->id]);
    }

    public function insert()
    {
        $tableName = static::getTableName();

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($key == 'db' || $key == 'id') {
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastInsetId();
    }

    public function update()
    {
        $tableName = static::getTableName();

        $paramsAll = [];
        $params = [];

        foreach ($this as $key => $value) {
            if ($key == 'db' || $key == 'id') {
                continue;
            }

            $paramsAll[] = "{$key} = :{$key}";
            $params[":{$key}"] = $value;
        }

        $placeholders = implode(", ", $paramsAll);
        $id = [":id" => $this->id];
        $result = array_merge($id, $params);


        $sql = "UPDATE {$tableName} SET {$placeholders} WHERE id = :id";
        return $this->db->execute($sql, $result);

    }

    public function save()
    {
        if($this->id == null) {
            $this->insert();
        }

        $this->update();
    }
}