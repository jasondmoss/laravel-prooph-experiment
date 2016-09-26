<?php
namespace App\Http\Controllers;

use App\Core\CommandController;
use App\Core\ControllerPayload;
use App\Http\Requests\MailboxRequest;
use App\Roles\Controllers\CreateRoleController;
use App\System\Controllers\AddSystemAdministratorController;
use App\System\Controllers\EditSystemController;
use App\System\Controllers\RegisterSystemController;
use Assert\Assertion;

class MailboxController extends Controller {

    public function recieve(MailboxRequest $request)
    {
        $command = studly_case($request->get('command'));
        $payload = $this->gatherPayload($request->all());

        $controller = collect(config('commands.controller_routes'))
            ->get($command);

        if($controller) {
            return $this->execute($controller, $payload);
        }

        throw new \Exception("Invalid command provided [$command]");
    }

    private function execute($controller, $payload) {
        $class = app($controller);
        Assertion::isInstanceOf($class, CommandController::class, 'Controller must implement the '.CommandController::class.' interface.');
        return $class(new ControllerPayload($payload));
    }

    private function gatherPayload($payload_array) {
        if(collect($payload_array)->contains('payload')) {
            return $payload_array['payload'];
        }
        return collect($payload_array)->except(['command', '_token'])->toArray();
    }

}