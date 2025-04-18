<?php

namespace App\Models;

use App\Models\Todo;
use App\Enum\GenderEnum;
use App\Models\TodoAssigned;
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

    /**
     * Relation avec les tâches assignées à cette personne via la table pivot
     */
    public function assignedTodos()
    {
        return $this->belongsToMany(Todo::class, 'todos_assigned', 'person_assigned_id', 'todo_assigned_id')
            // ->withPivot(['assigned_by', 'assigned_at'])
            ->using(TodoAssigned::class);
    }

    /**
     * Accès direct à toutes les assignations pour cette personne
     */
    public function assignments()
    {
        return $this->hasMany(TodoAssigned::class, 'person_assigned_id');
    }
}
