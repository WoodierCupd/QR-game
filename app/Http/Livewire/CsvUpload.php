<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Illuminate\Support\Facades\Storage;
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

        $file_name = $this->file->store('file');
        $path = storage_path('app/') . $file_name;
        $file = fopen($path, "r");
        $importData_arr = array();
        $i = 0;
        while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
            $num = count($filedata);
            if ($i == 0) {
                $i++;
                continue;
            }
            for ($c = 0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
        }
        fclose($file);
        Storage::delete($file_name);

        foreach ($importData_arr as $importData) {
            Question::create([
                'original_id' => $importData[0],
                'question' => $importData[1],
                'option_a' => $importData[2],
                'option_b' => $importData[3],
                'option_c' => $importData[4],
                'answer' => $importData[5],
            ]);
        }
    }

    public function render()
    {
        return view('livewire.csv-upload');
    }
}