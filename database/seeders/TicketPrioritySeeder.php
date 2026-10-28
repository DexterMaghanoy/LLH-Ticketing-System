<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TicketPriority;

class TicketPrioritySeeder extends Seeder
{
    public function run()
    {
        $priorities = [
            [
                'name' => 'Low',
                'slug' => 'low',
                'color' => '#6b7280',
                'acknowledgement_target_minutes' => 1440,
                'resolution_target_minutes' => 4320,
                'is_active' => true,
            ],
            [
                'name' => 'Medium',
                'slug' => 'medium',
                'color' => '#f59e0b',
                'acknowledgement_target_minutes' => 720,
                'resolution_target_minutes' => 2160,
                'is_active' => true,
            ],
            [
                'name' => 'High',
                'slug' => 'high',
                'color' => '#ef4444',
                'acknowledgement_target_minutes' => 360,
                'resolution_target_minutes' => 1440,
                'is_active' => true,
            ],
            [
                'name' => 'Urgent',
                'slug' => 'urgent',
                'color' => '#dc2626',
                'acknowledgement_target_minutes' => 60,
                'resolution_target_minutes' => 720,
                'is_active' => true,
            ],
        ];

        foreach ($priorities as $priority) {
            TicketPriority::create($priority);
        }
    }
}