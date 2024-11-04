<?php

namespace App\Livewire\Guest;

use Livewire\Attributes\Title;
use Livewire\Component;

class About extends Component
{
    #[Title('About')]
    public function render()
    {
        return view('livewire.guest.about');
    }
}
