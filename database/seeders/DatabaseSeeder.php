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

        User::factory()->create([
            'name' => 'dynmaite',
            'email' => 'dynamite@gmail.com',
            'password' => '123',
        ]);
        User::factory(10)->create();
        $this->call([
            SubjectSeeder::class,
            SubjectUserSeeder::class,
        ]);

    }
}
