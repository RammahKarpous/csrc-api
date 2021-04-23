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
        MemberType::factory()->count(2)->create();
        Status::factory()->count(3)->create();

        $this->assertCount(2, MemberType::all());

        $response = $this->post('/api/parents/store', [
            'member_type' => 'parent',
            'name' => 'Rammah Karpous',
            'email' => 'rammahkarpous@outlook.com',
            'gender' => 'Male',
            'dob' => '09/28/1998',
            'password' => 'robert',
            'status' => 'active'
        ] );

        $response->assertStatus(201);
        $this->assertCount(1, User::all());
    }

    public function test_club_owner_can_create_a_swimmer()
    {
        MemberType::factory()->count(2)->create();
        Status::factory()->count(3)->create();

        $this->assertCount(2, MemberType::all());

        $response = $this->post('/api/parents/store', [
            'member_type' => 'child',
            'name' => 'Syndy Carlson',
            'email' => 'S23424C@crsc.com',
            'gender' => 'Female',
            'dob' => '09/28/2006',
            'password' => 'syndy',
            'status' => 'active'
        ] );

        $response->assertStatus(201);
        $this->assertCount(1, User::all());
    }

    public function test_club_owner_can_edit_a_member_name()
    {
        User::factory()->create();

        $user = User::first();

        $response = $this->patch('/api/user/' . $user->slug . '/update' , [
            'member_type' => 'child',
            'name' => 'Carla Carlson',
            'email' => 'S23424C@crsc.com',
            'gender' => 'Female',
            'dob' => '09/28/2006',
            'password' => 'syndy',
            'status' => 'active'
        ] );

        $response->assertStatus(200);
        $this->assertCount(1, User::all());
    }

    public function test_club_owner_can_archive_a_member()
    {
        User::factory()->create();

        $user = User::first();

        $response = $this->patch('/api/user/' . $user->slug . '/archive' , [
            'member_type' => 'child',
            'name' => 'Carla Carlson',
            'email' => 'S23424C@crsc.com',
            'gender' => 'Female',
            'dob' => '09/28/2006',
            'password' => 'syndy',
            'status' => 'archived'
        ] );

        $response->assertStatus(200);
        $this->assertCount(1, User::all());
    }
}
