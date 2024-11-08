<?php

namespace App\Livewire\User\Product;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class WomenProduct extends Component
{
    #[Title('Men Product')]
    #[Layout('components.layouts.user-page')]

    public function render()
    {
        $womanProducts = Product::whereIn('gender', ['female', 'unisex'])->get();
        return view('livewire.user.product.women-product',[
            'womanProducts' => $womanProducts
        ]);
    }
}
