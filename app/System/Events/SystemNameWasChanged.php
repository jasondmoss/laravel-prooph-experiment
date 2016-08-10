<?php
namespace App\System\Events;


use App\System\ValueObjects\SystemId;
use App\System\ValueObjects\SystemName;
use Prooph\EventSourcing\AggregateChanged;

class SystemNameWasChanged extends AggregateChanged {

    private $old_name;
    private $new_name;

    public static function with(SystemId $system_id, SystemName $old_name, SystemName $new_name)
    {
        $event = self::occur($system_id->toString(), [
            'old_name' => $old_name->toString(),
            'new_name' => $new_name->toString()
        ]);

        $event->old_name = $old_name;
        $event->new_name = $new_name;

        return $event;
    }
    
    public function newName()
    {
        if (is_null($this->new_name)) {
            $this->new_name = SystemName::fromString($this->payload['new_name']);
        }
        return $this->new_name;
    }

}