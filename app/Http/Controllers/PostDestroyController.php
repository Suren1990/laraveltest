<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostDestroyController extends Controller
{
    public function __invoke(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }
}
