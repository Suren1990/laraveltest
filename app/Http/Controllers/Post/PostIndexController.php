<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostIndexController extends Controller
{
    public function __invoke(){
        $posts = Post::paginate(6);
        if (Auth::check())
        return view('post.index', compact('posts'));
        return redirect('/');
    }
}
