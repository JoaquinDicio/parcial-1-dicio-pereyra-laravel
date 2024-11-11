@extends('layouts.users')

@section('title', 'Home')

@section('content')
    <section class= "py-12">
        <!-- ERRORES Y SUCCESS -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded text-center">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white p-4 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif
        <!-- FIN: ERRORES Y SUCCESS -->
        <div class="container mx-auto flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 p-6">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Bienvenido a Host Engine</h1>
                <p class="text-gray-600 text-lg">
                    Host Engine es tu solución ideal para hosting de alto rendimiento. Nos especializamos en ofrecer servidores dedicados, soporte 24/7, y una infraestructura optimizada para el mejor rendimiento web.
                </p>
            </div>
            <div class="lg:w-1/2 p-6">
                <img src="{{ asset('img/home.png') }}" alt="Host Engine Home" class="rounded-lg ">
            </div>
        </div>
    </section>

    <section class="py-12"> 
        <h2 class="text-center text-3xl font-semibold">Nuestro servicio es recomendado por</h2>
        <div class="flex justify-center gap-5 py-10">
            <div><img src="{{ asset('img/1.jpg') }}" alt="Host Engine Home" class="rounded-lg "></div>
            <div><img src="{{ asset('img/2.jpg') }}" alt="Host Engine Home" class="rounded-lg "></div>
            <div><img src="{{ asset('img/3.jpg') }}" alt="Host Engine Home" class="rounded-lg "></div>
            <div><img src="{{ asset('img/4.jpg') }}" alt="Host Engine Home" class="rounded-lg "></div>
        </div>

    </section>

    <section class="bg-slate-100 py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mt-5 mb-12">Elegí el plan perfecto para vos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mx-auto max-w-[1100px]">
                @foreach($services as $service)
                <div class="bg-white rounded-xl p-6 shadow flex flex-col">
                   <div class="p-5">
                       <h3 class="text-xl font-bold text-gray-700 mb-3">{{ $service->name }}</h3>
                       <div class="mb-4">
                           <span class="text-3xl font-bold text-gray-800">AR$ {{ number_format($service->price, 0, ',', '.') }}</span>
                           <span class="text-sm text-gray-600">/mes</span>
                       </div>
                   </div>
                    @if(in_array($service->id, $subscriptions))
                        <form class="mb-5" action="{{ route('unsubscribe', $service->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white rounded-lg py-4 border font-semibold font-xl bg-red-600 px-4 hover:bg-red-700  w-full transition ease-in-out duration-200">Desuscribirse</button>
                        </form>
                    @else
                        <form class="mb-5" action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <button type="submit" class="bg-blue-600 text-white rounded-lg py-4 font-semibold font-xl px-4  hover:bg-blue-700  w-full transition ease-in-out duration-200">Elegir plan</button>
                        </form>
                    @endif
                    <div>
                        <h4 class="text-sm font-medium text-start mb-2">Detalle</h4>
                        <p class="text-gray-600 mb-4 text-start">{{ $service->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    
@endsection

