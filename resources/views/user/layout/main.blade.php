<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans">

    <header class="bg-white shadow-md p-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-4xl font-semibold text-gray-900">
            <a href="{{ route('home') }}">My Website</a> 
            </h1>
            <nav>
                
                <a href="{{ route('home') }}" class="ml-6 text-lg text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out">Home</a>
                <a href="{{ route('registration') }}" class="ml-6 text-lg text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out">Register</a>
                <a href="{{ route('login') }}" class="ml-6 text-lg text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out">Login</a>


            </nav>
        </div>
    </header>

    <main class="flex items-center justify-center min-h-screen">
        @yield('content')
    </main>

</body>
</html>






              
                    