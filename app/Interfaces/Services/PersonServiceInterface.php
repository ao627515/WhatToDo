<?php

namespace App\Interfaces\Services;

use App\Interfaces\Services\Methods\DestroyInterface;
use App\Interfaces\Services\Methods\IndexInterface;
use App\Interfaces\Services\Methods\StoreInterface;
use App\Interfaces\Services\Methods\UpdateInterface;

interface PersonServiceInterface extends IndexInterface, StoreInterface, UpdateInterface, DestroyInterface {}
