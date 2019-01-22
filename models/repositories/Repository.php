<?php

namespace app\models\repositories;

use app\interfaces\IRepository;
use app\models\Record;
use app\services\Db;

abstract class Repository implements IRepository
{
    protected $db;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->db = $this->getDb();
    }

    /** @return static */
    public function getOne(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, [":id" => $id], $this->getRecordClass())[0];
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryObject($sql, [], $this->getRecordClass());
    }

    public function delete(Record $record)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $record->id]);
    }

    public function insert(Record $record)
    {
        $tableName = $this->getTableName();

        $params = [];
        $columns = [];

        foreach ($record as $key => $value) {
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

    public function update(Record $record)
    {
        $tableName = $this->getTableName();

        $paramsAll = [];
        $params = [];

        foreach ($record as $key => $value) {
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

    public function save(Record $record)
    {
        if(is_null($record->id)) {
            $this->insert($record);
        }
        $this->update($record);
    }

    protected  function getDb(){
        $db =  Db::getInstance();
        return $db;
    }

    abstract public function getRecordClass();
}