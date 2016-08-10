<?php
namespace App\System\Events;


use App\System\ValueObjects\SystemAcronym;
use App\System\ValueObjects\SystemId;
use App\System\ValueObjects\SystemName;
use Prooph\EventSourcing\AggregateChanged;

class SystemWasRegistered extends AggregateChanged {

    private $system_id;
    private $acronym;
    private $name;

    public static function withAcronymAndName(SystemId $system_id, SystemAcronym $acronym, SystemName $name)
    {
        $event = self::occur($system_id->toString(), [
            'acronym' => $acronym->toString(),
            'name' => $name->toString(),
        ]);

        $event->system_id = $system_id;
        $event->acronym = $acronym;
        $event->name = $name;

        return $event;
    }

    /**
     * @return SystemId
     */
    public function systemId()
    {
        if (is_null($this->system_id)) {
            $this->system_id = SystemId::fromString($this->aggregateId());
        }
        return $this->system_id;
    }

    public function acronym()
    {
        if (is_null($this->acronym)) {
            $this->acronym = SystemAcronym::fromString($this->payload['acronym']);
        }
        return $this->acronym;
    }

    public function name()
    {
        if (is_null($this->name)) {
            $this->name = SystemName::fromString($this->payload['name']);
        }
        return $this->name;
    }
}