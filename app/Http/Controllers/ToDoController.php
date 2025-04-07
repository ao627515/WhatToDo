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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToDoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDo $toDo)
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
        //
    }
}
