<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{
    public function index(){     
        $posts = Post::with(['creator', 'updater'])->paginate(6);
        
        return view('post.index', compact('posts'));
    }

    public function create(){
        return view('post.create');
     }

     public function store(StoreRequest $request){
        $data = $request->validated();
        Post::create($data);
        
        return redirect('posts');
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));    
    }

    public function update(UpdateRequest $request, Post $post){
        $data = $request->validated();
        $post->update($data);

        return redirect('posts');
    }

     public function destroy(Post $post){
        $post->delete();

        return redirect()->route('post.index');
    }
}
 