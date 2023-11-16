<?php

namespace App\TreeLayerStructure\Entities\User;

use App\TreeLayerStructure\Base\Service\ServiceClass;
use App\TreeLayerStructure\Base\Storage\StorageServiceInterface;
use Illuminate\Support\Collection;

final class UserService extends ServiceClass
{
    public function __construct(private StorageServiceInterface $storageService)
    {
    }

    public function getList (): Collection {
        $users = $this->storageService->getUsersList();

        return $this->transformToEntity($users, UserEntity::class);
    }
}
