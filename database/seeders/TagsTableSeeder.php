<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['html', 'css', 'js', 'code'];
        foreach($data as $tag){
            Tag::create(['name' => $tag]);
        }
        $tags = Tag::all();
        Course::all()->each(function ($course) use ($tags) {
            for ($i = 0; $i < 2; $i ++) {
                $course->tags()->attach($tags->random());
            }
        });
    }
}
