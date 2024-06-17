<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    <!-- Modal body -->
    <form wire:click="sendProduct()" class="p-4 md:p-5">
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama </label>
                <input
                        type="text"
                        wire:model="form.name"
                        name="form.name"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ketikkan nama produk..">
                <x-input-error class="mt-2" :messages="$errors->get('form.name')" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga </label>
                <input
                        type="number"
                        name="form.price"
                        wire:model="form.price"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ketikkan Harga Produk">
                <x-input-error class="mt-2" :messages="$errors->get('form.price')" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                <input
                        type="number"
                        wire:model="form.amount"
                        name="form.amount"
                        id="amount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jumlah Produk">
                <x-input-error class="mt-2" :messages="$errors->get('form.amount')" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">Gambar</label>
                <input  wire:model="form.photo"
                        class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="small_size" type="file">
                <x-input-error class="mt-2" :messages="$errors->get('form.photo')" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label  for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Kategori
                </label>
                <select wire:model="form.categori"
                        name="form.categori"
                        id="categori"
                        id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="">Pilih Kategori</option>
                    @forelse (\App\Helpers\ListCategories::ListCategories as $key => $category)
                        <option class="font-normal hover:font-bold border-gray-300 rounded-lg capitalize" value="{{ $category }}"> {{ $key }} </option>
                    @empty
                        <option class="font-normal bg-yellow-400 hover:font-bold capitalize">List Kategori belum tersedia..</option>
                    @endforelse
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('form.categori')" />
            </div>
        </div>
        <button
                type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Produk
        </button>
    </form>
</div>
