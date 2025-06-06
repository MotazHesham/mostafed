<?php

namespace Database\Seeders\Tenant;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusTableSeeder extends Seeder
{
    public function run()
    {
        $taskStatuses = [
            [
                'id'   => 1,
                'name' => 'New',
            ],
            [
                'id'   => 2,
                'name' => 'Todo',
            ],
            [
                'id'   => 3,
                'name' => 'On Going',
            ],
            [
                'id'   => 4,
                'name' => 'In Review',
            ],
            [
                'id'   => 5,
                'name' => 'Completed',
            ],
        ];

        TaskStatus::insert($taskStatuses);
    }
}
