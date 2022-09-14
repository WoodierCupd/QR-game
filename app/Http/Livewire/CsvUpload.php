<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class CsvUpload extends Component
{
    use WithFileUploads;

    public $file;

    public function save()
    {
        $this->validate([
            'file' => 'required|max:1024|mimes:csv,txt', // 1MB Max
        ]);

        $this->file->store('file');
    }

    public function render()
    {
        return view('livewire.csv-upload');
    }
}
