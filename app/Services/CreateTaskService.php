<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;

class CreateTaskService
{
    public function execute(User $user, string $title, ?string $description = null)
    {
        return Task::create([
            'user_id' => $user->id,
            'title' => $title,
            'description' => $description,
            'status' => 'pending'
        ]);
    }
}
