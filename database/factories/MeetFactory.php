<?php

namespace Database\Factories;

use App\Models\Meet;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'venue' => $this->faker->word,
            'date' => $this->faker->date,
            'pool_length' => $this->faker->randomDigit
        ];
    }
}
