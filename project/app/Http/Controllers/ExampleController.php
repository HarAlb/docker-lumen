<?php

namespace App\Http\Controllers;

use App\TreeLayerStructure\Entities\User\UserService;

class ExampleController
{
    public function handler(UserService $service)
    {
        return $service->getList();
    }
}
