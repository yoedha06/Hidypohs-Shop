<?php

namespace App\Livewire\Admin\List;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ListUser extends Component
{
    #[Url]
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'tailwind';
    
    #[Title('Data Users')]
    #[Layout('components.layouts.admin-page')]
    public function render()
    {
        return view('livewire.admin.list.list-user', [
            'users' => User::where('name', 'like', '%'. $this->search . '%')->paginate(2)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
