<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Automation;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    //
    public function run(string $slug)
    {
        $task = Task::where('slug', $slug)->firstOrFail();

        return response()->json($task);
    }
}
