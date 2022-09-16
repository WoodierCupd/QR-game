<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuestionForm extends Component
{
    public $question;
    public $value;

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
        if ($this->value == $this->question->answer){
            dd('Nice!');
        } else{
            dd('U Dumb!');
        }
    }

    public function render()
    {
        return view('livewire.question-form');
    }
}
