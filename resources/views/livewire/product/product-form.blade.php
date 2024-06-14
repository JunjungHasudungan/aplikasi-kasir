{{-- start for form --}}
<div>
    @if (session('status'))
        <div on="product-created"
            class="flex items-center p-4 mb-1 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('status') }} </span>
            </div>
        </div>
    @endif

    <div class="flex items-center justify-center">
        <div class="justify-center w-full border-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            {{-- form --}}
                <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                    <form wire:submit.prevent ="storeProduct" class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input  type="text"
                                        name="name"
                                        id="name"
                                        wire:model="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name">
                                @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                <input  type="number"
                                        name="price"
                                        wire:model="price"
                                        id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Rp.">
                                @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="categori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                <select wire:model="categori"
                                        name="categori"
                                        id="categori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Pilih Kategori</option>
                                    @forelse (\App\Helpers\ListCategories::ListCategories as $key => $item)
                                    <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize" value="{{ $item }}"> {{ $key }} </option>
                                    @empty
                                        <option class="font-normal bg-yellow-400 hover:font-bold capitalize">Kategori belum tersedia..</option>
                                    @endforelse
                                </select>
                                @error('categori') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label
                                    for="photo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                                <input accept="image/png, image/jpg, image/jpeg" wire:model="photo" class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="default_size" type="file">
                                @error('photo') <span class="text-red-500">{{ $message }}</span>@enderror
                                @if ($photo)
                                    <img class="rounded w-10 h-10 mt-5 block " src="{{ $photo->temporaryUrl() }}">
                                @endif

                                <div wire:loading wire:target="photo">
                                    <span class="text-green-500">Loading...</span>
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                                <input wire:model="amount" type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="1">
                                @error('amount') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <button wire:click="storeProduct"
                                    type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Produk
                            </button>
                            <x-action-message class="me-3" on="product-stored">
                                {{ __('Saved.') }}
                            </x-action-message>
                        </div>
                    </form>
                </div>
            {{-- end form --}}
        </div>
    </div>
</div>
{{-- end for form --}}
