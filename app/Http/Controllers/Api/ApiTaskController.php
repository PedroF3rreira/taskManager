<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class ApiTaskController extends Controller
{
    /**
     * *
     * @return json 
     */
    public function getAllTasks()
    {
        $tasks = Task::all()->toJson(JSON_PRETTY_PRINT);

        return response($tasks, 200);
    }

    public function getTask(Task $task)
    {
        return response($task->toJson(), 200);
    }
}
