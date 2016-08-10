<?php
namespace App\Roles\Controllers;


use App\Core\CommandController;
use App\Core\ControllerPayload;
use App\Http\Controllers\DispatchTrait;
use App\Roles\Commands\CreateSystemRole;
use App\Roles\ValueObjects\RoleId;
use App\Roles\ValueObjects\RoleName;
use App\System\ValueObjects\SystemId;
use Illuminate\Http\Response;

class CreateRoleController implements CommandController{

    use DispatchTrait;

    /**
     * @param \App\Core\ControllerPayload $payload
     *
     * @return Response
     */
    public function __invoke(ControllerPayload $payload) {
        $this->dispatch(CreateSystemRole::with(
            SystemId::fromString($payload->get('system_uuid')),
            RoleId::fromString($payload->get('role_uuid')),
            RoleName::fromString($payload->get('name'))
        ));

        return redirect('systems/'.$payload->get('system_uuid'));
    }
}