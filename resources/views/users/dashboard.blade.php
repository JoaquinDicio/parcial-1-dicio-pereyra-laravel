@extends('layouts.users')

@section('title', 'Dashboard')

@section('content')
    <section class="pt-12 pb-6  bg-slate-100">
        <!-- ERRORES Y SUCCESS -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded text-center">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 mb-4 rounded text-center">
                {{ session('error') }}
            </div>
        @endif
        <!-- FIN: ERRORES Y SUCCESS -->

        <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center max-w-[1100px]">
            <div class="lg:w-1/2 p-6 flex justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Bienvenido, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-600 text-lg">
                        Aca podes ver los servicios a los que estás suscripto.
                    </p>
                </div>
            </div>
            <a href="{{ route('user.edit') }}" 
                class="bg-blue-600 text-white rounded-lg py-2 px-4 hover:bg-blue-700 transition duration-200">
                Editar mis datos
            </a>

        </div>
    </section>

    <!-- LISTADO DE SUSCRIPCIONES ACTIVAS -->
    <section class="px-5 pb-10 min-h-[90vh] bg-slate-100">
        <div class="container mx-auto text-center">
            @if(count($subscriptions) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mx-auto max-w-[1100px]">
                    @foreach($subscriptions as $subscription)
                    <div class="bg-white rounded-xl p-6  flex shadow flex-col">

                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-700 mb-2">{{ $subscription->service->name }}</h3>
                            <div class="mb-4">
                                <span class="text-3xl font-bold text-gray-800">AR$ {{ number_format($subscription->service->price, 0, ',', '.') }}</span>
                                <span class="text-sm text-gray-600">/mes</span>
                            </div>
                        </div>
                        <form class="mb-5" action="{{ route('unsubscribe', $subscription->service_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white rounded-lg py-4 border font-semibold font-xl bg-red-600 px-4 hover:bg-red-700  w-full transition ease-in-out duration-200">Desuscribirse</button>
                        </form>

                        <div>
                            <h4 class="text-sm font-medium text-start mb-2">Detalle</h4>
                            <p class="text-gray-600 mb-4 text-start">{{ $subscription->service->description }}</p>
                        </div>


                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-lg">No hay ninguna suscripcion.</p>
            @endif
        </div>
    </section>
@endsection
