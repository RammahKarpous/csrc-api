<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store()
    {
        // $this->validated();
        // dd(request()->all());
        User::create(array_merge($this->validated(), ['slug' => Str::slug(request('name'))]));
    }

    public function validated()
    {
        return request()->validate( [
            // 'family_group_id' => 'nullable',
            'member_type_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'password' => 'nullable',
            'status_id' => 'required'
        ] );
    }
}
