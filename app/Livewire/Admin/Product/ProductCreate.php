<?php

namespace App\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{

    use WithFileUploads;

    #[Title('Add Product')]
    #[Layout('components.layouts.admin-page')]

    #[Validate('nullable|image|mimes:jpeg,png,jpg|max:2048')]
    public $image;

    #[Validate('required|max:100',message:'The product name must be less than 100 characters')]
    public $product_name;
    
    #[Validate('required')]
    public $brand_id;

    #[Validate('required')]
    public $description;

    #[Validate('required|numeric|min:1',message:'The stock must be a number')]
    public $stock;
    
    #[Validate('required|numeric|min:1',message:'The price must be a number')]
    public $price;

    #[Validate('required')]
    public $order_date;

    public function render()
    {
        return view('livewire.admin.product.product-create',[
            'brands' => Brand::all()
        ]);
    }

    public function create()
    {
        $validated = $this->validate();
        if($this->image){
            $validated['image'] = $this->image->store('products','public');
        }

        Product::create($validated);
        session()->flash('success', 'product berhasil ditambahkan');
        $this->redirect('/dataproduct', navigate:true);
    }
}
