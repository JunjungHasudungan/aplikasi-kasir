<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\On;

class DisplayImage extends Component
{
    public $modalDisplayProdctImage = false;
    // public function displayProductImage(Product $product) 
    // {
        //     dd($product);
    // }
    
    #[On('show-image')]
    public function displayProductImage(Product $product)
    {
        dd('disini');
        // dd($product);

        // mengirimkan nilai true untuk membuka modal display-image
        $this->modalDisplayProdctImage = true;
    }

    public function render()
    {
        return view('livewire.product.display-image');
    }
}
