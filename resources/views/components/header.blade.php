<div class="flex justify-center md:justify-start h-16">
    @if(\Request::route()->getName() == 'dashboard')
        <button class="px-5"><a href="{{route('welcome')}}">Back</a></button>
    @endif
    {{--TODO: Make open camera button for mobile to scan the QR-codes--}}
</div>
