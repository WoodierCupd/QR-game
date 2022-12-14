<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Score;
use App\Models\verify_request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CsvUpload extends Component
{
    use WithFileUploads;

    public $file;
    public $questions;
    public $verify_requests;
    public $scores;

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
            $question = Question::create([
                'original_id' => $importData[0],
                'question' => $importData[1],
                'option_a' => $importData[2],
                'option_b' => $importData[3],
                'option_c' => $importData[4],
                'option_d' => $importData[5],
                'answer' => $importData[6],
                'type' => $importData[7],
            ]);

            QrCode::size(300)->generate("http://qr-game.test/question/{$question['id']}", public_path("images\qrcode_question_{$question['id']}.svg"));
            Question::find($question['id'])->update(['qr_path' => "images\qrcode_question_{$question['id']}.svg"]);
        }

        session()->flash('message', 'Successfully added the QR-Codes');
    }

    public function deleteAll(){
        $questions = Question::all();
        foreach ($questions as $question){
            File::delete(public_path($question['qr_path']));
            $question->delete();
        }
        session()->flash('message', 'Successfully deleted all QR-Codes');

    }

    public function pdf(){
        return redirect()->to(route('pdf'));
    }

    public function render()
    {
        $this->scores = Score::all();
        $this->verify_requests = verify_request::all();
        $this->questions = Question::all();
        return view('livewire.csv-upload');
    }
}
