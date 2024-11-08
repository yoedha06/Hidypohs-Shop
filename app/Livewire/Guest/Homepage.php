<?php

namespace App\Livewire\Guest;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

class Homepage extends Component
{
    #[Title('Homepage')]
    public function render()
    {
        $product = Product::with('brands')->limit(10)->get();
        return view('livewire.guest.homepage',[
            'products' => $product
        ]);
    }
}
