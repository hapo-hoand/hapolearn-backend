<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('1'),
            'remember_token' => Str::random(10),
            'avatar' => 'avt_1.png',
            'birthday' => Carbon::createFromFormat(config('app.date_format'), '11/22/2000')->format('Y-m-d'),
            'phone' => '061649815',
            'address' => 'Ha Noi',
            'desc' => $this->faker->paragraph,
            'role' => '1',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
