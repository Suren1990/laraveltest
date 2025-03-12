<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostEditController extends Controller
{
    public function __Invoke(Post $post){
        return view('post.edit', compact('post'));
    }
}
