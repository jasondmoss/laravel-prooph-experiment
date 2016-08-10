<?php
namespace App\System\Commands\Handlers;


use App\System\Collections\SystemCollection;
use App\System\Commands\EditSystem;

class EditSystemHandler {

    /**
     * @var \App\System\Collections\SystemCollection
     */
    private $system_collection;

    public function __construct(SystemCollection $system_collection)
    {
        $this->system_collection = $system_collection;
    }

    public function __invoke(EditSystem $command)
    {
        $system = $this->system_collection->get($command->systemId());
        $system->changeSystemName($command->systemName());

        $this->system_collection->add($system);
    }
}