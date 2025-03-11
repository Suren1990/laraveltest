    @extends('user.layout.main')
    @section('content')
   
        <div class="text-center p-8 max-w-xl mx-auto">
            <h2 class="text-5xl font-semibold text-gray-900 mb-6">Welcome to My Website!</h2>
            <p class="text-lg text-gray-600 mb-8">Discover the features of our platform. Log in or create an account to get started!</p>
            <div class="flex justify-center gap-6">
                <a href="{{ route('login') }}" class="bg-gray-900 text-white px-8 py-3 rounded-lg shadow-md hover:bg-gray-800 transition duration-300 ease-in-out">Login</a>
                <a href="{{ route('registration') }}" class="bg-gray-100 text-gray-900 px-8 py-3 rounded-lg shadow-md hover:bg-gray-200 transition duration-300 ease-in-out">Register</a>
            </div>
        </div>
    @endsection



