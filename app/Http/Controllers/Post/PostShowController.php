<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostShowController extends Controller
{
    public function __invoke(Post $post){
        if (Auth::check())
        return view('post.show', compact('post'));
            return redirect('/');  

        
    }
}
