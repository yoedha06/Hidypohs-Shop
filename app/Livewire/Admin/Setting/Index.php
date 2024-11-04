<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Index extends Component
{
    public $setting;
    public $api_token;
    public $gateway;

    #[Layout('components.layouts.admin-page')]

    protected $rules = [
        'api_token' => 'required|string',
        'gateway' => 'required|numeric',
    ];

    public function mount()
    {
        $this->setting = Setting::first() ?? new Setting();
        $this->api_token = $this->setting->api_token;
        $this->gateway = $this->setting->gateway;
    }

    public function save()
    {
        $this->validate();
        $this->setting->updateOrCreate(
            ['id' => $this->setting->id],
            [
                'api_token' => $this->api_token,
                'gateway' => $this->gateway
            ]
        );

        session()->flash('success', 'Setting updated successfully');
        return redirect()->to('/setting');
    }

    public function render()
    {
        return view('livewire.admin.setting.index');
    }
}
