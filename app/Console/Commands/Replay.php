<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Prooph\EventStore\EventStore;
use Prooph\EventStore\Stream\StreamName;
use Prooph\EventStoreBusBridge\EventPublisher;
use Prooph\ServiceBus\EventBus;

class Replay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:replay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Replay events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \DB::table('rm_systems')->truncate();
        \DB::table('rm_system_admins')->truncate();
        \DB::table('rm_roles')->truncate();

        /** @var EventStore $event_store */
        $event_store = app(EventStore::class);

        /** @var EventBus $event_bus */
        $event_bus = app(EventBus::class);

        $messages = $event_store->replay([
            new StreamName('event_stream')
        ]);
        foreach ($messages as $message) {
            $event_bus->dispatch($message);
        }

        return $this->info('Done');
    }
}
