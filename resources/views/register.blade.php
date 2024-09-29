@extends('layouts.generic')

@section('tittle', 'register')

@section('content')
    @if (session('success'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>

        <meta http-equiv="refresh" content="2;url={{ route('login') }}">
    @endif

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h1 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Crea una cuenta</h1>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ url('/register') }}" method="POST">  
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre Completo</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="name" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <p class="text-sm text-red-600">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <p class="text-sm text-red-600">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
                    <div class="mt-2 w-100">
                        <input id="password" name="password" type="password" autocomplete="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3" value="{{ old('password') }}">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrar</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                ¿Ya tienes una cuenta?
                <a href="{{route('login')}}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Iniciar Sesión</a>
            </p>
        </div>
    </div>
@endsection