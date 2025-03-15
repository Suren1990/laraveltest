@extends('user.dashboard')
@section('title', 'Create Post')
@section('content')

<form method="POST" action="{{ route('post.store') }}" class="max-w-md mx-auto p-6 bg-gray-100 shadow-lg rounded-lg">
    @csrf <!-- Laravel CSRF защита -->
    
    <div class="mb-4">
        <label for="title" class="block text-gray-700 text-lg font-semibold mb-2">Title</label>
        <input type="text" id="title" name="title" class="w-full p-3 border border-gray-300 rounded-lg" required>
    </div>

    <div class="mb-4">
        <label for="post" class="block text-gray-700 text-lg font-semibold mb-2">Post Content</label>
        <textarea id="post" name="post_content" class="w-full p-3 border border-gray-300 rounded-lg" rows="5" required></textarea>
    </div>

    <div class="flex justify-center space-x-4">
        <a  href="{{ route('post.index')}}" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition duration-300 inline-flex items-center justify-center md-3">
            Back
        </a>
        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">Submit</button>
</div>   
</form>
@endsection