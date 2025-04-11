<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
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

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function strStatus(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['completed'] ? 'completed' : 'in-progress'
        );
    }
}
