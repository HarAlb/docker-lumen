<?php

namespace App\TreeLayerStructure\Base\Providers;

use App\TreeLayerStructure\Base\Storage\StorageService;
use App\TreeLayerStructure\Base\Storage\StorageServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

final class StorageServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(StorageServiceInterface::class, StorageService::class);
    }
}
