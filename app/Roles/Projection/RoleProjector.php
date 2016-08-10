<?php
namespace App\Roles\Projection;


use App\Roles\Events\RoleWasCreated;

final class RoleProjector {

    public function onRoleWasCreated(RoleWasCreated $event)
    {
        \DB::table('rm_roles')->insert([
            'uuid' => $event->aggregateId(),
            'name' => $event->roleName(),
            'system_uuid' => $event->systemId()
        ]);
    }
    
}