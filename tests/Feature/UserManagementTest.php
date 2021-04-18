<?php

namespace Tests\Feature;

use App\Models\MemberType;
use App\Models\Status;
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

        MemberType::factory()->count(2)->create();
        Status::factory()->count(3)->create();

        $this->assertCount(2, MemberType::all());

        $response = $this->post('/api/parents/store', [
            'member_type_id' => 2,
            'name' => 'Rammah Karpous',
            'email' => 'rammahkarpous@outlook.com',
            'gender' => 'Male',
            'dob' => '09/28/1998',
            'password' => 'robert',
            'status_id' => 3
        ] );

        $response->assertStatus(201);
        $this->assertCount(1, User::all());
    }
}
