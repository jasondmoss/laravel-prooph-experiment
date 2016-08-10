<?php
namespace App\System\ValueObjects;

use App\Exceptions\ValidationException;
use ValueObjects\StringLiteral\StringLiteral as StringVO;

class SystemAcronym {

    const MAX_LENGTH = 8;

    protected $acronym;

    public static function fromString($acronym)
    {
        if(strlen($acronym) > self::MAX_LENGTH) {
            throw new \Exception('The acronym may not be greater than '.self::MAX_LENGTH.' characters.');
        }
        return new self(StringVO::fromNative($acronym));
    }

    private function __construct(StringVO $acronym)
    {
        $this->acronym = $acronym;
    }

    public function toString()
    {
        return $this->__toString();
    }

    public function __toString()
    {
        return $this->acronym->toNative();
    }

    public function equals(SystemAcronym $other)
    {
        return $this->toString() === $other->toString();
    }

}