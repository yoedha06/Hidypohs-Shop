<?php

namespace App\Livewire\Auth;

use App\Models\CodeOtp;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Exists;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Title('Register')]
    #[Layout('components.layouts.auth')]

    public $name;
    public $password;
    public $type="password";
    public $phone;
    public $otp;
    
    public $gateway;
    public $apiToken;

    public function tooglePassword()
    {
        if ($this->type === "password") {
            $this->type = "text";
        } else {
            $this->type = "password";
        }
    }

    public function sendOTP()
    {
        if (empty($this->phone && $this->name && $this->password)) {
            session()->flash('errorName', 'The name field is required.');
            session()->flash('errorPhone', 'The phone field is required.');
            session()->flash('errorPassword', 'The password field is required.');
            return;
        }

        $checkPhone = User::where('phone', $this->phone)->first();
        if ($checkPhone) {
            session()->flash('errorPhone', 'The phone has already been taken.');
            return;
        }

        $settingGateway = DB::table('settings')->select('api_token', 'gateway')->first();
        $this->gateway = $settingGateway->gateway;
        $this->apiToken = $settingGateway->api_token;

        try{
            $otp = rand(100000, 999999);
            session(['otp' => $otp]);

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
            } else {
                session()->flash('errorOtp', $send->json()['message']);
            }
        } catch(\Exception $e){
            Log::error($e->getMessage());
            session()->flash('errorOtp', $e->getMessage());
        }
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required|max:15|unique:users,phone',
            'password' => 'required|min:8',
            'otp' => 'required|numeric|digits:6',
        ]);

        $otpRecord = CodeOtp::where('phone', $this->phone)->first();

        if ($this->otp != session('otp')) {
            session()->flash('errorOtp', 'OTP invalid, Please try again');
            return;
        } else if ($otpRecord->expires_at < now()) {
            session()->flash('errorOtp', 'OTP expired, Resend OTP and try again');
            return;
        }

        $user = User::create([
            'name'      => $this->name,
            'phone'     => $this->phone,
            'phone_verified_at' => now(),
            'password'  => bcrypt($this->password),
            'role'      => 'customer',
        ]);
        
        session()->forget('otp');
        CodeOtp::where('phone', $this->phone)->delete();

        if($user){
            session()->flash('success', 'registration success, please login');
            $this->redirect('/login', navigate:true);
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
    
}
