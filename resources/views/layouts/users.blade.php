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
    <nav class="bg-white border border-gray-200 px-2 sm:px-4 py-2.5 shadow fixed w-full">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{route('dashboard')}}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap text-dark">Host Engine</span>
            </a>

            <div class="flex items-center">
                <button id="menu-toggle" type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 text-gray-400 hover:bg-gray-700 focus:ring-gray-600 md:hidden">
                    <span class="sr-only">Menu principal</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>

            @auth
            <div class="flex gap-5 items-center">
                <div>
                    <p class="text-lg font-bold">{{ auth()->user()->name}}</p>
                </div>
                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
                
            @endauth

            @guest
                <a href="{{ route('login') }}">Iniciar Sesión</a>
            @endguest

        </div>
    </nav>


    <main>
        @yield('content')
    </main>

    <footer class="h-25 bg-black text-white p-2">Todos los derechos reservados</footer>

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>