<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandCreate extends Component
{
    use WithFileUploads;
    
    #[Title('Add Brand')]
    #[Layout('components.layouts.admin-page')]

    public $logo;
    public $brand_name;
    public $country;
    public $description;

    protected $rules = [
        'logo' => 'nullable|image|mimes:jpeg,png,jpg',
        'brand_name' => 'required',
        'country' => 'required',
        'description' => 'required',
    ];
    
    public function render()
    {
        return view('livewire.admin.brand.brand-create');
    }

    public function create()
    {
        $validated = $this->validate();
        if($this->logo) {
            $validated['logo'] = $this->logo->store('brands', 'public');
        }

        Brand::create($validated);
        session()->flash('success', 'brand berhasil ditambahkan');
        return $this->redirect('/databrand', navigate:true);
    }
}
