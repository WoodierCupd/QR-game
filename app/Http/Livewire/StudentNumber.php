<?php

namespace App\Http\Livewire;

use App\Models\Score;
use App\Models\verify_request;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class StudentNumber extends Component
{
    public $number;
    public $scores;
    public $verify_requests;

    public function save(){
        $this->validate([
            'number' => 'required|digits:7',
        ]);
        Cookie::queue('number', $this->number, 1440);
        return redirect(request()->header('Referer'));
    }

    public function mount(){
        if (Cookie::get('number') !== null){
            $this->scores = Score::where([
                ['student_number', '=', $this->number],
            ])->count();
            $this->verify_requests = verify_request::where([
                ['student_number', '=', $this->number],
            ])->count();
        }
    }

    public function render()
    {
        return view('livewire.student-number');
    }
}
