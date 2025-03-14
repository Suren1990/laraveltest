<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostEditController extends Controller
{
    public function __Invoke(Post $post){
        if (Auth::check())
        return view('post.edit', compact('post'));
            return redirect('/');  
        
    }
}
