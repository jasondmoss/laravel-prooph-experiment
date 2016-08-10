<?php namespace App\System\Controllers;

use App\Core\CommandController;
use App\Core\ControllerPayload;
use App\Exceptions\ValidationException;
use App\Http\Controllers\DispatchTrait;
use App\System\Commands\RegisterSystem;
use App\System\ValueObjects\SystemAcronym;
use App\System\ValueObjects\SystemId;
use App\System\ValueObjects\SystemName;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Prooph\ServiceBus\CommandBus;

class RegisterSystemController implements CommandController{

    use DispatchTrait;

    public function __invoke(ControllerPayload $payload)
    {
//        $validator = validator($payload, [
//            'acronym' => 'required|max:5',
//            'name' => 'required',
//        ]);
//        if($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }

        $this->dispatch(RegisterSystem::with(
            SystemId::fromString($payload['uuid']),
            SystemAcronym::fromString($payload['acronym']),
            SystemName::fromString($payload['name'])
        ));

        return redirect()->to('systems');
    }
    
}