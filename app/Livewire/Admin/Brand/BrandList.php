<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class BrandList extends Component
{
    use WithPagination;
    #[Title('Brands')]

    protected $paginationTheme = 'tailwind';

    public $search = '';
    #[Layout('components.layouts.admin-page')]
    public function render()
    {
        return view('livewire.admin.brand.brand-list', [
            'brands' => Brand::where('brand_name', 'like', '%'. $this->search .'%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10)
        ]);
    }

    public function updateSearch()
    {
        $this->resetPage();
    }

}
