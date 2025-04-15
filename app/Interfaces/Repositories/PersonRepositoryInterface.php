<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Repositories\Methods\CreateInterface;
use App\Interfaces\Repositories\Methods\QueryInterface;

interface PersonRepositoryInterface extends QueryInterface, CreateInterface {}
