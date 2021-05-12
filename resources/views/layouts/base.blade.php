<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data x-bind:class="{'dark': $store.theme.dark}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="{{ config('app.theme') }}">

        <title>{{ config('app.name') }}</title>


        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}" defer></script>

        <livewire:styles />
    </head>
    <body class="font-sans antialiased"> 
    
        <!-- Loader  -->
        <div class="w-full h-full fixed block inset-0 bg-white opacity-1 z-50" x-data="{loader: false }" x-show="loader">
            <span class="opacity-80 top-1/3 text-center my-0 mx-auto relative w-12 h-12">
                <div class=" ">
                    <svg class="animate animate-spin h-12 w-12 text-gray-800 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-gray-800 text-2xl">Loading...</span>
                </div>
            </span>
        </div>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <livewire:scripts />
    </body>
</html>
