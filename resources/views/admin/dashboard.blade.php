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
                <h2>Servicio con más suscriptores: <br> <strong class="text-[40px]">{{ $mostSubscribedServiceName }}</strong></h2>
            </div>
        
            <div class="container mx-auto text-center w-1/2 p-6">
                <canvas id="subscriptionsChart" ></canvas>
            </div>
        </section>

        <section class="rounded flex justify-between w-full mt-10">
            <div class="w-full p-6">
                <h3 class="text-2xl font-bold mb-4">Facturación por mes</h3>
                <h2 id="totalBillingAmount" class="text-xl font-bold text-gray-800 mb-4">
                    Total Facturación: ${{ number_format($totalBillingAmount, 2) }}
                </h2>
                <canvas id="totalBillingChart"></canvas>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // grafico estilo pastel (servicios)

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
                    data: subscriptionCounts, // cantidad de suscripciones por servicio
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

        // grafico de linea (facturacion)

        const billingData = @json($billingData);
        const billingMonths = billingData.map(data => data.month);
        const totalBillingAmounts = billingData.map(data => data.total);

        const billingCtx = document.getElementById('totalBillingChart').getContext('2d');
        const totalBillingChart = new Chart(billingCtx, {
            type: 'line',
            data: {
                labels: billingMonths,
                datasets: [{
                    label: 'Facturación Total ($)',
                    data: totalBillingAmounts,
                    backgroundColor: '#FFCE56',
                    borderColor: '#FFB300',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Facturación Total ($)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Meses'
                        }
                    }
                }
            }
        });
    </script>
@endsection


