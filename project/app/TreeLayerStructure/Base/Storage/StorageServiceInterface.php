<?php

namespace App\TreeLayerStructure\Base\Storage;

use App\TreeLayerStructure\Base\Connection\DBConnectionInterface;

interface StorageServiceInterface
{
    public function getDBConnection(): DBConnectionInterface;

    public function getUsersList(): array;
}
