<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\MoodleUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomNumber(),
            'payment_code' => $this->faker->unique()->randomNumber(),
            'moodle_user_id' => MoodleUser::all()->random()->id,
            'reportable_id' => Course::all()->random()->id,
            'reportable_type' => 'course',
            'date' => $this->faker->dateTime()
        ];
    }
}
