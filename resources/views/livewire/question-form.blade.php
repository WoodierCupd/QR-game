<div class="flex flex-col w-full items-center ">
    <div class="text-3xl">
        <p>{{$question->question}}</p>
    </div>
    <div class="flex flex-col mt-5">
        <button wire:click="answer_a" class="bg-white text-black rounded p-1.5"><p class="text-xl text-left">A. {{$question->option_a}}</p></button>
        <button wire:click="answer_b" class="bg-white text-black rounded p-1.5 mt-2.5"><p class="text-xl text-left">B. {{$question->option_b}}</p></button>
        <button wire:click="answer_c" class="bg-white text-black rounded p-1.5 mt-2.5"><p class="text-xl">C. {{$question->option_c}}</p></button>
    </div>
</div>
