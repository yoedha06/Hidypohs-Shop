<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class User extends Component
{
    #[Title('Dashboard')]
    #[Layout('components.layouts.user-page')]
    
    public function render()
    {
        return view('livewire.user.user');
    }
}
