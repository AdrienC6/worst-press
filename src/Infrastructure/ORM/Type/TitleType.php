<?php

namespace App\Infrastructure\ORM\Type;

use App\Domain\ValueObject\PostTitle;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class TitleType extends Type
{
    public const string NAME = 'title';
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'VARCHAR(255)';
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): PostTitle
    {
        return new PostTitle($value);
    }
}