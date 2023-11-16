<?php

namespace App\TreeLayerStructure\Base\Connection;

use App\TreeLayerStructure\Base\DTOs\DBConnectionDTO;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Illuminate\Support\Collection;

final class DBConnection implements DBConnectionInterface
{
    private Connection $connection;

    public function __construct()
    {
        $this->connection = DriverManager::getConnection(
            (new DBConnectionDTO())
                ->toArray()
        );
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }

    /**
     * @param string $table
     * @param iterable $data
     * @return void
     * @throws \Exception
     */
    public function insertMultiple(string $table, iterable $data)
    {
        if (!isset($data[0])) {
            throw new \Exception("\$data must be iterable");
        }

        $insertInto = "INSERT INTO $table";
        $keys = array_keys($data[0]);
        $params = '(' . str_repeat('?,', count($data[0]) - 1) . '?),';
        $params = str_repeat($params, count($data));
        $set = '(';
        foreach ($keys as $key) {
            $set .= "`$key`,";
        }
        $params = trim($params, ',');
        $insertInto .= " " . trim($set, ',') . ")";
        $insertInto .= " VALUES " . $params;
        $insertInto = trim($insertInto, ',');
        $newData = [];
        foreach ($data as $datum) {
            $newData = [
                ...$newData,
                ...array_values($datum)
            ];
        }
        return $this->connection->executeStatement($insertInto, $newData);
    }
}
