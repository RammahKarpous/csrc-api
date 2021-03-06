<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Meet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EventManagementTest extends TestCase
{

    use WithFaker;
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_create_event()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/events/store', $this->data());

        $response->assertStatus(201);
        $this->assertCount(1, Event::all());
    }

    public function test_add_times_to_event()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/events/store', array_merge($this->data(), [
            'start_time' => '13:00:00',
            'end_time' => '14:00:00',
        ]));

        $response->assertStatus(201);
        $this->assertCount(1, Event::all());
    }

    public function data()
    {
        Meet::factory()->create();
        $meet = Meet::first();

        return [
            'meet_id' => $meet->id,
            'age_range' => 'Juniors (under 16)',
            'gender' => 'female',
            'distance' => $this->faker->randomDigit,
            'stroke' => 'Backstroke',
            'round' => $this->faker->randomDigit
        ];
    }
}
