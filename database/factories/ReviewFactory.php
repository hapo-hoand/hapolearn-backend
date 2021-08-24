<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => rand(1, 10),
            'user_id' => rand(1, 10),
            'content' => $this->faker->paragraph,
            'time' => Carbon::createFromFormat(config('app.date_format'), '11/22/2000')->format('Y-m-d'),
            'rate' => rand(1, 4)
        ];
    }
}
