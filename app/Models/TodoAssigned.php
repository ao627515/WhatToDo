<?php

namespace App\Models;

use App\Models\Todo;
use App\Models\User;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;

class TodoAssigned extends Model
{
    protected $table = 'todos_assigned';

    // Puisque notre table pivot a une clé primaire composite personnalisée
    public $incrementing = false;

    // Si vous n'utilisez pas created_at/updated_at
    public $timestamps = false;

    /**
     * La tâche qui est assignée
     */
    public function todo()
    {
        return $this->belongsTo(Todo::class, 'todo_assigned_id');
    }

    /**
     * La personne à qui la tâche est assignée
     */
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_assigned_id');
    }

    /**
     * L'utilisateur qui a fait l'assignation
     */
    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by_id');
    }
}