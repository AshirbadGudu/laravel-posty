<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posty</title>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
</head>

<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li><a class="p-3" href="/">Home</a></li>
            @auth()
            <li><a class="p-3" href="/dashboard">Dashboard</a></li>
            @endauth
            <li><a class="p-3" href="/posts">Posts</a></li>
        </ul>
        <ul class="flex items-center">
            @auth()
            <li><a class="p-3" href="/profile">Ashirbad Panigrahi</a></li>
            <li><a class="p-3" href="!#">Logout</a></li>
            @endauth
            @guest()
            <li><a class="p-3" href="{{ route('login') }}">Login</a></li>
            <li><a class="p-3" href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>

</html>