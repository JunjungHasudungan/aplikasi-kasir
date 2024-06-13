<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;

    public
            $is_create = false,
            $image,
            $price,
            $amount,
            $categori,
            $name;

    public function render()
    {
        return view('livewire.products', [
            'listProduct'   => Product::with('image')->get()
        ]);
    }

    public function openModalCreate()
    {
        return $this->is_create = true;
    }

    public function closeModalCreate()
    {
        return $this->is_create = false;
    }

    public function createProduct()
    {
        $this->openModalCreate();
    }

    public function storeProduct()
    {
        $validated = $this->validate([
            'name'      => 'required|min:4|max:10|unique:products,name',
            'price'     => 'required|integer',
            'amount'    => 'required|integer',
            'categori'  => 'required',
            'image'     => 'required'
        ],[
            'name.required' => 'Nama produk wajib diisi..',
            'name.min'      => 'Nama Produk wajib minimal 4 karakter',
            'name.max'      => 'Nama Produk wajib maksimal 10 karakter',
            'price.required'    => 'Harga Produk wajib diisi..',
            'price.integer'     => 'Inputan harga harus angka',
            'amount.required'   => 'Jumlah Produk wajib dipilih..',
            'amount.integer'    => 'Inputan jumlah harus angka',
            'categori.required' => 'Kategori wajib dipilih..',
            'image.required'    => 'Gambar produk wajib dipilih'
            
        ]); 

        
        $product = Product::insert($validated);
        
        if ($this->image) {
            $validated['image'] = $this->image->store('public/image');
            }

        $this->dispatch('saved-product', name: $product->name);
    }
}
