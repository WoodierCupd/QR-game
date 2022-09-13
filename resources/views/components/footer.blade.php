<div class="flex h-16 pl-4 items-center">
    @auth
        <a href="{{ url('/dashboard') }}">Klik <span class="text-blue-400">hier</span> om naar het dashboard te gaan.</a>
    @else
        <a href="{{ route('login') }}">Bent u een docent? Log dan <span class="text-blue-400">hier</span> in.</a>
    @endauth
</div>
