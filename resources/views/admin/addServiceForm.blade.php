@extends('layouts.administrator')

@section('title', 'Nuevo servicio')

@section('content')
<div class="container mx-auto mt-10 px-40">
    <form action="/services" method="POST">
        @csrf 

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" id="name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el nombre del servicio" value={{ old('name') }}>
            @if ($errors->has('name'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('name') }}</span>
            @endif
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
            <textarea rows="5" id="description" name="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese la descripción del servicio">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('description') }}</span>
            @endif
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
            <input type="number" id="price" name="price" step="0.01" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el precio del servicio" value={{ old('price') }}>
            @if ($errors->has('price'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('price') }}</span>
            @endif
        </div>

        <div class="flex items-center justify-end w-100 gap-2">
            <a href="{{route('admin.services')}}" class="transition ease-in-out bg-red-500 hover:bg-red-700 text-white font-medium text-sm py-2 px-3 rounded">Cancelar</a>
            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium text-sm py-2 px-3 rounded cursor-pointer" value="Guardar"/>
        </div>
    </form>
</div>
@endsection