@extends('layouts.administrator')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6">Detalles del Usuario: {{ $user->name }}</h1>

        <h2 class="text-2xl font-semibold mb-4">Suscripciones</h2>

        @if($subscriptions->isEmpty())
            <p>No hay suscripciones para este usuario.</p>
        @else
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-center">ID</th>
                        <th class="py-2 px-4 border-b text-center">Servicio</th>
                        <th class="py-2 px-4 border-b text-center">Fecha de Contrato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscriptions as $subscription)
                        <tr>
                            <td class="py-2 px-4 border-b text-center">{{ $subscription->id }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $subscription->service->name }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $subscription->contract_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
