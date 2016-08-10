<?php
namespace App\Roles\ValueObjects;

use Rhumsaa\Uuid\Uuid;

class RoleId {
    /**
     * @var \Rhumsaa\Uuid\Uuid
     */
    private $uuid;

    public static function generate()
    {
        return new self(Uuid::uuid4());
    }

    public static function fromString($uuid)
    {
        return new self(Uuid::fromString($uuid));
    }

    private function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    public function toString()
    {
        return $this->__toString();
    }

    public function __toString()
    {
        return $this->uuid->toString();
    }

    public function equals(RoleId $other)
    {
        return $this->toString() === $other->toString();
    }

}