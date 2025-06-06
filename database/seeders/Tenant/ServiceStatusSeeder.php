<?php

namespace Database\Seeders\Tenant;

use App\Models\ServiceStatus;
use Illuminate\Database\Seeder;

class ServiceStatusSeeder extends Seeder
{
    public function run()
    {
        $serviceStatuses = [
            [
                'name' => ['ar' => 'جديدة', 'en' => 'New'],
                'badge_class' => 'primary',
                'ordering' => 1,
            ],
            [
                'name' => ['ar' => 'قيد المراجعة', 'en' => 'Under Review'],
                'badge_class' => 'primary',
                'ordering' => 2,
            ],
            [
                'name' => ['ar' => 'قيد التنفيذ', 'en' => 'In Progress'],
                'badge_class' => 'primary',
                'ordering' => 3,
            ],
            [
                'name' => ['ar' => 'مكتملة', 'en' => 'Completed'],
                'badge_class' => 'primary',
                'ordering' => 4,
            ],
            [
                'name' => ['ar' => 'معلقة', 'en' => 'Pending'],
                'badge_class' => 'primary',
                'ordering' => 5,
            ],
            [
                'name' => ['ar' => 'مرفوضة', 'en' => 'Rejected'],
                'badge_class' => 'primary',
                'ordering' => 6,
            ],
            [
                'name' => ['ar' => 'ملغية', 'en' => 'Cancelled'],
                'badge_class' => 'primary',
                'ordering' => 7,
            ],
        ];

        foreach ($serviceStatuses as $serviceStatus) {
            ServiceStatus::create($serviceStatus);
        }
    }
} 