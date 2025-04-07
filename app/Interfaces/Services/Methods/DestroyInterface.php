<?php

namespace App\Interfaces\Services\Methods;

use Illuminate\Database\Eloquent\Model;

interface DestroyInterface
{
    public function destroy(int $id);
}
