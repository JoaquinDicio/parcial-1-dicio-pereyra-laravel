@extends('layouts.administrator')

@section('title', 'Nuevo servicio')

@section('content')
<div class="container mx-auto mt-10 px-8">
    <form action="/services" method="POST">
        @csrf 

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" id="name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el nombre del servicio">
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
            <textarea id="description" name="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese la descripción del servicio"></textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
            <input type="number" id="price" name="price" step="0.01" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el precio del servicio">
        </div>

        <div class="flex items-center justify-between">
            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium text-sm py-2 px-3 rounded" value="Guardar"/>
        </div>
    </form>
</div>


@endsection