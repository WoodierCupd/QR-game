<div class="flex flex-1 flex-col justify-center items-center flex-1">
    <h1 class="font-extrabold text-6xl mb-2.5 font-rammetto">QR-QUIZ</h1>
    @if (Cookie::get('number') !== null)
        <p>{{request()->cookie('number')}}</p>
        <div>
            <p>Je hebt {{$scores}} vragen beantwoord.</p>
            <p>Er moeten nog {{$verify_requests}} vragen nagekeken worden.</p>
        </div>
    @else
        <form wire:submit.prevent="save" class="flex flex-col bg-white text-center p-5 rounded">
            <input wire:model="number" class="input h-10 text-black text-center mb-2.5 rounded" type="text" placeholder="Leerling nummer">
            <button type="submit" class="btn h-10 font-bold bg-black rounded">Bevestigen</button>
        </form>
        @error('number') <span class="error">{{ $message }}</span> @enderror
    @endif
</div>
