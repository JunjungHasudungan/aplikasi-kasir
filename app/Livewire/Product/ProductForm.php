<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\{Image};
use App\Models\Product;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public $photo;
    public string $name = '';
    public string $categori= '';
    public int $amount = 0;
    public int $price= 0;

    protected $rules = [
            'name'      => 'required|min:4|max:10|unique:products,name',
            'price'     => 'required|integer',
            'amount'    => 'required|integer',
            'categori'  => 'required',
            'photo'     => 'required|image|max:1024'
    ];

    public function render()
    {
        return view('livewire.product.product-form');
    }
    public function storeProduct()
    {
        sleep(1);
        $validatedData = $this->validate([
            'name'      => 'required|min:4|max:20|unique:products,name',
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
            'name'          => $this->name,
            'price'         => $this->price,
            'amount'        => $this->amount,
            'categori'      => $this->categori,
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

        $this->reset('name', 'price', 'amount', 'categori', 'photo');

        session()->flash('status', 'Produk Berhasil ditambahkan..');

        // mwmberikan trigger ke komponent lain
        $this->dispatch('product-created', $product);

        // memberi trigger ke btn store
        $this->dispatch('product-stored', $product);
    }
}
