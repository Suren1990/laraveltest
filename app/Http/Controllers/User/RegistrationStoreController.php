<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class RegistrationStoreController extends Controller
{
    public function __invoke(){

        $attributes = request()->validate([
             'username' => ['required', 'string', 'unique:new_users,username'],
             'email' => ['required', 'email','unique:new_users,email'],
             'password' => ['required', 'string'], 
         ]);
 
         $attributes['password'] = Hash::make($attributes['password']);
         $user = NewUser::create($attributes);
        //  Auth::login($user);
         return redirect('/');
     }
}
