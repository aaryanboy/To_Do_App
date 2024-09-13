<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todos;

class todosController extends Controller
{
    public function index()
    {
        // Fetch data (like todos) from a database or define logic
        return view('index'); // Assuming you have a 'todos.index' view
    }
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required',
        ]);

        // Create and save the task in the database
        todos::create([
            'title' => $validated['title'],
            'detail' => $validated['detail']
        ]);

        // Redirect the user with a success message
        return redirect()->route('todo.create')->with('success', 'Task added successfully!');
    }

    public function showall()
    {
        $tasks = todos::all(); // Retrieve all tasks from the database
        return view('showall', compact('tasks')); // Return tasks.index view with tasks data
    }

    // Method to display task details
    public function show($id)
    {
        $task = todos::findOrFail($id); // Retrieve the task by ID, or fail if not found
        return view('show', compact('task')); // Return tasks.show view with task data
    }

    // Method to delete a task
    public function destroy($id)
    {
        $task = todos::findOrFail($id); // Find the task by ID
        $task->delete(); // Delete the task

        // Redirect back to the tasks list with a success message
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
