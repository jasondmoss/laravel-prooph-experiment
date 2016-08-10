<?php namespace App\System\Container;

use Prooph\EventStore\Container\Aggregate\AbstractAggregateRepositoryFactory;

final class EventStoreSystemCollectionFactory extends AbstractAggregateRepositoryFactory {


    /**
     * Returns the container identifier
     *
     * @return string
     */
    public function containerId() {
        return 'system_collection';
    }
}