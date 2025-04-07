<?php

namespace App\Interfaces\Services\Methods;

interface ToggleCompletedInterface
{
    public function toggleCompleted(string|int $id);
}
