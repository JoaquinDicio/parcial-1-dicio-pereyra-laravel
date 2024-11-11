<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="bg-white border border-gray-200 shadow fixed z-50 w-full">
        <div class="container mx-auto flex flex-wrap justify-between items-center px-2 sm:px-4 py-2.5">
            <a href="{{ route('users.home') }}" class="flex items-center">
                <h1 class="self-center text-xl font-semibold whitespace-nowrap text-dark">Host Engine</h1>
            </a>

            <div class="flex items-center">
                <button id="menu-toggle" type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden">
                    <span class="sr-only">Menu principal</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>

            <nav class="flex gap-5 items-center">
                @auth
                <a class="text-lg font-bold" href="{{ route('users.dashboard') }}">{{ auth()->user()->name }}</a>
                    <a href="{{ route('user.news') }}" class="text-sm text-gray-500 hover:text-gray-700">Novedades</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-500 hover:text-gray-700">Cerrar Sesión</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700">Iniciar Sesión</a>
                    <a href="{{ route('user.news') }}" class="text-sm text-gray-500 hover:text-gray-700">Novedades</a>
                @endguest
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>