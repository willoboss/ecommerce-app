<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

        <style src="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css"> </style>

        {{-- Dashboard Admin --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        {{-- Dashbord Admin --}}
        <script>
            // Gráfica de Usuarios
            var usersChart = new Chart(document.getElementById('usersChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Nuevos', 'Registrados'],
                    datasets: [{
                        data: [30, 65],
                        backgroundColor: ['#00F0FF', '#8B8B8D'],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom' // Ubicar la leyenda debajo del círculo
                    }
                }
            });

            // Gráfica de Comercios
            var commercesChart = new Chart(document.getElementById('commercesChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Nuevos', 'Registrados'],
                    datasets: [{
                        data: [60, 40],
                        backgroundColor: ['#FEC500', '#8B8B8D'],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom' // Ubicar la leyenda debajo del círculo
                    }
                }
            });

            // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
            const menuBtn = document.getElementById('menuBtn');
            const sideNav = document.getElementById('sideNav');

            menuBtn.addEventListener('click', () => {
                sideNav.classList.toggle('hidden'); // Agrega o quita la clase 'hidden' para mostrar u ocultar la navegación lateral
            });
        </script>
    </body>
</html>
