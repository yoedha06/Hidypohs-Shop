<?php

namespace App\Livewire\User;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class User extends Component
{
    #[Title('Dashboard')]
    #[Layout('components.layouts.user-page')]
    
    public function render()
    {
        $products = Product::with('brands')->get();
        return view('livewire.user.user',[
            'products' => $products
        ]);
    }
}
