{{-- start for form --}}
<div>

    <x-buttonCustom x-data="" x-on:click.prevent="$dispatch('open-modal', 'createProduct')">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>

        {{ __('Product') }}
    </x-buttonCustom>

<x-modal name="createProduct" :show="$errors->isNotEmpty()" focusable>
    <form wire:submit.prevent="sendProduct"  class="p-6">

        <h2 class="text-lg text-center font-medium text-gray-900 dark:text-gray-100">
            {{ __('Tambah Produk Baru') }}
        </h2>

        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="form.name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input  type="text"
                        name="form.name"
                        id="name"
                        wire:model="form.name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name">
                <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                <input  type="number"
                        name="form.price"
                        wire:model="form.price"
                        id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Rp.">
                <x-input-error :messages="$errors->get('form.price')" class="mt-2" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="form.categori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <select wire:model="form.categori"
                        name="form.categori"
                        id="form.categori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="">Pilih Kategori</option>
                    @forelse (\App\Helpers\ListCategories::ListCategories as $key => $item)
                    <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize" value="{{ $item }}"> {{ $key }} </option>
                    @empty
                        <option class="font-normal bg-yellow-400 hover:font-bold capitalize">Kategori belum tersedia..</option>
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('form.categori')" class="mt-2" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label
                    for="form.photo"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                <input accept="image/png, image/jpg, image/jpeg" wire:model="form.photo" class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="default_size" type="file">
                <x-input-error :messages="$errors->get('form.photo')" class="mt-2" />
                @if ($form->photo)
                    <img class="rounded w-10 h-10 mt-5 block " src="{{ $form->photo->temporaryUrl() }}">
                @endif

                <div wire:loading wire:target="form.photo">
                    <span class="text-green-500">Loading...</span>
                </div>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="form.amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                <input wire:model="form.amount" type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="1">
                <x-input-error :messages="$errors->get('form.amount')" class="mt-2" />
            </div>
        </div>
        <div class="flex items-center gap-4">
            {{-- <button
                    type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Produk
            </button> --}}
            <x-action-message class="me-3 text-green-800 font-semibold dark:text-green-400" on="product-stored">
                {{ session('status') }}
            </x-action-message>
        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3">
                {{ __('Delete Account') }}
            </x-button>
        </div>
    </form>
</x-modal>
    {{-- <x-buttonCustom @click="$wire.set('modalProductCreate', true)">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>

        {{ __('Product') }}
    </x-buttonCustom>

        <x-dialog-modal wire:model.live="modalProductCreate">
            <x-slot name="title">
                {{ __('Form Produk') }}
            </x-slot>

            <x-slot name="content">
               {{ _('KOntent') }}
            </x-slot>

            <x-slot name="footer">
                {{ __('Footer') }}
            </x-slot>
        </x-dialog-modal> --}}


    {{-- <div class="flex items-center justify-center">
        <div class="justify-center w-full border-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                <form wire:submit.prevent ="sendProduct" class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="form.name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input  type="text"
                                    name="form.name"
                                    id="name"
                                    wire:model="form.name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name">
                            <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                            <input  type="number"
                                    name="form.price"
                                    wire:model="form.price"
                                    id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Rp.">
                            <x-input-error :messages="$errors->get('form.price')" class="mt-2" />
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="form.categori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <select wire:model="form.categori"
                                    name="form.categori"
                                    id="form.categori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Pilih Kategori</option>
                                @forelse (\App\Helpers\ListCategories::ListCategories as $key => $item)
                                <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize" value="{{ $item }}"> {{ $key }} </option>
                                @empty
                                    <option class="font-normal bg-yellow-400 hover:font-bold capitalize">Kategori belum tersedia..</option>
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('form.categori')" class="mt-2" />
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label
                                for="form.photo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                            <input accept="image/png, image/jpg, image/jpeg" wire:model="form.photo" class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="default_size" type="file">
                            <x-input-error :messages="$errors->get('form.photo')" class="mt-2" />
                            @if ($form->photo)
                                <img class="rounded w-10 h-10 mt-5 block " src="{{ $form->photo->temporaryUrl() }}">
                            @endif

                            <div wire:loading wire:target="form.photo">
                                <span class="text-green-500">Loading...</span>
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="form.amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                            <input wire:model="form.amount" type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="1">
                            <x-input-error :messages="$errors->get('form.amount')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <button
                                type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Produk
                        </button>
                        <x-action-message class="me-3 text-green-800 font-semibold dark:text-green-400" on="product-stored">
                            {{ session('status') }}
                        </x-action-message>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
</div>
{{-- end for form --}}

