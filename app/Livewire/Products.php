<?php

namespace App\Livewire;

use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;

    public
            $is_create = false,
            $price,
            $amount,
            $categori,
            $name;

    public $photo;

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
            'photo'     => 'required|image|max:1024'
        ],[
            'name.required' => 'Nama produk wajib diisi..',
            'name.min'      => 'Nama Produk wajib minimal 4 karakter',
            'name.max'      => 'Nama Produk wajib maksimal 10 karakter',
            'name.unique'   => 'Nama sudah digunakan..',
            'price.required'    => 'Harga Produk wajib diisi..',
            'price.integer'     => 'Inputan harga harus angka',
            'amount.required'   => 'Jumlah Produk wajib dipilih..',
            'amount.integer'    => 'Inputan jumlah harus angka',
            'categori.required' => 'Kategori wajib dipilih..',
            'photo.required'    => 'Gambar produk wajib dipilih'

        ]);

        // mengambil nama original dari gambar 
        $photoName = $this->photo->getClientOriginalName();

        $product = Product::create([
            'name'          => $validated['name'],
            'price'         => $validated['price'],
            'amount'        => $validated['amount'],
            'categori'      => $validated['categori'],
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        if ($this->photo) {
            $photoName = $this->photo->getClientOriginalName();
            $path = $this->photo->storeAs('images', $photoName, 'public');
            
            Image::create([
                'path_name' => $path,
                'product_id'    => $product->id
            ]);
        }

            $this->reset('name', 'price', 'amount', 'categori');

            $this->resetValidation('name', 'price', 'amount', 'categori', 'photo');
                
            $this->dispatch('saved-product', name: $product->name);
    }

}
