<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProdukForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{

    use WithFileUploads;

    // instansiasi ProdukForm
    public ProdukForm $form;

    public function render()
    {
        return view('livewire.product.product-create');
    }

    public function sendProduct()
    {
        $this->form->validate();

        $this->form->storeProduct();

        // mwmberikan trigger ke komponent lain
        $this->dispatch('product-created');

        // // memberi trigger ke btn store
        $this->dispatch('product-stored');

    }
}
