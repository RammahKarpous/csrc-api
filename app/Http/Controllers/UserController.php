<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store()
    {
        // $this->validated();
        // dd(request()->all());
        User::create($this->validated());
    }

    public function validated()
    {
        return request()->validate( [
            // 'family_group_id' => 'nullable',
            // 'member_type_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            // 'gender' => 'required',
            // 'dob' => 'required|date',
            'password' => 'nullable',
            // 'status_id' => 'required'
        ] );
    }
}
