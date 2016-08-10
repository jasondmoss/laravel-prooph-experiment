<?php
namespace App\System\Repositories;


use App\System\Collections\SystemCollection;
use App\System\Entities\System;
use App\System\ValueObjects\SystemId;
use Prooph\EventStore\Aggregate\AggregateRepository;
use Prooph\EventStore\Aggregate\AggregateType;

class EventStoreSystemCollection extends AggregateRepository implements SystemCollection {

    /**
     * @param \App\System\Entities\System $system
     */
    public function add(System $system)
    {
        $this->addAggregateRoot($system);
    }

    /**
     *
     * @param \App\System\ValueObjects\SystemId $system_id
     *
     * @return \App\System\Entities\System
     */
    public function get(SystemId $system_id)
    {
        return $this->getAggregateRoot($system_id->toString());
    }
}