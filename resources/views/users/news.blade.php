@extends('layouts.users')

@section('title', 'Novedades')

@section('content')

<div class="py-20">
    <h1 class="text-2xl font-bold mb-4 text-center">Últimas Novedades</h1>
    <section>
        <div class="container mx-auto py-5 min-h-screen">
            @if($news->isEmpty())
                <p class="text-gray-500">No hay novedades disponibles en este momento.</p>
            @else
                <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($news as $new)
                        <li class="p-4 border hover:transform hover:scale-[105%] duration-300 bg-white cursor-pointer rounded-lg shadow-md">
                            <a href="{{ route('news.detail', $new->id) }}" class="block">
                                <img class="rounded-sm h-[200px] w-full object-cover" src="{{'/' .  $new->img }}" alt="{{$new->title}}">
                                <div class="mt-4">
                                    <h2 class="text-xl font-semibold">{{ $new->title }}</h2>
                                    <p class="text-gray-700">{{ $new->summary }}</p>
                                    <p class="mt-5 font-medium text-sm text-gray-500">{{ $new->created_at->format('d/m/Y') }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </section>
</div>

@endsection
