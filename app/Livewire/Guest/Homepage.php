<?php

namespace App\Livewire\Guest;

use Livewire\Attributes\Title;
use Livewire\Component;

class Homepage extends Component
{
    #[Title('Homepage')]
    public function render()
    {
        return view('livewire.guest.homepage');
    }
}
