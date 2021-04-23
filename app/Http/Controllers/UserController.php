<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function store()
    {
        $user = User::create(array_merge($this->validated(), ['slug' => Str::slug(request('name'))]));
        return $user;
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

    public function validated()
    {
        return request()->validate( [
            // 'family_group_id' => 'nullable',
            'member_type' => 'required',
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'password' => 'required',
            'status' => 'required'
        ] );
    }
}
