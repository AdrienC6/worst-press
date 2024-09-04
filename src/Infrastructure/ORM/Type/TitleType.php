<?php

namespace App\Infrastructure\ORM\Type;

use App\Domain\ValueObject\PostTitle;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class TitleType extends Type
{
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'VARCHAR(255)';
    }

    public function getName(): string
    {
        return 'title';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): PostTitle
    {
        return new PostTitle($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        /** @var PostTitle $value */
        return $value->getValue();
    }
}