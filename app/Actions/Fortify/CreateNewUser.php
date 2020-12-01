<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();
        if ($input['role']=='student'){
        student::create([
            'name' => null,
            'department' => null,
            'year' => null,
            'cgpa' => null,
            'skills' => null,
            'email' => $input['email'],
            'avatar'=>'default-avatar.png',

        ]);
        }
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'],
            'password' => Hash::make($input['password']),
            'avatar'=>'default-avatar.png',
        ]);
    }
}
