<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubjectUser;

class SubjectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $subjectInUsers = [
            [
                "user_id" => 1,
                'subject_id' => 1,
                "mark" => 100,
            ],
            [
                "user_id" => 1,
                'subject_id' => 2,
                "mark" => 70,
            ],
            [
                "user_id" => 3,
                'subject_id' => 2,
                "mark" => 70,
            ],
            [
                "user_id" => 1,
                'subject_id' => 3,
                "mark" => 70,
            ],
            [
                "user_id" => 1,
                'subject_id' => 4,
                "mark" => 100,
            ],
            [
                "user_id" => 2,
                'subject_id' =>4,
                "mark" => 80,
            ],
            [
                "user_id" => 2,
                'subject_id' =>1,
                "mark" => 90,
            ],
            [
                "user_id" => 2,
                'subject_id' => 2,
                "mark" => 100,
            ],
            [
                "user_id" => 5,
                'subject_id' => 3,
                "mark" => 100,
            ],
        ];

        foreach ($subjectInUsers as  $subject) {
            # code...
            SubjectUser::create($subject);
        }
    }
}
