<?php
namespace App\System\Commands\Handlers;


use App\System\Collections\SystemCollection;
use App\System\Commands\AddSystemAdministrator;

class AddSystemAdministratorHandler {

    /**
     * @var \App\System\Collections\SystemCollection
     */
    private $collection;

    public function __construct(SystemCollection $collection)
    {
        $this->collection = $collection;
    }

    public function __invoke(AddSystemAdministrator $command)
    {
        $system = $this->collection->get($command->systemId());
        $system->addAdministrator($command->adminEdipnid(), $command->adminType());
        $this->collection->add($system);
    }

}