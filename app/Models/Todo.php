<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\TodoAssigned;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Todo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'completed',
        'created_by',
        'category_id'
    ];

    public function casts(): array
    {
        return [
            'completed' => 'boolean',
            'end_date' => 'date',
            'start_date' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',

        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['completed'] ? 'completed' : 'in-progress'
        );
    }


    /**
     * Relation avec les personnes assignées à cette tâche via la table pivot
     */
    public function assignedPeople()
    {
        return $this->belongsToMany(
            Person::class,
            'todos_assigned',
            'todo_assigned_id',
            'person_assigned_id'
        )
            ->as('todoAssigned')
            ->withPivot('assigned_at')
            ->using(TodoAssigned::class);
        // ->withPivot('assigned_at');
    }

    /**
     * Accès direct à toutes les assignations de cette tâche
     */
    public function assignments()
    {
        return $this->hasMany(TodoAssigned::class, 'todo_assigned_id');
    }
}
