<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Layout('components.layouts.auth')]
    #[Title('Login')]

    public $phone, $password;
    public $type = "password";
    public $remember = false;

    public function tooglePassword() 
    {
        if($this->type === "password") {
            $this->type = "text";
        } else {
            $this->type = "password";
        }
    }

    public function login()
    {
        $this->validate([
            'phone' => 'required|numeric',
            'password' => 'required'
        ]);

        if (Auth::attempt(['phone' => $this->phone, 'password' => $this->password], $this->remember)) 
        {
            if (Auth::user()->role == 'admin') {
                return $this->redirect('/admin', navigate: true);
            } else if (Auth::user()->role == 'customer') {
                return $this->redirect('/user', navigate: true);
            }
        } else {
            session()->flash('error', 'Login failed. Please check and try again.');
            return redirect()->back()->withInput();
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

}
