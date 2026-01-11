<?php
namespace App\Http\Controllers;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller {
    public function index(): JsonResponse {
        return response()->json(Task::all(),200);
    }
    public function store(TaskRequest $request): JsonResponse {
        return response()->json(Task::create($request->validated()),201);
    }
    public function show(int $id): JsonResponse {
        return response()->json(Task::findOrFail($id),200);
    }
    public function update(TaskRequest $request,int $id): JsonResponse {
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        return response()->json($task,200);
    }
    public function destroy(int $id): JsonResponse {
        Task::findOrFail($id)->delete();
        return response()->json(['message'=>'Deleted'],200);
    }
}
