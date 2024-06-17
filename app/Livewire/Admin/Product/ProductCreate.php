<?php

namespace App\Livewire\Admin\Product;

use App\Livewire\Forms\ProdukForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{

    use WithFileUploads;
    public $modalProductCreate = false;

    // instansiasi ProdukForm
    public ProdukForm $form;

    public function render()
    {
        return view('livewire.admin.product.product-create');
    }

    public function sendProduct()
    {
        $this->form->validate();

        $this->form->storeProduct();

        $this->reset();

        // mwmberikan trigger ke komponent lain
        $this->dispatch('product-created');

        // memberikan triger menutup pop-modal-form-product
        $this->dispatch('close');

        $this->resetValidation(['name', 'price', 'categori', 'photo', 'amount']);
        // // memberi trigger ke btn store
        $this->dispatch('product-stored');

    }
}
