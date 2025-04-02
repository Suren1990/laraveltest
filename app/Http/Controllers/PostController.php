<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\FilterRequest;

class PostController extends Controller{

    public function index(FilterRequest $request){
    $users = User::all();
    $query = Post::query();
    $author = $request->filters()['author'] ?? null;
    $search = $request->filters()['search'] ?? null;
    if ($author) {
        $query->byAuthor($author);
    }
    if ($search) {
        $query->search($search);
    }
    $posts = $query->paginate(6);
    
    return view('post.index', compact('posts', 'users'));
}

    public function create(){
        $tags = Tag::all();

        return view('post.create', compact('tags'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        Post::createPost($data);
                            
        return redirect('posts');
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        $tags = Tag::all();
        return view('post.edit', compact('post', 'tags'));    
    }

    public function update(UpdateRequest $request, Post $post){
        $data = $request->validated();
        $post->updatePost($data);

        return redirect('posts');
    }

    public function destroy(Post $post){
        $post->delete();

        return redirect()->route('post.index');
    }
}
