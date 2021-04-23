<?php

namespace Tests\Feature;

use App\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use function PHPSTORM_META\map;

class GroupManagementTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_club_official_can_create_a_family_group()
    {
        $this->withExceptionHandling();

        $response = $this->post('/api/groups/store', [
            'family_name' => 'Karpous',
            'address_line' => '47 Fernley Road',
            'place' => 'Birmingham',
            'postcode' => 'B11 3NS',
            'contact_number' => '07123456789',
            'email' => 'karpous@crsc.com'
        ]);

        $response->assertStatus(201);
        $this->assertCount(1, Group::all());
    }
}
