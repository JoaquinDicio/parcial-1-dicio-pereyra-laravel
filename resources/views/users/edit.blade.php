@extends('layouts.users')

@section('title', 'Editar Datos')

@section('content')
    <section class="bg-slate-100 min-h-screen pt-20">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edita tus Datos</h1>
            <form id="editForm" action="{{ route('user.update') }}" method="POST" class="bg-white max-w-[900px] w-full mx-auto p-4 rounded shadow">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                        class="w-full mt-2 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                        class="w-full mt-2 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex justify-end">
                    <button type="button" id="openModal" class="w-25 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Modal -->
    
    <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-[400px]">
            <h2 class="text-lg font-bold text-gray-800 mb-4">¿Confirmar Cambios?</h2>
            <p class="text-gray-600 mb-6">¿Estas seguro de que deseas guardar los cambios realizados en tus datos?</p>
            <div class="flex justify-end gap-4">
                <button id="cancelButton" class="bg-gray-300 text-gray-800 py-2 px-4 rounded hover:bg-gray-400 transition">Cancelar</button>
                <button id="confirmButton" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Confirmar</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openModal = document.getElementById('openModal');
            const confirmationModal = document.getElementById('confirmationModal');
            const cancelButton = document.getElementById('cancelButton');
            const confirmButton = document.getElementById('confirmButton');
            const editForm = document.getElementById('editForm');

            openModal.addEventListener('click', () => {
                confirmationModal.classList.remove('hidden');
            });

            cancelButton.addEventListener('click', () => {
                confirmationModal.classList.add('hidden');
            });

            confirmButton.addEventListener('click', () => {
                editForm.submit();
            });
        });
    </script>
@endsection
