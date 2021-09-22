<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory()->count(50)->create();
        $course = User::all();
        User::all()->each(function ($user) use ($course) {
            for ($i = 0; $i < 5; $i ++) {
                $user->courses()->attach($course->find(rand(1, 50)));
            }
        });
    }
}
