@extends('layouts.administrator')

@section('title', 'Nueva noticia')

@section('content')
<div class="container mx-auto mt-10 px-40">
    <form action="/news" method="POST" enctype="multipart/form-data">
        @csrf 

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
            <input type="text" id="title" name="title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el título de la noticia" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('title') }}</span>
            @endif
        </div>
        
        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Contenido:</label>
            <textarea rows="5" id="content" name="content" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el contenido de la noticia">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('content') }}</span>
            @endif
        </div>

        <div class="mb-4">
            <label for="img" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
            <input type="file" id="img" name="img" required value="{{ old('img') }}">
            @if ($errors->has('img'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('img') }}</span>
            @endif
        </div>

        <div class="mb-4">
            <label for="summary" class="block text-gray-700 text-sm font-bold mb-2">Resumen:</label>
            <textarea rows="3" id="summary" name="summary" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese un resumen de la noticia">{{ old('summary') }}</textarea>
            @if ($errors->has('summary'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('summary') }}</span>
            @endif
        </div>

        <div class="flex items-center justify-end w-100 gap-2">
            <a href="{{ route('admin.news') }}" class="transition ease-in-out bg-red-500 hover:bg-red-700 text-white font-medium text-sm py-2 px-3 rounded">Cancelar</a>
            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium text-sm py-2 px-3 rounded cursor-pointer" value="Guardar"/>
        </div>
    </form>
</div>
@endsection
