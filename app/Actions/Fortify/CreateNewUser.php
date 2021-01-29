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
        $email = $input['email'];
        $student = student::where('email', $email)->first();
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'department' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();
        if ($input['role'] == 'student') {
            if ($student == null) {
                student::create([
                    'name' => 'Your Full Name',
                    'department' => $input['department'],
                    'level' => $input['level'],
                    'year' => '3',
                    'cgpa' => 'Your CGPA',
                    'skills' => 'Your Skills',
                    'about' => 'About Yourself',
                    'email' => $input['email'],
                    'avatar' => 'default-avatar.png',

                ]);
            }
        }
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'],
            'level' => $input['level'],
            'department' => $input['department'],
            'password' => Hash::make($input['password']),
            'avatar' => 'default-avatar.png',
        ]);
    }
}
