{{-- resources/views/users/checkout.blade.php --}}
@extends('layouts.users')

@section('title', 'Checkout')

@section('content')
<div class="container text-black py-20 px-10 min-h-screen">
    <h1 class="text-3xl font-semibold mb-8">Información de Pago</h1>

    <form action="{{ route('cart.payment') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="card_number" class="block text-sm font-medium">Número de Tarjeta</label>
            <input value="{{old('card_number')}}" type="text" name="card_number" id="card_number" class="mt-1 p-2 border w-full" maxlength="16" placeholder="1234 5678 9123 4567" required>
            @error('card_number')
                <i class="text-red-500 text-sm mt-1">{{$message}}</i>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="expiry_date" class="block text-sm font-medium">Fecha de Expiración</label>
            <input value="{{old('expiry_date')}}" type="text" name="expiry_date" id="expiry_date" class="mt-1 p-2 border w-full" placeholder="MM/AA" required>
            @error('expiry_date')
                <i class="text-red-500 text-sm mt-1">{{$message}}</i>
            @enderror
        </div>

        <div class="mb-4">
            <label for="cvv" class="block text-sm font-medium">CVV</label>
            <input value="{{old('cvv')}}" type="text" name="cvv" id="cvv" class="mt-1 p-2 border w-full" maxlength="3" placeholder="123" required>
            @error('cvv')
                <i class="text-red-500 text-sm mt-1">{{$message}}</i>
            @enderror
        </div>
        <button type="submit" class="bg-green-500 hover:bg-blue-600 text-white py-2 px-6 rounded-lg">
            Pagar ${{ number_format(session('cart_total') , 2, ',', '.')}}
        </button>
    </form>
</div>
@endsection
