<?php
namespace App\Roles\Commands;

use App\Roles\ValueObjects\RoleId;
use App\Roles\ValueObjects\RoleName;
use App\System\ValueObjects\SystemId;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

class CreateSystemRole extends Command implements PayloadConstructable {

    use PayloadTrait;

    public static function with(SystemId $system_id, RoleId $role_id, RoleName $role_name) {
        return new self([
            'system_id' => $system_id->toString(),
            'role_id' => $role_id->toString(),
            'name' => $role_name->toString()
        ]);
    }

    /**
     * @return \App\System\ValueObjects\SystemId
     */
    public function systemId()
    {
        return SystemId::fromString($this->payload['system_id']);
    }

    /**
     * @return \App\Roles\ValueObjects\RoleId
     */
    public function roleId()
    {
        return RoleId::fromString($this->payload['role_id']);
    }

    /**
     * @return \App\Roles\ValueObjects\RoleName
     */
    public function roleName()
    {
        return RoleName::fromString($this->payload['name']);
    }
}