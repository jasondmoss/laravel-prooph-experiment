<?php
namespace App\System\Events;


use App\System\ValueObjects\SystemId;
use App\ValueObjects\EDIPNID;
use Prooph\EventSourcing\AggregateChanged;

class SystemAdministratorWasAdded extends AggregateChanged {

    private $system_id;
    private $admin_edipnid;
    private $type;

    public static function with(SystemId $system_id, EDIPNID $admin_edipnid, $type)
    {
        $event = self::occur($system_id->toString(), [
            'admin_edipnid' => $admin_edipnid->toString(),
            'type' => $type,
        ]);

        $event->admin_edipnid = $admin_edipnid;
        $event->type = $type;

        return $event;
    }

    public function adminEdipnid()
    {
        if (is_null($this->admin_edipnid)) {
            $this->admin_edipnid = EDIPNID::fromString($this->payload['admin_edipnid']);
        }
        return $this->admin_edipnid;
    }
    
    public function adminType()
    {
        if (is_null($this->type)) {
            $this->type = $this->payload['type'];
        }
        return $this->type;
    }

}