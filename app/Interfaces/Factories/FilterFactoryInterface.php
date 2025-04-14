<?php

namespace App\Interfaces\Factories;

interface FilterFactoryInterface
{
    public static function build(array $data): array;
}
