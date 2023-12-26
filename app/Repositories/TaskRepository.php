<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{

    public function create($params)
    {
        return Task::query()->create($params);
    }

    public function getListAll($params)
    {
        $params = array_merge(['sort' => 'asc'], $params);

        return Task::query()
            ->orderBy('deadline_at', $params['sort'])->get();
    }
}
