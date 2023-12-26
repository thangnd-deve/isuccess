<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index(Request $request)
    {
        $params = $request->all();

        $listTask = $this->taskRepository->getListAll($params);

        return view('task.index')->with(['listTask' => $listTask]);

    }


    public function create(Request $request)
    {
        return view('task.create');
    }

    public function store(StoreTaskRequest $request)
    {
        try {
            $this->taskRepository->create([
                'name' => $request->get('name'),
                'point' => $request->get('point'),
                'deadline_at' => $request->get('deadline_at'),
            ]);
            return redirect()->route('index');
        }catch (Exception $exception){
            dd($exception->getMessage());
        }
    }

    public function edit(Request $request, Task $taskInfo)
    {
        return view('task.edit')->with(['taskInfo' => $taskInfo]);
    }

    public function update(StoreTaskRequest $request, Task $taskInfo)
    {
        $taskInfo->update($request->all());

        return redirect()->route('index');
    }

    public function delete(Request $request, $id){
        try {
            Task::query()->where('id', $id)->delete();
            return redirect()->route('index');
        }catch (Exception $exception){
            abort(500);
        }
    }

    public function complete(Request $request, $id)
    {
        Task::query()->where('id', $id)
            ->update(['finished_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        return redirect()->route('index');
    }
}
