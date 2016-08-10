<?php
namespace App\System\Commands;


use App\System\ValueObjects\SystemAcronym;
use App\System\ValueObjects\SystemId;
use App\System\ValueObjects\SystemName;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

class RegisterSystem extends Command implements PayloadConstructable {

    use PayloadTrait;

    /**
     * @param $system_id
     * @param $system_acronym
     * @param $system_name
     *
     * @return \App\System\Commands\Handlers\RegisterSystemHandler
     */
    public static function with($system_id, $system_acronym, $system_name)
    {
        return new self([
            'system_id'         => (string) $system_id,
            'system_acronym'    => (string) $system_acronym,
            'system_name'       => (string) $system_name
        ]);
    }

    public function systemId()
    {
        return SystemId::fromString($this->payload['system_id']);
    }

    public function systemName()
    {
        return SystemName::fromString($this->payload['system_name']);
    }

    public function systemAcronym()
    {
        return SystemAcronym::fromString($this->payload['system_acronym']);
    }
}