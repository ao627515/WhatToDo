<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Repositories\Methods\CreateInterface;
use App\Interfaces\Repositories\Methods\GetAllInterface;

interface ToDoRepositoryInterface extends GetAllInterface,
    CreateInterface {}
