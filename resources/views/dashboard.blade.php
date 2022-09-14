<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head></x-head>
    <body class="container mx-auto bg-gradient-to-r from-dark_red to-almost_black text-white h-screen flex flex-col">
        <x-header></x-header>
        <div class="mt-5 flex flex-col items-center">
            <livewire:csv-upload/>
        </div>
        @livewireScripts
    </body>
</html>
