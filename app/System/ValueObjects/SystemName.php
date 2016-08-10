<?php
namespace App\System\ValueObjects;

use ValueObjects\StringLiteral\StringLiteral as StringVO;

class SystemName {

    /**
     * @var \ValueObjects\StringLiteral\String
     */
    private $system_name;

    public static function fromString($system_name)
    {
        return new self(StringVO::fromNative($system_name));
    }

    private function __construct(StringVO $system_name)
    {
        $this->system_name = $system_name;
    }

    public function toString()
    {
        return $this->__toString();
    }

    public function __toString()
    {
        return $this->system_name->toNative();
    }
    
    public function equals(SystemName $other)
    {
        return $this->toString() === $other->toString();
    }
}