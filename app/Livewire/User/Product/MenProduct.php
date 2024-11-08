<?php

namespace App\Livewire\User\Product;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MenProduct extends Component
{
    #[Title('Men Product')]
    #[Layout('components.layouts.user-page')]
    
    public function render()
    {
        $menProducts = Product::whereIn('gender', ['male', 'unisex'])->get();
        return view('livewire.user.product.men-product',[
            'menProducts' => $menProducts
        ]);
    }
}
