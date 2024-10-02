@extends('layouts.users')

@section('title')
    {{$new->title}}
@endsection

@section('content')
    @if (!$new)
        <section class="flex items-center justify-center min-h-screen">
        <div class="flex items-center flex-col gap-5">
            <p class=" text-xl font-medium text-center">Parece que la noticia no existe o no esta disponible</p>
            <a href="/user-news" class="w-fit px-4 py-2 rounded-sm bg-blue-600 text-white">Ver otras noticias</a>
        </div>
        </section>
    @endif
        <section class="min-h-screen py-16 slate-100">
            <div class="bg-white rounded-sm shadow mt-10 max-w-[1000px] p-10 mx-auto">
                <h1 class="mb-5 font-bold text-2xl">{{$new->title}}</h1>
                <p class="mb-6"><i>{{$new->summary}}</i></p>
                <img class="w-full max-h-[600px] object-cover" src="{{'/' . $new->img}}" alt="{{$new->title}}">
                <p class="mt-6">{{$new->content}}</p>
            </div>
        </section>
@endsection
