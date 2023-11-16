<?php

declare(strict_types=1);

namespace App\TreeLayerStructure\Base\DTOs;

use Illuminate\Contracts\Support\Arrayable;

final class DBConnectionDTO implements Arrayable
{
    private string $database;
    private string $user;
    private string $password;
    private string $host;
    private string $driver;

    public function __construct()
    {
        $this->database = env('DB_DATABASE');
        $this->user = env('DB_USERNAME');
        $this->password = env('DB_PASSWORD');
        $this->host = env('DB_HOST');
        $this->driver = $this->transformDriver(env('DB_CONNECTION'));
    }

    private function transformDriver(string $driver): string
    {
        return "pdo_" . $driver;
    }

    public function toArray()
    {
        return [
            'dbname' => $this->database,
            'user' => $this->user,
            'password' => $this->password,
            'host' => $this->host,
            'driver' => $this->driver,
        ];
    }
}
