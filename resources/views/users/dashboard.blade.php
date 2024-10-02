@extends('layouts.users')

@section('title', 'Dashboard')

@section('content')
    <section class="pt-12 pb-6">
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

        <div class="container mx-auto flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 p-6">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Bienvenido, {{ Auth::user()->name }}</h1>
                <p class="text-gray-600 text-lg">
                    Aca podes ver los servicios a los que estás suscripto.
                </p>
            </div>
        </div>
    </section>

    <!-- Listado de suscripciones activas -->
    <section class="px-5 pb-10 min-h-[90vh]">
        <div class="container mx-auto text-center">
            @if(count($subscriptions) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($subscriptions as $subscription)
                    <div class="bg-white rounded-xl p-6 border border-green-600">
                        <h3 class="text-xl font-bold text-gray-700 mb-2">{{ $subscription->service->name }}</h3>
                        <p class="text-gray-600 mb-4 text-start">{{ $subscription->service->description }}</p>

                        <div class="mb-4">
                            <span class="text-3xl font-bold text-gray-800">AR$ {{ number_format($subscription->service->price, 0, ',', '.') }}</span>
                            <span class="text-sm text-gray-600">/mes</span>
                        </div>

                        <form action="{{ route('unsubscribe', $subscription->service_id) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 rounded-lg py-4 border font-semibold font-xl border-red-600 px-4 hover:text-white hover:bg-red-600 w-full transition ease-in-out duration-200">Desuscribirse</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-lg">No te suscribiste a nada todavia.</p>
            @endif
        </div>
    </section>
@endsection
