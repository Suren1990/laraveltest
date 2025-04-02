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
    public function index(){

        return view('user.home');   
    }

    public function createRegistration(){

    return view('user.registration');
    } 

    public function storeRegistration(RegisterRequest $request){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

         return redirect('/');
     }

     public function createLogin(){
        return view('user.login');
     }

     public function storeLogin(LoginRequest $request){
         $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard')->with('username', Auth::user()->username);
        }
        
        return redirect('/registration');
    }

    public function createDashboard(){

        return view('user.dashboard');
     }

    public function loginDestroy(Request $request){
        Auth::logout();
    
        return redirect('/');  
    }
}
// $request->session()->invalidate();
        // $request->session()->regenerateToken();