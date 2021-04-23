<?php

namespace Tests\Feature;

use App\Models\Meet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class MeetManagementTest extends TestCase
{

    use RefreshDatabase;
    use WithoutMiddleware;
    use WithFaker;

    public function test_meet_can_be_created()
    {

        $this->withoutExceptionHandling();
        
        $response = $this->post('/api/meets/store', [
            'name' => $this->faker->word,
            'venue' => $this->faker->word,
            'date' => $this->faker->date,
            'pool_length' => $this->faker->randomDigit
        ]);

        $response->assertStatus(201);
        $this->assertCount(1, Meet::all());
    }
}
