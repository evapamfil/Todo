<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        return view('tasks');
    }

    public function create(Task $task, Request $request)
    {
        $task->name = $request->name;
        $task->save();

        return redirect('/tasks');
    }

    public function delete(Task $task, Request $request)
    {

        $task->find($request->id)->delete();

        return redirect('/tasks');
    }

    public function get(Task $task) {
        $tasks = $task->paginate(10);

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

}
