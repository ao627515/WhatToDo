<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToDoRequest;
use App\Http\Requests\UpdateToDoRequest;
use App\Interfaces\Services\ToDoServiceInterface;
use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    private ToDoServiceInterface $toDoService;

    public function __construct(ToDoServiceInterface $toDoService)
    {
        $this->toDoService = $toDoService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $validatedData =  $request->validate([
            'query' => 'nullable|string',
            'status' => 'nullable|in:completed,in-progress,all'
        ]);


        $data = $this->toDoService->index($validatedData);

        return view('pages.todos.todos-index', $data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToDoRequest $request)
    {
        $validatedData = $request->validated();
        $this->toDoService->store($validatedData);
        return to_route('todos.index')->with('success', 'ToDo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToDoRequest $request, int $todo)
    {
        $validatedData = $request->validated();
        $this->toDoService->update($todo, $validatedData);
        return to_route('todos.index')->with('success', 'ToDo created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $todo)
    {
        // dd($todo);
        $this->toDoService->destroy($todo->id);
        return to_route('todos.index')->with('success', 'ToDo deleted successfully.');
    }

    public function toggleCompleted(int|string $todo)
    {
        $this->toDoService->toggleCompleted($todo);
        return to_route('todos.index')->with('success', 'ToDo updated successfully.');
    }
}
