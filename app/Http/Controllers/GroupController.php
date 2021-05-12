<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupController extends Controller
{

    public function index()
    {
        return Group::all();
    }

    public function store()
    {
        $group = Group::create( array_merge($this->data(), 
            [ 'slug' => request(Str::slug( 'slug' ) ) ] 
        ));
    
        return $group;
    }

    public function data()
    {
        return request()->validate( [
            'family_name' => 'required|string',
            'slug' => 'required|string',
            'address_line' => 'required|string',
            'place' => 'required|string',
            'postcode' => 'required|string',
            'email' => 'required|string|email',
            'contact_number' => 'required|string'
        ] );
    }
}
