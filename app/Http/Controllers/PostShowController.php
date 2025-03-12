<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostShowController extends Controller
{
    public function __invoke(Post $post){
        // $post = Post::findorFail($id);
        // dd($post->title);
        return view('post.show', compact('post'));
    }
}
