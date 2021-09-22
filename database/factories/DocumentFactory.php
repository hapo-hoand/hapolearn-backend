<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Lesson;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lessonId = Lesson::all()->random()->id;
        $name = time() . '.pdf';
        $content = $this->faker->text();
        Storage::put('public/document/'.  $lessonId . "/" . $name, $content);
        return [
            'lesson_id' => Lesson::all()->random()->id,
            'name' => $name,
            'type' => 'pdf'
        ];
    }
}
