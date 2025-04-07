<?php

namespace App\Interfaces\Services;

use App\Interfaces\Services\Methods\DestroyInterface;
use App\Interfaces\Services\Methods\IndexInterface;
use App\Interfaces\Services\Methods\ShowInterface;
use App\Interfaces\Services\Methods\StoreInterface;

interface ToDoServiceInterface extends
    IndexInterface,
    StoreInterface,
    DestroyInterface,
    ShowInterface {}
