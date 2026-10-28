<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed departments first (needed for user assignments)
        $this->call(DepartmentSeeder::class);

        $this->call(TicketPrioritySeeder::class);

        // Create initial super admin user if not already exists
        if (!User::where('email', 'admin@llh.local')->exists()) {
            User::factory()->create([
                'name' => 'System Super Administrator',
                'email' => 'admin@llh.local',
                'password' => bcrypt('SuperAdminPass123!'),
                'role' => 'super_admin',
                'is_active' => true,
            ]);
        }
    }
}
