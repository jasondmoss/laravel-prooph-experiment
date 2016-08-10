<?php
namespace App\ValueObjects;

use Assert\Assertion;
use ValueObjects\Number\Integer as IntegerVO;

class EDIPNID {

    protected $edipnid;

    public static function fromString($edipnid)
    {
        Assertion::length($edipnid, 10);
        return new self(IntegerVO::fromNative($edipnid));
    }

    private function __construct(IntegerVO $edipnid)
    {
        $this->edipnid = $edipnid;
    }

    public function toString()
    {
        return $this->__toString();
    }

    public function __toString()
    {
        return (string) $this->edipnid->toNative();
    }

    public function equals(EDIPNID $other)
    {
        return $this->toString() === $other->toString();
    }
}