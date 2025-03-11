<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewUser;
class RegistrationCreateController extends Controller
{
    public function __invoke(){
        // Request $req
        // $user = new NewUser();
        // $user -> username = $req->input('username');
        // $user -> email = $req->input('email');
        // $user -> password = $req->input('password');
        // $user->save();
        // return redirect()->route('home');
        return view('user.registration');
    }

   
}
