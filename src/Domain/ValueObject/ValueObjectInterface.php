<?php

namespace App\Domain\ValueObject;

interface ValueObjectInterface
{
    public function getValue(): mixed;
}