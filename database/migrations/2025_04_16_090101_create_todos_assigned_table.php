<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos_assigned', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->foreignId('todo_assigned_id')->constrained('todos')->cascadeOnDelete();
            $table->foreignId('person_assigned_id')->constrained('people')->cascadeOnDelete();
            $table->foreignId('assigned_by_id')->constrained('users')->cascadeOnDelete();
            $table->primary(['todo_assigned_id', 'person_assigned_id', 'assigned_by_id']);
            $table->timestamp('assigned_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_assigned');
    }
};