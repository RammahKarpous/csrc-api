<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'family_name' => $this->faker->lastName,
            'address_line' => $this->faker->address,
            'place' => $this->faker->city,
            'postcode' => $this->faker->postcode,
            'contact_number' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail
        ];
    }
}
