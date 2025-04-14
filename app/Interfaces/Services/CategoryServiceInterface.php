<?php

namespace App\Interfaces\Services;

use App\Interfaces\Services\Methods\IndexInterface;
use App\Interfaces\Services\Methods\StoreInterface;
use App\Interfaces\Repositories\Methods\DeleteInterface;
use App\Interfaces\Repositories\Methods\UpdateInterface;
use App\Interfaces\Services\Methods\getNoCategoryCategoryInterface;

interface CategoryServiceInterface extends StoreInterface,
    IndexInterface,
    UpdateInterface,
    DeleteInterface,
    getNoCategoryCategoryInterface {}
