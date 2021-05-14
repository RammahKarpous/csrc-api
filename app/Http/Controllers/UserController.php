<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Group;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function store()
    {
        $user = User::create(array_merge($this->validated(), [
            'slug' => Str::slug(request('name')),
            'password' => Hash::make(request('password'))
        ]));

        $token = $user->createToken('gg-token')->plainTextToken;
        
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function races(User $user)
    {
        $user = User::first();
        $event = Event::where('id', '=', $user->id)->get();
        return [ $user, $event ];
    }

    public function login()
    {
        $val = request()->validate( [
            'email' => 'required|string|email', 
            'password' => 'required|string'
        ] );

        $user = User::where( 'email', $val[ 'email' ] )->first();

        if ( !$user || !Hash::check( $val[ 'password' ], $user->password ) ) {
            return response( [
                'message' => 'You are unauthorised'
            ], 401 );
        }

        $token = $user->createToken( 'gg-token' )->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function viewProfile(User $user)
    {
        $user = User::first();
        $group = Group::find($user->id);
        return [ $user, $group ];
    }

    public function update(User $user)
    {
        $user->update(array_merge($this->validated(), ['slug' => Str::slug(request('name'))]));
        return $user;
    }

    public function archive(User $user)
    {
        $user->update(array_merge($this->validated(), ['slug' => Str::slug(request('name'))]));
        return $user;
    }

    public function addToEvent(User $user)
    {
        $user->update(array_merge($this->validated(), ['slug' => Str::slug(request('name'))]));
        return $user;
    }

    public function validated()
    {
        return request()->validate( [
            'group_id' => 'nullable',
            'member_type' => 'required',
            'event_id' => 'nullable',
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'password' => 'required',
            'status' => 'required'
        ] );
    }
}
