<?php

namespace App\Enum;

enum GenderEnum: string
{
    case M = 'M';
    case F = 'F';

    static public function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}