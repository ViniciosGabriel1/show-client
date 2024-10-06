<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Show Client') }}</title>

        <!-- Fonts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


        <!-- Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

{{-- @if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sucesso!',
        text: "{!! session('success') !!}",
        confirmButtonText: 'OK'
    });
</script>
@endif --}}


@if (session('success'))
<script>
Swal.fire({
icon: 'success',
title: 'Sucesso!',
html: '{!! session('success') !!}', 
confirmButtonText: 'OK'
});
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Erro!',
        text: "{{ session('error') }}",
        confirmButtonText: 'Tentar novamente'
    });
</script>
@endif

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
            <script src="{{ asset('js/modulo.js') }}" defer></script>
            <script src="{{ asset('js/modalEdit.js') }}" defer></script>
            <script src="{{ asset('js/modalMensagem.js') }}" defer></script>


        </div>
    </body>
</html>
