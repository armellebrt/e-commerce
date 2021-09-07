<?php

namespace Application\Model\Framework;

use PDO;
use Exception;

abstract class AbstractResourceModel extends AbstractDb
{
    const TABLE_NAME = '';
    const CREATE_FIELDS = [];
    const UPDATE_FIELDS = [];

    public function deleteById($id)
    {
        $table = static::TABLE_NAME;
        $connection = $this->getConnection();
        $connection->query("DELETE FROM {$table} WHERE id=" . $id);
    }

    public function getAll(): array
    {
        $table = static::TABLE_NAME;
        $entities = [];
        $connection = $this->getConnection();
        $res = $connection->query("SELECT * FROM {$table}");
        while ($entity = $res->fetch(PDO::FETCH_ASSOC)) {
            $entities[] = $entity;
        }
        return $entities;
    }

    public function getById($id)
    {
        $entityName = static::TABLE_NAME;
        $entityData = $this->getByColumnsValues(
            ['id' => $id]
        );

        if (empty($entityData)) {
            throw new \Exception('The' . $entityName . '  with id ' . $id . ' does not exists');
        }

        return $entityData[0];
    }

    public function getByColumnsValues(array $fields): array
    {
        $table = static::TABLE_NAME;
        $connection = $this->getConnection();
        $where = '';
        $i = 0;

        foreach ($fields as $field => $value) {
            if ($i > 0) {
                $where .= ' AND ';
            }

            $where .= $field . '="' . $value . '"';
            $i++;
        }

        return $connection->query("SELECT * FROM {$table} WHERE {$where}")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($entity)
    {
        $connection = $this->getConnection();

        $table = static::TABLE_NAME;
        $fields = implode(",", static::CREATE_FIELDS);
        $values = '';

        for ($i = 0; $i < count(static::CREATE_FIELDS); $i++) {
            $field = static::CREATE_FIELDS[$i];
            $values .= "'" . $entity->getData($field) . "'";

            if ($i < count(static::CREATE_FIELDS) - 1) {
                $values .= ',';
            }
        }

        $connection->query("INSERT INTO {$table} ({$fields}) VALUES ({$values})");
    }

    public function update($entity)
    {
        $connection = $this->getConnection();

        $table = static::TABLE_NAME;
        $fields = '';

        for ($i = 0; $i < count(static::UPDATE_FIELDS); $i++) {
            $field = static::UPDATE_FIELDS[$i];
            $value = ' = "' . $entity->getData($field) . '"';


            if ($i < count(static::UPDATE_FIELDS) - 1) {
                $value .= ',';
            }

            $fields .= $field . $value;
        }

        $connection->query("UPDATE {$table} SET {$fields} WHERE id =" . $entity->getId());
    }

    public function isExists($field, $value)
    {
        $entityData = $this->getByColumnsValues(
            [$field => $value]
        );

        if (empty($entityData)) {
            return false;
        } else {
            return true;
        }
    }
}
