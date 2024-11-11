@extends('layouts.administrator')

@section('title', 'Nuevo usuario')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <form class="space-y-6 max-w-[600px]" action="{{ url('/register') }}" method="POST">  
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
                        @if ($errors->has('password'))
                            <p class="text-sm text-red-600">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium leading-6 text-gray-900">Permisos</label>
                    <div class="mt-2 w-100">
                        <select name="role_id" id="role_id" class="p-2">
                            <option value="1">Administrador</option>
                            <option value="2">Sin privilegios</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <button type="submit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Crear usuario</button>
                </div>
            </form>
        </div>
    </div>


@endsection