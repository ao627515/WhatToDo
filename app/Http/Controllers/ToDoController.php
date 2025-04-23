<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Services\CategorySerivce;
use App\Http\Requests\StoreToDoRequest;
use App\Http\Requests\UpdateToDoRequest;
use App\Interfaces\Services\ToDoServiceInterface;
use App\Interfaces\Services\PersonServiceInterface;
use App\Interfaces\Services\CategoryServiceInterface;

class ToDoController extends Controller
{
    private ToDoServiceInterface $toDoService;
    private CategoryServiceInterface $categoryService;
    private PersonServiceInterface $personService;

    public function __construct(
        ToDoServiceInterface $toDoService,
        CategoryServiceInterface $categoryService,
        PersonServiceInterface $personService


    ) {
        $this->toDoService = $toDoService;
        $this->categoryService = $categoryService;
        $this->personService = $personService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $validatedData =  $request->validate([
            'query' => 'nullable|string',
            'status' => 'nullable|in:completed,in-progress,all',
            'category' => 'nullable|integer|exists:categories,id',
        ]);


        $todos = $this->toDoService->index($validatedData);

        $todosFiltersQuery = [
            'query' => $validatedData['query'] ?? '',
            'status' => $validatedData['status'] ?? 'all',
            'category' => $validatedData['category'] ?? null,
        ];

        return view('pages.todos.todos-index', [
            'todos' => $todos,
            'todosFiltersQuery' => $todosFiltersQuery,
            'categories' => $this->categoryService->index()
        ]);
    }

    public function create()
    {
        return view('pages.todos.todos-create', [
            'categories' => $this->categoryService->index(),
        ]);
    }


    public function edit(int $todo)
    {
        $todo = $this->toDoService->show($todo);
        return view('pages.todos.todos-edit', [
            'todo' => $todo,
            'categories' => $this->categoryService->index(),
        ]);
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
    public function show(Todo $todo)
    {
        return view('pages.todos.todos-show', [
            'todo' => $todo,
            'people' => $this->personService->index(),
            'peopleAssigned' => $todo->assignedPeople,
            'peopleAssignedIds' => $todo->assignedPeople->pluck('id')->toArray(),
        ]);
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
    public function destroy(Todo $todo)
    {
        // dd($todo);
        $this->toDoService->destroy($todo->id);
        return to_route('todos.index')->with('success', 'ToDo deleted successfully.');
    }

    public function toggleCompleted(int|string $todo)
    {
        $this->toDoService->toggleCompleted($todo);
        return redirect()->back()->with('success', 'ToDo updated successfully.');
    }

    public function assignToPeople(int|string $todo, Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'people' => 'required|array',
            'people.*' => 'integer|exists:people,id',
        ]);
        $this->toDoService->assignToPeople($todo, $validatedData['people']);
        return redirect()->back()->with('success', 'ToDo updated successfully.');
    }
}
