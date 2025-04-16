<?php

namespace App\Models;

use App\Enum\GenderEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Person extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function casts(): array
    {
        return [
            'birthdate' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'gender' => GenderEnum::class
        ];
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['firstname'] . ' ' . $attributes['lastname'],
        );
    }
}
