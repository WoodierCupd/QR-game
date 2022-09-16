<?php

namespace App\Http\Livewire;

use App\Models\Score;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class QuestionForm extends Component
{
    public $question;
    public $value;
    public $number;
    public $done;

    public function mount(){
        $this->number = Cookie::get('number');
        $score = Score::where([
            ['student_number', '=', $this->number],
            ['question_id', '=', $this->question->id],
        ])->get();
        if ($score->isEmpty()) {
            $this->done = false;
        } else {
            $this->done = true;
        }
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
        $this->done = true;
    }

    public function render()
    {
        return view('livewire.question-form');
    }
}
