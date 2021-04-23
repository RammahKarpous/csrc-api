<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Meet;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        Meet::factory()->create();
        $meet = Meet::first();

        return [
            'meet_id' => $meet->id,
            'slug' => 'event-23453',
            'age_range' => 'Juniors (under 16)',
            'start_time' => '13:00:00',
            'end_time' => '14:00:00',
            'gender' => 'female',
            'distance' => $this->faker->randomDigit,
            'stroke' => 'Backstroke',
            'round' => $this->faker->randomDigit
        ];
    }
}
