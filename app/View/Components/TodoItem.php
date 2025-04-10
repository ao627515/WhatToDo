<?php

namespace App\View\Components;

use App\Models\Todo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodoItem extends Component
{
    /**
     * @var ToDo
     */
    public Todo $todo;


    /**
     * Create a new component instance.
     */
    public function __construct(
        Todo $todo
    ) {
        $this->todo = $todo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.todo-item');
    }
}
