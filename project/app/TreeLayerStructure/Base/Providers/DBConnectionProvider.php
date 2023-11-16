<?php

namespace App\TreeLayerStructure\Base\Providers;

use App\TreeLayerStructure\Base\Connection\DBConnection;
use App\TreeLayerStructure\Base\Connection\DBConnectionInterface;
use Illuminate\Support\ServiceProvider;

final class DBConnectionProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DBConnectionInterface::class, DBConnection::class);
    }
}
