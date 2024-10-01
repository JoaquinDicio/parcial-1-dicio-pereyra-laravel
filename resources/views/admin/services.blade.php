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

        <h1 class="text-3xl font-bold mb-6">Detalles de Servicios</h1>
        <p>Desde aca podes gestionar todo lo referido a los servicios ofrecidos</p>
        <nav class="mt-5 mb-10">
            <a href="/addServiceForm" class="rounded-sm px-3 py-2 text-white font-medium text-sm bg-green-500 my-8">Nuevo servicio +</a>
        </nav>
        @if($services->isEmpty())
            <p>No hay servicios disponibles.</p>
        @else
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-center">ID</th>
                        <th class="py-2 px-4 border-b text-center">Nombre del Servicio</th>
                        <th class="py-2 px-4 border-b text-center">Descripción</th>
                        <th class="py-2 px-4 border-b text-center">Precio</th>
                        <th class="py-2 px-4 border-b text-center">Fecha de Creación</th>
                        <th class="py-2 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td class="py-2 px-4 border-b text-center">{{ $service->id }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $service->name }}</td>
                            <td class="py-2 px-4 border-b text-start">{{substr($service->description, 0, 150 )}}...</td>
                            <td class="py-2 px-4 border-b text-center">${{ number_format($service->price, 2, ',', '.') }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $service->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                <div class="flex gap-2">
                                    <a class="cursor-pointer text-sm bg-orange-500 hover:bg-orange-700 text-white p-2 rounded" href="/services/{{ $service->id }}/edit">Editar</a>
                                    <form action="{{ route('services.delete', $service->id) }}" method="POST" onsubmit="return confirm('¿En serio lo vas a borrar :( ?');">
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