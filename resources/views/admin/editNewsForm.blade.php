@extends('layouts.administrator')

@section('title', 'Editar noticia')

@section('content')
<div class="container mx-auto mt-10 px-8">
    <form action="/news/{{$news->id}}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT') <!-- Usamos PUT porque es lo que va -->

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
            <input value="{{ $news->title }}" type="text" id="title" name="title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el título de la noticia">
            @if ($errors->has('title'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('title') }}</span>
            @endif
        </div>
        
        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Contenido:</label>
            <textarea rows="5" id="content" name="content" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el contenido de la noticia">{{ $news->content }}</textarea>
            @if ($errors->has('content'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('content') }}</span>
            @endif
        </div>

        <div class="mb-4">
            <label for="img" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
            @if ($news->img)
                <div class="mt-2">
                    <img src="{{ asset($news->img) }}" alt="Imagen de la noticia" class="mt-2 w-32 h-auto border rounded">
                </div>
            @endif
            <input type="file" id="img" name="img" class="py-2 my-2" placeholder="Seleccione una nueva imagen">
            @if ($errors->has('img'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('img') }}</span>
            @endif
        </div>

        <div class="mb-4">
            <label for="summary" class="block text-gray-700 text-sm font-bold mb-2">Resumen:</label>
            <textarea rows="3" id="summary" name="summary" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el resumen de la noticia">{{ $news->summary }}</textarea>
            @if ($errors->has('summary'))
                <span class="text-red-500 text-xs italic">{{ $errors->first('summary') }}</span>
            @endif
        </div>

        <div class="flex items-center gap-2 justify-end w-100">
            <a href="{{ route('admin.news') }}" class="transition ease-in-out bg-red-500 hover:bg-red-700 text-white font-medium text-sm py-2 px-3 rounded">Cancelar</a>
            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium text-sm py-2 px-3 rounded" value="Guardar"/>            
        </div>
    </form>
</div>
@endsection
