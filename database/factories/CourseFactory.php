<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'intro' => $this->faker->text(),
            'desc' => $this->faker->text(),
            'image' => 'html.png',
            'price' => $this->faker->randomFloat(0.01, 0, 100000),
            'teacher_id' => User::where('role', 0)->get()->random()->id
        ];
    }
}
