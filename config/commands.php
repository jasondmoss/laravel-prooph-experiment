<?php

use App\Roles\Controllers\CreateRoleController;
use App\System\Controllers\AddSystemAdministratorController;
use App\System\Controllers\EditSystemController;
use App\System\Controllers\RegisterSystemController;

return [
    'controller_routes' => [
        'RegisterSystem' => RegisterSystemController::class,
        'EditSystem' => EditSystemController::class,
        'AddSystemAdministrator' => AddSystemAdministratorController::class,
        'CreateSystemRole' => CreateRoleController::class,
    ]
];