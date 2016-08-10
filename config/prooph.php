<?php
/**
 * prooph (http://getprooph.org/)
 *
 * @see       https://github.com/prooph/laravel-package for the canonical source repository
 * @copyright Copyright (c) 2016 prooph software GmbH (http://prooph-software.com/)
 * @license   https://github.com/prooph/laravel-package/blob/master/LICENSE.md New BSD License
 */
// default example configuration for prooph components, see http://getprooph.org/

return [
    'event_store' => [
        'adapter' => [
            'type' => \Prooph\EventStore\Adapter\Doctrine\DoctrineEventStoreAdapter::class,
            'options' => [
                'connection_alias' => 'doctrine.connection.default',
            ],
        ],
        'plugins' => [
            \Prooph\EventStoreBusBridge\EventPublisher::class,
            \Prooph\EventStoreBusBridge\TransactionManager::class,
            \Prooph\Snapshotter\SnapshotPlugin::class,

        ],
        // list of aggregate repositories
        'system_collection' => [
            'repository_class' => App\System\Repositories\EventStoreSystemCollection::class,
            'aggregate_type' => \App\System\Entities\System::class,
            'aggregate_translator' => \Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator::class,
//            'snapshot_store' => \Prooph\EventStore\Snapshot\SnapshotStore::class,
        ],
        'role_collection' => [
            'repository_class' => App\Roles\Repositories\EventStoreRoleCollection::class,
            'aggregate_type' => \App\Roles\Entities\Role::class,
            'aggregate_translator' => \Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator::class,
//            'snapshot_store' => \Prooph\EventStore\Snapshot\SnapshotStore::class,
        ],
    ],
    'service_bus' => [
        'command_bus' => [
            'router' => [
                'routes' => [
                    \Prooph\Snapshotter\TakeSnapshot::class => \Prooph\Snapshotter\Snapshotter::class,
                    \App\System\Commands\RegisterSystem::class => \App\System\Commands\Handlers\RegisterSystemHandler::class,
                    \App\System\Commands\EditSystem::class => \App\System\Commands\Handlers\EditSystemHandler::class,
                    \App\System\Commands\AddSystemAdministrator::class => \App\System\Commands\Handlers\AddSystemAdministratorHandler::class,
                    \App\Roles\Commands\CreateSystemRole::class => \App\Roles\Commands\Handlers\CreateSystemRoleHandler::class,
                ],
            ],
        ],
        'event_bus' => [
            'plugins' => [
                \Prooph\ServiceBus\Plugin\InvokeStrategy\OnEventStrategy::class
            ],
            'router' => [
                'routes' => [
                    // list of events with a list of projectors
                    \App\System\Events\SystemWasRegistered::class => [
                        \App\System\Projection\SystemProjector::class
                    ],
                    \App\System\Events\SystemNameWasChanged::class => [
                        \App\System\Projection\SystemProjector::class
                    ],
                    \App\System\Events\SystemAdministratorWasAdded::class => [
                        \App\System\Projection\SystemProjector::class
                    ],
                    \App\Roles\Events\RoleWasCreated::class => [
                        \App\Roles\Projection\RoleProjector::class
                    ]
                ],
            ],
        ],
    ],
    'snapshot_store' => [
        'adapter' => [
            'type' => \Prooph\EventStore\Snapshot\Adapter\Doctrine\DoctrineSnapshotAdapter::class,
            'options' => [
                'connection_alias' => 'doctrine.connection.default',
                'snapshot_table_map' => [
                    // list of aggregate root => table (default is snapshot)
                    \App\System\Entities\System::class => 'system_snapshot'
                ]
            ]
        ]
    ],
    'snapshotter' => [
        'version_step' => 1000000, // every 5 events a snapshot
        'aggregate_repositories' => [
            // list of aggregate root => aggregate repositories
        ]
    ],
];
