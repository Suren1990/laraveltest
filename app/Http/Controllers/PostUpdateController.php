<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostUpdateController extends Controller
{
    public function __invoke(Post $post){
        $data = request()->validate([
            'title' =>'string',
            'post_content' => 'string',
        ]);
        $post->update($data);
        return redirect('posts');
    }
}
