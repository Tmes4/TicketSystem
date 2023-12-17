<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->createMany([
            ['name' => 'admin'],
            ['name' => 'klant'],
        ]);;
        $adminUser = User::factory()->create([
            'name' => 'Test-1', 'email' => 'test@test.nl'
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $adminUser->roles()->attach($adminRole);
        // \App\Models\User::factory()->create(['name' => 'Test-1', 'email' => 'test@test.nl']);
        \App\Models\User::factory()->create(['name' => 'Test-2', 'email' => 'test-2@test.com']);
        \App\Models\User::factory(10)->create();
        \App\Models\Event::factory(100)->create();
    }
}
