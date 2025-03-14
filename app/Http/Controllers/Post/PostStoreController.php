<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;

class PostStoreController extends Controller
{
    public function __invoke(){
        $data = request()->validate([
            'title' =>'string',
            'post_content' => 'string',
        ]);
        Post::create($data);
        return redirect('posts');
    }
}
