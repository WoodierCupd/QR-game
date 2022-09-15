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
