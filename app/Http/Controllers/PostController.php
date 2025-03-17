<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\FilterRequest;
class PostController extends Controller
{
    // public function index(FilterRequest $request){
    //     $users = User::all();
    //     $query = Post::query();
    //     $author = $request->filters()['author'] ?? null;
    //     $search = $request->filters()['search'] ?? null;
    //     if ($author) {
    //         $query->where('user_id', $author);
    //     }
    //     if ($search) {
    //         $query->where(function ($query) use ($search) {
    //             $query->where('title', 'like', '%' . $search . '%')
    //                   ->orWhere('post_content', 'like', '%' . $search . '%');
    //         });
    //     }
    //     $posts = $query->paginate(6);
    
    //     return view('post.index', compact('posts', 'users'));
    // }

    public function index(FilterRequest $request)
{
    $users = User::all();
    $query = Post::query();
    
    $author = $request->filters()['author'] ?? null;
    $search = $request->filters()['search'] ?? null;

    if ($author) {
        $query->byAuthor($author);  // use scope byAuthor
    }

    if ($search) {
        $query->search($search);  // use scope search 
    }

    $posts = $query->paginate(6);

    return view('post.index', compact('posts', 'users'));
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
 