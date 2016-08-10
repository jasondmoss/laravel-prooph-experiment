<?php
namespace App\Roles\Events;


use App\Roles\ValueObjects\RoleId;
use App\Roles\ValueObjects\RoleName;
use App\System\ValueObjects\SystemId;
use Prooph\EventSourcing\AggregateChanged;

class RoleWasCreated extends AggregateChanged{

    private $role_name;
    private $system_id;

    public static function with(SystemId $system_id, RoleId $role_id, RoleName $role_name) {
        $event = self::occur($role_id->toString(), [
            'system_id' => $system_id->toString(),
            'role_name' => $role_name->toString()
        ]);
        $event->role_name = $role_name;
        $event->system_id = $system_id;

        return $event;
    }

    public function roleName()
    {
        if (is_null($this->role_name)) {
            $this->role_name = RoleName::fromString($this->payload['role_name']);
        }
        return $this->role_name;
    }

    public function systemId()
    {
        if (is_null($this->system_id)) {
            $this->system_id = SystemId::fromString($this->payload['system_id']);
        }
        return $this->system_id;
    }
}