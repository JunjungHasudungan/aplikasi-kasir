<?php

namespace App\Livewire\Product;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductTable extends Component
{
    use WithPagination;

    // menerima dan merespon trigger dari component lain
    #[On('product-stored')]
    public function updateTable($product = null)
    {
    }
    public function render()
    {
        return view('livewire.product.product-table', [
            'listProduct'   => Product::with('image')->paginate(5)
        ]);
    }
}
