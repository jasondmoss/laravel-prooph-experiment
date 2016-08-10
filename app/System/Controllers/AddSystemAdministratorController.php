<?php
namespace App\System\Controllers;


use App\Core\CommandController;
use App\Core\ControllerPayload;
use App\Http\Controllers\DispatchTrait;
use App\System\Commands\AddSystemAdministrator;
use App\System\ValueObjects\SystemId;
use App\System\ValueObjects\SystemName;
use App\ValueObjects\EDIPNID;
use Illuminate\Http\Response;

class AddSystemAdministratorController implements CommandController {

    use DispatchTrait;

    public function __invoke(ControllerPayload $payload)
    {
        $this->dispatch(AddSystemAdministrator::with(
            SystemId::fromString($payload['system_uuid']),
            EDIPNID::fromString($payload['edipnid']),
            $payload['type']
        ));

        return redirect('systems/'.$payload['system_uuid']);
    }
}