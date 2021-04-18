<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserManagementTest extends TestCase
{

    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_club_owner_can_create_a_parent()
    {

        $this->withoutExceptionHandling();

        $response = $this->post('/api/parents/store', [
            'member_type_id' => 2,
            'group_id' => null,
            'name' => 'Robert',
            'email' => 'robert@gmail.com',
            'slug' => 'robert',
            'gender' => 'Female',
            'dob' => '09/28/1998',
            'password' => 'robert',
            'status_id' => 3
        ] );

        // dd($response);

        $response->assertStatus(200);
        $this->assertCount(1, User::all());
    }
}
