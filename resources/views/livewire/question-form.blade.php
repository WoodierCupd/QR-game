@if (Cookie::get('number') === null)
    <div class="flex flex-col w-full items-center ">
        <a href="{{route('welcome')}}"><p class="text-5xl font-bold underline">Please enter your student number here!</p></a>
    </div>
@else
    <div class="flex flex-col w-full items-center ">
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
    </div>
@endif
