<?php

namespace App\Models;

use App\Database\DB;
use App\Observers\BaseObserver;

/**
 * Summary of Model
 */
abstract class Model
{
    protected static $tableName;
    protected $observers = [];

    protected function getDB()
    {
        return DB::instance();
    }


    protected function observer(BaseObserver $observer)
    {
        $this->observers[] = $observer;
    }
    protected function notify($data)
    {
        /** @var BaseObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update(static::$tableName, $data['action'], $data['row_id']);
        }
    }

    public function insert(array $fields)
    {

        $columns = "(" . implode(',', array_map(function ($column) {
            return "$column";
        }, array_keys($fields))) . ")";
        $values = "(" . implode(',', array_map(function ($column) {
            return ":$column";
        }, array_keys($fields))) . ")";

        $query = "INSERT INTO " . static::$tableName . " " . $columns . " values " . $values;

        $result = DB::getInstance()->insert($query, $fields);

        if ($result) {
            $this->notify(['row_id' => $result, 'action' => 'insert']);
        }

        return $result;
    }

    public function update(array $fields, $id)
    {
        $fieldsToUpdate = implode(",", array_map(function ($column) {
            return "$column = :$column";
        }, array_keys($fields)));

        $query = "UPDATE " . static::$tableName . " SET " . $fieldsToUpdate . " WHERE id = :id";

        $result = DB::getInstance()->update($query, [...$fields, 'id' => $id]);

        if ($result) {
            $this->notify(['row_id' => $id, 'action' => 'update']);
        }
        return $result;
    }


    public function safeDelete($id)
    {
        $query = "UPDATE " . static::$tableName . " SET is_deleted = true WHERE id = :id";

        $result = DB::getInstance()->update($query, ['id' => $id]);

        if ($result) {
            $this->notify(['row_id' => $id, 'action' => 'delete']);
        }
        return $result;
    }


    public function select(?array $fields = null, ?string $condition = null, ?array $conditionParams = null, ?string $groupBy = null, ?string $orderBy = null, ?int $limit = null, ?int $offset = null)
    {
        $columns = $fields ? implode(',', $fields) : "*";

        $query = "SELECT $columns FROM " . static::$tableName;

        if ($condition) {
            $query .= " WHERE  $condition";
        }

        if ($groupBy) {
            $query .= " GROUP BY  $groupBy";
        }

        if ($orderBy) {
            $query .= " ORDER By  $orderBy";
        }

        if ($limit) {
            $query .= " limit  $limit";
        }

        if ($offset) {
            $query .= " offset  $offset";
        }

        return DB::getInstance()->select($query, $conditionParams);
    }


    public function find($id)
    {
        return $this->selectFirst(condition: 'id=:id and is_deleted=false', conditionParams: ['id' => $id]);
    }
    public function selectFirst(?array $fields = null, ?string $condition = null, ?array $conditionParams = null, ?string $orderBy = null)
    {
        $columns = $fields ? implode(',', $fields) : "*";

        $query = "SELECT $columns FROM " . static::$tableName;

        if ($condition) {
            $query .= " WHERE  $condition";
        }

        if ($orderBy) {
            $query .= " ORDER By  $orderBy";
        }

        $query .= " limit 1 ";

        $data = DB::getInstance()->select($query, $conditionParams);

        return $data ? $data[0] : null;
    }

    public static function table()
    {
        return static::$tableName;
    }

    public function count(?string $condition = null, ?array $conditionParams = null)
    {
        return $this->selectFirst(["count(*) as count"], $condition, $conditionParams)['count'];
    }


}