<?php

namespace App\Livewire\Auth;

use App\Models\CodeOtp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;

class OtpForgotPassword extends Component
{
    #[Title('Otp Forgot Password')]
    #[Layout('components.layouts.auth')]

    public $otp, $gateway, $apiToken;


    public function resendOtp()
    {
        $settingGateway = DB::table('settings')->select('api_token', 'gateway')->first();
        $this->gateway = $settingGateway->gateway;
        $this->apiToken = $settingGateway->api_token;

        $phone = session('phone');

        if (!$phone) {
            session()->flash('error', 'session not found, Please try again');
        }

        $maximumSend = session('maximum_send', 0);

        if ($maximumSend >= 3) {
            session()->forget('phone');
            session()->flash('error', 'Maximum resend otp reached');
            $this->redirectRoute('login', navigate:true);
        }

        try{
            $otp = rand(100000, 999999);

            $url = "https://app.japati.id/api/send-message";
            $data = [
                "gateway" => $this->gateway,
                "number" => $phone,
                "type" => "text",
                "message" => "This is your Verification Code From *HIDYPOHS* to Forgot Password : " . $otp . ". For your security, this code is valid for only 1 minute. Do not share it with anyone."
            ];

            $send = Http::withToken($this->apiToken)
                        ->withHeaders(['X-Requested-With', 'XMLHttpRequest'])
                        ->post($url, $data);
            
            logger($send->json());

            if($send->successful()){
                session(['otp' => $otp]);

                CodeOtp::updateOrCreate([
                    'phone' => $phone
                ], [
                    'phone' => $phone,
                    'otp' => $otp,
                    'expires_at' => now()->addSecond(60)
                ]);

                session()->flash('successOtp', 'OTP sent succesfully to your phone');
            } else {
                session()->flash('error', $send->json()['message']);
            }
        } catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }


    public function assigned()
    {
        $this->validate([
            'otp' => 'required|numeric|digits:6'
        ]);

        $phone = session('phone');
        if (!$phone) {
            session()->flash('error', 'session not found, Please try again');
            return;
        }

        $otpRecord = CodeOtp::where('phone', $phone)->first();
        $otp = session('otp');
        if ($this->otp != $otp) {
            session()->flash('errorOtp', 'OTP invalid, Please try again');
            return;
        } else if ($otpRecord->expires_at < now()) {
            session()->flash('errorOtp', 'OTP expired, Resend OTP and try again'); 
            return;
        }

        session()->forget('otp');
        CodeOtp::where('phone', $phone)->delete();
    
        $token = Str::random(90);
        session(['token' => $token]);

        DB::table('password_reset_tokens')->updateOrInsert([
            'phone' => $phone,
            'token' => $token,
        ],[
            'phone' => $phone,
            'token' => $token,
            'created_at' => now()
        ]);
        
        $this->redirectRoute('new.password', ['token' => $token], navigate:true);
    }

    public function render()
    {
        return view('livewire.auth.otp-forgot-password');
    }
}
