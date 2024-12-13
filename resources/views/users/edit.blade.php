@extends('layouts.users')

@section('title', 'Editar Datos')

@section('content')
<section class="bg-slate-100 min-h-screen pt-20">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edita tus Datos</h1>
        <form action="{{ route('user.update') }}" method="POST" class="bg-white max-w-[900px] w-full mx-auto p-4 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                       class="w-full mt-2 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                       class="w-full mt-2 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full flex justify-end">
                <button type="submit" class="w-25 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
