<?php

namespace App\Enum;

enum GenderEnum: string
{
    case M = 'M';
    case F = 'F';

    public  static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getLabels(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function getLabelsWithValues(): array
    {
        return array_combine(self::getLabels(), self::getValues());
    }
}
