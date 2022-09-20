@if (Cookie::get('number') === null)
    <div class="flex flex-col w-full items-center ">
        <a href="{{route('welcome')}}"><p class="text-5xl font-bold underline">Vul hier eerst je leerling nummer in!</p></a>
    </div>
@else
    <div class="flex flex-col w-full items-center ">
        @if($question->type == 1)
                @if($done !== true)
                    <div class="text-3xl">
                        <p>{{$question->question}}</p>
                    </div>
                    <div class="flex flex-col mt-5">
                        <button wire:click="answer_a" class="bg-white text-black rounded p-1.5"><p class="text-xl text-left">A. {{$question->option_a}}</p></button>
                        <button wire:click="answer_b" class="bg-white text-black rounded p-1.5 mt-2.5"><p class="text-xl text-left">B. {{$question->option_b}}</p></button>
                        <button wire:click="answer_c" class="bg-white text-black rounded p-1.5 mt-2.5"><p class="text-xl">C. {{$question->option_c}}</p></button>
                    </div>
                @else
                    <div class="text-3xl">
                        @if(isset($score->correct))
                            <p>@if($score->correct) Je hebt de vraag correct beantwoord. @else Je hebt de vraag fout beantwoord. @endif</p>
                        @else
                            <p>Je hebt deze vraag al beantwoord.</p>
                        @endif
                    </div>
                @endif
        @elseif($question->type == 2)
            @if($done !== true)
                <div class="text-3xl mb-4">
                    <p>{{$question->question}}</p>
                </div>
                <form wire:submit.prevent="save" class="flex flex-col">
                    <input wire:model="picture" class="form-input m-0 p-1 rounded text-black h-10" name="picture" type="file">
                    @error('picture') <span class="error">{{ $message }}</span> @enderror
                    <button class="btn h-10 font-bold bg-black rounded mt-2.5" type="submit">Upload foto</button>
                </form>
            @else
{{--                TODO: of je het antwoord goed word / controleren docent--}}
            @endif
        @endif
    </div>
@endif
