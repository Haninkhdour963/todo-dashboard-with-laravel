<?php

// app/Http/Controllers/Admin/TaskController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure that only authenticated users can access the admin area
    }

    // Show all tasks (index method)
    public function index()
    {
        $tasks = Task::all(); // Fetch all tasks from the database
        return view('admin.tasks.index', compact('tasks'));
    }

    // Show form to create a new task
    public function create()
    {
        return view('admin.tasks.create');
    }

    // Store a newly created task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create($request->all());
        return redirect()->route('admin.tasks.index')->with('success', 'Task created successfully');
    }

    // Show a specific task by ID
    public function show($id)
    {
        $task = Task::findOrFail($id); // Retrieve task by ID
        return view('admin.tasks.index', compact('task')); // Pass task to view
    }

    // Show form to edit an existing task
    public function edit(Task $task)
    {
        return view('admin.tasks.edit', compact('task'));
    }

    // Update an existing task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'required|boolean',
        ]);

        $task->update($request->all());
        return redirect()->route('admin.tasks.index')->with('success', 'Task updated successfully');
    }

    // Delete a task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted successfully');
    }
}
