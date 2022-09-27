<?php

namespace App\Http\Livewire;

use App\Models\Score;
use App\Models\verify_request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Verify extends Component
{
    public $verify_request;
    public $value;

    public function good(){
        $this->value = true;
        $this->teacher();
    }

    public function bad(){
        $this->value = false;
        $this->teacher();
    }

    private function teacher(){
        if ($this->value){
            $score = Score::create([
                'student_number' => $this->verify_request->student_number,
                'question_id' => $this->verify_request->question_id,
                'correct' => 1,
            ]);
            Storage::delete("public.{$this->verify_request->image_path}");
            verify_request::find($this->verify_request->id)->delete();
            return redirect()->to(route('dashboard'));
        } else {
            $score = Score::create([
                'student_number' => $this->verify_request->student_number,
                'question_id' => $this->verify_request->question_id,
                'correct' => 0,
            ]);
            Storage::delete("public.{$this->verify_request->image_path}");
            verify_request::find($this->verify_request->id)->delete();
            return redirect()->to(route('dashboard'));
        }
    }

    public function render()
    {
        return view('livewire.verify');
    }
}
