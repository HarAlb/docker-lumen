<?php

namespace App\TreeLayerStructure\Base\Storage;

use App\TreeLayerStructure\Base\Connection\DBConnectionInterface;

final class StorageService implements StorageServiceInterface
{
    public function __construct(private DBConnectionInterface $connection)
    {}

    public function getUsersList(): array
    {
        $stmt = $this->connection->getConnection()->executeQuery(
            "SELECT id,name,surname,email,created_at,updated_at FROM users"
        );

        return  $stmt->fetchAllAssociative();
    }

    public function getDBConnection(): DBConnectionInterface
    {
        return $this->connection;
    }
}
