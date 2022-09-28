<div>
    <div class="mt-5 flex flex-col items-center">
        <div class="flex flex-col" style="max-width: 95%">
            <form wire:submit.prevent="save" class="flex flex-col">
                <label for="csv">Upload hier een <span class="font-bold">CSV</span> bestand met vragen.</label>
                <input wire:model="file" class="form-input m-0 p-1 rounded text-black h-10" name="csv" type="file">
                @error('file') <span class="error">{{ $message }}</span> @enderror
                <button class="btn h-10 font-bold bg-black rounded mt-2.5" type="submit">Generate QR-Codes</button>
            </form>
            <div class="flex flex-col">
                <button wire:click="pdf" class="btn h-10 font-bold bg-black rounded mt-2.5" type="submit">Generate PDF</button>
            </div>
            <form wire:submit.prevent="deleteAll" class="flex flex-col">
                <button class="btn h-10 font-bold bg-black rounded mt-2.5" type="submit">Delete all QR-Codes</button>
                @if(session()->has('message')) <span class="alert alert-success">{{ session('message') }}</span> @endif
            </form>
        </div>
    </div>
    <div class="overflow-hidden">
        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
            <h2 class="text-5xl pb-3">Verify requests:</h2>
            <div class="w-full grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-4">
                @foreach($verify_requests as $request)
                    <a class="bg-black text-center py-5 rounded" href="{{route('verify', $request->id)}}">
                        <p class="w-full text-3xl">Verify - {{$request->getQuestion->original_id}}</p>
                    </a>
                @endforeach
            </div>
            <h2 class="text-5xl pb-3 mt-8">QR Codes:</h2>
            <div class="flex flex-wrap -m-1 md:-m-2">
                @foreach($questions as $question)
                    <div class="flex flex-wrap w-full md:w-1/2 lg:w-1/3 mb-3">
                        <h3 class="text-3xl text-white">{{$question['original_id']}}</h3>
                        <div class="w-full p-1 md:p-2">
                            <a href="{{route('question', $question->id)}}"><img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" src="{{asset($question['qr_path'])}}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

