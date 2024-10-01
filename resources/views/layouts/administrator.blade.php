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
    <nav class="bg-white border border-gray-200 dark:border-gray-700 px-2 sm:px-4 py-2.5 dark:bg-gray-800 shadow">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
          <a href="{{route('dashboard')}}" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Panel de administrador</span>
          </a>
      
          <div class="flex items-center">
            <button
              id="menu-toggle"
              type="button"
              class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
            >
              <span class="sr-only">Menu principal</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16m-7 6h7"
                />
              </svg>
            </button>
          </div>
      
          <div class="w-full md:block md:w-auto hidden" id="mobile-menu">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
              <li>
                <a href="{{route('users')}}" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Usuarios</a>
              </li>
              <li>
                <a href="{{route('services')}}" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Servicios</a>
              </li>
              <li>
                <a href="{{route('admin.news')}}" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Noticias</a>
              </li>
            </ul>
          </div>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-white">Cerrar Sesión</button>
        </form>
        </div>
      </nav>

      <main>
          @yield('content')
      </main>

      <script src="{{ asset('js/app.js') }}"></script>
      
    </body>
</html>