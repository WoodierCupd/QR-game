<div class="flex flex-1 flex-col justify-center items-center flex-1">
    <div class="flex flex-col justify-center items-center mb-4">
        <h1 class="font-extrabold text-6xl mb-4 font-rammetto">Verify</h1>
        <button wire:click="good" class="btn mb-2 w-28 h-10 font-bold bg-green-500 rounded">Goed</button>
        <button wire:click="bad" class="btn w-28 h-10 font-bold bg-red-500 rounded">Fout</button>
    </div>
    <div class="sm:w-2/3 text-xl flex flex-col justify-center items-center">
        <h1>{{$verify_request->getQuestion->question}}</h1>
        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg w-fit" src='{{asset("storage/{$verify_request->image_path}")}}'>
    </div>
</div>
