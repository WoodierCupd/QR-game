<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head></x-head>
<body class="container mx-auto bg-gradient-to-r from-dark_red to-almost_black text-white h-screen flex flex-col">
<x-header></x-header>
<div class="flex flex-col w-full items-center">
    <div class="text-3xl">
        <p>{{$question->question}}</p>
    </div>
    <div class="flex flex-col mt-5">
        <button class="bg-white text-black rounded p-1.5"><p class="text-xl">A. {{$question->option_a}}</p></button>
        <button class="bg-white text-black rounded p-1.5 mt-2.5"><p class="text-xl">B. {{$question->option_b}}</p></button>
        <button class="bg-white text-black rounded p-1.5 mt-2.5"><p class="text-xl">C. {{$question->option_c}}</p></button>
    </div>
</div>
@livewireScripts
</body>
</html>
