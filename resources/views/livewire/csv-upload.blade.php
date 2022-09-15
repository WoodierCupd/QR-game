<div>
    <div class="mt-5 flex flex-col items-center">
        <div class="flex flex-col" style="max-width: 95%">
            <form wire:submit.prevent="save" class="flex flex-col">
                <label for="csv">Upload hier een <span class="font-bold">CSV</span> bestand met vragen.</label>
                <input wire:model="file" class="form-input m-0 p-1 rounded text-black h-10" name="csv" type="file">
                @error('file') <span class="error">{{ $message }}</span> @enderror
                <button class="btn h-10 font-bold bg-black rounded mt-2.5" type="submit">Generate QR-Codes</button>
            </form>
            <form wire:submit.prevent="deleteAll" class="flex flex-col">
                <button class="btn h-10 font-bold bg-black rounded mt-2.5" type="submit">Delete all QR-Codes</button>
                @if(session()->has('message')) <span class="alert alert-success">{{ session('message') }}</span> @endif
            </form>
        </div>
    </div>
    <div class="overflow-hidden text-gray-700 ">
        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
            <div class="flex flex-wrap -m-1 md:-m-2">

                <div class="flex flex-wrap w-1/3">
                    <div class="w-full p-1 md:p-2">
                        <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                             src="{{asset("images\qrcode_question_218.svg")}}">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

