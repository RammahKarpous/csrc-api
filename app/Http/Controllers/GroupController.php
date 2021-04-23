<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    public function store()
    {
        $group = Group::create( [
            'family_name' => request('family_name'),
            'slug' => request(Str::slug('family_name')),
            'address_line' => request('address_line'),
            'place' => request('place'),
            'postcode' => request('postcode'),
            'email' => request('email'),
            'contact_number' => request('contact_number')
        ] );

        return $group;
    }
}
