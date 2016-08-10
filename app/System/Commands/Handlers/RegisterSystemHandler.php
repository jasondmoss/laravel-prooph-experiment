<?php
namespace App\System\Commands\Handlers;


use App\System\Collections\SystemCollection;
use App\System\Commands\RegisterSystem;
use App\System\Entities\System;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

class RegisterSystemHandler {

    /**
     * @var \App\System\Collections\SystemCollection
     */
    private $system_collection;

    public function __construct(SystemCollection $system_collection)
    {
        $this->system_collection = $system_collection;
    }
    
    public function __invoke(RegisterSystem $command)
    {
        $system = System::registerWithAcronymAndName($command->systemId(), $command->systemAcronym(), $command->systemName());

        $this->system_collection->add($system);
    }

}
