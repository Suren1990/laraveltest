@extends('user.layout.main')
@section('content')
        <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-md">
            <h2 class="text-3xl font-semibold text-center text-gray-900 mb-6">Create Account</h2>
            
            <form action="/registration" method="post">
            @csrf
                <div class="mb-6">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" required class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-400 transition duration-200">
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-400 transition duration-200">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-400 transition duration-200">
                </div>
                <button type="submit" class="w-full bg-gray-900 text-white py-3 rounded-lg shadow-md hover:bg-gray-800 transition duration-300 ease-in-out">Register</button>
            </form>

            <p class="mt-4 text-center text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-700">Login</a></p>
        </div>
        @endsection
