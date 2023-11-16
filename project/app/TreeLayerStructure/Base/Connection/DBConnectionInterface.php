<?php

namespace App\TreeLayerStructure\Base\Connection;

use Doctrine\DBAL\Connection;

interface DBConnectionInterface
{
    public function getConnection(): Connection;
}
