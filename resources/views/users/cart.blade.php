
@extends('layouts.users')

@section('title', 'Dashboard')

@section('content')
        @if(session('error'))
            <div class="bg-red-500 text-white absolute bottom-0 w-full py-5 text-center">
                {{ session('error') }}
            </div>
        @endif
<div class="container text-black py-20 px-10 min-h-screen mx-auto">
    <h1 class="text-3xl font-semibold mb-8">Carrito</h1>

    @if(empty($groupedItems))
        <div class="w-full flex items-center justify-center">
            <p class="text-xl font-medium">No hay productos en tu carrito</p>
        </div>
    @else
        <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200">
            <ul class="space-y-4">
                @foreach($groupedItems as $group)
                <li class="border-b hover:bg-gray-50 flex items-center p-4 sm:flex sm:space-x-6">
                    <div class="sm:w-1/4 font-semibold">
                        <p>{{ $group['service']->name }}</p>
                    </div>
                    <div class="sm:w-1/2">
                        <p>{{ $group['service']->description }}</p>
                    </div>
                    <div class="sm:w-1/4 sm:text-center font-medium text-xl">
                        <p>${{ number_format($group['service']->price, 2) }} <span class="text-sm font-normal">x</span> {{$group['quantity']}}</p>
                    </div>
                    <div class="sm:w-1/4 mt-2 sm:text-center sm:mt-0">
                        <form action="{{ route('cart.remove', $group['item_id']) }}" method="POST">
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
            <div id="wallet_container"></div>
        </div>

        <script>

        const mp = new MercadoPago('TEST-708ec68b-3d6d-4253-91ec-793beaecf543');
        const bricksBuilder = mp.bricks();

        mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: '{{$preference->id}}',
        },
        customization: {
                texts: {
                    action: "pay",
                    valueProp: 'security_safety',
                },
            },
        });
        </script>
    @endif
</div>
@endsection

