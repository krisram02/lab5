<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Priority;
use App\Models\User;


class TaskController extends Controller
{
    public function index()
    {

        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {

        return view('tasks.create', ['priorities' => Priority::all(), 'users' => User::all()]);
    }

    public function show(Task $task)
    {

        return view('tasks.show', [
            'task' => $task
        ]);
    }

    public function store(Request $request)
    {

        $task = new Task();

        $task->name = $request -> name; 
        $task->description = $request -> description;
        $task->priority_id = $request -> priority;
        $task->user_id = $request -> user;


        $task->save();

        return redirect('/tasks');
       
    }

    public function edit(Task $task)
    {

        return view('tasks.edit', ['task'=> $task, 'priorities' 
        => Priority::all(), 'users' => User::all()]);
     
    }

    public function update(Task $task, Request $request)
    {

        
        $task->name = $request -> name; 
        $task->description = $request -> description;
        $task->priority_id = $request -> priority;
        $task->user_id = $request -> user;

        $task->save();

        return redirect('/tasks');
    }

    public function complete(Task $task)
    {
        $task->completed = true; 
        $task->save();
        return redirect('/tasks'); 
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks');
    }

    
}
