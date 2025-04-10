<?php

namespace App\Interfaces\Services;

use App\Interfaces\Repositories\Methods\UpdateInterface;
use App\Interfaces\Services\Methods\IndexInterface;
use App\Interfaces\Services\Methods\StoreInterface;

interface CategoryServiceInterface extends StoreInterface, IndexInterface, UpdateInterface {}
