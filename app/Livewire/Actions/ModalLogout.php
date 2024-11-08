<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ModalLogout extends Component
{
    public function render()
    {
        return view('livewire.actions.modal-logout');
    }


    public function logout()
    {
        Auth::logout();
        return $this->redirect('/');
    }
}
