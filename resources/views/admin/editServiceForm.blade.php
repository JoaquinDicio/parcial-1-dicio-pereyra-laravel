@extends('layouts.administrator')

@section('title', 'Editar servicio')

@section('content')
<div class="container mx-auto mt-10 px-8">
    <form action="/services" method="POST">
        @csrf 
        @method('PUT') <!-- Usamos PUT porque es lo que va -->

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input value="{{$service->name}}"   type="text" id="name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el nombre del servicio">
            @if ($errors->has('name'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('name') }}</span>
            @endif
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
            <textarea  id="description" name="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese la descripción del servicio">{{$service->name}}</textarea>
            @if ($errors->has('description'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('description') }}</span>
            @endif
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
            <input value="{{$service->price}}" type="number" id="price" name="price" step="0.01" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el precio del servicio">
            @if ($errors->has('price'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('price') }}</span>
            @endif
        </div>

        <div class="flex items-center justify-between">
            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium text-sm py-2 px-3 rounded" value="Guardar"/>
        </div>
    </form>
</div>
@endsection