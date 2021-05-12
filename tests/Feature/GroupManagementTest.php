<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use function PHPSTORM_META\map;

class GroupManagementTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    use WithFaker;

    public function test_club_official_can_create_a_family_group()
    {
        $this->withoutExceptionHandling();

        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->post('/api/groups/store', $this->data());

        $response->assertStatus(201);
        $this->assertCount(1, Group::all());
    }

    public function data()
    {
        return [
            'family_name' => $this->faker->lastName,
            'slug' => 'Hello',
            'address_line' => $this->faker->address,
            'place' => $this->faker->city,
            'postcode' => $this->faker->postcode,
            'contact_number' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail
        ];
    }
}
