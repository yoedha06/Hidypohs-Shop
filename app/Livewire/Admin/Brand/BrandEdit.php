<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandEdit extends Component
{

    use WithFileUploads;
    #[Title('Edit Brand')]

    #[Layout('components.layouts.admin-page')]
    public $brand;
    public $logo;
    public $logoUrl;
    public $brand_name;
    public $country;
    public $description;

    protected $rules = [
        'logo' => 'nullable|image|mimes:jpeg,png,jpg',
        'brand_name' => 'required',
        'country' => 'required',
        'description' => 'required',
    ];

    public function mount($id)
    {
        $this->brand = Brand::find($id);
        $this->logoUrl = Storage::url($this->brand->logo);
        $this->brand_name = $this->brand->brand_name;
        $this->country = $this->brand->country;
        $this->description = $this->brand->description;
    }

    public function render()
    {
        return view('livewire.admin.brand.brand-edit');
    }

    public function update() {
        $this->validate();
        $validated = [
            'brand_name' => $this->brand_name,
            'country' => $this->country,
            'description' => $this->description
        ];

        if($this->logo instanceof \Illuminate\Http\UploadedFile) {
            $validated['logo'] = Storage::disk('public')->put('brands', $this->logo);
        }

        $this->brand->update($validated);
        session()->flash('success', 'brand successfully updated');
        return $this->redirect('/databrand', navigate:true);
    }
}
