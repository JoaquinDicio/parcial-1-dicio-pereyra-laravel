@extends('layouts.administrator')

@section('title', 'Administrator Dashboard')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Bienvenido al Panel de Administración</h1>
        <p class="text-lg text-gray-600 mb-6">
            ¡Hola, {{ Auth::user()->name }}! Este es el panel de administrador. Desde aca podes gestionar los posts y los usuarios del sistema.
        </p>
    </div>
@endsection
