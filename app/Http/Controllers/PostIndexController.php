<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostIndexController extends Controller
{
    public function __invoke(){
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
}
