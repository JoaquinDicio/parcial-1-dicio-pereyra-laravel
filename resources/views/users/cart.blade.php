@extends('layouts.users')

@section('title', 'Dashboard')

@section('content')
<div class="container text-black py-20 px-10 min-h-screen">
    <h1 class="text-3xl font-semibold mb-8">Carrito</h1>

    @if($cartItems->isEmpty())
    <div class="w-full min-h-screen flex items-center justify-center">
        <p class="text-xl font-medium">No hay productos en tu carrito</p>
    </div>
    @else
        <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200">
            <ul class="space-y-4">
                @foreach($cartItems as $item)
                    <li class="border-b hover:bg-gray-50 p-4 sm:flex sm:space-x-6">
                        <div class="sm:w-1/4 font-semibold">{{ $item->service->name }}</div>
                        <div class="sm:w-1/2">{{ $item->service->description }}</div>
                        <div class="sm:w-1/4 sm:text-center font-medium text-xl">{{ number_format($item->service->price, 2) }} $</div>
                        <div class="sm:w-1/4 mt-2 sm:text-center sm:mt-0">
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md">X</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6 flex justify-between items-center">
            <h4 class="text-xl font-semibold">Total: {{ number_format($total, 2) }} ARS$</h4>
            <a href="{{ route('cart.checkout') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-lg">Proceder al pago</a>
        </div>
    @endif
</div>
@endsection