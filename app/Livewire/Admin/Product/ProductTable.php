<?php

namespace App\Livewire\Admin\Product;

use Livewire\Attributes\Layout;
use App\Models\Image;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductTable extends Component
{
    use WithPagination;

    public $isOpenModal = false;
    public $modalDisplayImage = false;
    public $modalDisplayProdctImage = false;
    public $image;

    public $productId;
    public $product;
    public $imageUrl;

    protected $listeners = ['showProductImageModal'];

    public function showProductImageModal($productId)
    {
        $this->productId = $productId;
        $this->product = Product::find($productId);

        $image = Image::where('product_id', $productId)->first();
        if ($image) {
            $this->imageUrl = $image->url; // Asumsikan ada kolom 'url' di tabel images
        } else {
            $this->imageUrl = null;
        }

        $this->modalDisplayProdctImage = true;
    }



    // menerima dan merespon trigger dari component lain
    #[On('product-stored')]
    public function updateTable($product = null)
    {
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.product.product-table', [
            'listProduct'   => Product::with('image')->paginate(5)
        ]);
    }

    public function showImage($productId)
    {
        $this->image = Image::where('product_id', $productId)->first();

        dd('sini');
        $this->modalDisplayProdctImage = true;

    }
}
