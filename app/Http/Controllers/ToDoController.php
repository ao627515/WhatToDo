<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToDoRequest;
use App\Http\Requests\UpdateToDoRequest;
use App\Interfaces\Services\ToDoServiceInterface;
use App\Models\ToDo;

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
    public function index()
    {
        $data = $this->toDoService->index();
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
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToDoRequest $request, ToDo $toDo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $toDo)
    {
        $this->toDoService->destroy($toDo->id);
        return to_route('todos.index')->with('success', 'ToDo deleted successfully.');
    }
}
