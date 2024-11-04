<?php

namespace App\Livewire\Guest;

use Livewire\Attributes\Title;
use Livewire\Component;

class FaQs extends Component
{
    #[Title('FaQs')]
    public function render()
    {
        return view('livewire.guest.fa-qs');
    }
}
