<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;

class TaskApiController extends Controller
{
    //
    public function store(TaskStoreRequest $request)
    {
        if(!$request->validated()){
            session()->flash('error', 'Task could not be created!');
            return redirect()->back()->withErrors($request);
        }

        $task = $request->user()->tasks()->create($request->all());

        session()->flash('message.type', 'Task created successfully!');

        return redirect()->route('tasks.show', $task);
    }
}
