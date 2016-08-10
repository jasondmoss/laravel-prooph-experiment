<?php
namespace App\Roles\ValueObjects;

use ValueObjects\StringLiteral\StringLiteral as StringVO;

class RoleName {

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
        return (string) $this->system_name->toNative();
    }

    public function equals(RoleName $other)
    {
        return $this->toString() === $other->toString();
    }

}