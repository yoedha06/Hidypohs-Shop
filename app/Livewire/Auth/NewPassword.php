<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class NewPassword extends Component
{
    #[Title('Set New Password')]
    #[Layout('components.layouts.auth')]

    public $newPassword, $confirmPassword;

    public function updateNewPassword()
    {
        $validate = $this->validate([
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $token = session('token');
        $phone = session('phone');
        
        $resetToken = DB::table('password_reset_tokens')
            ->where('phone', $phone)
            ->where('token', $token)
            ->first();

        if (!$resetToken) {
            throw ValidationException::withMessages(['token' => 'Invalid token or phone number.']);
        }

        $user = User::where('phone', $phone)->first();
        if ($user) {
            $user->password = Hash::make($this->newPassword);
            $user->save(); 
        }

        DB::table('password_reset_tokens')->where('phone', $phone)->delete();
        session()->forget(['phone', 'token']);

        session()->flash('success', 'Password successfully changed.');
        $this->redirectRoute('login', navigate:true);
    }

    public function render()
    {
        return view('livewire.auth.new-password');
    }
}
