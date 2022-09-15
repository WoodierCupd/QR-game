<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class StudentNumber extends Component
{
    public $number;

    public function save(){
        $this->validate([
            'number' => 'required|digits:7',
        ]);
        Cookie::queue('number', $this->number, 1440);
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.student-number');
    }
}
