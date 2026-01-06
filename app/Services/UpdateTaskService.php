<?php

namespace App\Services;

use App\Models\Task;

class UpdateTaskService
{
    public function execute(Task $task, ?string $title = null, ?string $description = null, ?string $status = null): bool
    {
        return $task->update([
            'title' => $title,
            'description' => $description,
            'status' => $status
        ]);
    }
}
