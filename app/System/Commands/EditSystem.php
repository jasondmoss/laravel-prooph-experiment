<?php
namespace App\System\Commands;


use App\System\ValueObjects\SystemId;
use App\System\ValueObjects\SystemName;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

class EditSystem extends Command implements PayloadConstructable{

    use PayloadTrait;

    public static function name(SystemId $system_id, SystemName $system_name)
    {
        return new self([
            'system_id' => $system_id->toString(),
            'name' => $system_name->toString()
        ]);
    }

    public function systemId()
    {
        return SystemId::fromString($this->payload['system_id']);
    }

    public function systemName()
    {
        return SystemName::fromString($this->payload['name']);
    }

}