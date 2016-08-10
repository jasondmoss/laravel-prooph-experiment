<?php
namespace App\Roles\Commands\Handlers;


use App\Roles\Collections\RoleCollection;
use App\Roles\Commands\CreateSystemRole;
use App\Roles\Entities\Role;

class CreateSystemRoleHandler {

    /**
     * @var \App\Roles\Collections\RoleCollection
     */
    private $collection;

    public function __construct(RoleCollection $collection)
    {
        $this->collection = $collection;
    }

    public function __invoke(CreateSystemRole $command)
    {
        $role = Role::create($command->systemId(), $command->roleId(), $command->roleName());
        $this->collection->add($role);
    }

}