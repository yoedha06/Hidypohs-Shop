<?php

namespace App\Livewire\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Admin extends Component
{
    #[Title('Dashboard')]
    #[Layout('components.layouts.admin-page')]
    
    public function render()
    {
        return view('livewire.admin.admin', [
            'countcust' => User::where('role', 'customer')->count(),
            'products' => Product::count(),
            'brands' => Brand::count()
        ]);
    }
}
