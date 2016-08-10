<?php
namespace App\Roles\Entities;


use App\Roles\Events\RoleWasCreated;
use App\Roles\ValueObjects\RoleId;
use App\Roles\ValueObjects\RoleName;
use App\System\ValueObjects\SystemId;
use Prooph\EventSourcing\AggregateRoot;

class Role extends AggregateRoot{

    /**
     * @var RoleId
     */
    private $role_id;

    /**
     * @var SystemId
     */
    private $system_id;

    /**
     * @var RoleName
     */
    private $name;


    public static function create(SystemId $system_id, RoleId $role_id, RoleName $role_name)
    {
        $self = new self;
        $self->recordThat(
            RoleWasCreated::with($system_id, $role_id, $role_name)
        );
        return $self;
    }

    protected function whenRoleWasCreated(RoleWasCreated $event) {
        $this->role_id = RoleId::fromString($event->aggregateId());
        $this->system_id = $event->systemId();
        $this->name = $event->roleName();
    }

    /**
     * @return string representation of the unique identifier of the aggregate root
     */
    protected function aggregateId() {
        return $this->role_id->toString();
    }
}