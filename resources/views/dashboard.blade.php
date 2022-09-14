<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="mt-5 flex flex-col items-center">
            <div class="flex flex-col">
                <label class="" for="csv">Upload hier een <span class="font-bold">CSV</span> bestand met vragen.</label>
                <input class="form-input m-0 p-2 rounded" name="csv" type="file">
            </div>
        </div>
    </div>
</x-app-layout>
