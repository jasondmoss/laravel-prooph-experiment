<?php
namespace App\Roles\Container;


use Prooph\EventStore\Container\Aggregate\AbstractAggregateRepositoryFactory;

class EventStoreRoleCollectionFactory extends AbstractAggregateRepositoryFactory {


    /**
     * Returns the container identifier
     *
     * @return string
     */
    public function containerId() {
        return 'role_collection';
    }
}