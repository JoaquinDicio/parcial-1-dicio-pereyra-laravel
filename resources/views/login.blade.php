@extends('layouts.generic')

@section('title', 'Login')

@section('content')
    
    @if (session('success'))
        <div class="fixed top-18 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h1 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">¡Bienvenido!</h1>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ url('/login') }}" method="POST">  
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3" value="{{ old('email') }}">
                    </div>
                    @if ($errors->has('email'))
                            <p class="text-sm text-red-600">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
                    <div class="mt-2 w-100">
                        <input id="password" name="password" type="password" autocomplete="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <p class="text-sm text-red-600">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                </div>
                @if ($errors->has('credentials'))
                <p class="text-sm text-red-600">{{ $errors->first('credentials') }}</p>
            @endif
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Iniciar sesión</button>
                </div>
                
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                ¿No tienes una cuenta?
                <a href="{{route('register')}}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Crear una cuenta</a>
            </p>
        </div>
    </div>

@endsection