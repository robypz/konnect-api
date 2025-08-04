<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use RobYpz\MongoRole\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Employee',
            'email' => 'employee@konnect.com',
        ])->roles()->attach(Role::where('name', 'employee')->first());

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@konnect.com',
        ])->roles()->attach(Role::where('name', 'admin')->first());
    }
}
