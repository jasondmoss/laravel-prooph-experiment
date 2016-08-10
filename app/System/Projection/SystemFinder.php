<?php namespace App\System\Projection;

use App\Core\ReadModel;
use App\Roles\Projection\RoleFinder;

final class SystemFinder extends ReadModel
{
    protected $table = 'rm_systems';

    public function admins()
    {
        return $this->hasMany(SystemAdmin::class, 'system_uuid', 'uuid');
    }

    public function roles()
    {
        return $this->hasMany(RoleFinder::class, 'system_uuid', 'uuid');
    }
}