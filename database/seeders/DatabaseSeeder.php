<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'dynmaite',
            'email' => 'dynamite@gmail.com',
            'password' => '123',
        ])->assignRole("admin");
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => '123',
        ])->assignRole("user");
        $fusers =User::factory(10)->create();
        foreach ($fusers as $fuser){
            $fuser->assignRole("user");
        }
        $this->call([
            SubjectSeeder::class,
            SubjectUserSeeder::class,
        ]);
    }
}
