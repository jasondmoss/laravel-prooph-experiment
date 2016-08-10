<?php
namespace App\System\Controllers;


use App\Core\CommandController;
use App\Core\ControllerPayload;
use App\Http\Controllers\DispatchTrait;
use App\System\Commands\EditSystem;
use App\System\ValueObjects\SystemId;
use App\System\ValueObjects\SystemName;

class EditSystemController implements CommandController {

    use DispatchTrait;

    public function __invoke(ControllerPayload $payload)
    {
        $this->dispatch(EditSystem::name(
            SystemId::fromString($payload->get('uuid')),
            SystemName::fromString($payload->get('name'))
        ));

        return redirect()->to('systems/'.$payload->get('uuid'));
    }

}