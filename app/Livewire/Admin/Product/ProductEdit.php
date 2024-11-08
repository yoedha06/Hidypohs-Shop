<?php

namespace App\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    use WithFileUploads;
    public $product;

    #[Title('Edit Product')]
    #[Layout('components.layouts.admin-page')]

    #[Validate('nullable|image|mimes:jpeg,png,jpg|max:2048')]
    public $image;
    public $imgUrl;

    #[Validate('required|max:100',message:'The product name must be less than 100 characters')]
    public $product_name;
    
    #[Validate('required')]
    public $brand_id;

    #[Validate('required|max:200',message:'The description must be less than 200 characters')]
    public $description;

    #[Validate('required')]
    public $gender;

    #[Validate('required|numeric|min:1',message:'The stock must be a number')]
    public $stock;
    
    #[Validate('required|numeric|min:1',message:'The price must be a number')]
    public $price;

    #[Validate('required')]
    public $order_date;
    
    public function mount($id){
        $this->product = Product::find($id);
        $this->imgUrl = Storage::url($this->product->image);
        $this->product_name = $this->product->product_name;
        $this->brand_id = $this->product->brand_id;
        $this->description = $this->product->description;
        $this->gender = $this->product->gender;
        $this->stock = $this->product->stock;
        $this->price = $this->product->price;
        $this->order_date = $this->product->order_date;
    }
    
    public function render()
    {
        return view('livewire.admin.product.product-edit', [
            'brands' => Brand::all()
        ]);
    }

    public function update() {
        $validated = [
            'product_name' => $this->product_name,
            'brand_id' => $this->brand_id,
            'description' => $this->description,
            'gender' => $this->gender,
            'stock' => $this->stock,
            'price' => $this->price,
            'order_date' => $this->order_date
        ];

        if ($this->image instanceof \Illuminate\Http\UploadedFile)
        {
            $validated['image'] = Storage::disk('public')->put('products', $this->image);
        }

        $this->product->update($validated);
        session()->flash('success', 'product successfully updated');
        $this->redirect('/dataproduct', navigate:true);
    }
}
