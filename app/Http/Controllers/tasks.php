<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Validator;

class tasks extends Controller
{
    function index() {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    function newTask(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
              return redirect('/')
              ->withInput()
              ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

    function delete(Task $task) {
        $task->delete();

        return redirect('/');
    }

    function edit($id){
        $task = Task::find($id);
        return view('edit')->with('task',$task);
    }

    function update(Request $request, $id){
        $task = Task::find($id);
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

}
