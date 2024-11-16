<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $subjects = [
            [
                'name' => 'Mathematics',
                "success_mark"=>50,
                "full_mark"=>100,
            ],  [
                'name' => 'English',
                "success_mark"=>50,
                "full_mark"=>100,
            ],  [
                'name' => 'Arabic',
                "success_mark"=>50,
                "full_mark"=>100,
            ],  [
                'name' => 'chemistry',
                "success_mark"=>50,
                "full_mark"=>100,
            ],
        ];

        foreach ($subjects as  $subject) {
            # code...
            Subject::create($subject);
        }

    }
}
