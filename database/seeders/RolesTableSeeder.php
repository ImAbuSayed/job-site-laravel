<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // In RolesTableSeeder.php

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Employer']);
        Role::create(['name' => 'Job Seeker']);
        Role::create(['name' => 'Moderator']);
    }
}
