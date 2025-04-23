<?php

namespace App\Interfaces\Services;

use App\Interfaces\Services\Methods\AssignToPeopleInterface;
use App\Interfaces\Services\Methods\DestroyInterface;
use App\Interfaces\Services\Methods\IndexInterface;
use App\Interfaces\Services\Methods\ShowInterface;
use App\Interfaces\Services\Methods\StoreInterface;
use App\Interfaces\Services\Methods\ToggleCompletedInterface;
use App\Interfaces\Services\Methods\UpdateInterface;

interface ToDoServiceInterface extends
    IndexInterface,
    StoreInterface,
    DestroyInterface,
    ShowInterface,
    UpdateInterface,
    ToggleCompletedInterface,
    AssignToPeopleInterface {}
