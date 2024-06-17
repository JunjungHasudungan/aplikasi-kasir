<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\Attributes\On;

class ProductEdit extends Component
{
    public $modalProductEdit = false;

    #[On('dispatch-product-edit')]
    public function setProduct($productId)
    {
        dd($productId);
    }
    public function render()
    {
        return view('livewire.admin.product.product-edit');
    }
}
