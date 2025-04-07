<?php

namespace App\View\Components;

use App\Models\ToDo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodoItem extends Component
{
    /**
     * @var ToDo[]
     */
    public array $todos;


    /**
     * Create a new component instance.
     */
    public function __construct(
        array $todos = []
    ) {
        $this->todos = $todos;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.todo-item');
    }
}
