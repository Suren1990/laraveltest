<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\LoginRequest;

class AuthController extends Controller
{
    public function createRegistration(){
    return view('user.registration');
    } 

    public function storeRegistration(RegisterRequest $request){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
         
         return redirect('/');
     }

     public function createLogin(){
        return view('user.login');
     }

     public function storeLogin(LoginRequest $request)
    {
         $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        }

        return redirect('/registration');
    }

    public function loginDestroy(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); 
    }
}
