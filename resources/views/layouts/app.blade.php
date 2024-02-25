<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('isBLOG') }}</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- CDN FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CDN SWEET ALERT 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    {{-- MENSAJE --}}
    @if (session('mensaje'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('mensaje') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    {{-- LIVEWIRE --}}
    <script>
        Livewire.on('mensaje', txt => {
            Swal.fire({
                icon: "success",
                title: txt,
                showConfirmButton: false,
                timer: 2000
            });
        });
        Livewire.on('borrarConfirmada', (id) => {
            Swal.fire({
                title: "¿Está Segur@?",
                text: "¡¡No podrá deshacer esta acción!!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, borrar artículo: ",
                cancelButtonText: "No, lo pensaré mejor",
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatchTo('show-aricles', 'borrarOK', id);
                }
            });
        })
    </script>
</body>

</html>
