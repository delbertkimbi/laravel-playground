<?php

namespace App\Http\Controllers;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Request;



class TaskController extends Controller
{
    public function index(){
        //return  response()->json(Task::all()); 
        return new TaskCollection(Task::all());
    }
    public function show(Request $request, Task $task){
        return new TaskResource($task);
    }
    public function store(Request $request){
        $validator=$request->validate([
            'title'=> 'required|max:255',
        ]);
        $task =Task::create($validator);
        return new TaskResource($task);
    }
}
