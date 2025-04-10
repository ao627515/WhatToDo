<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Repositories\Methods\CreateInterface;
use App\Interfaces\Repositories\Methods\GetAllInterface;
use App\Interfaces\Repositories\Methods\GetByIdInterface;
use App\Interfaces\Repositories\Methods\UpdateInterface;

interface CategoryRepositoryInterface extends CreateInterface, GetAllInterface, UpdateInterface, GetByIdInterface {}
