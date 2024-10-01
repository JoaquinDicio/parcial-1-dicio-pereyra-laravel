@extends('layouts.administrator')

@section('title', 'Administrator Dashboard')

@section('content')
    <div class="container mx-auto mt-10 px-8">
        <!-- ERRORES Y SUCCESS -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white p-4 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif
        <!-- FIN: ERRORES Y SUCCESS -->

        <h1 class="text-3xl font-bold mb-6">Detalles de Noticias</h1>
        <p>Desde aquí puedes gestionar todo lo relacionado con las noticias publicadas.</p>
        <nav class="mt-5 mb-10">
            <a href="/addNewsForm" class="rounded-sm px-3 py-2 text-white font-medium text-sm bg-green-500 my-8">Nueva noticia +</a>
        </nav>
        @if($news->isEmpty())
            <p>No hay noticias disponibles.</p>
        @else
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-center">ID</th>
                        <th class="py-2 px-4 border-b text-center">Título</th>
                        <th class="py-2 px-4 border-b text-start">Resumen</th>
                        <th class="py-2 px-4 border-b text-start">Imagen</th>
                        <th class="py-2 px-4 border-b text-center">Fecha de Creación</th>
                        <th class="py-2 px-4 border-b text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $article)
                        <tr>
                            <td class="py-2 px-4 border-b text-center">{{ $article->id }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $article->title }}</td>
                            <td class="py-2 px-4 border-b text-start">{{ substr($article->summary, 0, 150) }}...</td>
                            <td class="py-2 px-4 border-b text-start"><img class="w-25 max-w-[100px]" src="{{ $article->img }}" alt="{{ $article->title }}"></td>
                            <td class="py-2 px-4 border-b text-center">{{ $article->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                <div class="flex gap-2">
                                    <a class="cursor-pointer text-sm bg-orange-500 hover:bg-orange-700 text-white p-2 rounded" href="/news/{{ $article->id }}/edit">Editar</a>
                                    <form action="{{ route('news.delete', $article->id) }}" method="POST" onsubmit="return confirm('¿En serio lo vas a borrar?');">
                                        @csrf
                                        @method('DELETE') 
                                        <button type="submit" class="cursor-pointer bg-red-500 hover:bg-red-700 text-white p-2 rounded focus:outline-none focus:shadow-outline text-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
