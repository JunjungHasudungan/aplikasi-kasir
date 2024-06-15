<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\{Validate, Rule};
use Livewire\Form;
use App\Models\{Image, Product};
use Livewire\WithFileUploads;

class ProdukForm extends Form
{
    use WithFileUploads;

    #[Rule('required', message: 'Gambar produk wajib dipilih..')]
    public $photo;

    #[Rule('required', message: 'Nama produk wajib diisi..')]
    #[Rule('min:5', message: 'Nama Produk mininal 5 karakter')]
    public string $name = '';

    #[Rule('required', message: 'Nama Kategori wajib diisi..')]
    public string $categori = '';

    #[Rule('required', message: 'Jumlah produk wajib diisi..')]
    #[Rule('int', message: 'jumlah produk harus angka bulat..')]
    public int $amount = 0;

    #[Rule('required', message: 'Harga produk wajib diisi..')]
    #[Rule('int', message: 'Harga produk harus angka bulat..')]
    public int $price= 0;

    public Product $product;

    public function storeProduct()
    {
        sleep(1);
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

        $this->reset(['name', 'price', 'amount', 'categori', 'photo']);

        $this->resetValidation(['name', 'price', 'amount', 'categori', 'photo']);

        session()->flash('status', 'Produk Berhasil ditambahkan..');

    }
}
