<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginCreateController extends Controller
{
   public function __invoke(){
      if (Auth::check())
        return redirect('/dashboard');
      return view('user.login');
   }
}
