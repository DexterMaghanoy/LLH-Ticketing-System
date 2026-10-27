<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\User;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Deactivate existing departments to start fresh
        Department::query()->delete();

        // Initial hotel departments (as specified in project requirements)
        $departments = [
            [
                'name' => 'Information Technology',
                'slug' => 'information-technology',
                'description' => 'IT systems, hardware, software, and network infrastructure',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Engineering and Maintenance',
                'slug' => 'engineering-and-maintenance',
                'description' => 'Building systems, HVAC, electrical, plumbing, and general maintenance',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Housekeeping',
                'slug' => 'housekeeping',
                'description' => 'Room cleanliness, linens, and guest room maintenance',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Front Office',
                'slug' => 'front-office',
                'description' => 'Guest check-in/check-out, concierge, and front desk operations',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Food and Beverage',
                'slug' => 'food-and-beverage',
                'description' => 'Restaurants, room service, banqueting, and bar operations',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Kitchen / Culinary',
                'slug' => 'kitchen-culinary',
                'description' => 'Kitchen equipment, food preparation, and culinary operations',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Security',
                'slug' => 'security',
                'description' => 'CCTV, access control, and hotel security operations',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Human Resources',
                'slug' => 'human-resources',
                'description' => 'Employee recruitment, onboarding, and HR administration',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Finance and Accounting',
                'slug' => 'finance-and-accounting',
                'description' => 'Financial reporting, accounts, payroll, and budgeting',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Purchasing and Stores',
                'slug' => 'purchasing-and-stores',
                'description' => 'Procurement, inventory management, and stores operations',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Sales and Marketing',
                'slug' => 'sales-and-marketing',
                'description' => 'Revenue generation, advertising, and market analysis',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Events and Banquets',
                'slug' => 'events-and-banquets',
                'description' => 'Conference planning, event coordination, and banquet services',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Laundry',
                'slug' => 'laundry',
                'description' => 'Linen service, uniform cleaning, and laundry operations',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Stewarding',
                'slug' => 'stewarding',
                'description' => 'Tableware, kitchen sanitation, and venue maintenance',
                'head_user_id' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
                'description' => 'Hotel departments not classified above',
                'head_user_id' => null,
                'is_active' => true,
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }

        // Optionally assign heads if users exist
        $superAdmin = User::where('role', 'super_admin')->first();
        if ($superAdmin) {
            $itDept = Department::where('slug', 'information-technology')->first();
            if ($itDept && !$itDept->head_user_id) {
                $itDept->update(['head_user_id' => $superAdmin->id]);
            }
        }
    }
}