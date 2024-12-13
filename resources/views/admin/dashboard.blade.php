@extends('layouts.administrator')

@section('title', 'Administrator Dashboard')

@section('content')
    <div class="bg-slate-100 min-w-[1100px] p-6 rounded-lg shadow-lg max-w-4xl mx-auto mt-10 ">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Bienvenido al Panel de Administración</h1>
        <p class="text-lg text-gray-600 mb-6">
            ¡Hola, {{ Auth::user()->name }}! Este es el panel de administrador. Desde aca podes gestionar los posts y los usuarios del sistema.
        </p>

        <section class="rounded flex  justify-between w-full">
            <div class="w-1/2 p-6">
                <h3 class="text-2xl font-bold mb-10">Los servicios más solicitados</h3>
                <p>Servicio con más suscriptores: <br> <strong class="text-[40px]">{{ $mostSubscribedServiceName }}</strong></p>
            </div>
        
            <div class="container mx-auto text-center w-1/2 p-6">
                <canvas id="subscriptionsChart" ></canvas>
            </div>
        </section>
        

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const services = @json($services);
        const subscriptionsCount = @json($subscriptionsCount);

        const serviceNames = services.map(service => service.name);
        const subscriptionCounts = subscriptionsCount.map(count => count.count);

        const ctx = document.getElementById('subscriptionsChart').getContext('2d');
        
        const subscriptionsChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: serviceNames,
                hoverOffset: 4,
                datasets: [{
                    label: 'Cantidad de suscripciones',
                    data: subscriptionCounts, // Cantidad de suscripciones por servicio
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    borderWidth: 1
                }],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
