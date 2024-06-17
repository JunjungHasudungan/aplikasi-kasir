<?php

namespace App\Livewire\Admin\Product;
use Livewire\Attributes\Title;

use Livewire\Component;

class ProductIndex extends Component
{
    #[Title('PRODUK')]
    public function render()
    {
        return view('livewire.admin.product.product-index');
    }
}
