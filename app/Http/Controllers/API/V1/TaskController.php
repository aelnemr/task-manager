<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }
    public function show(Task $task)
    {
        return $task;
    }
    public function store(TaskRequest $request)
    {
        Task::create($request->all());
        $msg = ['Task Made'];
        return $msg;
    }
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        $msg = ['msg' => 'Your Task has been Updated successfully .. @_@'];
        return $msg;
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return 'deleted ..!';
    }
}
