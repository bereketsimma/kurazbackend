<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private static $tasks = [
        ['id' => 1, 'title' => 'Buy groceries', 'completed' => false],
        ['id' => 2, 'title' => 'Read a book', 'completed' => true],
    ];

    public function index()
    {
        return response()->json(self::$tasks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $newTask = [
            'id' => count(self::$tasks) + 1,
            'title' => $request->title,
            'completed' => false,
        ];

        self::$tasks[] = $newTask;

        return response()->json($newTask, 201);
    }

    public function update($id)
    {
        foreach (self::$tasks as &$task) {
            if ($task['id'] == $id) {
                $task['completed'] = true;
                return response()->json($task);
            }
        }

        return response()->json(['error' => 'Task not found'], 404);
    }

    public function destroy($id)
    {
        foreach (self::$tasks as $index => $task) {
            if ($task['id'] == $id) {
                unset(self::$tasks[$index]);
                return response()->json(['message' => 'Task deleted']);
            }
        }

        return response()->json(['error' => 'Task not found'], 404);
    }
}
