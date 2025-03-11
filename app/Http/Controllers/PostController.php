<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        // $post = Post::find(1);
        // dump($post);
        // dump ($post->title);
        // dump(implode(' ', array($post)));
        // foreach(array($post) as $el){
        //     dump($el);
        // }
        $post = Post::all();
        dump($post);
    }
}
