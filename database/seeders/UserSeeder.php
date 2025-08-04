<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use RobYpz\MongoRole\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'root',
            'last_name' => 'Konnect',
            'email' => 'root@konnect.test',
        ])->assignRole(['root']);
    }
}
