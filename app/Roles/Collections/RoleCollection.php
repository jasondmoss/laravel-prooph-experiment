<?php
namespace App\Roles\Collections;


use App\Roles\Entities\Role;
use App\Roles\ValueObjects\RoleId;

interface RoleCollection {
    public function add(Role $role);
    public function get(RoleId $role);
}