<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head></x-head>
    <body class="container mx-auto bg-indigo-800 text-white">
        <x-header></x-header>
        <x-main></x-main>
        <x-footer></x-footer>
    </body>
</html>
