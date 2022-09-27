<div class="flex flex-1 flex-col justify-center items-center flex-1">
    <h1 class="font-extrabold text-6xl mb-2.5 font-rammetto">QR-QUIZ</h1>
    @if (Cookie::get('number') !== null)
        <div>
            <p>Studenten nummer: <span class="font-extrabold">{{request()->cookie('number')}}</span></p>
            @if($scores > 1)
                <p>Je hebt <span class="font-extrabold">{{$scores}}</span> vragen beantwoord.</p>
            @elseif($scores == 1)
                <p>Je hebt <span class="font-extrabold">1</span> vraag beantwoord.</p>
            @else
                <p>Je hebt nog geen vragen beantwoord.</p>
            @endif
            @if($verify_requests > 1)
                <p>Er moeten nog <span class="font-extrabold">{{$verify_requests}}</span> vragen nagekeken worden.</p>
            @elseif($verify_requests == 1)
                <p>Er moet nog <span class="font-extrabold">1</span> vraag nagekeken worden.</p>
            @else
                <p>Er hoeven geen vragen meer nagekeken te worden.</p>
            @endif
        </div>
    @else
        <form wire:submit.prevent="save" class="flex flex-col bg-white text-center p-5 rounded">
            <input wire:model="number" class="input h-10 text-black text-center mb-2.5 rounded" type="text" placeholder="Leerling nummer">
            <button type="submit" class="btn h-10 font-bold bg-black rounded">Bevestigen</button>
        </form>
        @error('number') <span class="error">{{ $message }}</span> @enderror
    @endif
</div>
