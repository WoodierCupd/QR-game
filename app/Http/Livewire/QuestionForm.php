<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Score;
use App\Models\verify_request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Component;

class QuestionForm extends Component
{
    use WithFileUploads;

    public $question;
    public $value;
    public $number;
    public $done;
    public $score;
    public $picture;
    public $score_data;

    public function mount(){
        $this->number = Cookie::get('number');
        if ($this->number !== null){
            $score = Score::where([
                ['student_number', '=', $this->number],
                ['question_id', '=', $this->question->id],
            ])->get();
            $verify = verify_request::where([
                ['student_number', '=', $this->number],
                ['question_id', '=', $this->question->id],
            ])->get();
            $this->score = $score;
            if ($score->isEmpty() && $verify->isEmpty()) {
                $this->done = false;
            } else {
                $this->done = true;
            }
            $this->score_data = Score::where('student_number', '=', $this->number)->where('question_id', '=', $this->question->id)->get();
        }
    }

    public function save(){
        $this->validate([
            'picture' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // 10MB Max
        ]);
        $picture = $this->picture->store('public');
        $verify = verify_request::create([
            'student_number' => $this->number,
            'question_id' => $this->question->id,
            'image_path' => strstr($picture, '/'),
        ]);
        $this->done = true;
    }

    public function answer_a(){
        $this->value = 'a';
        $this->teacher();
    }

    public function answer_b(){
        $this->value = 'b';
        $this->teacher();
    }

    public function answer_c(){
        $this->value = 'c';
        $this->teacher();
    }

    public function answer_d(){
        $this->value = 'd';
        $this->teacher();
    }

    private function teacher()
    {
        if ($this->value == strtolower( $this->question->answer)){
            $correct = true;
        } else{
            $correct = false;
        }
        $score = Score::create([
            'student_number' => $this->number,
            'question_id' => $this->question->id,
            'correct' => $correct,
        ]);
        $this->score = $score;
        $this->done = true;
    }

    public function render()
    {
        return view('livewire.question-form');
    }
}
