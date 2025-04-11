<?php

namespace App\Enum;

enum TodoStatusEnum: string
{
    case IN_PROGRESS = 'in-progress';
    case COMPLETED = 'completed';
}
