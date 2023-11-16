<?php

namespace App\TreeLayerStructure\Base\Service;

use Illuminate\Support\Collection;

abstract class ServiceClass
{
    public function transformToEntity(array $fetchedData, string $entityClassName): Collection
    {
        $entities = collect();
        dd($entities, new Collection());

        foreach ($fetchedData as $fetchedDatum){
            $entities->add(new $entityClassName(...$fetchedDatum));
        }

        return $entities;
    }
}
