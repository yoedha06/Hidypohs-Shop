<?php

namespace App\Livewire\Actions;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ModalDelete extends Component
{
    public Model $model;
    public $id = null;
    public $redirectRoute = null;
    public $message = null;

    public function destroy() : void {
        $this->model->delete();

        session()->flash('success', $this->message);

        $this->redirect($this->redirectRoute, navigate:true);
    }

    public function render()
    {
        return view('livewire.actions.modal-delete');
    }
}
