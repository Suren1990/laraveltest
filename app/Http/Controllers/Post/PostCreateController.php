<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostCreateController extends Controller
{
   public function __invoke(){
      if (Auth::check())
      return view('post.create');
        return redirect('/');
    
   }
}
