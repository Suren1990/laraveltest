@extends('user.dashboard')
@section('title', 'Post')
@section('content')
<div class="container mx-auto p-8">
<div class="flex justify-end mb-6">
        <a href="{{ route('post.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">Create New Post</a>
    </div>
        <h2 class="text-3xl font-semibold text-gray-900 mb-6">Latest Posts</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            @foreach($posts as $post)
            <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-xl transition duration-300 ease-in-out">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{$post->id}}. {{$post->title}}</h3>
                <p class="text-lg text-gray-600 mb-4">{{$post->post_content}}</p>
                <a href="{{ route('post.show', $post->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-300">Change Post</a>

            </div>
            @endforeach
        </div>
    </div>
@endsection