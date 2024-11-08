<?php

namespace App\Livewire\User\Brand;

use App\Models\Brand;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class IndexBrand extends Component
{
    #[Title('Brands')]
    #[Layout('components.layouts.user-page')]

    public function render()
    {
        $brands = Brand::get();
        return view('livewire.user.brand.index-brand',[
            'brands' => $brands
        ]);
    }
}
