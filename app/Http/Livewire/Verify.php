<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Verify extends Component
{
    public $verify_request;

public function render()
    {
        return view('livewire.verify');
    }
}
