<?php
namespace App\System\Commands;


use App\System\ValueObjects\SystemId;
use App\ValueObjects\EDIPNID;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

class AddSystemAdministrator extends Command implements PayloadConstructable{

    use PayloadTrait;

    public static function with(SystemId $system_id, EDIPNID $edipnid, $admin_type)
    {
        return new self([
            'system_id' => $system_id->toString(),
            'admin_edipnid' => $edipnid->toString(),
            'type' => $admin_type,
        ]);
    }

    public function systemId()
    {
        return SystemId::fromString($this->payload['system_id']);
    }

    public function adminEdipnid()
    {
        return Edipnid::fromString($this->payload['admin_edipnid']);
    }

    public function adminType()
    {
        return $this->payload['type'];
    }

}