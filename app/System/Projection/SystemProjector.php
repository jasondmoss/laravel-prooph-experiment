<?php
namespace App\System\Projection;


use App\System\Events\SystemAdministratorWasAdded;
use App\System\Events\SystemNameWasChanged;
use App\System\Events\SystemWasRegistered;

final class SystemProjector {
    
    public function onSystemWasRegistered(SystemWasRegistered $event)
    {
        \DB::table('rm_systems')->insert([
            'uuid' => $event->systemId(),
            'acronym' => $event->acronym(),
            'name' => $event->name()
        ]);
    }
    
    public function onSystemNameWasChanged(SystemNameWasChanged $event)
    {
        \DB::table('rm_systems')
            ->where('uuid', $event->aggregateId())
            ->update([
                'name' => $event->newName()->toString()
            ]);
    }
    
    public function onSystemAdministratorWasAdded(SystemAdministratorWasAdded $event)
    {
        \DB::table('rm_system_admins')->insert([
            'system_uuid' => $event->aggregateId(),
            'edipnid' => $event->adminEdipnid()->toString(),
            'type' => $event->adminType()
        ]);
    }

}