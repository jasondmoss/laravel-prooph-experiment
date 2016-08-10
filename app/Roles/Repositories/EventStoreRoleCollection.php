<?php
namespace App\Roles\Repositories;


use App\Roles\Collections\RoleCollection;
use App\Roles\Entities\Role;
use App\Roles\ValueObjects\RoleId;
use Prooph\EventStore\Aggregate\AggregateRepository;

class EventStoreRoleCollection extends AggregateRepository implements RoleCollection {

    public function add(Role $role)
    {
        $this->addAggregateRoot($role);
    }

    public function get(RoleId $role_id)
    {
        return $this->getAggregateRoot($role_id->toString());
    }
}