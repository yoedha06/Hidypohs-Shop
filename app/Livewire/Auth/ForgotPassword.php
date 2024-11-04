<?php

namespace App\Livewire\Auth;

use App\Models\CodeOtp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Title('Forgot Password')]
    #[Layout('components.layouts.auth')]

    public $phone, $otp, $gateway, $apiToken;

    public function sendLink()
    {
        $validate = $this->validate([
            'phone' => 'required|numeric|exists:users,phone',
        ]);

        if($validate){
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
                    "message" => "This is your Verification Code From *HIDYPOHS* to Forgot Password : " . $otp . ". For your security, this code is valid for only 1 minute. Do not share it with anyone."
                ];
    
                $send = Http::withToken($this->apiToken)
                            ->withHeaders(['X-Requested-With', 'XMLHttpRequest'])
                            ->post($url, $data);
                
                logger($send->json());
    
                if($send->successful()){
                    CodeOtp::updateOrCreate([
                        'phone' => $this->phone
                    ], [
                        'phone' => $this->phone,
                        'otp' => $otp,
                        'expires_at' => now()->addSecond(60)
                    ]);

                    session()->flash('success', 'OTP sent succesfully to your phone');
                    $this->redirectRoute('otp.forgot', navigate:true);

                } else {
                    session()->flash('error', $send->json()['message']);
                }
            } catch(\Exception $e){
                Log::error($e->getMessage());
            }
        } else {
            session()->flash('error', 'Phone number not found');
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
