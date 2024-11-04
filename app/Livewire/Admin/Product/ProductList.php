<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    #[Url]
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    
    #[Title('Products')]
    #[Layout('components.layouts.admin-page')]
    
    public function render()
    {
        return view('livewire.admin.product.product-list',
        [
            'products' => Product::where('product_name', 'like', '%' . $this->search . '%')
                        ->with('brands')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10)
        ]);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        session()->flash('success', 'product berhasil dihapus');
        $this->redirect('/dataproduct', navigate:true);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
