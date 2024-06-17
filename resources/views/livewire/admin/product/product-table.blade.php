{{-- create cutString function --}}
@php
    function shortenString($string, $length = 10) {
        if (strlen($string) > $length) {
            return substr($string, 0, $length) . '...';
        } else {
            return $string;
        }
    }
@endphp

{{-- @if ($isOpenModal)
    <livewire:product.display-image/>
@endif --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-3 py-3">
                    Jumlah
                </th>
                <th scope="col" class="px-3 py-3">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3">
                    Kategori
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listProduct as $product)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span> {{ shortenString($product->name) }} </span>
                        {{-- wrap with div --}}
                        <div id="tooltip-hover" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-blue-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-blue-700">
                            {{ shortenString($product->name) }}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        Rp.{{ $product->price }}
                    </td>
                    <td class="px-4 py-4">
                        {{ $product->amount }}
                    </td>
                    <td class="px-4 py-4">
                        {{ __('Tersedua') }}
                        {{-- <x-buttonCustom @click="$wire.set('modalDisplayProdctImage', true)"> {{ __('Tersedia') }} </x-buttonCustom>
                        <div>
                            <x-dialog-modal wire:model.live="modalDisplayProdctImage">
                                <x-slot name="title">
                                    {{ $product->name }}
                                </x-slot>

                                <x-slot name="content">
                                    <div id="controls-carousel" class="relative w-full" data-carousel="static">
                                        <!-- Carousel wrapper -->
                                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                            <!-- Item 1 -->
                                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                <img src="/docs/images/carousel/carousel-1.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                            </div>
                                            <!-- Item 2 -->
                                            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                                <img src="/docs/images/carousel/carousel-2.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                            </div>
                                            <!-- Item 3 -->
                                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                <img src="/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                            </div>
                                            <!-- Item 4 -->
                                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                            </div>
                                            <!-- Item 5 -->
                                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                            </div>
                                        </div>
                                        <!-- Slider controls -->
                                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                </svg>
                                                <span class="sr-only">Previous</span>
                                            </span>
                                        </button>
                                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                                </svg>
                                                <span class="sr-only">Next</span>
                                            </span>
                                        </button>
                                    </div>
                                </x-slot>

                                <x-slot name="footer">
                                    {{ __('Footer') }}
                                </x-slot>
                            </x-dialog-modal>

                        </div> --}}
                    </td>
                    <td class="px-4 py-4">
                       {{ $product->categori }}
                    </td>
                    <td class="px-1 py-4 text-right">
                        <div class="flex flex-row space-x-2">
                            {{-- btn edit --}}
                            <x-buttonCustom x-on:click.prevent="$dispatch('dispatch-product-edit', { id: {{ $product->id }} })"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                {{-- </a> --}}
                            </x-buttonCustom>
                            {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a> --}}
                            {{-- end button edit --}}

                            {{-- btn delete --}}
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>
                            {{-- end btn delete --}}
                        </div>
                    </td>
                </tr>
            @empty
                <div class="p-4 mb-1 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-700 dark:text-yellow-300" role="alert">
                    <span class="font-medium">Produk belum tersedia..</span>
                </div>
            @endforelse
        </tbody>
    </table>

    {{-- part of pagination --}}
        <div class="py-2 px-2">
            {{ $listProduct->links() }}
        </div>
    {{-- end part of pagination --}}
</div>
