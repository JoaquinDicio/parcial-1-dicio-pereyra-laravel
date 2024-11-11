@extends('layouts.administrator')

@section('title', 'Usuarios')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Lista de Usuarios</h1>
        <a href="{{ route('admin.userForm') }}" class="bg-green-500 hover:bg-green-700 text-white rounded p-2 text-sm mb-5">Agregar usuario +</a>
        <div class="overflow-x-auto mt-10">
            <table class="min-w-full bg-white border border-gray-200 text-center">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Nombre</th>
                        <th class="py-2 px-4 border-b">Correo Electrónico</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b flex justify-center gap-2 items-center">
                                <form action="{{ route('user.info', $user->id) }}" method="GET" class="inline">
                                    <button type="submit" class="bg-blue-500 text-white hover:bg-blue-700 cursor-pointer text-sm p-2 rounded">Ver más</button>
                                </form>
                                <form action="{{ route('user.delete', $user->id) }}" method="POST" onsubmit="return confirm('¿Estas seguro de borrar este usuario?');">
                                    @csrf
                                    @method('DELETE') 
                                    <button type="submit" class="cursor-pointer bg-red-500 hover:bg-red-700 text-white p-2 rounded focus:outline-none focus:shadow-outline text-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
