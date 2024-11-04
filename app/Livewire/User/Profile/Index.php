<?php

namespace App\Livewire\User\Profile;

use App\Models\CodeOtp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $data;
    #[Title('Profile')]
    #[Layout('components.layouts.user-page')]

    public $name, $address, $phone, $image, $gateway, $apiToken, $currentPassword, $newPassword;

    public $typeCurrent = 'password';
    public $typeNew = 'password';

    public function render()
    {
        return view('livewire.user.profile.index');
    }

    public function mount()
    {
        $this->data = User::find(Auth::id());
        $this->name = $this->data->name;
        $this->address = $this->data->address;
        $this->phone = $this->data->phone;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|max:50',
            'address' => 'nullable',
            'image' => 'nullable|image|max:5000|mimes:jpeg,png,jpg',
            'phone' => [
                'required',
                'numeric',
                Rule::unique('users', 'phone')->ignore($this->data->id),
            ],
        ]);

        if ($this->image) {
            $imageName = $this->image->store('profile-image', 'public');
            $this->data->update([
                'image' => $imageName,
            ]);
        }

        if ($this->phone != $this->data->phone) {
            $this->verificationOtp();

            $this->data->update([
                'phone' => $this->phone,
                'phone_verified_at' => now()
            ]);
            return;
        }

        $this->data->update([
            'name' => $this->name,
            'address' => $this->address
        ]);
        session()->flash('success', 'profile berhasil diupdate');
        $this->redirect('/profile/user', navigate:true);
    }

    private function verificationOtp()
    {
        $settingGateway = DB::table('settings')->select('api_token', 'gateway')->first();
        $this->gateway = $settingGateway->gateway;
        $this->apiToken = $settingGateway->api_token;

        try{
            $otp = rand(100000, 999999);
            session(['otp' => $otp, 'phone' => $this->phone]);

            $url = "https://app.japati.id/api/send-message";
            $data = [
                "gateway" => $this->gateway,
                "number" => $this->phone,
                "type" => "text",
                "message" => "*Hello " . $this->name . "*, to continue your verification with *HIDYPOHS*, please use the following code: *" . $otp . "*. For your security, this code is valid for only 1 minute. Do not share it with anyone."
            ];

            $send = Http::withToken($this->apiToken)
                        ->withHeaders(['X-Requested-With', 'XMLHttpRequest'])
                        ->post($url, $data);
            
            logger($send->json());

            if($send->successful()){
                session()->flash('successOtp', 'OTP telah dikirim.');
                CodeOtp::updateOrCreate([
                    'phone' => $this->phone
                ], [
                    'phone' => $this->phone,
                    'otp' => $otp,
                    'expires_at' => now()->addSecond(60)
                ]);

                $this->redirectRoute('otp.profile.user', navigate:true);

            } else {
                session()->flash('errorOtp', $send->json()['message']);
            }
        } catch(\Exception $e){
            Log::error($e->getMessage());
            session()->flash('errorOtp', $e->getMessage());
        }
    }

    public function deleteImage()
    {
        if ($this->data->image) {
            Storage::delete($this->data->image);
            $this->data->image = null;
            $this->data->save();
            $this->image = null;
            $this->data = User::find($this->data->id);
            
            session()->flash('success', 'Foto berhasil dihapus.');
            $this->redirect('/profile/user', navigate:true);
        } else {
            session()->flash('error', 'Tidak ada foto untuk dihapus.');
        }
    }

    public function changePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8'
        ]);

        try {
        if (!Hash::check($this->currentPassword, $this->data->password)) {
            session()->flash('errorChange', 'Current password is incorrect.');
            return;
        }

        User::find($this->data->id)->update([
            'password' => Hash::make($this->newPassword),
        ]); 
        session()->flash('successChange', 'Password changed successfully.');
        $this->reset(['currentPassword', 'newPassword']);
        }  catch (\Exception $e) {
            logger($e->getMessage());
            session()->flash('errorChange', $e->getMessage());
        }
    }

    public function toogleCurrentPassword()
    {
        if($this->typeCurrent === 'password') {
            $this->typeCurrent = 'text';
        } else {
            $this->typeCurrent = 'password';
        }
    }

    public function toogleNewPassword()
    {
        if($this->typeNew === 'password') {
            $this->typeNew = 'text';
        } else {
            $this->typeNew = 'password';
        }
    }
}
